<?php 
/**
 * 
 */
class Master_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getDataProductCategory(){
		$this->db->select('categoryproduct.*,divisionproduct.name as division');
		$this->db->from('categoryproduct');
		$this->db->join('divisionproduct','categoryproduct.division_product_id = divisionproduct.id');
		$this->db->where('categoryproduct.status',1);
		$q = $this->db->get();
		return $q->result_array();
	}
	function getDataSubProductCategory(){
		$this->db->select('subcategoryproduct.*,categoryproduct.name as category');
		$this->db->from('subcategoryproduct');
		$this->db->join('categoryproduct','subcategoryproduct.category_product_id = categoryproduct.id');
		$this->db->where('subcategoryproduct.status',1);
		$q = $this->db->get();
		return $q->result_array();
	}
}
 ?>