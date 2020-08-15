<?php 
/**
 * 
 */
class JobHistory extends CI_Model
{
	public $nama = "";
	function __construct()
	{
		parent::__construct();
	}
	function setNama($nama){
		$this->nama = $nama;
	}
	function getNama(){
		return $this->nama;
	}
}
 ?>