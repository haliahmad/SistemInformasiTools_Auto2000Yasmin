<?php 
/**
 * Surat_keluar Page Controller
 * @category  Controller
 */
class Surat_keluarController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "surat_keluar";
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
		$fields = array("No_Agenda", 
			"tanggal_surat", 
			"Tujuan_surat", 
			"Nomor_surat", 
			"perihal", 
			"file_surat", 
			"status");  // Added the 'status' field
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
	
		// search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				surat_keluar.No_Agenda LIKE ? OR 
				surat_keluar.tanggal_surat LIKE ? OR 
				surat_keluar.Tujuan_surat LIKE ? OR 
				surat_keluar.Nomor_surat LIKE ? OR 
				surat_keluar.perihal LIKE ? OR 
				surat_keluar.file_surat LIKE ? OR 
				surat_keluar.status LIKE ?)";  // Added 'status' field to search
			$search_params = array("%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%");
	
			$db->where($search_condition, $search_params);
			$this->view->search_template = "surat_keluar/search.php";
		}
	
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("surat_keluar.No_Agenda", ORDER_TYPE);
		}
	
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
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
	
		$page_title = $this->view->page_title = "Surat Keluar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
	
		$this->render_view("surat_keluar/list.php", $data); //render the full page
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
		$fields = array("No_Agenda", 
			"tanggal_surat", 
			"Tujuan_surat", 
			"Nomor_surat", 
			"perihal", 
			"file_surat",
			"status");  // Added the 'status' field
	
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("surat_keluar.No_Agenda", $rec_id); //select record based on primary key
		}
	
		$record = $db->getOne($tablename, $fields);
		if($record){
			$page_title = $this->view->page_title = "View  Surat Keluar";
			$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
			$this->view->report_title = $page_title;
			$this->view->report_layout = "report_layout.php";
			$this->view->report_paper_size = "A4";
			$this->view->report_orientation = "portrait";
		} else {
			if($db->getLastError()){
				$this->set_page_error();
			} else {
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("surat_keluar/view.php", $record);
	}
	
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null) {
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		$fields = $this->fields = array("No_Agenda", "tanggal_surat", "Tujuan_surat", "Nomor_surat", "perihal", "file_surat", "status");
	
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'tanggal_surat' => '',
				'Tujuan_surat' => '',
				'Nomor_surat' => '',
				'perihal' => '',
				'file_surat' => '',
				'status' => 'required'  // Added validation rule for 'status'
			);
	
			$this->sanitize_array = array(
				'tanggal_surat' => 'sanitize_string',
				'Tujuan_surat' => 'sanitize_string',
				'Nomor_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
				'status' => 'sanitize_string'  // Added sanitization for 'status'
			);
	
			$modeldata = $this->modeldata = $this->validate_form($postdata);
	
			if($this->validated()){
				$db->where("surat_keluar.No_Agenda", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				
				// Tambahkan logika untuk memperbarui surat_keluar terkait
				if ($bool) {
					// Update surat_keluar terkait berdasarkan No_Agenda atau parameter yang relevan
					$related_surat_keluar_data = [
						'tanggal_surat' => $postdata['tanggal_surat'],
						'Tujuan_surat' => $postdata['Tujuan_surat'],
						'Nomor_surat' => $postdata['Nomor_surat'],
						'perihal' => $postdata['perihal'],
						'status' => $postdata['status'],
						// Update field lain yang relevan
					];
					// Update surat_keluar jika data terkait ditemukan
					$db->where("surat_keluar.No_Agenda", $rec_id);
					$db->update("surat_keluar", $related_surat_keluar_data);
					
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("surat_keluar");
				}
			}
		}
		
		$db->where("surat_keluar.No_Agenda", $rec_id);
		$data = $db->getOne($tablename, $fields);
		if(!$data){
			$this->set_page_error();
		}
	
		$page_title = $this->view->page_title = "Edit Surat Keluar";
	
		// Check if the request is an AJAX request by checking the $_SERVER['HTTP_X_REQUESTED_WITH']
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return $this->render_view("surat_keluar/edit.php", $data);
		}
	
		$this->render_view("surat_keluar/edit.php", $data);
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
		$fields = $this->fields = array("No_Agenda","tanggal_surat","Tujuan_surat","Nomor_surat","perihal","file_surat");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'tanggal_surat' => 'required',
				'Tujuan_surat' => 'required',
				'Nomor_surat' => 'required',
				'perihal' => 'required',
				'file_surat' => 'required',
			);
			$this->sanitize_array = array(
				'tanggal_surat' => 'sanitize_string',
				'Tujuan_surat' => 'sanitize_string',
				'Nomor_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("surat_keluar.No_Agenda", $rec_id);;
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

	


	function change_status($rec_id = null) {
		Csrf::cross_check(); // Memastikan CSRF token valid
		$request = $this->request; // Ambil request
		$db = $this->GetModel(); // Ambil model database
		$tablename = $this->tablename; // Nama tabel
	
		// Cek apakah rec_id tidak kosong
		if (!$rec_id) {
			echo json_encode(['success' => false, 'message' => 'No records selected']);
			return;
		}
	
		// Split record ID menjadi array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
	
		// Ambil status saat ini dari database
		$db->where("surat_keluar.No_Agenda", $arr_rec_id, "in");
		$records = $db->get($tablename, null, ["No_Agenda", "status"]);
	
		// Periksa apakah ada surat yang sudah "dikembalikan"
		foreach ($records as $record) {
			if ($record['status'] === 'dikembalikan') {
				echo json_encode(['success' => false, 'message' => 'Surat dengan No_Agenda ' . $record['No_Agenda'] . ' sudah dikembalikan dan tidak dapat diubah lagi.']);
				return;
			}
		}
	
		// Update status menjadi "dikembalikan"
		$db->where("surat_keluar.No_Agenda", $arr_rec_id, "in");
		$data = [
			'status' => 'dikembalikan' // Atur status di sini
		];
		
		$bool = $db->update($tablename, $data);
		
		if ($bool) {
			echo json_encode(['success' => true]);
		} elseif ($db->getLastError()) {
			$page_error = $db->getLastError();
			echo json_encode(['success' => false, 'message' => $page_error]);
		} else {
			echo json_encode(['success' => false, 'message' => 'Unknown error occurred']);
		}
	}
	
	
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null) {
		Csrf::cross_check(); // Memastikan CSRF token valid
		$request = $this->request;
		$db = $this->GetModel();
		$tablename_keluar = "surat_keluar";
		$tablename_masuk = "surat_masuk";
		$this->rec_id = $rec_id;
	
		// Pastikan rec_id tidak kosong
		if (!$rec_id) {
			$this->set_flash_msg("No records selected", "danger");
			return $this->redirect("surat_keluar");
		}
	
		// Form multiple delete: split record id menjadi array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
	
		// Mulai transaksi untuk memastikan integritas data
		$db->startTransaction();
		try {
			// Ambil semua Nomor_surat terkait yang akan dihapus
			$db->where("surat_keluar.No_Agenda", $arr_rec_id, "in");
			$surat_keluar_records = $db->get($tablename_keluar, null, ["Nomor_surat"]);
	
			// Hapus data dari surat_keluar terlebih dahulu
			$db->where("No_Agenda", $arr_rec_id, "in");
			$bool_keluar = $db->delete($tablename_keluar);
	
			if (!$bool_keluar) {
				throw new Exception("Failed to delete from surat_keluar.");
			}
	
			// Ambil data surat_masuk yang terkait dengan Nomor_surat yang dihapus
			foreach ($surat_keluar_records as $record) {
				// Hapus data terkait di tabel surat_masuk berdasarkan Nomor_surat
				$db->where("Nomor_surat", $record['Nomor_surat']);
				$db->delete($tablename_masuk);
			}
	
			// Jika semua delete berhasil, commit transaksi
			$db->commit();
			$this->set_flash_msg("Records deleted successfully", "success");
		} catch (Exception $e) {
			// Jika ada kesalahan, rollback transaksi
			$db->rollback();
			$this->set_flash_msg($e->getMessage(), "danger");
		}
	
		return $this->redirect("surat_keluar");
	}
	
	
}
