<?php 
/**
 * 
 */
class Product_model extends CI_Model
{
	
	function insert($data){
		$id = $this->db->insert('products',$data);
		$last_id = $this->db->insert_id();

		return $last_id;
	}
	function data($limit,$start){
		$this->db->select('products.*,view_grouping_products.*,IFNULL(image.path,"images.jpg") as image');
		$this->db->from('products');
		$this->db->join('view_grouping_products','view_grouping_products.subcategory_id = products.sub_category_id');
		$this->db->join('productimage image','products.id = image.products_id','LEFT');
		$this->db->where('products.status',1);
		$this->db->where('image.priority',0);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	function detailProduct($id){
		$this->db->select('products.*,view_grouping_products.*,IFNULL("images.jpg",image.path) as image');
		$this->db->from('products');
		$this->db->join('view_grouping_products','view_grouping_products.subcategory_id = products.sub_category_id');
		$this->db->join('productimage image','products.id = image.products_id','left');
		$this->db->where('products.id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function detailPriceProduct($id){
		$this->db->select('price.name,IFNULL(pricedetail.price,0) as price');
		$this->db->from('price');
		$this->db->join('pricedetail','price.id = pricedetail.price_id','left');
		$this->db->where('pricedetail.products_id',$id);
		$q = $this->db->get();
		return $q->result_array();
	}
	function priceProduct(){
		return $this->db->get('view_price_detail')->result_array();
	}
}
	 ?>