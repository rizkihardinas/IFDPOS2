<?php 
/**
 * 
	Copyright : Rizki Hardinas Permana
	© 2019
 */
class Constants_model extends CI_Model
{
	/**
 	* 
	$table => Diisi oleh nama table didatabase
	$data => Diisi oleh data array yang merupakan kolom di table dan data
	$where => Diisi oleh data array yang merupakan kolom di table dan data
 	*/
	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	function getAllData($table){
		$q = $this->db->get($table);
		return $q->result_array();
	}
	function getAllDataWhere($table,$data){
		$this->db->where($data); // Berupa array
		$q = $this->db->get($table);
		return $q->result_array();	
	}
	function getDetailDataWhere($table,$data){
		$this->db->where($data); // Berupa array
		$q = $this->db->get($table);
		return $q->row_array();	
	}
	function getNumRows($table){
		$this->db->where('status',1);
		$q = $this->db->get($table);
		return $q->num_rows();		
	}
	function getSearchData($table,$data){
		$this->db->like($data);
		$q = $this->db->get($table);
		return $q->result_array();	
	}
	function getRowSearchData($table,$data){
		$this->db->like($data);
		$q = $this->db->get($table);
		return $q->num_rows();	
	}
	function getNumRowsWhere($table,$data){
		$this->db->where($data); // Berupa array
		$q = $this->db->get($table);
		return $q->num_rows();	
	}
	function doInsert($table,$data){
		$this->db->insert($table,$data);
	}
	function doUpdate($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function doDelete($table,$data){
		$this->db->where($data); // Berupa array
		$this->db->delete($table);
	}
	// Insert dan mendapatkan ID terkahir di input
	function doInsertGetId($table,$data){
		$this->db->insert($table, $data); 
		$last_id = $this->db->insert_id();

		return $last_id;
	}
	// Mengosongkan Suatu Table
	function doEmptyTable($table){
		$this->db->truncate($table);
	}
	// Mengosongkan Semua Table
	function doEmptyAllTable(){
		$tables = $this->db->list_tables();
		foreach ($tables as $table)
		{
		    $this->db->truncate($table);
		}
	}
	// Execute Query Insert, Update dan Delete
	function doExecuteQuery($query){
		$this->db->query($query);
	}
	// Execute Query Select
	function doGenerateQuery($query){
		$q = $this->db->query($query);
		return $q->result_array();
	}
	function curl(){
		$this->curl->simple_post('http://example.com', array('foo'=>'bar'), array(CURLOPT_BUFFERSIZE => 10)); 
		$exec = $this->curl->execute();
		$response =  json_encode($execute);
		if (count($response['verify-purchase']) ==1 ) {
            return true;
        } else {
            return false;
        }

	}
	function curl_request($code = '') {

        $product_code = $code;
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        // $header[] = 'Authorization: ' . $bearer;
        $ch_verify = curl_init();

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        }

    }
    function getAllDataLimit($table,$limit, $start){
    	$this->db->where('status',1);
        $query = $this->db->get($table, $limit, $start);
        return $query->result_array();
    }
}
 ?>