<?php 
/**
 * 
 */
class Api extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Constants_model');
		$this->load->model('Master_model');
		// $this->load->library('MY_Upload','upload');
		date_default_timezone_set('Asia/Jakarta');
		$this->created_date = date('Y-m-d H:i:s');
		$this->last_update = date('Y-m-d H:i:s');
		$this->idUser = 15;

		// // 15 = $this->session->userdata('id');
		// 15 = 1;
	}
	function response($code,$msg,$data){
		$response = array(
				'response' =>$code,
				'message'=> $msg,
				'data' => $data
			);
			echo json_encode($response);
	}
	function get_employees($department_id = '')
    {
        $employees = $this->Constants_model->getAllDataWhere('employee',
            array('status' => 1, 'department_id' => $department_id));
        foreach($employees as $row)
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
	// ========================================================
	// Menu
	// ========================================================
	function insertMenu(){
		$name = ucwords($this->input->post('name'));
		$url = $this->input->post('url');
		$id = $this->input->post('id');
		$description = $this->input->post('description');
		$parent_menu_id = $this->input->post('parent_menu_id');
		$data = array(
			'name' => $name,
			'url' => $url,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'description' => $description,
			'parent_menu_id' => $parent_menu_id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("menu",array('name' => $name));
		if ($check > 0) {
			$id_menu = $this->Constants_model->doUpdate("menu",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$this->Constants_model->doInsert("menu",$data);
			$this->response(200,"Data berhasil dimasukan",0);
			
		}
	}
	function deleteMenu(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("menu",array('id' => $id));
		if ($check > 0) {
			$id_menu = $this->Constants_model->doUpdate("menu",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function getAllMenu(){
		$data = $this->Constants_model->getAllDataWhere('menu',array('status' => 1));
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['url'];
			$row[] = $data['description'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEditMenu' data-id='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapusMenu' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function getAllProductCategory(){
		$data = $this->Master_model->getDataProductCategory();
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['division'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEdit' data-id='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapus' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function getAllSubProductCategory(){
		$data = $this->Master_model->getDataSubProductCategory();
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['category'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEdit' data-id='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapus' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function getAllOutlets(){
		$data = $this->Constants_model->getAllDataWhere('outlets',array('status' => 1));
		$outlets = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['phone'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEdit' data-id='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapus' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$outlets[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $outlets
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function getAllParentMenu(){
		$data = $this->Constants_model->getAllDataWhere('parentmenu',array('status' => 1));
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['url'];
			$row[] = $data['description'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEditParentMenu' data-id='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapusParentMenu' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function getAllMaster($table){
		$data = $this->Constants_model->getAllDataWhere($table,array('status' => 1));
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEdit' idnya='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapus' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	// ========================================================
	// Parent Menu
	// ========================================================
	function insertParentMenu(){
		$id = $this->input->post('id');
		$name = ucwords($this->input->post('name'));
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$description = $this->input->post('description');
		$data = array(
			'name' => $name,
			'url' => $url,
			'icon' => $icon,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'description' => $description,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("parentmenu",array('name' => $name));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("parentmenu",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$this->Constants_model->doInsert("parentmenu",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function insertOutlets(){
		$id = $this->input->post('id');
		$name = ucwords($this->input->post('name'));
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$reciept_header = $this->input->post('reciept_header');
		$receipt_footer = $this->input->post('receipt_footer');
		$description = $this->input->post('description');
		
		if (isset($id) == 0) {
			$check = $this->Constants_model->getNumRowsWhere('outlets',array('name' => $name));
		}else{
			$check = $this->Constants_model->getNumRowsWhere('outlets',array('id' => $id));
		}
		if ($check == 1) {
			$data_update = array(
				'name' => $name,
				'address' => $address,
				'phone' => $phone,
				'reciept_header' => $reciept_header,
				'receipt_footer' => $receipt_footer,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$id_menu = $this->Constants_model->doUpdate('outlets',$data_update,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$data = array(
				'name' => $name,
				'address' => $address,
				'phone' => $phone,
				'reciept_header' => $reciept_header,
				'receipt_footer' => $receipt_footer,
				'date_created' => $this->created_date,
				'user_id_created' => $this->idUser,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$idp = $this->Constants_model->doinsertGetId('outlets',$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function deleteParentMenu(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("parentmenu",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("parentmenu",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function detailMenu(){
		$id = $this->input->post('id');
		$check = $this->Constants_model->getNumRowsWhere("menu",array('id' => $id));
		if ($check > 0) {
			$json = $this->Constants_model->getAllDataWhere("menu",array('id' => $id)); 
			$this->response(200,"Data berhasil difetch",$json);
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function detailMaster($table){
		$id = $this->input->post('id');
		$check = $this->Constants_model->getNumRowsWhere($table,array('id' => $id));
		if ($check > 0) {
			$json = $this->Constants_model->getAllDataWhere($table,array('id' => $id)); 
			$this->response(200,"Data berhasil difetch",$json);
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function detailParentMenu(){
		$id = $this->input->post('id');
		$check = $this->Constants_model->getNumRowsWhere("parentmenu",array('id' => $id));
		if ($check > 0) {
			$json = $this->Constants_model->getAllDataWhere("parentmenu",array('id' => $id)); 
			$this->response(200,"Data berhasil difetch",$json);
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	

	// ========================================================
	// Master 
	// ========================================================
	function insertMaster($table){
		$name = ucwords(trim($this->input->post('name')));
		$id = $this->input->post('id');
		if (isset($id) == 0) {
			$check = $this->Constants_model->getNumRowsWhere($table,array('name' => $name));
		}else{
			$check = $this->Constants_model->getNumRowsWhere($table,array('id' => $id));
		}
		if ($check == 1) {
			$data_update = array(
				'name' => $name,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$id_menu = $this->Constants_model->doUpdate($table,$data_update,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$data = array(
				'name' => $name,
				'date_created' => $this->created_date,
				'user_id_created' => $this->idUser,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$this->Constants_model->doInsert($table,$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function deleteMaster($table){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere($table,array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate($table,$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Application
	// ========================================================

	function insertApplication(){
		$name = trim(ucwords($this->input->post('name')));
		$phone = trim($this->input->post('phone'));
		$email = trim($this->input->post('email'));
		$gender = trim($this->input->post('gender'));
		$address = trim($this->input->post('address'));
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		$vacancy_id = $this->input->post('vacancy_id');
		$data = array(
			'name' => $name,
			'phone' => $phone,
			'email' => $email,
			'gender' => $gender,
			'address' => $address,
			'username' => $username,
			'password' => $password,
			'status_id' => 4,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$employee_id = $this->Constants_model->doinsertGetId("employee",$data);
		$application = array(
			'employee_id' => $employee_id,
			'vacancy_id' => $vacancy_id,
			'apply_date' => date('Y-m-d H:i:s'),
			'status_application_id' => 1,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 1
		);
		$insert = $this->Constants_model->doInsert("applications",$application);
		if ($insert) {
			$this->response(400,"Gagal",0);
			
		}else{
			$this->response(200,"berhasil",0);
		}
	}
	function updateApplication(){
		$status_application_id = $this->input->post('status_application_id');
		$id = $this->input->post('id');
		$data = array(
			'status_application_id' => $status_application_id
		);
		$where = array(
			'id'=> $id
		);
		$update = $this->Constants_model->doUpdate("application",$data,$where);
		if ($update) {
			$this->response(200,"berhasil",0);
		}else{
			$this->response(400,"Gagal",0);
		}

	}

	// ========================================================
	// Category Product
	// ========================================================	
	function insertCategoryProduct(){
		$name = ucwords($this->input->post('name'));
		$division_product_id = $this->input->post('division_product_id');
		$id = $this->input->post('id');
		if (isset($id) == 0) {
			$check = $this->Constants_model->getNumRowsWhere('categoryproduct',array('name' => $name));
		}else{
			$check = $this->Constants_model->getNumRowsWhere('categoryproduct',array('id' => $id));
		}
		if ($check == 1) {
			$data_update = array(
				'name' => $name,
				'division_product_id' => $division_product_id,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$id_menu = $this->Constants_model->doUpdate('categoryproduct',$data_update,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$data = array(
				'name' => $name,
				'division_product_id' => $division_product_id,
				'date_created' => $this->created_date,
				'user_id_created' => $this->idUser,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$idp = $this->Constants_model->doinsertGetId('categoryproduct',$data);
			
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	
	// ========================================================
	// Sub Category Product
	// ========================================================	
	function insertSubCategoryProduct(){
		$name = ucwords($this->input->post('name'));
		$category_product_id = $this->input->post('category_product_id');
		$id = $this->input->post('id');
		if (isset($id) == 0) {
			$check = $this->Constants_model->getNumRowsWhere('subcategoryproduct',array('name' => $name));
		}else{
			$check = $this->Constants_model->getNumRowsWhere('subcategoryproduct',array('id' => $id));
		}
		if ($check == 1) {
			$data_update = array(
				'name' => $name,
				'category_product_id' => $category_product_id,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$id_menu = $this->Constants_model->doUpdate('subcategoryproduct',$data_update,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$data = array(
				'name' => $name,
				'category_product_id' => $category_product_id,
				'date_created' => $this->created_date,
				'user_id_created' => $this->idUser,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$idp = $this->Constants_model->doinsertGetId('subcategoryproduct',$data);
			
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	
	// ========================================================
	// Color
	// ========================================================	
	function insertColor(){
		$id = $this->input->post('id');
		$name = ucwords($this->input->post('name'));
		$hex = $this->input->post('hex');
		$data = array(
			'name' => $name,
			'date_created' => $this->created_date,
			'hex' => $hex,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("color",array('name' => $name));
		if ($check>0) {
			$this->Constants_model->doUpdate("color",$data,array('id' =>$id));
			$this->response(200,"Data updated!!",0);
		}else{
			$this->Constants_model->doInsert("color",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	
	function deleteColor(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("color",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("color",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Suppliers
	// ========================================================	
	function insertSuppliers(){
		$name = ucwords($this->input->post('name'));
		$phone = trim($this->input->post('phone'));
		$address = trim($this->input->post('address'));
		$email = trim($this->input->post('email'));
		$province_id = trim($this->input->post('province_id'));
		$disctrict_id = trim($this->input->post('disctrict_id'));
		$subdisctrict_id = trim($this->input->post('subdisctrict_id'));
		$postal_code = trim($this->input->post('postal_code'));
		$data = array(
			'name' => $name,
			'phone' => $phone,
			'address' => $address,
			'email' => $email,
			'province_id' => $province_id,
			'disctrict_id' => $disctrict_id,
			'disctrict_id' => $disctrict_id,
			'subdisctrict_id' => $subdisctrict_id,
			'postal_code' => $postal_code,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("suppliers",array('name' => $name, 'email' => $email));
		if ($check>0) {
			$this->response(400,"Data Sudah tersedia",0);
		}else{
			$this->Constants_model->doInsert("suppliers",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function detailSupplier(){
		$id = $this->input->post('id');
		$check = $this->Constants_model->getNumRowsWhere("suppliers",array('id' => $id));
		if ($check > 0) {
			$json = $this->Constants_model->getAllDataWhere("suppliers",array('id' => $id)); 
			$this->response(200,"Data berhasil difetch",$json);
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Customers
	// ========================================================	
	function insertCustomers(){
		$name = ucwords($this->input->post('name'));
		$phone = trim($this->input->post('phone'));
		$address = trim($this->input->post('address'));
		$email = trim($this->input->post('email'));
		$province_id = 1;//trim($this->input->post('province_id'));
		$disctrict_id = 1;//trim($this->input->post('disctrict_id'));
		$subdisctrict_id = 1;//trim($this->input->post('subdisctrict_id'));
		$postal_code = trim($this->input->post('postal_code'));
		$data = array(
			'name' => $name,
			'phone' => $phone,
			'address' => $address,
			'email' => $email,
			'province_id' => $province_id,
			'disctrict_id' => $disctrict_id,
			'disctrict_id' => $disctrict_id,
			'subdisctrict_id' => $subdisctrict_id,
			'postal_code' => $postal_code,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("customers",array('name' => $name, 'email' => $email));
		if ($check>0) {
			$this->response(400,"Data Sudah tersedia",0);
		}else{
			$this->Constants_model->doInsert("customers",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function updateCustomers(){
		$id = $this->input->post('id');
		$name = ucwords($this->input->post('name'));
		$phone = trim($this->input->post('phone'));
		$address = trim($this->input->post('address'));
		$email = trim($this->input->post('email'));
		$province_id = trim($this->input->post('province_id'));
		$disctrict_id = trim($this->input->post('disctrict_id'));
		$subdisctrict_id = trim($this->input->post('subdisctrict_id'));
		$postal_code = trim($this->input->post('postal_code'));
		$data = array(
			'name' => $name,
			'phone' => $phone,
			'address' => $address,
			'email' => $email,
			'province_id' => $province_id,
			'disctrict_id' => $disctrict_id,
			'disctrict_id' => $disctrict_id,
			'subdisctrict_id' => $subdisctrict_id,
			'postal_code' => $postal_code,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("customers",array('id' =>$id));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("customers",$data,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deleteCustomers(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("customers",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("customers",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function detailCustomers(){
		$id = $this->input->post('id');
		$check = $this->Constants_model->getNumRowsWhere("customers",array('id' => $id));
		if ($check > 0) {
			$json = $this->Constants_model->getAllDataWhere("customers",array('id' => $id)); 
			$this->response(200,"Data berhasil difetch",$json);
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Designation
	// ========================================================	
	function insertDesignation(){
		$name = ucwords(trim($this->input->post('name')));
		$department_id = $this->input->post('department_id');
		$id = $this->input->post('id');
		if (isset($id) == 0) {
			$check = $this->Constants_model->getNumRowsWhere("designation",array('name' => $name));
		}else{
			$check = $this->Constants_model->getNumRowsWhere("designation",array('id' => $id));
		}
		if ($check == 1) {
			$data_update = array(
				'name' => $name,
				'department_id' => $department_id,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$id_menu = $this->Constants_model->doUpdate("designation",$data_update,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
		}else{
			$data = array(
				'name' => $name,
				'department_id' => $department_id,
				'date_created' => $this->created_date,
				'user_id_created' => $this->idUser,
				'last_update' => $this->last_update,
				'user_last_update' => $this->idUser
			);
			$idp = $this->Constants_model->doinsertGetId("designation",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	
	}
	function checkUsername(){
		$username = $this->input->post("username");
		$data = $this->Constants_model->getAllDataWhere("employee",array('username'=>$username));
		$num = $this->Constants_model->getNumRowsWhere("employee",array('username'=>$username));
		if ($num > 0) {
			echo $this->response(200,"username tersedia",$data);
		}else{
			echo $this->response(400,"username dapat digunakan",0);
		}
	}
	function getDesignation(){
		$department_id = $this->input->post("department_id");
		$data = $this->Constants_model->getAllDataWhere("designation",array('department_id'=>$department_id));
		$num = $this->Constants_model->getNumRowsWhere("designation",array('department_id'=>$department_id));
		if ($num > 0) {
			echo "<option value=''>Choose a designation</option>";
			foreach ($data as $data) {
				
				echo "<option value='".$data['id']."'>".$data['name']."</option>";
			}
		}else{
			echo "<option value=''>-- Data Empty --</option>";
		}
	}
	function getAllDesignation(){
		$data = $this->Constants_model->getAllDataWhere("designation",array('status' => 1));
		$data = $this->Constants_model->doGenerateQuery("SELECT department.name as department,designation.* FROM designation JOIN department ON department.id = designation.department_id WHERE designation.status =1");
		$menu = array();
		$i = 1;
		foreach ($data as $data) {
			$row = array();
			$row[] = $i;
			$row[] = $data['name'];
			$row[] = $data['department'];
			if ($data['status'] == 1) {
				$row[] = "<span class='text-success'>Active</span>";
			}else{
				$row[] = "<span class='text-success'>Non Active</span>";
			}
			$row[] = "
				<button class='btn btn-warning' id='btnEdit' idnya='".$data['id']."'><i class='fa fa-edit'></i></button>
				<button class='btn btn-danger' id='btnHapus' data-id='".$data['id']."'><i class='fa fa-trash'></i></button>
				";
			$menu[] = $row;
			$i++;
		}
		$callback = array(
	        'draw'=>count($data), // Ini dari datatablenya
	        'recordsTotal'=>count($data),
	        'recordsFiltered'=> 0,
	        'data'=> $menu
	    );
	    header('Content-Type: application/json');
	    echo json_encode($callback); 
	}
	function updateDesignation(){
		$name = ucwords($this->input->post('name'));
		$id = $this->input->post('id');
		$department_id = $this->input->post('department_id');
		$data = array(
			'name' => $name,
			'department_id' => $department_id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("designation",array('id' =>$id));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("designation",$data,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deleteDesignation(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("designation",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("designation",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// mployee
	// ========================================================	
	function insertEmployee(){
		$name = ucwords(trim($this->input->post('name')));
		$phone = trim($this->input->post('phone'));
		$date_of_birth = trim($this->input->post('date_of_birth'));
		$gender = trim($this->input->post('gender'));
		$address = trim($this->input->post('address'));
		$married_status = trim($this->input->post('married_status'));
		$email = trim($this->input->post('email'));
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		$department_id = trim($this->input->post('department_id'));
		$designation_id = trim($this->input->post('designation_id'));
		$status_id = trim($this->input->post('status_id'));
		$date_of_leaving = trim($this->input->post('date_of_leaving'));
		$bank_id = trim($this->input->post('bank_id'));
		$document_id = trim($this->input->post('document_id'));
		$account_number = trim($this->input->post('account_number'));
		$date_of_joining = trim($this->input->post('date_of_joining'));
		$data = array(
			'name'=> $name,
			'phone'=> $phone,
			'date_of_birth'=> $date_of_birth,
			'gender'=> $gender,
			'address'=> $address,
			'married_status'=> $married_status,
			'email'=> $email,
			'username'=> $username,
			'password'=> $password,
			'department_id'=> $department_id,
			'designation_id'=> $designation_id,
			'status_id'=> $status_id,
			'date_of_leaving'=> $date_of_leaving,
			'bank_id'=> $bank_id,
			'document_id'=> $document_id,
			'account_number'=> $account_number,
			'date_of_joining'=> $date_of_joining,
			'date_created'=> date('Y-m-d H:i:s'),
			'last_update'=> date('Y-m-d H:i:s'),
			'user_id_created'=> $this->idUser,
			'user_last_update'=> $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("employee",array(
			'name' => $name,
			'phone' => $phone,
			'username' => $username,
			'email' => $email
		));
		if ($check > 0) {
			$this->response(400,"Data Sudah tersedia",0);
		}else{
			$this->Constants_model->doInsert("employee",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function updateEmployee(){
		$id = $this->input->post('id');
		$name = ucwords(trim($this->input->post('name')));
		$phone = trim($this->input->post('phone'));
		$date_of_birth = trim($this->input->post('date_of_birth'));
		$gender = trim($this->input->post('gender'));
		$address = trim($this->input->post('address'));
		$married_status = trim($this->input->post('married_status'));
		$email = trim($this->input->post('email'));
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		$department_id = trim($this->input->post('department_id'));
		$designation_id = trim($this->input->post('designation_id'));
		$status_id = trim($this->input->post('status_id'));
		$date_of_leaving = trim($this->input->post('date_of_leaving'));
		$bank_id = trim($this->input->post('bank_id'));
		$document_id = trim($this->input->post('document_id'));
		$account_number = trim($this->input->post('account_number'));
		$date_of_joining = trim($this->input->post('date_of_joining'));
		$data = array(
			'name'=> $name,
			'phone'=> $phone,
			'date_of_birth'=> $date_of_birth,
			'gender'=> $gender,
			'address'=> $address,
			'married_status'=> $married_status,
			'email'=> $email,
			'username'=> $username,
			'password'=> $password,
			'department_id'=> $department_id,
			'designation_id'=> $designation_id,
			'status_id'=> $status_id,
			'date_of_leaving'=> $date_of_leaving,
			'bank_id'=> $bank_id,
			'document_id'=> $document_id,
			'account_number'=> $account_number,
			'date_of_joining'=> $date_of_joining,
			'last_update'=> date('Y-m-d H:i:s'),
			'user_last_update'=> $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("employee",array('id' =>$id));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("employee",$data,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deleteEmployee(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("employee",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("employee",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Vacancy
	// ========================================================	
	function insertVacancy(){
		$name = ucwords($this->input->post('name'));
		$range_salary = $this->input->post('min'). " - ".$this->input->post('max')  ;
		$department_id = $this->input->post('department_id');
		$designation_id = $this->input->post('designation_id');
		$note = $this->input->post('note');
		$type = $this->input->post('type');
		$data = array(
			'name' => $name,
			'range_salary' => $range_salary,
			'date_created' => $this->created_date,
			'department_id' => $department_id,
			'designation_id' => $designation_id,
			'note' => $note,
			'type' => $type,
			'date_created' => $this->created_date,
			'user_id_created' => $this->idUser,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 1
		);
		$check = $this->Constants_model->getNumRowsWhere("vacancy",array('name' => $name, 'department_id' => $department_id,'designation_id' => $designation_id));
		if ($check>0) {
			$this->response(400,"Data Sudah tersedia",0);
		}else{
			$this->Constants_model->doInsert("vacancy",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function updateVacancy(){
		$name = ucwords($this->input->post('name'));
		$id = $this->input->post('id');
		$designation_id = $this->input->post('designation_id');
		$range_salary = $this->input->post('range_salary');
		$department_id = $this->input->post('department_id');
		$data = array(
			'name' => $name,
			'department_id' => $department_id,
			'designation_id' => $designation_id,
			'range_salary' => $range_salary,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser
		);
		$check = $this->Constants_model->getNumRowsWhere("vacancy",array('id' =>$id));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("vacancy",$data,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deleteVacancy(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("vacancy",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("vacancy",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Product
	// ========================================================	
	function insertProducts(){
		$barcode = $this->input->post('barcode');
		$name = $this->input->post('name');
		$short_name = $this->input->post('short_name');
		$purchase_price = $this->input->post('purchase_price');
		$retail_price = $this->input->post('retail_price');
		$user_id_created = $this->input->post('user_id_created');
		$user_last_update = $this->input->post('user_last_update');
		$date_created = $this->input->post('date_created');
		$last_update = $this->input->post('last_update');
		$status = 1;//$this->input->post('status');
		$brand_id = $this->input->post('brand_id');
		$sub_category_id = $this->input->post('sub_category_id');
		$suppliers_id = $this->input->post('suppliers_id');
		$unit_id = $this->input->post('unit_id');
		$type_product_id = $this->input->post('type_product_id');
		$check = $this->Constants_model->getNumRowsWhere("products",array('barcode' => $barcode));
		$data = array(
			'barcode' => $barcode,
			'name' => $name,
			'short_name' => $short_name,
			'purchase_price' => $purchase_price,
			'retail_price' => $retail_price,
			'user_id_created' => $user_id_created,
			'user_last_update' => $user_last_update,
			'date_created' => $date_created,
			'last_update' => $last_update,
			'status' => $status,
			'brand_id' => $brand_id,
			'sub_category_id' => $sub_category_id,
			'suppliers_id' => $suppliers_id,
			'unit_id' => $unit_id,
			'type_product_id' => $type_product_id
		);
		if ($check>0) {
			$this->response(400,"Data barang sudah tersedia",0);
		}else{
			$c = $this->Constants_model->getNumRowsWhere("products",array('name' => $name,'suppliers_id'=>$suppliers_id));
			if ($c > 0) {
				$this->response(400,"Barang sudah terdaftar di Supplier tersebut",0);
			}else{
				$id = $this->Constants_model->doInsertGetId("products",$data);
						$this->upload->initialize(array(
					"upload_path"	=> "assets/upload/products"
				));
			
				//Perform upload.
				if($this->upload->do_multi_upload("files")) {
					//Code to run upon successful upload.
				}
				$this->response(200,"Data berhasil dimasukan",0);
			}
			
		}
	}
	function deleteProductImage(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("productimage",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("productimage",$data,array('id' => $id));
			$this->response(200,"Data berhasil dihapus",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deleteProduct(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("products",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("products",$data,array('id' => $id));
			$this->response(200,"Data berhasil dihapus",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	// ========================================================
	// Job History
	// ========================================================	
	function insertjobhistory(){
		$employee_id	 = $this->input->post('employee_id');
		$department = $this->input->post('department');
		$designation = $this->input->post('designation');
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$reason_leaving = $this->input->post('reason_leaving');
		$company_name = $this->input->post('company_name');
		$data = array(
			'employee_id' => $employee_id,
			'department' => $department,
			'designation' => $designation,
			'date_from' => $date_from,
			'date_to' => $date_to,
			'reason_leaving' => $reason_leaving,
			'company_name' => $company_name,
			'user_id_created' => $this->idUser,
			'user_last_update' => $this->idUser,
			'date_created' => $this->created_date,
			'last_update' => $this->last_update
		);
		$check = $this->Constants_model->getNumRowsWhere("jobhistory",array('products_id' => $products_id, 'path' => $path));
		if ($check>0) {
			$this->response(400,"Data Sudah tersedia",0);
		}else{
			$this->Constants_model->doInsert("jobhistory",$data);
			$this->response(200,"Data berhasil dimasukan",0);
		}
	}
	function updatejobhistory(){
		$id = $this->input->post('id');
		$employee_id	 = $this->input->post('employee_id');
		$department = $this->input->post('department');
		$designation = $this->input->post('designation');
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$reason_leaving = $this->input->post('reason_leaving');
		$company_name = $this->input->post('company_name');
		$data = array(
			'employee_id' => $employee_id,
			'department' => $department,
			'designation' => $designation,
			'date_from' => $date_from,
			'date_to' => $date_to,
			'reason_leaving' => $reason_leaving,
			'company_name' => $company_name,
			'date_created' => $this->created_date,
			'last_update' => $this->last_update
		);
		$check = $this->Constants_model->getNumRowsWhere("jobhistory",array('id' =>$id));
		if ($check>0) {
			$id_menu = $this->Constants_model->doUpdate("jobhistory",$data,array('id' =>$id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function deletejobhistory(){
		$id = $this->input->post('id');
		$data = array(
			'id' => $id,
			'last_update' => $this->last_update,
			'user_last_update' => $this->idUser,
			'status' => 0
		);
		$check = $this->Constants_model->getNumRowsWhere("jobhistory",array('id' => $id));
		if ($check > 0) {
			$this->Constants_model->doUpdate("jobhistory",$data,array('id' => $id));
			$this->response(200,"Data berhasil diupdate",0);
			
		}else{
			$this->response(400,"Data Tidak ada",0);
		}
	}
	function updateAccessLevel(){
		$menu_id = $this->input->post('menu_id');
		$department_id = $this->input->post('department_id');
		$array = array(
			'menu_id' => $menu_id,
			'department_id' => $department_id
		);
		$cek = $this->db->get_where('accesslevel',$array)->row();
		$status = $cek->status;
		if ($status == 0) {
			$this->Constants_model->doUpdate('accesslevel',array('status' =>1),$array);
			echo 0;
		}else{
			$this->Constants_model->doUpdate('accesslevel',array('status' =>0),$array);
			echo 1;
		}
	}
	function get_category_products(){
		$division_product_id = $this->input->post('id');
		$data = $this->Constants_model->getAllDataWhere("categoryproduct",array('division_product_id'=>$division_product_id));
		$num = $this->Constants_model->getNumRowsWhere("categoryproduct",array('division_product_id'=>$division_product_id));
		if ($num > 0) {
			echo "<option value=''>-- Please choose Category Products --</option>";
			foreach ($data as $data) {
				
				echo "<option value='".$data['id']."'>".$data['name']."</option>";
			}
		}else{
			echo "<option value=''>-- Data Empty --</option>";
		}
	}
	function get_sub_category_products(){
		$category_product_id = $this->input->post('id');
		$data = $this->Constants_model->getAllDataWhere("subcategoryproduct",array('category_product_id'=>$category_product_id));
		$num = $this->Constants_model->getNumRowsWhere("subcategoryproduct",array('category_product_id'=>$category_product_id));
		if ($num > 0) {
			echo "<option value=''>-- Please choose Sub Category Products --</option>";
			foreach ($data as $data) {
				
				echo "<option value='".$data['id']."'>".$data['name']."</option>";
			}
		}else{
			echo "<option value=''>-- Data Empty --</option>";
		}
	}
	function generate_barcode(){
		$code = "899";
		$company_code = "004";
		$rand = rand(0000000,9999999);
		echo $code ."". $company_code ."". $rand;
	}
	function check_barcode(){
		$barcode = $this->input->post('barcode');
		$num = $this->Constants_model->getNumRowsWhere('products',array('barcode' => $barcode));
		if ($num > 0) {
			$this->response(400,"Barcode sudah tersedia",0);
		}else{
			$this->response(200,"Barcode tersedia",0);
		}
	}

}
 ?>