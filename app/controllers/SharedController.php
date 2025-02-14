<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * barang_id_type_barang_option_list Model Action
     * @return array
     */
	function barang_id_type_barang_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_type_barang AS value,nama_barang AS label FROM type_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_Lokasi_barang_option_list Model Action
     * @return array
     */
	function barang_Lokasi_barang_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_lokasi AS value,Lokasi AS label FROM lokasi_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_Kondisi_barang_option_list Model Action
     * @return array
     */
	function barang_Kondisi_barang_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_kondisi AS value,Kondisi AS label FROM kondisi_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_user_role_id_option_list Model Action
     * @return array
     */
	function user_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * barang_barangLokasi_barang_option_list Model Action
     * @return array
     */
	function barang_barangLokasi_barang_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_lokasi AS value,Lokasi AS label FROM lokasi_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_barang Model Action
     * @return Value
     */
	function getcount_barang(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM barang";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_user Model Action
     * @return Value
     */
	function getcount_user(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM user";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_databarang Model Action
	* @return array
	*/
	function barchart_databarang(){
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
	
		// Query perbaikan
		$sqltext = "SELECT tb.nama_barang, COUNT(b.merek_barang) AS jumlah_barang 
					FROM type_barang AS tb 
					JOIN barang AS b ON tb.id_type_barang = b.id_type_barang 
					GROUP BY tb.nama_barang";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
	
		// Ambil data untuk chart
		$dataset_labels = array_column($dataset1, 'nama_barang');
		$dataset_data = array_column($dataset1, 'jumlah_barang');
	
		$chart_data["labels"] = $dataset_labels;
		$chart_data["datasets"][] = array(
			"label" => "Jumlah Barang",
			"backgroundColor" => 'rgba(0, 123, 255, 0.5)',
			"borderColor" => 'rgba(0, 123, 255, 1)',
			"borderWidth" => 2,
			"data" => $dataset_data
		);
	
		return $chart_data;
	}
	function chart_status_barang(){
    $db = $this->GetModel();
    $sqltext = "SELECT status, COUNT(*) AS jumlah FROM barang GROUP BY status";
    $dataset = $db->rawQuery($sqltext);
    
    $labels = array_column($dataset, 'status');
    $data_values = array_column($dataset, 'jumlah');
    
    // Hitung total untuk persentase
    $total = array_sum($data_values);
    $percentages = array_map(function($value) use ($total) {
        return round(($value / $total) * 100, 1); // Dibulatkan 1 angka desimal
    }, $data_values);
    
    return [
        "labels" => $labels,
        "data" => $data_values,
        "percentages" => $percentages
    ];
}

	
	

/**
	* barchart_datasuratmasuk Model Action
	* @return array
	*/
	function barchart_datasuratmasuk(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(sm.No_Agenda) AS count_of_No_Agenda, sm.Nomor_Surat, sm.Tanggal_surat, sm.tanggal_terima, sm.Asal_surat, sm.perihal, sm.file_surat, sm.penerima FROM surat_masuk AS sm";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_Agenda');
		$dataset_labels =  array_column($dataset1, 'count_of_No_Agenda');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_datasuratkeluar Model Action
	* @return array
	*/
	function barchart_datasuratkeluar(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(sk.No_Agenda) AS count_of_No_Agenda, sk.tanggal_surat, sk.Tujuan_surat, sk.Nomor_surat, sk.perihal, sk.file_surat FROM surat_keluar AS sk";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_Agenda');
		$dataset_labels =  array_column($dataset1, 'count_of_No_Agenda');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}
	public function getcount_surat_masuk() {
		$db = $this->GetModel(); // Mengambil koneksi database
		return $db->getValue("surat_masuk", "count(*)"); // Menghitung jumlah data di tabel surat_masuk
	}
	
	public function getcount_surat_keluar() {
		$db = $this->GetModel();
		return $db->getValue("surat_keluar", "count(*)");
	}
	

}
