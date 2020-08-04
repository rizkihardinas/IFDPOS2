<?php 
/**
 * 
 */
class Warehouse extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constants_model','constants_model');
		$this->load->model('Product_model','product_model');
	}
	function outlets(){
		$data['contents'] = $this->load->view('admin/master/outlets',null,TRUE);	
		$this->load->view('admin/index',$data);
	}
}
 ?>