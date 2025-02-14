<?php 
/**
 * Surat_masuk Page Controller
 * @category  Controller
 */
class Surat_masukController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "surat_masuk";
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
		
		// Add 'status' to the fields array
		$fields = array("No_Agenda", 
			"Nomor_Surat", 
			"Tanggal_surat", 
			"tanggal_terima", 
			"Asal_surat", 
			"perihal", 
			"file_surat", 
			"penerima",
			"status");  // Add status field here
		
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
		
		// Search functionality
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				surat_masuk.No_Agenda LIKE ? OR 
				surat_masuk.Nomor_Surat LIKE ? OR 
				surat_masuk.Tanggal_surat LIKE ? OR 
				surat_masuk.tanggal_terima LIKE ? OR 
				surat_masuk.Asal_surat LIKE ? OR 
				surat_masuk.perihal LIKE ? OR 
				surat_masuk.file_surat LIKE ? OR 
				surat_masuk.penerima LIKE ? OR 
				surat_masuk.status LIKE ?)";  // Add status field to search condition
			$search_params = array(
				"%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
			);
			$db->where($search_condition, $search_params);
			$this->view->search_template = "surat_masuk/search.php";
		}
		
		// Order records
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("surat_masuk.No_Agenda", ORDER_TYPE);
		}
		
		if($fieldname){
			$db->where($fieldname, $fieldvalue);
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
		
		$page_title = $this->view->page_title = "Surat Masuk";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		
		$this->render_view("surat_masuk/list.php", $data);
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
		
		// Add 'status' to the fields array
		$fields = array("No_Agenda", 
			"Nomor_Surat", 
			"Tanggal_surat", 
			"tanggal_terima", 
			"Asal_surat", 
			"perihal", 
			"file_surat", 
			"penerima", 
			"status");  // Add status field here
		
		if($value){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where("surat_masuk.No_Agenda", $rec_id);
		}
		
		$record = $db->getOne($tablename, $fields);
		if($record){
			$page_title = $this->view->page_title = "View Surat Masuk";
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
		
		return $this->render_view("surat_masuk/view.php", $record);
	}
	
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
	
			$fields = array("Nomor_Surat", "Tanggal_surat", "tanggal_terima", "Asal_surat", "perihal", "file_surat", "penerima", "status");
	
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nomor_Surat' => 'required',
				'Tanggal_surat' => 'required',
				'tanggal_terima' => 'required',
				'Asal_surat' => 'required',
				'perihal' => 'required',
				'file_surat' => 'required',
				'status' => 'required'
			);
			$this->sanitize_array = array(
				'Nomor_Surat' => 'sanitize_string',
				'Tanggal_surat' => 'sanitize_string',
				'tanggal_terima' => 'sanitize_string',
				'Asal_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
				'status' => 'sanitize_string'
			);
	
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['penerima'] = USER_NAME;
	
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
	
				// Insert corresponding record into surat_keluar
				if ($rec_id) {
					$surat_keluar_data = array(
						'tanggal_surat' => $modeldata['Tanggal_surat'],
						'Tujuan_surat' => $modeldata['Asal_surat'],
						'Nomor_surat' => $modeldata['Nomor_Surat'],
						'perihal' => $modeldata['perihal'],
						'file_surat' => $modeldata['file_surat'],
						'status' => $modeldata['status']
					);
					$db->insert("surat_keluar", $surat_keluar_data);
				}
	
				if ($rec_id) {
					$this->set_flash_msg("Record added successfully", "success");
					return $this->redirect("surat_masuk");
				} else {
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Surat Masuk";
		$this->render_view("surat_masuk/add.php");
	}
	
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */

	 
	 function edit($rec_id = null, $formdata = null) {
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
	
		// Fields to update
		$fields = array("No_Agenda", "Nomor_Surat", "Tanggal_surat", "tanggal_terima", "Asal_surat", "perihal", "file_surat", "penerima", "status");
	
		// Retrieve original data
		$db->where("surat_masuk.No_Agenda", $rec_id);
		$original_data = $db->getOne($tablename, $fields);
	
		if (!$original_data) {
			$this->set_flash_msg("Record not found", "danger");
			return $this->redirect("surat_masuk");
		}
	
		if ($formdata) {
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nomor_Surat' => 'required',
				'Tanggal_surat' => 'required',
				'tanggal_terima' => 'required',
				'Asal_surat' => 'required',
				'perihal' => 'required',
				'file_surat' => 'required',
				'status' => '' // Status validation is optional
			);
			$this->sanitize_array = array(
				'Nomor_Surat' => 'sanitize_string',
				'Tanggal_surat' => 'sanitize_string',
				'tanggal_terima' => 'sanitize_string',
				'Asal_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
				'status' => 'sanitize_string'
			);
	
			$modeldata = $this->modeldata = $this->validate_form($postdata);
	
			// Use original status if not provided in form data
			if (!isset($modeldata['status']) || $modeldata['status'] === '') {
				$modeldata['status'] = $original_data['status'];
			}
	
			if ($this->validated()) {
				// Compare and filter only changed fields
				$update_data = array_diff_assoc($modeldata, $original_data);
	
				if (!empty($update_data)) {
					// Update `surat_masuk` record
					$db->where("surat_masuk.No_Agenda", $rec_id);
					$bool = $db->update($tablename, $update_data);
	
					if ($bool) {
						// Prepare update data for `surat_keluar`
						$surat_keluar_update = [];
						if (isset($update_data['Tanggal_surat'])) {
							$surat_keluar_update['tanggal_surat'] = $update_data['Tanggal_surat'];
						}
						if (isset($update_data['Asal_surat'])) {
							$surat_keluar_update['Tujuan_surat'] = $update_data['Asal_surat'];
						}
						if (isset($update_data['perihal'])) {
							$surat_keluar_update['perihal'] = $update_data['perihal'];
						}
						if (isset($update_data['file_surat'])) {
							$surat_keluar_update['file_surat'] = $update_data['file_surat'];
						}
						if (isset($update_data['status'])) {
							$surat_keluar_update['status'] = $update_data['status'];
						}
	
						// Update Nomor_Surat in `surat_keluar` if it has changed
						if (isset($update_data['Nomor_Surat'])) {
							$surat_keluar_update['Nomor_surat'] = $update_data['Nomor_Surat'];
						}
	
						// Update `surat_keluar` only if relevant fields changed
						if (!empty($surat_keluar_update)) {
							$db->where("Nomor_surat", $original_data['Nomor_Surat']); // Use original Nomor_Surat
							$db->update("surat_keluar", $surat_keluar_update);
						}
	
						$this->set_flash_msg("Record updated successfully", "success");
						return $this->redirect("surat_masuk");
					} else {
						$this->set_page_error();
					}
				} else {
					$this->set_flash_msg("No changes made to the record", "warning");
					return $this->redirect("surat_masuk");
				}
			}
		}
	
		// Pass original data for editing
		$data = $original_data;
		$page_title = $this->view->page_title = "Edit Surat Masuk";
		return $this->render_view("surat_masuk/edit.php", $data);
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
		//editable fields
		$fields = $this->fields = array("No_Agenda","Nomor_Surat","Tanggal_surat","tanggal_terima","Asal_surat","perihal","file_surat","penerima");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Nomor_Surat' => 'required',
				'Tanggal_surat' => 'required',
				'tanggal_terima' => 'required',
				'Asal_surat' => 'required',
				'perihal' => 'required',
				'file_surat' => 'required',
			);
			$this->sanitize_array = array(
				'Nomor_Surat' => 'sanitize_string',
				'Tanggal_surat' => 'sanitize_string',
				'tanggal_terima' => 'sanitize_string',
				'Asal_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("surat_masuk.No_Agenda", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
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
	
		// Get Nomor_Surat for the record to be deleted
		$db->where("surat_masuk.No_Agenda", $rec_id);
		$surat_masuk_record = $db->getOne($tablename, ["Nomor_Surat"]);
		
		if ($surat_masuk_record) {
			// Now delete corresponding record in surat_keluar
			$db->where("Nomor_surat", $surat_masuk_record['Nomor_Surat']);
			$db->delete("surat_keluar");
		}
	
		// Proceed with the delete operation for surat_masuk
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("surat_masuk.No_Agenda", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		
		if ($bool) {
			$this->set_flash_msg("Record deleted successfully", "success");
		} elseif ($db->getLastError()) {
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		
		return $this->redirect("surat_masuk");
	}
	
}
