<?php 
/**
 * 
 */
class Products extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constants_model','constants_model');
		$this->load->model('Product_model','product_model');
	}
	function category_product(){
		$data['division_product_id'] = $this->constants_model->getAllDataWhere('divisionproduct',array('status'=>1));
		$data['contents'] = $this->load->view('admin/master/category_product',$data);
		$this->load->view('admin/index',$data);
	}
	function sub_category_product(){
		$data['category_product_id'] = $this->constants_model->getAllDataWhere('categoryproduct',array('status'=>1));
		$data['contents'] = $this->load->view('admin/master/sub_category_product',$data);
		$this->load->view('admin/index',$data);
	}
	function products($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['type_products'] = $this->constants_model->getAllDataWhere('producttype',array('status'=>1));
				$data['price'] = $this->constants_model->getAllDataWhere('price',array('status'=>1));
				$data['unit'] = $this->constants_model->getAllDataWhere('unit',array('status'=>1));
				$data['brand'] = $this->constants_model->getAllDataWhere('brand',array('status'=>1));
				$data['suppliers'] = $this->constants_model->getAllDataWhere('suppliers',array('status'=>1));
				$data['divisionproduct'] = $this->constants_model->getAllDataWhere('divisionproduct',array('status'=>1));
				$data['contents'] =$this->load->view('admin/products/products',$data,TRUE);	
				$this->load->view('admin/index',$data);
				break;
			case 'search':
				$q = $this->input->post('query');
				$data['q'] = $q;
				$data['results']= $this->constants_model->getSearchData('products',array('name' => $q));
				$data['rows']= $this->constants_model->getNumSearchData('products',array('name' => $q));
				$data['contents'] = $this->load->view('admin/products/search_products',$data,TRUE);	
				$this->load->view('admin/index',$data);
				break;
			case 'detail':
				$data['products']	= $this->product_model->detailProduct($id);
				$data['image'] 		= $this->constants_model->getAllDataWhere('productimage',array('products_id' => $id) );
				$data['images'] 		= $this->constants_model->getAllDataWhere('productimage',array('products_id' => $id) );
				$data['price'] 		= $this->product_model->detailPriceProduct($id);
				$data['contents'] 	= $this->load->view('admin/products/detail',$data,TRUE);	
				$this->load->view('admin/index',$data);
				break;
			case 'insert':
				$name = $this->input->post('name');
				$short_name = $this->input->post('short_name');
				$barcode = $this->input->post('barcode');
				$user_id_created = 1;
				$user_last_update = 1;
				$brand_id = $this->input->post('brand_id');
				$sub_category_id = $this->input->post('sub_category_id');
				$suppliers_id = $this->input->post('suppliers_id');
				$unit_id = $this->input->post('unit_id');
				$type_product_id = $this->input->post('type_product_id');
				$description = $this->input->post('description');

				

				$config = $this->config_upload_products();
				$this->load->library('upload', $config);
				if ($_FILES['photo']) {
					$data = array(
						'name' => $name,
						'short_name' => $short_name,
						'barcode' => $barcode,
						'user_id_created' => $user_id_created,
						'brand_id' => $brand_id,
						'sub_category_id' => $sub_category_id,
						'suppliers_id' => $suppliers_id,
						'unit_id' => $unit_id,
						'type_product_id' => $type_product_id,
						'description' => $description
					);
					$id = $this->product_model->insert($data);
					for ($i=0; $i < count($_FILES['photo']) ; $i++) { 
						$_FILES['file']['name']= $_FILES['photo']['name'][$i];
						$_FILES['file']['tmp_name']= $_FILES['photo']['tmp_name'][$i];
						$_FILES['file']['type']= $_FILES['photo']['type'][$i];
						$_FILES['file']['size']= $_FILES['photo']['size'][$i];


						$this->upload->do_upload('file');
						$filename = $this->upload->data('file_name');
	                    $productimage = array(
	                    	'products_id' => $id,
	                    	'path' => $filename,
	                    	'priority' => $i,
	                    	'user_id_created' => 1,
	                    	'user_last_update' => 1
	                    );
	                    $this->constants_model->doInsert('productimage',$productimage);
	                 	   
					}
					$price= $this->constants_model->getAllDataWhere('price',array('status'=>1));
					foreach ($price as $price) {
						$str = strtolower(str_replace(' ', '_', $price['name']));


						$harga = $this->input->post($str);

						$dataHarga = array(
							'products_id' => $id,
							'price_id' => $price['id'],
							'price' => $harga
						);
						$this->constants_model->doInsert('pricedetail',$dataHarga);
					}
                    $this->session->set_flashdata('messages','Data Barang berhasil diinput');
				}
				redirect('Products/products');
				break;
			case 'edit':
				$data['detail'] 	= $this->product_model->detailProduct($id);

				$data['type_products'] = $this->constants_model->getAllDataWhere('producttype',array('status'=>1));
				$data['price'] = $this->product_model->priceProduct();
				$data['detailPrice'] = $this->product_model->detailPriceProduct($id);
				$data['unit'] = $this->constants_model->getAllDataWhere('unit',array('status'=>1));
				$data['brand'] = $this->constants_model->getAllDataWhere('brand',array('status'=>1));
				$data['suppliers'] = $this->constants_model->getAllDataWhere('suppliers',array('status'=>1));
				$data['divisionproduct'] = $this->constants_model->getAllDataWhere('divisionproduct',array('status'=>1));
				$data['image'] 		= $this->constants_model->getAllDataWhere('productimage',array('products_id' => $id) );
				$data['category']	= $this->constants_model->getAllDataWhere('categoryproduct',array('division_product_id'=> $data['detail']['division_id']));
				$data['subcategory']	= $this->constants_model->getAllDataWhere('subcategoryproduct',array('category_product_id'=> $data['detail']['category_id']));
				$data['contents'] 	= $this->load->view('admin/products/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			default:
				$config['base_url'] = site_url('Admin/products'); //site url
		        $config['total_rows'] = $this->constants_model->getNumRows('products'); //total row
		        $config['per_page'] = 8;  //show record per halaman
		        $config["uri_segment"] = 3;  // uri parameter
		        $choice = $config["total_rows"] / $config["per_page"];
		        $config["num_links"] = floor($choice);
		 
		        // Membuat Style pagination untuk BootStrap v4
		      	$config['first_link']       = 'First';
		        $config['last_link']        = 'Last';
		        $config['next_link']        = '<span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>';
		        $config['prev_link']        = '<span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>';
		        $config['full_tag_open']    = '<ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">';
		        $config['full_tag_close']   = '</ul>';
		        $config['num_tag_open']     = '<li class="page-item"><span  class="page-link">';
		        $config['num_tag_close']    = '<span></li>';
		        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		        $config['prev_tagl_close']  = '</span>Next</li>';
		        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		        $config['first_tagl_close'] = '</span></li>';
		        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		        $config['last_tagl_close']  = '</span></li>';
		 
		        $this->pagination->initialize($config);
		        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
		        $data['products'] = $this->product_model->data($config["per_page"], $data['page']);           
		 
		        $data['pagination'] = $this->pagination->create_links();
				$data['contents'] = $this->load->view('admin/products/list_products',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
		
	}
	function division_product(){
		$data['contents'] = $this->load->view('admin/master/division_product',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function product_type(){
		$data['contents'] = $this->load->view('admin/master/product_type',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function config_upload_products(){

    	$config['upload_path']          = './uploads/images/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['overwrite']           	= TRUE;
        // $config['encrypt_name']           	= TRUE;



    	return $config;
    }
}
 ?>