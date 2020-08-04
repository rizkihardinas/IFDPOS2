<?php 
/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constants_model','constants_model');
		$this->load->model('Hrm_model');
		$this->load->helper('text');
		

		$this->load->library(['encryption']);
		
	}
	function login(){
		$this->load->view('admin/auth/login');
	}
	function index(){
		$data['contents'] = $this->load->view('admin/dashboard/main_dashboard',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function menu(){
		$data['parent_menu'] = $this->constants_model->getAllData('menu');

		$data['contents'] = $this->load->view('admin/menu/menu',$data, TRUE);
		$this->load->view('admin/index',$data);
	}
	function access_level(){
		$data['parent_menu'] = $this->constants_model->getAllDataWhere('parentmenu',array('status' => 1));
		$data['department'] = $this->constants_model->getAllDataWhere('department',array('status' => 1));
		$data['contents'] = $this->load->view('admin/menu/access_level',$data, TRUE);
		$this->load->view('admin/index',$data);
	}
	
	function roles($action = '',$id =''){
		switch ($action) {
			case 'add':
				$role = $this->input->post('result');
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$data = array(
					'name' => $name,
					'role' => $role,
					'description' => $description
				);

				$this->constants_model->doInsert('roles',$data);
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Roles created!');
				$this->session->set_flashdata('title','Berhasil!');
				redirect('Admin/roles');
				break;
			
			default:
				$array = [];
		        $parent_key = '0';
		        $row = $this->db->query('SELECT id,name FROM menu');
		            
		        if($row->num_rows() > 0){
		            $array = $this->membersTree($parent_key);
		        }

		        $data['menu'] = json_encode(array_values($array));
		        // echo $data;
				$data['contents'] = $this->load->view('admin/setting/roles',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
		
	}
	public function membersTree($parent_key)
    {
        $row1 = [];
        $row = $this->db->query('SELECT id, name FROM menu WHERE parent_menu_id='.$parent_key)->result_array();
    
        foreach($row as $key => $value)
        {
           $id = $value['id'];
           $row1[$key]['id'] = $value['id'];
           $row1[$key]['class'] = 'role-checkbox custom-control-input custom-control-input';
           $row1[$key]['text'] = $value['name'];
           $row1[$key]['add_info'] = "";
           $row1[$key]['value'] = $value['id'];
           
           $row1[$key]['items'] = array_values($this->membersTree($value['id']));
        }
  
        return $row1;
    }
	function parent_menu(){

		$data['contents'] = $this->load->view('admin/menu/parent_menu',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function brand(){
		$data['contents'] = $this->load->view('admin/master/brand',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function color(){
		$data['contents'] = $this->load->view('admin/master/color',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function price(){
		$data['contents'] = $this->load->view('admin/master/price',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function department(){
		$data['contents'] = $this->load->view('admin/master/department',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	
	function payment_method(){
		$data['contents'] = $this->load->view('admin/master/payment_method',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	
	function purchase_order_status(){
		$data['contents'] = $this->load->view('admin/master/purchase_order_status',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function employee_status(){
		$data['contents'] = $this->load->view('admin/master/employee_status',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function applications_status(){
		$data['contents'] = $this->load->view('admin/master/applications_status',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function tax(){
		$data['contents'] = $this->load->view('admin/master/tax',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function type_salary(){
		$data['contents'] = $this->load->view('admin/master/type_salary',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	function unit(){
		$data['contents'] = $this->load->view('admin/master/unit',null, TRUE);
		$this->load->view('admin/index',$data);
	}
	
	function designation(){
		$data['department']= $this->constants_model->getAllDataWhere('department',array('status' => 1));
		$data['contents'] = $this->load->view('admin/master/designation/index',$data,TRUE);	
		$this->load->view('admin/index',$data);
	}
	
	function suppliers($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['contents'] = $this->load->view('admin/master/suppliers/add');
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['detail_supplier'] = $this->constants_model->getAllDataWhere("suppliers",array('id' => $id));
				$data['contents'] = $this->load->view('admin/master/suppliers/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doDelete("suppliers",array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/suppliers'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['suppliers'] = $this->constants_model->getSearchData('suppliers',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/suppliers/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			default:
				$config['base_url'] = site_url('Admin/suppliers'); //site url
		        $config['total_rows'] = $this->constants_model->getNumRows('suppliers'); //total row
		        $config['per_page'] = 5;  //show record per halaman
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
		 
		        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		        $data['suppliers'] = $this->constants_model->getAllDataLimit('suppliers',$config["per_page"], $data['page']);           
		 
		        $data['pagination'] = $this->pagination->create_links();
				$data['contents'] = $this->load->view('admin/master/suppliers/index',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
	}
	function customers($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['contents'] = $this->load->view('admin/master/customers/add');
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['detail_supplier'] = $this->constants_model->getAllDataWhere("customers",array('id' => $id));
				$data['contents'] = $this->load->view('admin/master/customers/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doDelete("customers",array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/customers'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['customers'] = $this->constants_model->getSearchData('customers',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/customers/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'sales_history':
				$data['contents'] = $this->load->view('admin/master/customers/sales_history');
				$this->load->view('admin/index',$data);
				break;
			default:
				$config['base_url'] = site_url('Admin/customers'); //site url
		        $config['total_rows'] = $this->constants_model->getNumRows('customers'); //total row
		        $config['per_page'] = 5;  //show record per halaman
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
		 
		        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		        $data['customers'] = $this->constants_model->getAllDataLimit('customers',$config["per_page"], $data['page']);           
		 
		        $data['pagination'] = $this->pagination->create_links();
				$data['contents'] = $this->load->view('admin/master/customers/index',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
	}
	function employee($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['department'] = $this->constants_model->getAllDataWhere("department",array('status' => 1));
				$data['roles'] = $this->constants_model->getAllDataWhere("roles",array('status' => 1));
				$data['designation'] = $this->constants_model->getAllDataWhere("designation",array('status' => 1));
				$data['bank'] = $this->constants_model->getAllDataWhere("bank",array('status' => 1));
				$data['employeestatus'] = $this->constants_model->getAllDataWhere("employeestatus",array('status' => 1));
				$data['typesalary'] = $this->constants_model->getAllDataWhere("typesalary",array('status' => 1));
				$data['contents'] = $this->load->view('admin/master/employee/add',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['detail_employee'] = $this->constants_model->getAllDataWhere("employee",array('id' => $id));
				$data['contents'] = $this->load->view('admin/master/employee/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doDelete("employee",array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/employee'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['employee'] = $this->constants_model->getSearchData('employee',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/employee/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			default:
				$config['base_url'] = site_url('Admin/employee'); //site url
		        $config['total_rows'] = $this->constants_model->getNumRows('employee'); //total row
		        $config['per_page'] = 5;  //show record per halaman
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
		 
		        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		        $data['employee'] = $this->constants_model->getAllDataLimit('employee',$config["per_page"], $data['page']);           
		 
		        $data['pagination'] = $this->pagination->create_links();
				$data['contents'] = $this->load->view('admin/master/employee/index',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
	}
	function vacancy($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['department'] = $this->constants_model->getAllDataWhere("department",array('status' => 1));
				$data['designation'] = $this->constants_model->getAllDataWhere("designation",array('status' => 1));
				
				$data['contents'] = $this->load->view('admin/vacancy/add',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'application':
				$data['vacancy'] = $this->constants_model->doGenerateQuery("
					SELECT vacancy.*,department.name as department,designation.name as designation FROM vacancy JOIN department ON vacancy.department_id = department.id JOIN designation ON vacancy.designation_id = designation.id WHERE vacancy.id = $id 
					");
				$data['contents'] = $this->load->view('admin/vacancy/add_application',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['vacancy'] = $this->constants_model->getAllDataWhere('vacancy',array('id' => $id));
				$data['contents'] = $this->load->view('admin/vacancy/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doUpdate("vacancy",array('status' => 0),array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/vacancy'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['employee'] = $this->constants_model->getSearchData('employee',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/employee/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			default:
				$config['base_url'] = site_url('Admin/vacancy'); //site url
		        $config['total_rows'] = $this->constants_model->getNumRows('vacancy'); //total row
		        $config['per_page'] = 6;  //show record per halaman
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
		 
		        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		             
		 		$data['vacancy'] = $this->constants_model->doGenerateQuery("
					SELECT vacancy.*,department.name as department,designation.name as designation FROM vacancy JOIN department ON vacancy.department_id = department.id JOIN designation ON vacancy.designation_id = designation.id WHERE vacancy.status = 1 ORDER BY vacancy.id DESC LIMIT ". $data['page'].",".$config["per_page"]." 
					");
		        $data['pagination'] = $this->pagination->create_links();
				$data['contents'] = $this->load->view('admin/vacancy/index',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
		}
	}
	function application($action = '',$id = ''){
		switch ($action) {
			case 'add':
				$data['department'] = $this->constants_model->getAllDataWhere("department",array('status' => 1));
				$data['designation'] = $this->constants_model->getAllDataWhere("designation",array('status' => 1));
				$data['contents'] = $this->load->view('admin/application/add',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'application':
				$data['contents'] = $this->load->view('admin/application/add_application');
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['detail_employee'] = $this->constants_model->getAllDataWhere("employee",array('id' => $id));
				$data['contents'] = $this->load->view('admin/master/employee/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doDelete("employee",array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/employee'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['employee'] = $this->constants_model->getSearchData('employee',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/employee/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'list':
				if ($id == '') {
					$id = 1;
				}else{
					$id = $id;
				}
				$data['applicationsstatus'] = $this->constants_model->getAllDataWhere('applicationsstatus',array('status'=>1));
				$data['applications'] = $this->constants_model->doGenerateQuery("
					SELECT employee.name as employee,applications.apply_date,applications.status_application_id,vacancy.name as vacancy,applications.id FROM employee JOIN applications ON employee.id = applications.employee_id JOIN vacancy ON applications.vacancy_id = vacancy.id WHERE applications.status_application_id = $id AND applications.status = 1
					") ;
		        // $data['applications'] = $this->constants_model->getAllDataWhere('applications',array('status_application_id'=>$id,'status' => 1));
		        $data['contents'] = $this->load->view('admin/application/index',$data,TRUE);
		        $this->load->view('admin/index',$data);
				break;
			default:
				redirect('Admin/application/list');
				break;
		}
	}
	function payroll($action = '',$id = ''){
		switch ($action) {

			case 'application':
				$data['contents'] = $this->load->view('admin/application/add_application');
				$this->load->view('admin/index',$data);
				break;
			case 'edit':
				$data['detail_employee'] = $this->constants_model->getAllDataWhere("employee",array('id' => $id));
				$data['contents'] = $this->load->view('admin/master/employee/edit',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'delete':
				$this->constants_model->doDelete("employee",array('id' => $id));
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('messages','Data berhasil dihapus');
				$this->session->set_flashdata('title','Berhasil!');
				redirect(base_url('Admin/employee'));
				break;
			case 'search':
				$q = $this->input->post('search');
				$data['employee'] = $this->constants_model->getSearchData('employee',array('name' => $q));
				$data['q'] = $q;
				$data['contents'] = $this->load->view('admin/master/employee/search',$data,TRUE);
				$this->load->view('admin/index',$data);
				break;
			case 'list':
				$data['month'] =$this->input->post('month');
				$data['year'] =$this->input->post('year');
				$data['payroll'] = $this->constants_model->doGenerateQuery(
					"SELECT employee.name as employee,payroll.* FROM employee RIGHT JOIN payroll ON employee.id = payroll.employee_id 
					WHERE 
					payroll.month =".$this->input->post('month')." 
					AND 
					payroll.year=".$this->input->post('year').""
				);
		        $data['contents'] = $this->load->view('admin/payroll/list',$data,TRUE);
		        $this->load->view('admin/index',$data);
				break;
			default:
			$data['department'] = $this->constants_model->getAllDataWhere('department',array('status' => 1));
			$data['contents'] = $this->load->view('Admin/payroll/index',$data,TRUE);
			$this->load->view('admin/index',$data);
				break;
		}
	}
	function payroll_view($department_id = '', $employee_id = '', $month = '', $year = ''){
		$data['department_id'] = $department_id;
        $data['employee_id']   = $employee_id;
        $data['month']         = $month;
        $data['year']          = $year;
        $data['department']	= $this->constants_model->getAllDataWhere('department',array('status' => 1));
        $data['employee']	= $this->constants_model->getAllDataWhere('employee',array('status' => 1,'department_id' => $department_id));
		$data['contents'] = $this->load->view('admin/payroll/view',$data,TRUE);
		$this->load->view('admin/index',$data);
	}
	function payroll_selector()
    {
        $department_id  = $this->input->post('department_id');
        $employee_id    = $this->input->post('employee_id');
        $month          = $this->input->post('month');
        $year           = $this->input->post('year');

        redirect(site_url('Admin/payroll_view/'). $department_id
            . '/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
    }
    
    
}
 ?>