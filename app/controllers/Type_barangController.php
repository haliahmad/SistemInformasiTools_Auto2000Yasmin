<?php 
/**
 * Type_barang Page Controller
 * @category  Controller
 */
class Type_barangController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "type_barang";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id_type_barang","Sumber", "nama_barang", "stok"); // Tambahkan kolom stok di sini
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
	
		// Search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				type_barang.id_type_barang LIKE ? OR 
				type_barang.nama_barang LIKE ? OR
				type_barang.stok LIKE ?  -- Tambahkan kondisi pencarian untuk stok
			)";
			$search_params = array(
				"%$text%", "%$text%", "%$text%"
			);
			$db->where($search_condition, $search_params);
			$this->view->search_template = "type_barang/search.php";
		}
	
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("type_barang.id_type_barang", ORDER_TYPE);
		}
	
		if($fieldname){
			$db->where($fieldname , $fieldvalue);
		}
	
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
	
		if($db->getLastError()){
			$this->set_page_error();
		}
	
		$page_title = $this->view->page_title = "Part Number";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("type_barang/list.php", $data);
	}
	
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function add($formdata = null){
    if($formdata){
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $request = $this->request;
        //fillable fields, adding 'stok'
        $fields = $this->fields = array("Sumber", "nama_barang", "stok");
        $postdata = $this->format_request_data($formdata);
        $this->rules_array = array(
			'Sumber' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|numeric'
        );
        $this->sanitize_array = array(
			'Sumber' => 'sanitize_string',
            'nama_barang' => 'sanitize_string',
            'stok' => 'sanitize_string'
        );
        $this->filter_vals = true;
        $modeldata = $this->modeldata = $this->validate_form($postdata);
        
        // Manual validation to ensure stok is non-negative
        if ($this->validated() && $modeldata['stok'] >= 0) {
            $rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
            if($rec_id){
                $this->set_flash_msg("Record added successfully", "success");
                return $this->redirect("type_barang");
            }
            else{
                $this->set_page_error();
            }
        } else {
            $this->set_page_error("Invalid 'stok' value: must be a non-negative number.");
        }
    }
    $page_title = $this->view->page_title = "Add New Part Number";
    $this->render_view("type_barang/add.php");
}

/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id_type_barang","Sumber", 
			"nama_barang","stok");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("type_barang.id_type_barang", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Part Number";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("type_barang/view.php", $record);
	}

function edit($rec_id = null, $formdata = null){
    $request = $this->request;
    $db = $this->GetModel();
    $this->rec_id = $rec_id;
    $tablename = $this->tablename;
    // Editable fields, adding 'stok'
    $fields = $this->fields = array("id_type_barang","Sumber", "nama_barang", "stok");
    if($formdata){
        $postdata = $this->format_request_data($formdata);
        $this->rules_array = array(
			'Sumber' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|numeric'
        );
        $this->sanitize_array = array(
			'Sumber' => 'sanitize_string',
            'nama_barang' => 'sanitize_string',
            'stok' => 'sanitize_string'
        );
        $modeldata = $this->modeldata = $this->validate_form($postdata);
        
        // Manual validation to ensure stok is non-negative
        if ($this->validated() && $modeldata['stok'] >= 0) {
            $db->where("type_barang.id_type_barang", $rec_id);
            $bool = $db->update($tablename, $modeldata);
            $numRows = $db->getRowCount();
            if($bool && $numRows){
                $this->set_flash_msg("Record updated successfully", "success");
                return $this->redirect("type_barang");
            }
            else{
                if($db->getLastError()){
                    $this->set_page_error();
                }
                elseif(!$numRows){
                    $page_error = "No record updated";
                    $this->set_page_error($page_error);
                    $this->set_flash_msg($page_error, "warning");
                    return $this->redirect("type_barang");
                }
            }
        } else {
            $this->set_page_error("Invalid 'stok' value: must be a non-negative number.");
        }
    }
    $db->where("type_barang.id_type_barang", $rec_id);
    $data = $db->getOne($tablename, $fields);
    $page_title = $this->view->page_title = "Edit Part Number";
    if(!$data){
        $this->set_page_error();
    }
    return $this->render_view("type_barang/edit.php", $data);
}

	
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		// editable fields, adding 'stok'
		$fields = $this->fields = array("id_type_barang", "nama_barang", "stok");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'nama_barang' => 'required',
				'stok' => 'numeric|min:0', // Validation for stok when it's the edited field
			);
			$this->sanitize_array = array(
				'nama_barang' => 'sanitize_string',
				'stok' => 'sanitize_string',
			);
			$this->filter_rules = true; // filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("type_barang.id_type_barang", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' => $numRows,
							'rec_id' => $rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("type_barang.id_type_barang", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("type_barang");
	}
}
