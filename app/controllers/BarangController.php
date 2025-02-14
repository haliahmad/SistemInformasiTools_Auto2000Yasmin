<?php 
/**
 * Barang Page Controller
 * @category  Controller
 */
class BarangController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "barang";
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
		$fields = array(
			"barang.id_barang", 
			"barang.id_type_barang", 
			"type_barang.nama_barang AS type_barang_nama_barang", 
			"barang.merek_barang", 
			"barang.Spesifikasi", 
			"barang.Sumber", 
			"barang.Lokasi_barang", 
			"lokasi_barang.Lokasi AS lokasi_barang_Lokasi", 
			"barang.Kondisi_barang", 
			"kondisi_barang.Kondisi AS kondisi_barang_Kondisi", 
			"barang.tanggal_input",
			"barang.status" // Include status field
		);
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
		
		// Search table record
if (!empty($request->search)) {
    $text = trim($request->search); 
    $search_condition = "(
        barang.id_barang LIKE ? OR 
        barang.id_type_barang LIKE ? OR 
        barang.merek_barang LIKE ? OR 
        barang.Spesifikasi LIKE ? OR 
        barang.Sumber LIKE ? OR 
        barang.Lokasi_barang LIKE ? OR 
        barang.Kondisi_barang LIKE ? OR 
        barang.tanggal_input LIKE ? OR 
        barang.status LIKE ?  -- Status included in search
    )"; 
    $search_params = array(
        "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
    );
    $db->where($search_condition, $search_params);
    $this->view->search_template = "barang/search.php";
}

		$db->join("type_barang", "barang.id_type_barang = type_barang.id_type_barang", "INNER");
		$db->join("lokasi_barang", "barang.Lokasi_barang = lokasi_barang.id_lokasi", "INNER");
		$db->join("kondisi_barang", "barang.Kondisi_barang = kondisi_barang.id_kondisi", "INNER");
		
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("barang.id_barang", ORDER_TYPE);
		}

		if($fieldname){
			$db->where($fieldname , $fieldvalue); // filter by a single field name
		}
		if(!empty($request->barang_Lokasi_barang)){
			$val = $request->barang_Lokasi_barang;
			$db->where("barang.Lokasi_barang", $val , "=");
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
		$page_title = $this->view->page_title = "Barang";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("barang/list.php", $data);
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
		$fields = array(
			"barang.id_barang", 
			"barang.id_type_barang", 
			"type_barang.nama_barang AS type_barang_nama_barang", 
			"barang.merek_barang", 
			"barang.Spesifikasi", 
			"barang.Sumber", 
			"barang.Lokasi_barang", 
			"lokasi_barang.Lokasi AS lokasi_barang_Lokasi", 
			"barang.Kondisi_barang", 
			"kondisi_barang.Kondisi AS kondisi_barang_Kondisi", 
			"barang.tanggal_input",
			"barang.status" // Include status field
		);
		if($value){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where("barang.id_barang", $rec_id);
		}
		$db->join("type_barang", "barang.id_type_barang = type_barang.id_type_barang", "INNER");
		$db->join("lokasi_barang", "barang.Lokasi_barang = lokasi_barang.id_lokasi", "INNER");
		$db->join("kondisi_barang", "barang.Kondisi_barang = kondisi_barang.id_kondisi", "INNER");  
		$record = $db->getOne($tablename, $fields);
		if($record){
			$page_title = $this->view->page_title = "View Barang";
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
		return $this->render_view("barang/view.php", $record);
	}

	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	public function add($formdata = null) {
		if ($formdata) {
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
	
			// Fillable fields
			$fields = $this->fields = array(
				"id_type_barang",
				"merek_barang",
				"Spesifikasi",
				"Sumber",
				"Lokasi_barang",
				"Kondisi_barang",
				"tanggal_input",
				"status" // Include status field
			);
	
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_type_barang' => 'required',
				'merek_barang' => 'required',
				'Spesifikasi' => 'required',
				'Sumber' => 'required',
				'Lokasi_barang' => 'required',
				'Kondisi_barang' => 'required',
				'tanggal_input' => 'required',
				'status' => 'required', // Validate status field
			);
	
			$this->sanitize_array = array(
				'id_type_barang' => 'sanitize_string',
				'merek_barang' => 'sanitize_string',
				'Spesifikasi' => 'sanitize_string',
				'Sumber' => 'sanitize_string',
				'Lokasi_barang' => 'sanitize_string',
				'Kondisi_barang' => 'sanitize_string',
				'tanggal_input' => 'sanitize_string',
				'status' => 'sanitize_string', // Sanitize status field
			);
	
			$this->filter_vals = true; // Set whether to remove empty fields
			$modeldata = $this->validate_form($postdata);
			
			if ($modeldata) {
				// Menentukan status berdasarkan Kondisi_barang
				if ($modeldata['Kondisi_barang'] == '1') {
					$modeldata['status'] = 'Normal';
				} elseif (in_array($modeldata['Kondisi_barang'], ['2', '3'])) {
					$modeldata['status'] = 'Danger';
				}
	
				// Insert data barang
				$id = $db->insert($tablename, $modeldata);
				if ($id) {
					$this->set_flash_msg("Record added successfully", "success");
					return $this->redirect("barang/index");
				} else {
					$this->set_page_error();
				}
			}
		}
	
		$page_title = $this->view->page_title = "Add New Barang";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->render_view("barang/add.php");
	}
	
	/**
     * Edit record by primary key
     * @param $rec_id (primary key) 
     * @param $formdata array() from $_POST
     * @return BaseView
     */
	function edit($rec_id = null, $formdata = null) {
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = urldecode($rec_id);
		$fields = array(
			"id_type_barang",
			"merek_barang",
			"Spesifikasi",
			"Sumber",
			"Lokasi_barang",
			"Kondisi_barang",
			"tanggal_input",
			"status" // Include status field
		);
	
		if ($formdata) {
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_type_barang' => 'required',
				'merek_barang' => 'required',
				'Spesifikasi' => 'required',
				'Sumber' => 'required',
				'Lokasi_barang' => 'required',
				'Kondisi_barang' => 'required',
				'tanggal_input' => 'required',
				'status' => 'required', // Validate status field
			);
	
			$this->sanitize_array = array(
				'id_type_barang' => 'sanitize_string',
				'merek_barang' => 'sanitize_string',
				'Spesifikasi' => 'sanitize_string',
				'Sumber' => 'sanitize_string',
				'Lokasi_barang' => 'sanitize_string',
				'Kondisi_barang' => 'sanitize_string',
				'tanggal_input' => 'sanitize_string',
				'status' => 'sanitize_string', // Sanitize status field
			);
	
			$this->filter_vals = true; // Set whether to remove empty fields
			$modeldata = $this->validate_form($postdata);
			
			if ($modeldata) {
				// Update status based on Kondisi_barang
				if ($modeldata['Kondisi_barang'] == '1') {
					$modeldata['status'] = 'Normal';
				} elseif (in_array($modeldata['Kondisi_barang'], ['2', '3'])) {
					$modeldata['status'] = 'Danger';
				}
	
				$db->where("barang.id_barang", $this->rec_id);
				$bool = $db->update($tablename, $modeldata);
				if ($bool) {
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("barang/index");
				} else {
					$this->set_page_error();
				}
			}
		}
		
		$db->where("barang.id_barang", $this->rec_id);
		$record = $db->getOne($tablename, $fields);
		if (!$record) {
			$this->set_page_error("No record found");
		}
		$page_title = $this->view->page_title = "Edit Barang";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		return $this->render_view("barang/edit.php", $record);
	}




	public function perbaiki($rec_id = null) {
		Csrf::cross_check(); // Verifikasi token CSRF
		$db = $this->GetModel();
		$tablename = $this->tablename; // Nama tabel yang digunakan
	
		// Validasi ID yang dipilih
		if (empty($rec_id)) {
			echo json_encode(['success' => false, 'message' => 'No item selected for repair']);
			return;
		}
	
		// Pisahkan ID yang dipilih jika ada lebih dari satu
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
	
		// Pastikan stok NULL di tabel type_barang diupdate menjadi 0
		$db->rawQuery("UPDATE type_barang SET stok = 0 WHERE stok IS NULL");
	
		// Ambil data barang berdasarkan ID yang dipilih
		$db->where("id_barang", $arr_rec_id, "in");
		$items = $db->get($tablename, null, ["id_barang", "status", "id_type_barang"]);
	
		// Validasi data barang
		if (!$items) {
			echo json_encode(['success' => false, 'message' => 'No valid items found']);
			return;
		}
	
		// Pastikan semua item memiliki status yang sama
		$statuses = array_column($items, "status");
		if (count(array_unique($statuses)) > 1) {
			echo json_encode(['success' => false, 'message' => 'Selected items must have the same current status']);
			return;
		}
	
		// Tentukan status saat ini dan validasi
		$current_status = $statuses[0];
		if (!in_array($current_status, ['Danger', 'PO'])) {
			echo json_encode([
				'success' => false,
				'message' => "Cannot change status from $current_status to Normal"
			]);
			return;
		}
	
		// Proses perubahan status dan pengurangan stok
		foreach ($items as $item) {
			$barang_id = $item['id_barang'];
			$type_barang_id = $item['id_type_barang'];
	
			try {
				// Cek stok barang
				$type_barang = $db->where("id_type_barang", $type_barang_id)->getOne("type_barang", ["stok"]);
				if ($type_barang['stok'] <= 0 || $type_barang['stok'] === null) {
					echo json_encode(['success' => false, 'message' => 'Stock is empty']);
					return;
				}
	
				// Update status dan kondisi barang
				$db->where("id_barang", $barang_id)->update("barang", [
					"status" => "Normal",
					"Kondisi_barang" => 1 // Anggap 1 = 'BAGUS'
				]);
	
				// Kurangi stok barang di type_barang
				$db->where("id_type_barang", $type_barang_id)->update("type_barang", [
					"stok" => $type_barang['stok'] - 1
				]);
	
			} catch (Exception $e) {
				// Tangani kesalahan jika terjadi
				echo json_encode([
					'success' => false,
					'message' => "Error processing item ID $barang_id: " . $e->getMessage()
				]);
				return;
			}
		}
	
		// Jika semua proses berhasil
		echo json_encode([
			'success' => true,
			'message' => "Status successfully updated to 'Normal' and stock reduced. Condition set to 'BAGUS'",
			'new_status' => 'Normal' // Status baru yang diterapkan
		]);
		return;
	}
	
	
	
	
	/**
     * Delete record by primary key
     * @param $rec_id (primary key) 
     * @return BaseView
     */
	public function change_status($rec_id = null) {
		Csrf::cross_check(); // Ensure CSRF token is valid
		$db = $this->GetModel();
		$tablename = $this->tablename;
	
		if (!$rec_id) {
			echo json_encode(['success' => false, 'message' => 'No records selected']);
			return;
		}
	
		// Split selected IDs into an array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
	
		// Retrieve current statuses of selected items
		$db->where("id_barang", $arr_rec_id, "in");
		$items = $db->get($tablename, null, ["id_barang", "status"]);
		$statuses = array_column($items, "status");
	
		// Ensure all selected items have the same current status
		if (count(array_unique($statuses)) > 1) {
			echo json_encode(['success' => false, 'message' => 'Selected items must have the same current status']);
			return;
		}
	
		// Determine the allowed status change
		$current_status = $statuses[0];
		$new_status = $_POST['new_status'] ?? '';
	
		// Define allowed status changes
		$allowed_changes = [
			'Danger' => 'PO',
			'PO' => 'Normal', // Allow "PO" to change to "Normal"
		];
	
		// Check if the status change is allowed
		if (!isset($allowed_changes[$current_status]) || $allowed_changes[$current_status] !== $new_status) {
			echo json_encode(['success' => false, 'message' => "Cannot change status from $current_status to $new_status"]);
			return;
		}
	
		// Perform the update with the new status and condition if going from PO to Normal
		$db->where("id_barang", $arr_rec_id, "in");
		$db->where("status", $current_status); // Ensure only items with the correct current status are updated
		$data = ['status' => $new_status];
	
		// If transitioning from "PO" to "Normal", also set "kondisi" to "Baik"
		if ($current_status === 'PO' && $new_status === 'Normal') {
			$data['kondisi'] = 'Baik';
		}
	
		$bool = $db->update($tablename, $data);
	
		if ($bool) {
			echo json_encode(['success' => true, 'message' => 'Status updated successfully', 'new_status' => $new_status]);
		} else {
			echo json_encode(['success' => false, 'message' => $db->getLastError() ?: 'Unknown error occurred']);
		}
	}
	
	public function updateStatusToPO($barang_id) {
		$db = $this->GetModel();
		$barang = $db->where("id_barang", $barang_id)->getOne("barang", ["status"]);
	
		if ($barang && $barang['status'] === 'Danger') {
			$db->where("id_barang", $barang_id)->update("barang", ["status" => "PO"]);
			echo json_encode(['success' => true, 'message' => 'Status updated to PO']);
		} else {
			echo json_encode(['success' => false, 'message' => 'Status cannot be changed to PO unless current status is Danger']);
		}
	}

	
	public function updateStatusToNormal($barang_id) {
		$db = $this->GetModel();
	
		$barang = $db->where("id_barang", $barang_id)->getOne("barang", ["status", "id_type_barang"]);
	
		if (!$barang) {
			echo json_encode(['success' => false, 'message' => 'Item not found']);
			return;
		}
	
		if (in_array($barang['status'], ['Danger', 'PO'])) {
			$type_barang = $db->where("id_type_barang", $barang['id_type_barang'])->getOne("type_barang", ["stok"]);
	
			if ($type_barang['stok'] === null || $type_barang['stok'] <= 0) {
				echo json_encode(['success' => false, 'message' => 'Stock is empty']);
				return;
			}
	
			$db->where("id_barang", $barang_id)->update("barang", [
				"status" => "Normal",
				"Kondisi_barang" => 1 // Assuming 1 corresponds to 'BAGUS'
			]);
	
			$db->where("id_type_barang", $barang['id_type_barang'])->update("type_barang", [
				"stok" => $type_barang['stok'] - 1
			]);
	
			echo json_encode(['success' => true, 'message' => 'Status updated to Normal and stock reduced']);
		} else {
			echo json_encode(['success' => false, 'message' => 'Status can only be changed to Normal from Danger or PO']);
		}
	}
	

	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("barang.id_barang", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("barang");
	}
	
}
?>
