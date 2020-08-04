<?php 
/**
 * 
 */
class Hrm_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getApplication($limit, $start){
        $query = $this->db->get('applications', $limit, $start);
        return $query->result_array();
    }
}
 ?>