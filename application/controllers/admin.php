<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		$this->is_log_in();
	}

	// new panel
			function newpanel(){
				$data['title'] = "Administrator";
				$data['sub_heading'] = "Main Page";
				$data['page'] = 'Frontdesk';

				$data['record'] = $this->admin_model->property_info();

				$this->load->view('adminpanel/header',$data);
				$this->load->view('adminpanel/newnav',$data);
				$this->load->view('adminpanel/home',$data);
				$this->load->view('adminpanel/footer',$data);
			}

/* frontdesk admin funtions*/
	function index(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Main Page";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer',$data);
	}
	function propertyInfo(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Property Info Page";
		$data['page'] = 'Frontdesk';

		$this->load->view('admin/header',$data);
		// $this->load->view('admin/nav',$data);
		// $this->load->view('admin/body_header',$data);
		// $this->load->view('admin/propInfo',$data);
		// $this->load->view('admin/body_footer',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/propInfo',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetch_property(){
		$id = $this->get_account_id();
		$where = array('property_id'=>$id);
		$data = $this->project_model->single_select('property_info',$where);
		echo json_encode($data);
	}
	function update_property_info(){
		$this->form_validation->set_rules('property_name','Property Name','required');
		$this->form_validation->set_rules('street_name','Street Name, Subdivision or Baranggay Name','required');
		$this->form_validation->set_rules('municipality','Municipality','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('zipcode','Zipcode','required');
		$this->form_validation->set_rules('country','Country','required');

		$this->form_validation->set_rules('phone','Phone Number','required');
		$this->form_validation->set_rules('fax','Fax','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('email','Email Address','required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"property_name"=>set_value('property_name'),
				"street_name"=>set_value('street_name'),
				"municipality"=>set_value('municipality'),
				"state"=>set_value('state'),
				"country"=>set_value('country'),
				"zipcode"=>set_value('zipcode'),
				"phone"=>set_value('phone'),
				"mobile"=>set_value('mobile'),
				"fax"=>set_value('fax'),
				"email"=>set_value('email')
				);

			$id = $this->get_account_id();
			$where = array('property_id'=>$id);
			$update = $this->project_model->updateNew('property_info',$where,$data);

			if ($update !== false) {
				$msg['success'] = true;
			}else{
				$msg['error'] = 'Error in updating records.';
				$msg['success'] = false;
			}
		}
		echo json_encode($msg);
	}

	function account_security(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Account Security Page";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/adminSec',$data);
		$this->load->view('admin/footer',$data);
	}

	function get_account_id(){
		$data = $this->project_model->select('property_info');
		foreach ($data as $value) {
			return $value->property_id;
		}
	}

	function update_security(){
		$this->form_validation->set_rules('adminuname','Username','required');
		$this->form_validation->set_rules('npassword','New Password','required');
		$this->form_validation->set_rules('cnpassword','Confirm Password','required|matches[npassword]');
		$this->form_validation->set_rules('opassword','Old Password','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			/*$msg['success'] = true;
			$msg['error'] = set_value('adminuname').','.set_value('npassword').','.set_value('cnpassword').','.set_value('opassword');*/
			$id = $this->get_account_id();
			$where = array('admin_password'=>sha1(set_value('opassword')));
			$check = $this->project_model->check_multi_duplicate('property_info',$where);
			if ($check != false) {
				$data = array(
					'admin_username'=>set_value('adminuname'),
					'admin_password'=>sha1(set_value('npassword'))
				);
				$where1 = array('property_id'=>$id);
				$update = $this->project_model->updateNew('property_info',$where1,$data);
				if ($update != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error updating data.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Unable to locate data';
			}
		}

		echo json_encode($msg);
	}

/*Employee Management*/
	/*start of salary method*/
	function salary_term(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Salary Term";
		$data['page'] = 'Frontdesk';

		$data['term'] = $this->admin_model->get_table_record('salary_term',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/salary_term',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchSalTerm(){
		$result = array('data' => array());
		$data = $this->project_model->select('salary_term');
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->salary_term_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->salary_term_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->salary_term_name,
					$value->salary_term_description,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addSalTerm(){
		$this->form_validation->set_rules('name','Salary Term Name','required');
		$this->form_validation->set_rules('description','Salary Term Description','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"salary_term_name"=>ucwords(set_value('name')),
				"salary_term_description"=>set_value('description')
			);
			$table_name = 'salary_term';
			$cwhere = array(
				'salary_term_name'=>set_value('name')
			);
			$check_duplicate = $this->admin_model->check_multi_duplicate($table_name,$cwhere);
			if ($check_duplicate != true) {
				$add = $this->project_model->insert('salary_term',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error! Duplicate data detected.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}
	function editSalTerm(){
		$id = $this->input->get('id');
		$where = array("salary_term_id"=>$id);
		$result = $this->project_model->single_select('salary_term',$where);
		echo json_encode($result);
	}
	function updateSalTerm(){
		$this->form_validation->set_rules('name','Salary Term Name','required');
		$this->form_validation->set_rules('description','Salary Term Description','required');
		$this->form_validation->set_rules('id','Data Id','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"salary_term_name"=>ucwords(set_value('name')),
				"salary_term_description"=>set_value('description')
			);
			$id = set_value('id');
			$where = array('salary_term_id'=>$id);
			$result = $this->project_model->updateNew('salary_term',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error updating data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteSalTerm(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('salary_term','salary_term_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	/*end of salary method*/

	/*start of salary method*/
	function job_position(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Job Position";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();


		$main_table = "job_position";
		$array = array(
			array('salary_term',$main_table,'salary_term_id')
			);
		$data['job_position'] = $this->admin_model->join_record($main_table, $array, false);

		$data['salary_term'] = $this->admin_model->get_table_record('salary_term',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/employee_job_position',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchTerm(){
		$data = $this->project_model->select('salary_term');
		echo json_encode($data);
	}
	function fetchJob(){
		$result = array('data' => array());
		$join = array(
			array("salary_term","job_position","salary_term_id")
		);
		$data = $this->project_model->select_join('job_position',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->job_position_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->job_position_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->job_position_name,
					$value->salary_rate,
					$value->salary_term_name,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addJob(){
		$this->form_validation->set_rules('name','Job Position Name','required');
		$this->form_validation->set_rules('rate','Salary Rate','required|numeric');
		$this->form_validation->set_rules('term','Salary Term','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"job_position_name"=>ucwords(set_value('name')),
				"salary_rate"=>set_value('rate'),
				"salary_term_id"=>set_value('term')
				);
			$table_name = 'job_position';
			$cwhere = array(
				'job_position_name'=>set_value('name')
			);
			$check_duplicate = $this->admin_model->check_multi_duplicate($table_name,$cwhere);
			if ($check_duplicate != true) {
				$add = $this->project_model->insert('job_position',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error! Duplicate data detected.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}
	function editJob(){
		$id = $this->input->get('id');
		$where = array("job_position_id"=>$id);
		$join = array(
			array("salary_term","job_position","salary_term_id")
		);
		$result = $this->project_model->single_select('job_position',$where,$join);
		echo json_encode($result);
	}
	function updateJob(){
		$this->form_validation->set_rules('name','Job Position Name','required');
		$this->form_validation->set_rules('rate','Salary Rate','required|numeric');
		$this->form_validation->set_rules('term','Salary Term','required');
		$this->form_validation->set_rules('id','Data Id','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"job_position_name"=>ucwords(set_value('name')),
				"salary_rate"=>set_value('rate'),
				"salary_term_id"=>set_value('term')
				);
			$id = set_value('id');
			$where = array('job_position_id'=>$id);
			$result = $this->project_model->updateNew('job_position',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error updating data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteJob(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('job_position','job_position_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	/*end of salary method*/

	/*start of employee registration methi*/
	function employee_registration(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Employee";
		$data['page'] = 'Frontdesk';
		$data['record'] = $this->admin_model->property_info();

		$main_table1 = "job_position";
		$array1 = array(
			array('salary_term',$main_table1,'salary_term_id')
			);
		$data['job_position'] = $this->admin_model->join_record($main_table1, $array1, false);

		$main_table2 = "employee";
		$array2 = array(
			array('job_position',$main_table2,'job_position_id'),
			array('salary_term','job_position','salary_term_id')
			);
		$data['employee'] = $this->admin_model->join_record($main_table2, $array2, false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/employee_registration',$data);
		$this->load->view('admin/footer',$data);
	}
	function getJob(){
		$data = $this->project_model->select('job_position');
		echo json_encode($data);
	}
	function fetchEmployee(){
		$result = array('data' => array());
		$join = array(
			array("job_position","employee","job_position_id")
		);
		$data = $this->project_model->select_join('employee',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$name,
					$value->emp_contact,
					$value->emp_email,
					$value->job_position_name,
					$value->emp_status,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addEmployee(){
		$this->form_validation->set_rules('lname','Last Name','required|alpha');
		$this->form_validation->set_rules('mname','Middle Name','required|min_length[2]|alpha');
		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('bdate','Birthdate','required');
		$this->form_validation->set_rules('home_address','Home Address','required');
		$this->form_validation->set_rules('contact_num','Contact Number','required');
		$this->form_validation->set_rules('email_address','Email Address','required|valid_email');
		$this->form_validation->set_rules('position','Position','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$order = array('employee'.'.'.'emp_code','ASC');
			$last_id = $this->admin_model->get_table_record('employee',$where=false,$order,$group_by=false,$like=false,1);

			if ($last_id != false) {
				foreach ($last_id as $value) {
					$code = $value->emp_code;
				}
			}else{
				$code = 0;
			}
			$lastnum = substr($code, 6,14)+1;
			$lastnum = $lastnum+1;
			$first = substr(date('Y'), 2,2);
			$second = substr(set_value('bdate'), 5,2);
			$third = substr(set_value('bdate'), 2,2);
			$data = array(
				"emp_code"=>$first.$second.$third.$lastnum,
				"emp_lname"=>ucwords(set_value('lname')),
				"emp_mname"=>ucwords(set_value('mname')),
				"emp_fname"=>ucwords(set_value('fname')),
				"emp_bday"=>set_value('bdate'),
				"emp_address"=>ucwords(set_value('home_address')),
				"emp_contact"=>set_value('contact_num'),
				"emp_email"=>set_value('email_address'),
				"job_position_id"=>set_value('position'),
				"emp_status"=>'active'
				);
			$table_name = 'employee';
			$cwhere = array(
				"emp_lname"=>ucwords(set_value('lname')),
				"emp_mname"=>ucwords(set_value('mname')),
				"emp_fname"=>ucwords(set_value('fname'))
			);
			$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$cwhere);
			if ($check_duplicate != true) {
				$add = $this->project_model->insert('employee',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error! Duplicate data detected.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}
	function editEmployee(){
		$id = $this->input->get('id');
		$where = array("emp_id"=>$id);
		$join = array(
			array("job_position","employee","job_position_id")
		);
		$result = $this->project_model->single_select('employee',$where,$join);
		echo json_encode($result);
	}
	function updateEmployee(){
		$this->form_validation->set_rules('lname','Last Name','required|alpha');
		$this->form_validation->set_rules('mname','Middle Name','required|min_length[2]|alpha');
		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('bdate','Birthdate','required');
		$this->form_validation->set_rules('home_address','Home Address','required');
		$this->form_validation->set_rules('contact_num','Contact Number','required');
		$this->form_validation->set_rules('email_address','Email Address','required|valid_email');
		$this->form_validation->set_rules('position','Position','required');
		$this->form_validation->set_rules('id','ID','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"emp_lname"=>ucwords(set_value('lname')),
				"emp_mname"=>ucwords(set_value('mname')),
				"emp_fname"=>ucwords(set_value('fname')),
				"emp_bday"=>set_value('bdate'),
				"emp_address"=>ucwords(set_value('home_address')),
				"emp_contact"=>set_value('contact_num'),
				"emp_email"=>set_value('email_address'),
				"job_position_id"=>set_value('position'),
				"emp_status"=>'active'
				);
			$id = set_value('id');
			$where = array('emp_id'=>$id);
			$result = $this->project_model->updateNew('employee',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error updating data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteEmployee(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('employee','emp_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	/*start of employee account method*/
	function employee_account(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Employee's Account";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();

		$where = array('emp_status'=>'active');
		$order = false;
		$group = false;
		$data['employee'] = $this->admin_model->get_table_record('employee',$where,$order,$group);

		$main_table2 = "emp_accounts";
		$array2 = array(
			array('employee',$main_table2,'emp_id')
			);
		$data['account'] = $this->admin_model->join_record($main_table2, $array2, false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/employee_account',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchAccount(){
		$result = array('data' => array());
		$join = array(
			array("employee","emp_accounts","emp_id")
		);
		$data = $this->project_model->select_join('emp_accounts',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_account_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_account_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$name,
					$value->emp_username,
					$value->emp_dept,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addAccount(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('employee','Employee','required');
		$this->form_validation->set_rules('dept','Department','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"emp_id"=>set_value('employee'),
				"emp_username"=>set_value('username'),
				"emp_password"=>sha1(set_value('password')),
				"emp_dept"=>set_value('dept')
			);
			$add = $this->project_model->insert('emp_accounts',$data);
			if ($add != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error adding data.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}
	function editAccount(){

		$id = $this->input->get('id');
		$where = array("emp_account_id"=>$id);
		$result = $this->project_model->single_select('emp_accounts',$where);
		echo json_encode($result);
	}
	function updateAccount(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('employee','Employee','required');
		$this->form_validation->set_rules('dept','Department','required');
		$this->form_validation->set_rules('id','Data Id','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"emp_id"=>set_value('employee'),
				"emp_username"=>set_value('username'),
				"emp_password"=>sha1(set_value('password')),
				"emp_dept"=>set_value('dept')
			);
			$id = set_value('id');
			$where = array('emp_account_id'=>$id);
			$result = $this->project_model->updateNew('emp_accounts',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error adding data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteAccount(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('emp_accounts','emp_account_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	/*end of employee account method*/

	/*overtime type method*/
	function overtime_type(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Overtime Type";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();
		$data['overtime_type'] = $this->admin_model->get_table_record('overtime_type',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/overtime_type',$data);
		$this->load->view('admin/footer',$data);
	}
	function add_overtime_type(){
		$this->form_validation->set_rules('name','Overtime Type Name','required');
		$this->form_validation->set_rules('rate','Rate','required');
		$this->form_validation->set_rules('term','Term','required');

		if ($this->form_validation->run() == FALSE) {
			$this->overtime_type();
		}else{
			$data = array(
				"ot_type_name"=>set_value('name'),
				"ot_type_term"=>set_value('term'),
				"ot_rate"=>set_value('rate')
				);
			$table_name = 'overtime_type';
			$cwhere = array(
				"ot_type_name"=>ucwords(set_value('name'))
			);
			$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$cwhere);

			if ($check_duplicate != true) {
				$add = $this->admin_model->add_table_record($data,$table_name);

				if ($add == true) {
					redirect('admin/overtime_type/insert/true');
				}else{
					redirect('admin/overtime_type/insert/false');
				}
			}else{
				redirect('admin/overtime_type/duplicate/true');
			}
		}
	}
	function update_overtime_type(){
		$this->form_validation->set_rules('name','Overtime Type Name','required');
		$this->form_validation->set_rules('rate','Rate','required');
		$this->form_validation->set_rules('term','Term','required');

		if ($this->form_validation->run() == FALSE) {
			$this->overtime_type();
		}else{
			$data = array(
				"ot_type_name"=>set_value('name'),
				"ot_type_term"=>set_value('term'),
				"ot_rate"=>set_value('rate')
				);
			$table_name = 'overtime_type';
			$table_id = 'ot_type_id';
			$id = $this->input->post('id');
			$update = $this->admin_model->update_table_record($data,$id,$table_id,$table_name);

			if ($update == true) {
				redirect('admin/overtime_type/update/true');
			}else{
				redirect('admin/overtime_type/update/false');
			}
		}
	}
	function delete_overtime_type(){
		$id = $this->uri->segment(3);
		$table_name = 'overtime_type';
		$table_id = 'ot_type_id';

		$delete = $this->admin_model->delete_table_record($id,$table_name,$table_id);

		if ($delete == true) {
			redirect('admin/overtime_type/delete/true');
		}else{
			redirect('admin/overtime_type/delete/false');
		}
	}

	function fetchOt(){
		$result = array('data' => array());
		$data = $this->project_model->select('overtime_type');
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->ot_type_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->ot_type_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->ot_type_name,
					$value->ot_rate,
					$value->ot_type_term,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addOt(){
		$this->form_validation->set_rules('name','Overtime Type Name','required');
		$this->form_validation->set_rules('rate','Rate','required');
		$this->form_validation->set_rules('term','Term','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"ot_type_name"=>set_value('name'),
				"ot_type_term"=>set_value('term'),
				"ot_rate"=>set_value('rate')
				);
			$table_name = 'overtime_type';
			$cwhere = array(
				"ot_type_name"=>ucwords(set_value('name'))
			);
			$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$cwhere);
			if ($check_duplicate != true) {
				$add = $this->project_model->insert('overtime_type',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}else{
					$msg['success'] = false;
					$msg['error'] = 'Error! Duplicate record found.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}
	function editOt(){
		$id = $this->input->get('id');
		$where = array("ot_type_id"=>$id);
		$result = $this->project_model->single_select('overtime_type',$where);
		echo json_encode($result);
	}
	function updateOt(){
		$this->form_validation->set_rules('name','Overtime Type Name','required');
		$this->form_validation->set_rules('rate','Rate','required');
		$this->form_validation->set_rules('term','Term','required');
		$this->form_validation->set_rules('id','Data Id','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"ot_type_name"=>set_value('name'),
				"ot_type_term"=>set_value('term'),
				"ot_rate"=>set_value('rate')
				);
			$id = set_value('id');
			$where = array('ot_type_id'=>$id);
			$result = $this->project_model->updateNew('overtime_type',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error updating data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteOt(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('overtime_type','ot_type_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	/*end of overtime type method*/

	function punch_in(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Employee Attendance and Overtime";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();
		$emp_where = array('emp_status'=>'active');
		$data['employee'] = $this->project_model->select('employee',false,$emp_where);
		$data['ot_type'] = $this->project_model->select('overtime_type');


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('admin/property-popup',$data);
		$this->load->view('admin/punch_in',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}
	function process_punch(){
		$this->form_validation->set_rules('punch_type','Punch Type','required');
		$this->form_validation->set_rules('code','Code','required');
		$this->form_validation->set_rules('date','Date time','required');

		if ($this->form_validation->run() == FALSE) {
			$this->punch_in();
		}else{

			$like = array('emp_code'=>set_value('code'));
			$employee = $this->project_model->select('employee',$like);

			foreach ($employee as $value) {
				if (set_value('punch_type') == 'in') {
					$data = array(
					'emp_id'=>$value->emp_id,
					'time_in'=>str_replace('T', ' ', set_value('date')),
					'punch_by'=>$this->session->userdata('current_id')
					);


				}elseif(set_value('punch_type') == 'out'){
					$data = array(
					'emp_id'=>$value->emp_id,
					'time_out'=>str_replace('T', ' ', set_value('date')),
					'punch_by'=>$this->session->userdata('current_id')
					);
				}
			}

			if (set_value('punch_type') == 'in') {
				$like2 = array('time_in'=>substr(set_value('date'), 0, 10));
				$where = array('emp_id'=>$this->session->userdata('current_id'));
				$check = $this->project_model->check_multi_duplicate('emp_attendance',$where,$return=false,$like2);
				if ($check == false) {

					$in = $this->project_model->insert('emp_attendance',$data);
					if ($in == true) {
						redirect('admin/punch_in/insert/'.true.'/attendance');
					}else{
						redirect('admin/punch_in/insert/'.false.'/attendance');
					}
				}else{
					redirect('admin/punch_in/duplicate/'.true.'/attendance');
				}
			}elseif(set_value('punch_type') == 'out'){
				//$datetime = str_replace('T', ' ', set_value('date'));
				$datetime = substr(set_value('date'), 0, 10);

				$like2 = array('time_in'=>$datetime);
				$where = array('emp_id'=>$value->emp_id,'time_out'=>null);

				$check = $this->project_model->check_multi_duplicate('emp_attendance',$where,'emp_attendance_id',$like2);
				if ($check[0] == true) {
					$out = $this->project_model->update('emp_attendance','emp_attendance_id',$data,$check[1]);
					if ($out == true) {
						redirect('admin/punch_in/update/'.true.'/attendance');
					}else{
						redirect('admin/punch_in/update/'.false.'/attendance');
					}
				}else{
					redirect('admin/punch_in/duplicate/'.true.'/attendance');
				}
			}

		}
	}
	function process_ot(){
		$this->form_validation->set_rules('punch_type','Punch Type','required');
		$this->form_validation->set_rules('code','Code','required');
		$this->form_validation->set_rules('date','Date time','required');
		$this->form_validation->set_rules('ot_type','Overtime Type','required');

		if ($this->form_validation->run() == FALSE) {
			$this->punch_in();
		}else{

			$like = array('emp_code'=>set_value('code'));
			$employee = $this->project_model->select('employee',$like);

			foreach ($employee as $value) {
				if (set_value('punch_type') == 'start') {
					$data = array(
					'emp_id'=>$value->emp_id,
					'date'=>date('Y-m-d'),
					'from'=>str_replace('T', ' ', set_value('date')),
					'ot_type_id'=>set_value('ot_type'),
					'punch_by'=>$this->session->userdata('current_id')
					);
				}
			}

			if (set_value('punch_type') == 'start') {
				$like2 = array('from'=>substr(set_value('date'), 0, 10));
				$where = array('emp_id'=>$this->session->userdata('current_id'));
				$check = $this->project_model->check_multi_duplicate('emp_overtime',$where,$return=false,$like2);
				if ($check == false) {

					$in = $this->project_model->insert('emp_overtime',$data);
					if ($in == true) {
						redirect('admin/punch_in/insert/'.true.'/overtime');
					}else{
						redirect('admin/punch_in/insert/'.false.'/overtime');
					}
				}else{
					redirect('admin/punch_in/duplicate/'.true.'/overtime');
				}
			}elseif(set_value('punch_type') == 'end'){
				//$datetime = str_replace('T', ' ', set_value('date'));
				$datetime = substr(set_value('date'), 0, 10);

				$like2 = array('from'=>$datetime);
				$where = array(
					'emp_id'=>$value->emp_id,
					'to'=>null
				);

				$check = $this->project_model->check_multi_duplicate('emp_overtime',$where,'emp_overtime_id',$like2);
				if ($check[0] == true) {
					$where2 = array('emp_overtime_id'=>$check[1]);
					$record = $this->project_model->select('emp_overtime',false,$where2);

					foreach ($record as $value2) {
						$date1 = new DateTime($value2->from);
						$date2 = new DateTime(set_value('date'));
						$num_hours = $date1->diff($date2);

						$data = array(
							'num_hours'=>$num_hours->format('%H'),
							'to'=>str_replace("T", " ", set_value('date'))
						);
					}

					$out = $this->project_model->update('emp_overtime','emp_overtime_id',$data,$check[1]);
					if ($out == true) {
						redirect('admin/punch_in/update/'.true.'/overtime');
					}else{
						redirect('admin/punch_in/update/'.false.'/overtime');
					}
				}else{
					redirect('admin/punch_in/duplicate/'.true.'/overtime');
				}
			}

		}
	}

/*====== Store Menu =========*/
	function store_menu(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Store Menu";
		$data['page'] = 'Stock';

		$data['menu'] = $this->admin_model->get_table_record('store_menu',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('admin/restaurant_menu',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function getMenuData(){
		$result = array('data' => array());

		$data = $this->project_model->select('store_menu');

		foreach ($data as $key => $value) {
			$buttons = '
				<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->menu_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
				<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->menu_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
			';
			$result['data'][$key] = array(
				$value->menu_name,
				$buttons
			);
		}

		echo json_encode($result);
	}

	function getStockCat(){
		$result = array('data' => array());

		$data = $this->project_model->select('stockCategory');
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-success copy-category" data="'.$value->stockCat_id.'" title="Cancel"> <i class="fa fa-angle-double-left"></i></a>
				';
				$result['data'][$key] = array(
					$buttons,
					$value->stockCat_name
				);
			}
		}

		echo json_encode($result);
	}

	function addMenu(){
		$data = array(
			'menu_name'=>ucwords($this->input->post('menu'))
		);
		$where = array('menu_name'=>$this->input->post('menu'));

		$process = $this-> processAddMenu($data,$where);
		$msg['type'] = 'add';
		if ($process != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	private function processAddMenu($data,$where){
		$check = $this->project_model->check_multi_duplicate('store_menu',$where);
		if ($check != true) {
			$insert = $this->project_model->insert('store_menu',$data);
			if ($insert != false) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function editMenu(){
		$id = $this->input->get('id');
		$where = array("menu_id"=>$id);
		$result = $this->project_model->single_select('store_menu',$where);
		echo json_encode($result);
	}

	function updateMenu(){
		$msg['type'] = 'update';
		$data = array(
			'menu_name'=>$this->input->post('menu')
		);
		$id = $this->input->post('menuId');
		$where =  array('menu_id'=>$id);
		$result = $this->project_model->updateNew('store_menu',$where,$data);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function deleteMenu(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('store_menu','menu_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function loadMenu(){
		$id = $this->input->get('id');
		if ($this->processLoadMenu($id) != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}
	private function processLoadMenu($id){
		$where = array("stockCat_id"=>$id);
		$get = $this->project_model->select('stockcategory',false,$where);
		if ($get != false) {
			foreach ($get as $getdata) {
				$check_where = array('menu_name'=>$getdata->stockCat_name);
				$check = $this->project_model->check_multi_duplicate('store_menu',$check_where);

				if ($check != true) {
					$data = array(
						"menu_name"=>$getdata->stockCat_name
					);

					$insert = $this->project_model->insert('store_menu',$data);

					if ($insert != false) {
						return true;
					}else{
						return false;
						//return "error insert";
					}
				}else{
					return false;
					//return "error check";
				}
			}
		}else{
			return false;
			//return "error get";
		}
	}

/*====== Store Item =========*/

	function menu_item(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Store Item";
		$data['page'] = 'Stock';

		$data['menu'] = $this->admin_model->get_table_record('store_menu',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('admin/restaurant_menu_item',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function getRestuItems(){
		$result = array('data' => array());

		$join = array(
				array('store_menu','menu_item','menu_id')
			);
		$data = $this->project_model->select_join('menu_item',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$tcost = $this->cart->format_number($value->item_price*$value->stock);
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->menu_item_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->menu_item_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->menu_name,
					$value->item_name,
					$value->unit,
					$value->stock_type,
					$value->stock,
					$value->item_price,
					$tcost,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}

	function editMenuItem(){
		$id = $this->input->get('id');
		$where = array("menu_item_id"=>$id);
		$result = $this->project_model->single_select('menu_item',$where);
		echo json_encode($result);
	}

	function updateMenuItem(){
		$msg['type'] = 'update';
		$type = $this->input->post('stock_type');
		if ($type == "instock") {
			$data = array(
				'menu_id'=>$this->input->post('category'),
				'item_name'=>ucwords($this->input->post('name')),
				'item_price'=>$this->input->post('cost'),
				'stock'=>$this->input->post('qty'),
				'unit'=>$this->input->post('unit'),
				'stock_type'=>$this->input->post('stock_type'),
				'stock_dispose'=>$this->input->post('dispose')
			);
		}else{
			$data = array(
					'menu_id'=>$this->input->post('category'),
					'item_name'=>ucwords($this->input->post('name')),
					'item_price'=>$this->input->post('cost'),
					'stock'=>0,
					'unit'=>'none',
					'stock_type'=>$this->input->post('stock_type')
			);
		}
		$id = $this->input->post('id');
		$where =  array('menu_item_id'=>$id);
		$result = $this->project_model->updateNew('menu_item',$where,$data);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function addRestoItem(){
		$type = $this->input->post('stock_type');
		$where = array(
		'item_name'=>$this->input->post('name')
		);
		if ($type == "instock") {
			$data = array(
				'menu_id'=>$this->input->post('category'),
				'item_name'=>ucwords($this->input->post('name')),
				'item_price'=>$this->input->post('cost'),
				'stock'=>$this->input->post('qty'),
				'unit'=>$this->input->post('unit'),
				'stock_type'=>$this->input->post('stock_type')
			);
		}else{
			$data = array(
					'menu_id'=>$this->input->post('category'),
					'item_name'=>ucwords($this->input->post('name')),
					'item_price'=>$this->input->post('cost'),
					'stock'=>0,
					'unit'=>'none',
					'stock_type'=>$this->input->post('stock_type')
			);
		}

		if ($this->processaddRestoItem($type,$data,$where) != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);

	}
	private function processaddRestoItem($type,$data,$where){
		$table_name = 'menu_item';
		if($type == 'instock'){
				$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$where);
				if ($check_duplicate != true) {
					$add = $this->project_model->insert($table_name,$data);
					if ($add != false) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
		}else{
			$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$where);

			if ($check_duplicate != true) {
				$add = $this->project_model->insert($table_name,$data);

				if ($add != false) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}

	function loadRestuItem(){
		$id = $this->input->post('category');

		if ($this->processLoadRestuItem($id) != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}
	private function processLoadRestuItem($id){
		//get cat info
		$where1 = array("stockCat_id"=>$id);
		$menu = $this->project_model->select('stockcategory',false,$where1);
		foreach ($menu as $value) {
			$name = $value->stockCat_name;
			$where2 = array('menu_name'=>$name);
			$valmenu = $this->project_model->select('store_menu',false,$where2);
			if ($valmenu != false) {
				foreach ($valmenu as $value2) {
					$menuid = $value2->menu_id;

					$where = array(
						"stockCat_id"=>$id
					);
					$item = $this->project_model->select('stockitem',false,$where);
					if ($item != false) {
						$data = array();
						foreach ($item as $value) {
							$data[] = array(
							"menu_id"=>$menuid,
							"item_name"=>$value->stock_name,
							"unit"=>$value->stock_unit,
							"stock"=>0,
							"item_price"=>$value->stockCost	,
							"stock_type"=>'instock'
							);
						}

						$result = $this->project_model->insert_batch('menu_item',$data);

						if ($result != false) {
							return true;
						}else{
							return "error insert";
						}
					}else{
						return "error item";
					}
				}
			}else{
				return "error menu";
				//if category not found in restaurant menu
			}
		}
	}

	function deleteMenuItem(){
		$id = $this->input->get('id');
		$result = $this->processDeleteMenuItem($id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function bulkDeleteRestu(){
		$id = $this->input->post('idcat');
		$result = $this->processBulkDeleteRestu($id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function fetchCategoryRestu(){
		$join = array(
			array('store_menu','menu_item','menu_id')
		);
		$groupby = 'menu_name';
		$tempData = $this->project_model->select_join('menu_item',$join,false,false,false,$groupby);
		$where_not_in = array();

		if ($tempData) {
			foreach ($tempData as $value) {
				$where_not_in[] = $value->menu_name;
			}
		}else{
			$where_not_in[] = "";
		}
		$result = $this->project_model->select('stockcategory',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$where_not_in,'stockCat_name');

		echo json_encode($result);
	}

	function fetchRestuCat(){
		$join = array(
			array('store_menu','menu_item','menu_id')
		);
		$groupby = 'menu_name';
		$result = $this->project_model->select_join('menu_item',$join,false,false,false,$groupby);

		echo json_encode($result);
	}

	private function processDeleteMenuItem($id){
		$where = array('menu_item_id'=>$id);
		$get = $this->project_model->select('menu_item',false,$where);
		if ($get != false) {
			foreach ($get as $value) {
				if ($value->stock_type == "instock") {
					$name = $value->item_name;
					$stock = $value->stock;

					if ($stock > 0) {
						$where2 = array('stock_name'=>$name);
						$getstock = $this->project_model->select('stockitem',false,$where2);
						if ($getstock != false) {
							foreach ($getstock as $value2) {
								$item = $value2->stock_id;
								$newstock = $value2->stock_qqty+$stock;
								$newdispose = $value2->stockDispose-$stock;

								$where3 = array("stock_id"=>$item);
								$data = array(
									"stock_qqty"=>$newstock,
									"stockDispose"=>$newdispose
								);
								$update = $this->project_model->updateNew("stockitem",$where3,$data);
								if ($update != false) {
									$where4 = array('menu_item_id'=>$id);
									$delete = $this->project_model->deleteNew('menu_item',$where4);
									if ($delete != false) {
										return true;
									}else{
										return "error delete";
									}
								}else{
									return "error update";
								}
							}

						}else{
							return "error get stock";
						}
					}else{
						$where4 = array('menu_item_id'=>$id);
						$delete = $this->project_model->deleteNew('menu_item',$where4);
						if ($delete != false) {
							return true;
						}else{
							return "error delete";
						}
					}

				}else{
					$where = array('menu_item_id'=>$id);
					$delete = $this->project_model->deleteNew('menu_item',$where);
					if ($delete != false) {
						return true;
					}else{
						return false;
					}
				}

			}
		}else{
			return false;
		}
	}
	private function processBulkDeleteRestu($id){
		$where = array('menu_id'=>$id);
		$get = $this->project_model->select('menu_item',false,$where);
		if ($get != false) {
			$count = count($get);
			$i = 0;
			foreach ($get as $value) {
				$type = $value->stock_type;
				if ($type == "instock") {
					$name = $value->item_name;
					$stock = $value->stock;

					if ($stock != 0) {
						$where2 = array('stock_name'=>$name);
						$getstock = $this->project_model->select('stockitem',false,$where2);
						if ($getstock != false) {
							foreach ($getstock as $value2) {
								$item = $value2->stock_id;
								$newstock = $value2->stock_qqty+$stock;
								$newdispose = $value2->stockDispose-$stock;

								$where3 = array("stock_id"=>$item);
								$data = array(
									"stock_qqty"=>$newstock,
									"stockDispose"=>$newdispose
								);
								$update = $this->project_model->updateNew("stockitem",$where3,$data);
								if ($update != false) {
									$i++;
								}else{
									//return false;
									echo "error 1";
								}
							}

						}else{
							//return false;
							echo "error 2";
						}
					}else{
						$i++;
					}


				}else{
					$i++;
				}

			}

			if ($i == $count ) {
				$where = array('menu_id'=>$id);
				$delete = $this->project_model->deleteNew('menu_item',$where);
				if ($delete != false) {
					return true;
				}else{
					//return false;
					echo "error 3";
				}

			}
			else{
				//return false;
				echo "error 4";
			}
		}else{
			//return false;
			echo "error menu item.";
		}
	}

	function getManualRestuItem(){
		$result = array('data' => array());
		$where_not_in = array();
		$getItems = $this->project_model->select('menu_item');
		if($getItems != false){
			foreach($getItems as $val){
				$where_not_in[] = $val->item_name;
			}
		}

		$wni_column = "stock_name";
		$join = array(
			array('stockcategory','stockitem','stockCat_id')
		);
		$data = $this->project_model->select_join("stockitem",$join,$like=false,$where=false,$order=false,$group=false,$or_where=false,$or_like=false,$where_not_in,$wni_column,$where_in = false);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="item-add btn btn-success" data="'.$value->stock_id.'"> <i class="fa fa-plus fa-fw"></i> add</a>
				';
				$result['data'][$key] = array(
					$buttons,
					$value->stockCat_name,
					$value->stock_name,
					$value->stock_unit,
					$value->stock_qqty
				);
			}
		}
		echo json_encode($result);
	}

	function manualAddRestu(){
		$id = $this->input->get('id');

		$result = $this->processmanualAddRestu($id);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	private function processmanualAddRestu($id){
		$where = array("stock_id"=>$id);
		$join = array(
				array("stockcategory","stockitem","stockCat_id")
			);
		$get = $this->project_model->single_select('stockitem',$where,$join);
		if ($get != false) {
			$where2 = array('menu_name'=>$get->stockCat_name);
			$getmenu = $this->project_model->single_select('store_menu',$where2);
			if ($getmenu != false) {
				$data = array(
					"menu_id"=>$getmenu->menu_id,
					"item_name"=>$get->stock_name,
					"unit"=>$get->stock_unit,
					"stock"=>0,
					"item_price"=>$get->stockCost
				);

				$where2 = array('item_name'=>$get->stock_name);
				$check = $this->project_model->check_multi_duplicate("menu_item",$where2);
				if($check != true){
					$insert = $this->project_model->insert("menu_item",$data);
					if($insert != false){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


/*End of restaurant functions*/

/*====================*/

/*====== printable forms*/

	function receipt_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Unofficial Receipt';
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/resort_receipt_form',$data);
		$this->load->view('admin/footer',$data);
	}

	function bill_record_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Reprinted Unofficial Receipt';

		$where = array(
			"check_in_bill.check_in_id"=>$this->uri->segment(3)
		);
		$main_table = "check_in_bill";
		$array = array(
			array('check_in',$main_table,'check_in_id'),
			array('guest','check_in','guest_id'),
			array('employee',$main_table,'emp_id')
			);
		$data['bill'] = $this->admin_model->join_record($main_table, $array, false,$where);

		$where2 = array(
			"order.check_in_id"=>$this->uri->segment(3)
		);
		$main_table2 = "order";
		$array2 = array(
			array('ordered_item',$main_table2,'order_id')
			);
		$data['restaurant_charges'] = $this->admin_model->join_record($main_table2, $array2, false,$where2);

		$where3 = array('check_in_id'=>$this->uri->segment(3));
		$data['charges']= $this->admin_model->get_table_record('check_in_charges',$where3,false,false);
		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$data['employee'] = false;
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/hotel_receipt_form',$data);
		$this->load->view('admin/footer',$data);
	}

	function restaurant_bill_record(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Reprinted Purchase Receipt';

		$where = array(
			"order.order_id"=>$this->uri->segment(3)
		);

		$main_table = "order";
		$array = array(
			array('employee',$main_table,'emp_id')
			);
		$data['bill'] = $this->admin_model->join_record($main_table, $array, false,$where);

		$main_table2 = "ordered_item";
		/*$array2 = array(
			array('menu_item',$main_table2,'menu_item_id')
			);*/
		$where2 = array(
			'order_id'=>$this->uri->segment(3)
			);
		$data['items']= $this->admin_model->get_table_record($main_table2,$where2);


		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$data['employee'] = false;

		$this->load->view('admin/header',$data);
		$this->load->view('content/receipt_form',$data);
		$this->load->view('admin/footer',$data);
		$this->cart->destroy();
	}

	function swimming_bill_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Swimming Profit Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$date = $year.'-'.$month;

		$main_table = "swimming_ticket";
		$array = array(
			array('employee',$main_table,'emp_id')
			);
		$like = array(
			"swimming_ticket.issued_date"=>$date
		);
		$data['bill'] = $this->admin_model->join_record($main_table, $array, false,false,$like);

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/swimming_payment_list',$data);
		$this->load->view('admin/footer',$data);
		$this->cart->destroy();
	}

	function restaurant_bill_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Restaurant Sales Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$date = $year.'-'.$month;

		$main_table = "order";
		$array = array(
			array('employee',$main_table,'emp_id')
			);
		$like = array(
			"order.order_date"=>$date
		);
		$data['bill'] = $this->admin_model->select_join($main_table,$array,$like);

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/restaurant_bill_list',$data);
		$this->load->view('admin/footer',$data);
	}

	function bill_record_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Payment Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$guest = $this->uri->segment(5);
		$date = $year.'-'.$month;

		if($guest == 'all'){
			$main_table = "check_in_bill";
			$array = array(
				array('check_in',$main_table,'check_in_id'),
				array('guest','check_in','guest_id')
				);

			$like = array("check_in_bill.bill_payment_date"=>$date);
			$data['bill'] = $this->admin_model->join_record($main_table,$array,false,false,$like);
		}else{
			$main_table = "check_in_bill";
			$array = array(
				array('check_in',$main_table,'check_in_id'),
				array('guest','check_in','guest_id')
				);
			$where = array(
				"check_in.guest_id"=>$guest
			);
			$like = array("check_in_bill.bill_payment_date"=>$date);
			$data['bill'] = $this->admin_model->join_record($main_table,$array,false,$where,$like);
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/bill_record_list',$data);
		$this->load->view('admin/footer',$data);

	}

	function balance_record_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Balance Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$guest = $this->uri->segment(5);

		if($guest == 'all'){
			$main_table = "check_in_bill";
			$array = array(
				array('check_in',$main_table,'check_in_id'),
				array('guest','check_in','guest_id')
				);
			$like = array(
				"check_in_bill.balance_payment_date"=>$year.'-'.$month
			);
			$where = array("check_in_bill.balance < "=>0);
			$data['bill'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}else{
			$main_table = "check_in_bill";
			$array = array(
				array('check_in',$main_table,'check_in_id'),
				array('guest','check_in','guest_id')
				);
			$where = array(
				"check_in.guest_id"=>$guest,
				"check_in_bill.balance < "=>0
			);
			$like = array("check_in_bill.balance_payment_date"=>$year.'-'.$month);
			$data['bill'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/balance_record_list',$data);
		$this->load->view('admin/footer',$data);

	}

	function ot_record_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Employee Overtime Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$employee = $this->uri->segment(5);
		$date = $year.'-'.$month;

		if($employee == 'all'){
			$main_table = "emp_overtime";
			$array = array(
				array('employee',$main_table,'emp_id'),
				array('overtime_type',$main_table,'ot_type_id')
				);
			$where = array(
				"employee.emp_status"=>"active"
			);
			$like = array(
				"emp_overtime.date"=>$date
			);
			$data['ot'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}else{
			$main_table = "emp_overtime";
			$array = array(
				array('employee',$main_table,'emp_id'),
				array('overtime_type',$main_table,'ot_type_id')
				);
			$where = array(
				"employee.emp_status"=>"active",
				"employee.emp_id"=>$employee
				);
			$like = array(
				"emp_overtime.date"=>$date
			);
			$data['ot'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);;
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/emp_ot_record',$data);
		$this->load->view('admin/footer',$data);
	}

	function credit_record_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Employee Credit Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$employee = $this->uri->segment(5);
		$date = $year.'-'.$month;

		if($employee == 'all'){
			$main_table = "emp_credits";
			$array = array(
				array('employee',$main_table,'emp_id')
				);
			$where = array(
				"employee.emp_status"=>"active"
			);
			$like = array(
				"emp_credits.credit_date"=>$date
			);
			$data['credit'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}else{
			$main_table = "emp_credits";
			$array = array(
				array('employee',$main_table,'emp_id')
				);
			$where = array(
				"employee.emp_status"=>"active",
				"employee.emp_id"=>$employee
				);
			$like = array(
				"emp_credits.credit_date"=>$date
			);
			$data['credit'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/credit_record_list',$data);
		$this->load->view('admin/footer',$data);
		$this->cart->destroy();
	}

	function attendance_record_list(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Employee Attendance Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$employee = $this->uri->segment(5);
		$date = $year.'-'.$month;

		if($employee == 'all'){
			$main_table = "emp_attendance";
			$array = array(
				array('employee',$main_table,'emp_id')
				);
			$where = array(
				"employee.emp_status"=>"active"
			);
			$like = array(
				"emp_attendance.time_in"=>$date
			);
			$data['attend'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}else{
			$main_table = "emp_attendance";
			$array = array(
				array('employee',$main_table,'emp_id')
				);
			$where = array(
				"employee.emp_status"=>"active",
				"employee.emp_id"=>$employee
				);
			$like = array(
				"emp_attendance.time_in"=>$date
			);
			$data['attend'] = $this->admin_model->join_record($main_table, $array, false,$where,$like);
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/attendance_list',$data);
		$this->load->view('admin/footer',$data);

	}

	function attendance_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Attendance Sheet';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/attendance_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function credit_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Employee Credit Sheet';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/credit_sheet',$data);
		$this->load->view('admin/footer',$data);
	}
	function empsales_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Employee Sales Form';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/empsales_form',$data);
		$this->load->view('admin/footer',$data);
	}


	function overtime_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Overtime Sheet';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/overtime_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function miscexp_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Miscellaneous Expenses';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/misc_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function prodexp_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Production Item';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/prod_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function equipexp_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Equipment Expenses';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/equip_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function stockexp_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Stock Expenses';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/stocks_sheet',$data);
		$this->load->view('admin/footer',$data);
	}

	function stockList_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Stock Inventory';

		$order = array('stockCat_id','ASC');
		$join = array(
			array('stockcategory','stockitem','stockCat_id')
		);
		$data['result'] = $this->project_model->select_join('stockitem',$join,$like=false,$where=false,$order);
		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/stocklist',$data);
		$this->load->view('admin/footer',$data);
	}

	private function is_log_in(){
		if($this->session->userdata('isposadmin_log') == false){
			redirect('main');
		}
	}

	function logout(){
		if ($this->session->userdata('isposadmin_log') == true) {
			$this->session->unset_userdata('isposadmin_log');
			redirect('main');
		}
	}

	function backup_db(){
		$this->load->library('ota_mysql_backup');

		$result = $this->ota_mysql_backup->backup();

		// Return in string and force client to download the file
		$this->load->helper('download');
		$filename = 'backup-db-'.date('Y-m-d').'.sql';
		force_download($filename, $result);
	}
	function clear_session(){
		$sess_array = array(
			"column"=>null,
			"data"=>null,
			);
		$this->session->unset_userdata($sess_array);

		if ($this->uri->segment(3) == "rooms") {
			redirect('admin/rooms/session/true/cleared');
		}
		if ($this->uri->segment(3) == "menu_item") {
			redirect('admin/menu_item/session/true/cleared');
		}
		if ($this->uri->segment(3) == "extra_charges") {
			redirect('admin/extra_charges/session/true/cleared');
		}

	}

/*====== Stock Settings*/
	function storageHOme(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Activity Overview";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/storageHOme',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}
	function stockItem(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Room Items Management";
		$data['page'] = 'Stock';

		$data['category'] = $this->project_model->select('stockcategory');
		$data['stockclass'] = $this->project_model->select('stock_class');
		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('storage/stockItems',$data);
		$this->load->view('admin/footer',$data);
	}
	function stockCategory(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Category";
		$data['page'] = 'Stock';

		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('storage/stockCategory',$data);
		$this->load->view('admin/footer',$data);
	}
	function stockClass(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Class";
		$data['page'] = 'Stock';

		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('storage/stockclass',$data);
		$this->load->view('admin/footer',$data);
	}

	function officeStocks(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Office Stock Management";
		$data['page'] = 'Stock';

		$data['category'] = $this->project_model->select('stockcategory');
		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/officeStocks',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchOfficeCat(){
		$join = array(
			array('stockcategory','officeitems','stockCat_id')
		);
		$groupby = 'stockCat_name';
		$result = $this->project_model->select_join('officeitems',$join,false,false,false,$groupby);

		echo json_encode($result);
	}
	function fetchCategory(){
		$join = array(
			array('stockcategory','hotelitems','stockCat_id')
		);
		$groupby = 'stockCat_name';
		$tempData = $this->project_model->select_join('hotelitems',$join,false,false,false,$groupby);
		$where_not_in = array();

		if ($tempData) {
			foreach ($tempData as $value) {
				$where_not_in[] = $value->stockCat_name;
			}
		}else{
			$where_not_in[] = "";
		}

		$result = $this->project_model->select('stockcategory',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$where_not_in,'stockCat_name');

		echo json_encode($result);
	}

	function productionItems(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Production Stock Management";
		$data['page'] = 'Stock';

		$data['category'] = $this->project_model->select('stockcategory');
		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/productionStocks',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchProductionCat(){
		$join = array(
			array('stockcategory','productionitems','stockCat_id')
		);
		$groupby = 'stockCat_name';
		$result = $this->project_model->select_join('productionitems',$join,false,false,false,$groupby);

		echo json_encode($result);
	}
	function fetchCategoryProd(){
		$join = array(
			array('stockcategory','productionitems','stockCat_id')
		);
		$groupby = 'stockCat_name';
		$tempData = $this->project_model->select_join('productionitems',$join,false,false,false,$groupby);
		$where_not_in = array();

		if ($tempData) {
			foreach ($tempData as $value) {
				$where_not_in[] = $value->stockCat_name;
			}
		}else{
			$where_not_in[] = "";
		}

		$result = $this->project_model->select('stockcategory',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$where_not_in,'stockCat_name');

		echo json_encode($result);
	}

	function proExpGuide(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Production Expenses List";
		$data['page'] = 'Stock';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/prodExpGuide',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchExpGuide(){
		$result = array('data' => array());

		$join = array(
			array('stockcategory','prodexplist','stockCat_id')
		);
		$data = $this->project_model->select_join('prodexplist',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="item-edit" title="edit" data="'.$value->expguide_id.'"><i class="fa fa-pencil fa-2x"></i></a>
					<a href="javascript:;" title="delete" class="item-delete" data="'.$value->expguide_id.'"><i class="fa fa-trash fa-2x"></i></a>
				';
				$result['data'][$key] = array(
					$value->stockCat_name,
					$value->expguide_desc,
					$value->expguide_note,
					$value->expguide_unit,
					$value->expguide_cost,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function add_ExpGuide(){
		$this->form_validation->set_rules('cat','Category','required');
		$this->form_validation->set_rules('desc','Desciption','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('cost','Cost','required');
		$this->form_validation->set_rules('note','Note','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				'expguide_desc'=>ucwords(set_value('desc')),
				'expguide_unit'=>set_value('unit'),
				'expguide_cost'=>set_value('cost'),
				'expguide_note'=>set_value('note'),
				'stockCat_id'=>set_value('cat')
			);
			$add = $this->project_model->insert('proexplist',$data);
			if ($add != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error adding data.';
			}
		}
		$msg['type'] = 'Add';
		echo json_encode($msg);
	}

/*====== Category AJAX ======*/
	function fetchStockCat(){
		$result = array('data' => array());

		$data = $this->project_model->select('stockcategory');

		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stockCat_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stockCat_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->stockCat_name,
					$buttons
				);
			}
		}


		echo json_encode($result);
	}
	function addCategory(){
		$where  = array('stockCat_name'=>ucwords($this->input->post('category')));
		$data = array(
			'stockCat_name'=>ucwords($this->input->post('category'))
			);
		$process = $this->processAddCategory($data,$where);

		$msg['type'] = 'add';
		if ($process != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	private function processAddCategory($data,$where){
		$check = $this->project_model->check_multi_duplicate('stockCategory',$where);
		if ($check != true) {
			$insert = $this->project_model->insert('stockCategory',$data);
			if ($insert != false) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function editStockCategory(){
		$id = $this->input->get('id');
		$where = array("stockCat_id"=>$id);
		$result = $this->project_model->single_select('stockcategory',$where);
		echo json_encode($result);
	}
	function updateCategory(){
		$msg['type'] = 'update';
		$data = array(
			'stockCat_name'=>$this->input->post('category')
		);
		$id = $this->input->post('catId');
		$where =  array('stockCat_id'=>$id);
		$result = $this->project_model->updateNew('stockcategory',$where,$data);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	function deleteCategory(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('stockcategory','stockCat_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

/*====== Stock Item AJAX ======*/
	function fetchStockItem(){
		$result = array('data' => array());

		$join = array(
				array('stockcategory','stockitem','stockCat_id')
			);
		$data = $this->project_model->select_join('stockitem',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$tcost = $this->cart->format_number($value->stockCost*$value->stock_qqty);
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stock_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stock_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->stockCat_name,
					$value->stock_name,
					$value->stock_unit,
					$value->stock_qqty,
					$value->stockCost,
					$tcost,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function createItem(){
		$type = $this->input->post('stock_type');
		if ($type == "instock") {
			$data = array(
				"stockCat_id"=>$this->input->post('category'),
				"stock_name"=>ucwords($this->input->post('name')),
				"stock_unit"=>$this->input->post('unit'),
				"stock_qqty"=>$this->input->post('qty'),
				"stockCost"=>$this->input->post('cost'),
				"stockclass_id"=>$this->input->post('stockclass'),
				"stock_type"=>$this->input->post('stock_type')
			);
		}else{
			$data = array(
				"stockCat_id"=>$this->input->post('category'),
				"stock_name"=>ucwords($this->input->post('name')),
				"stock_unit"=>'none',
				"stock_qqty"=>0,
				"stockclass_id"=>$this->input->post('stockclass'),
				"stockCost"=>$this->input->post('cost'),
				"stock_type"=>$this->input->post('stock_type')
			);
		}

		$result = $this->project_model->insert('stockitem',$data);

		$msg['type'] = 'add';
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}
	function editStock(){

		$id = $this->input->get('id');
		$where = array("stock_id"=>$id);
		$result = $this->project_model->single_select('stockitem',$where);
		echo json_encode($result);
	}
	function updateItem(){
		$msg['type'] = 'update';
		$type = $this->input->post('stock_type');
		if ($type == "instock") {
			$data = array(
				"stockCat_id"=>$this->input->post('category'),
				"stock_name"=>ucwords($this->input->post('name')),
				"stock_unit"=>$this->input->post('unit'),
				"stock_qqty"=>$this->input->post('qty'),
				"stockCost"=>$this->input->post('cost'),
				"stockclass_id"=>$this->input->post('stockclass'),
				"stock_type"=>$this->input->post('stock_type')
			);
		}else{
			$data = array(
				"stockCat_id"=>$this->input->post('category'),
				"stock_name"=>ucwords($this->input->post('name')),
				"stock_unit"=>'none',
				"stock_qqty"=>0,
				"stockclass_id"=>$this->input->post('stockclass'),
				"stockCost"=>$this->input->post('cost'),
				"stock_type"=>$this->input->post('stock_type')
			);
		}
		$id = $this->input->post('id');
		$where = array('stock_id'=>$id);
		$result = $this->project_model->updateNew('stockitem',$where,$data);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);

	}
	function deleteItem(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('stockitem','stock_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

/*====== Distribution Channels ======*/
	function fetchStockClass(){
		$result = array('data' => array());

		$data = $this->project_model->select('stock_class');

		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stockclass_id.'" title="Print"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stockclass_id.'" title="Select"><i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->stockclass_name,
					$buttons
				);
			}
		}

		echo json_encode($result);
	}
	function addClass(){
		$data = array(
			'stockclass_name'=>ucwords($this->input->post('class')),
			);
		$where =  array("stockclass_name"=>ucwords($this->input->post('class')));
		$process = $this->processAddClass($data,$where);
		$msg['type'] = 'add';
		if ($process != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	private function processAddClass($data,$where){
		$check = $this->project_model->check_multi_duplicate('stock_class',$where);
		if ($check != true) {
			$insert = $this->project_model->insert('stock_class',$data);
			if ($insert != false) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function editClass(){
		$id = $this->input->get('id');
		$where = array("stockclass_id"=>$id);
		$result = $this->project_model->single_select('stock_class',$where);
		echo json_encode($result);
	}
	function updateClass(){
		$msg['type'] = 'update';
		$data = array(
			'stockclass_name'=>$this->input->post('class')
		);
		$id = $this->input->post('classId');
		$where = array('stockclass_id'=>$id);
		$result = $this->project_model->updateNew('stock_class',$where,$data);
		if ($result != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
	function deleteClass(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('stock_class','stockclass_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

/*====== Monitoring ==========*/
	function stockRoomMonitoring(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Room Monitoring";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/stockRoomMonitoring',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchStockRoom(){
		$result = array('data' => array());
		$where = array("stockDispose >"=>0);
		$join = array(
				array('stockcategory','stockitem','stockCat_id')
			);
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
					$result['data'][$key] = array(
						$value->stockCat_name,
						$value->stock_name,
						$value->stock_unit,
						$value->stock_qqty,
						$value->stockDispose,
						$value->lastStock
					);
				}
			}

		echo json_encode($result);
	}

	function storeMonitoring(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Store Stock Monitoring";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/storeMonitoring',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchStoreItem(){
		$result = array('data' => array());

		$where = array(
			"stock_type"=>"instock",
			"stock_dispose >"=>0
		);
		$data = $this->project_model->select('menu_item',false,$where);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$tstock = $value->stock + $value->stock_dispose;
				$stock = $value->stock;
				if ($stock < $tstock) {
					$result['data'][$key] = array(
						$value->item_name,
						$value->unit,
						$value->stock,
						$value->stock_dispose
					);
				}

			}
		}
		echo json_encode($result);
	}

	function officeMonitoring(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Office Item Monitoring";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/officeMonitoring',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function getMonOfficeItem(){
		$result = array('data' => array());
		$where = array("offitem_dispose >"=>0);
		$data= $this->project_model->select('officeitems',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$result['data'][$key] = array(
					$value->offitem_name,
					$value->offitem_unit,
					$value->offitem_stock,
					$value->offitem_dispose
				);
			}
		}

		echo json_encode($result);
	}

	function productionMonitoring(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Production Item Monitoring";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('storage/productionMonitoring',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchProductionMonItem(){
		$result = array('data' => array());

		$where = array("proditem_dispose >"=>0);
		$data = $this->project_model->select('productionitems',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$result['data'][$key] = array(
					$value->proditem_name,
					$value->proditem_unit,
					$value->proditem_stock,
					$value->proditem_dispose
				);
			}
		}
		echo json_encode($result);
	}

	function dataOverview(){
		$data['tcategory'] = $this->project_model->countRows('stockCategory');
		$data['titem'] = $this->project_model->countRows('stockitem');
		$instock = $this->project_model->select('stockitem',false,array('stock_qqty >'=>0));
		$tinstock = 0;
		$tinstockcost = 0;
		if ($instock != false) {
			foreach ($instock as $value) {
				$tinstock = $tinstock + $value->stock_qqty;
				$initcost = $value->stock_qqty * $value->stockCost;
				$tinstockcost = $tinstockcost + $initcost;
				$data['tinstockcost'] = $this->cart->format_number($tinstockcost);
				$data['tinstock'] = $tinstock;
			}
		}
		$dispose = $this->project_model->select('stockitem',false,array('stockDispose >'=>0));
		$tdispose = 0;
		$tdisposecost = 0;
		if ($dispose != false) {
			foreach ($instock as $value) {
				$tdispose = $tdispose + $value->stockDispose;
				$data['tdispose'] = $tdispose;

				$initdisposecost = $tdispose * $value->stockCost;
				$tdisposecost = $tdisposecost + $initdisposecost;
				$data['tdisposecost'] = $this->cart->format_number($tdisposecost);
			}
		}

		$kitchen = $this->project_model->select('productionitems');
		$tkitstock = 0;
		$tkitstockcost = 0;
		if ($kitchen != false) {
			foreach ($kitchen as $value) {
				$tkitstock = $tkitstock + $value->proditem_stock;
				$data['tkitstock'] = $tkitstock;

				$initkitcost = $value->proditem_stock * $value->proditem_cost;
				$tkitstockcost = $tkitstockcost + $initkitcost;
				$data['tkitstockcost'] = $this->cart->format_number($tkitstockcost);
			}
		}

		$office = $this->project_model->select('officeitems');
		$thotstock = 0;
		$thotstockcost = 0;
		if ($office != false) {
			foreach ($office as $value) {
				$thotstock = $thotstock + $value->offitem_stock;
				$data['thotstock'] = $thotstock;

				$inithotcost = $value->offitem_stock * $value->offitem_cost;
				$thotstockcost = $thotstockcost + $inithotcost;
				$data['thotstockcost'] = $this->cart->format_number($thotstockcost);
			}
		}

		$resto = $this->project_model->select('menu_item');
		$trestostock = 0;
		$trestostockcost = 0;
		if ($resto != false) {
			foreach ($resto as $value) {
				$trestostock = $trestostock + $value->stock;
				$data['trestostock'] = $trestostock;

				$initrestocost = $value->stock * $value->item_price;
				$trestostockcost = $trestostockcost + $initrestocost;
				$data['trestostockcost'] = $this->cart->format_number($trestostockcost);
			}
		}

		echo json_encode($data);
	}

	function releaseItemReport(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Review Release Items";
		$data['page'] = 'monitoring';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('stockMan/releaseItemsReport',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function getReleaseItem(){
		$result = array('data' => array());
		$join = array(
			array('stockchannel','releasecart','channel_id')
			);
		$where = array("releasing_status"=>"released");
		$data = $this->project_model->select_join('releasecart',$join,false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = base_url('admin/printReleaseItem/'.$value->releaseCart_id);
				$buttons = '<a href="javascript:;" class="print" data="'.$link.'"><i class="fa fa-print fa-2x"></i></a>';

				$result['data'][$key] = array(
					$value->release_code,
					$value->channel_name,
					$value->release_date,
					$buttons
				);
			}
		}

		echo json_encode($result);
	}

	function printReleaseItem(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Store";
		$data['page'] = 'Release Item Report';

		$id = $this->uri->segment(3);
		$where = array("releaseditem.releaseCart_id " => $id);
		$join = array(
			array('releasecart','releaseditem','releaseCart_id'),
			array('stockcategory','releaseditem','stockCat_id')
			);
		$order = array('release_item_id','ASC');
		$data['result' ] = $this->project_model->select_join('releaseditem',$join,false,$where,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('stockMan/printReleaseItem',$data);
		$this->load->view('admin/footer',$data);
	}

/*====== Reports =================*/
	function restockReport(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Review Restock Transactions";
		$data['page'] = 'monitoring';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('stockMan/restockingReport',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function getrestockCart(){
		$result = array('data' => array());

		$where = array('restock_status'=>"stocked");
		$join = array(
			array('stockchannel','restockcart','channel_id')
		);
		$data = $this->project_model->select_join('restockcart',$join,false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary view-item" data="'.$value->restock_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
					<a href="javascript:;" class="btn btn-danger delete" data="'.$value->restock_id.'" title="Select"><i class="fa fa-trash"></i></a>';
				$result['data'][$key] = array(
					$value->channel_name,
					$value->restock_code,
					$value->restock_date,
					$link
				);
			}
		}

		echo json_encode($result);
	}

	function setCart(){
		$id = $this->input->get('id');

		$sess_array = array("cartId"=>$id);

		$this->session->set_userdata($sess_array);
		if ($this->session->userdata('cartId')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function checkHisCart(){
		if ($this->session->userdata('cartId')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function closeHisCart(){
		$this->session->unset_userdata('cartId');
		if ($this->session->userdata('cartId') == FALSE) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function getCartItems(){
		$result = array('data' => array());

		$id = $this->session->userdata('cartId');
		$where = array('restock_id'=>$id);
		$get = $this->project_model->select('restock_items',false,$where);

		if ($get != false) {
			foreach ($get as $key => $value) {
				$result['data'][$key] = array(
					$value->restockitem_name,
					$value->restock_unit,
					$value->restock_qqty,
					$value->restock_cost
				);
			}
		}

		echo json_encode($result);

	}

	function getCartInfo(){
		$id = $this->session->userdata('cartId');

		$where = array('restock_id'=>$id);
		$join = array(
			array('stockchannel','restockcart','channel_id')
		);
		$get = $this->project_model->select_join('restockcart',$join,false,$where);

		echo json_encode($get);
	}

	function getCartPrintUrl(){
		$id = $this->session->userdata('cartId');
		$data['url'] = base_url('admin/cartItemPrint/'.$id);

		echo json_encode($data);
	}

	function cartItemPrint(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Restock Cart Items';

		$where = array(
			"restock_items.restock_id"=>$this->uri->segment(3)
		);

		$main_table = "restock_items";
		$array = array(
			array('restockcart',$main_table,'restock_id')
			);
		$data['items'] = $this->project_model->select_join($main_table, $array, false,$where);

		$where2 = array(
			'restock_id'=>$this->uri->segment(3)
			);
		$join = array(
			array('stockchannel','restockcart','channel_id')
		);
		$data['cart']= $this->project_model->select_join('restockcart',$join,false,$where2);


		$data['property']= $this->project_model->select('property_info');
		$data['employee'] = false;

		$this->load->view('admin/header',$data);
		$this->load->view('stockMan/restockCartItems',$data);
		$this->load->view('admin/footer',$data);
	}

	function deleteCartHistory(){
		$id = $this->input->get('id');

		if ($this->processdelCartHistory($id)) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function processdelCartHistory($id){
		$where = array('restock_id'=>$id);
		$result = $this->project_model->deleteNew('restockcart',$where);
		if ($result) {
			if ($this->session->userdata('cartId') == $id) {
				$this->session->unset_userdata('cartId');
				if ($this->session->userdata('cartId') == FALSE) {
					return true;
				}else{
					return false;
				}
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	function printHotelMon(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Hotel Restockable Items';

		$where = array("hotelitem_used >" => 0);
		$join = array(
			array("stockcategory","hotelitems","stockCat_id")
		);
		$order = array('stockCat_id','ASC');
		$data['result' ] = $this->project_model->select_join('hotelitems',$join,false,$where,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('storage/printHotelMon',$data);
		$this->load->view('admin/footer',$data);
	}

	function printKitchenMon(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Kitchen Restockable Items';

		$where = array("kitchenitem_dispose >" => 0);
		$join = array(
			array("stockcategory","kitchenitems","stockCat_id")
		);
		$order = array('stockCat_id','ASC');
		$data['result' ] = $this->project_model->select_join('kitchenitems',$join,false,$where,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('storage/printKitchenMon',$data);
		$this->load->view('admin/footer',$data);
	}

	function printRestoMon(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Restaurant Restockable Items';

		$where = array("stock_dispose >" => 0);
		$join = array(
			array("store_menu","menu_item","menu_id")
		);
		$order = array('menu_id','ASC');
		$data['result' ] = $this->project_model->select_join('menu_item',$join,false,$where,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('storage/printRestoMon',$data);
		$this->load->view('admin/footer',$data);
	}

	function printStockRoomMon(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Stock Room Restockable Items';

		$where = array("stockDispose >" => 0);
		$join = array(
			array("stockcategory","stockitem","stockCat_id")
		);
		$order = array('stockCat_id','ASC');
		$data['result' ] = $this->project_model->select_join('stockitem',$join,false,$where,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('storage/printStockRoomMon',$data);
		$this->load->view('admin/footer',$data);
	}

/*====== Stocking Interface ======*/
	function stockManInterface(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Restocking Interface";
		$data['page'] = 'stockman';

		$data['category'] = $this->project_model->select('stockcategory');
		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_headStock',$data);
		$this->load->view('stockMan/restockingUI',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	private function lastCode($table,$limit,$column,$return){
		$order = array($table.'.'.$column,'DESC');
		$last_id = $this->project_model->select($table,$like=false,$where=false,$order,$group=false,$where_or=false,$limit);
		if ($last_id != false) {
			foreach ($last_id as $value) {
				return $value->$return;
			}
		}else{
			return 0;
		}
	}

	function createCart(){
		$msg['type'] = "add";
		$id = $this->input->post('channelid');
		$table = "restockcart";
		$release = date("Y-m-d");
		$length = strlen($this->lastCode('restockcart',1,'restock_code','restock_code'));
		$code = substr($this->lastCode('restockcart',1,'restock_code','restock_code'),3,$length);
		$code = $code+1;
		$code  = str_pad($code, 2, '0', STR_PAD_LEFT);
		$data = array(
			"channel_id"=>$id,
			"restock_date"=>$release,
			"restock_code"=>'RSK'.$code,
			"restock_status"=>"restocking"
		);

		$insert = $this->project_model->insert('restockcart',$data,true);

		if ($insert[0]) {
			$this->session->set_userdata('regCart',$insert[1]);
			$msg['success'] = true;

		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function fetchChannelList(){
		$where = array('restock_status'=>"restocking");
		$cart = $this->project_model->select('restockcart',false,$where);

		$cartList = array();

		if ($cart != false) {
			foreach ($cart as $val) {
				$cartList[] = $val->channel_id;
			}
		}

		$wherenotin = $cartList;
		$wni_col = "channel_id";
		$result = $this->project_model->select('stockchannel',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$wherenotin,$wni_col);

		echo json_encode($result);
	}

	function fetchRestockCart(){
		$result = array('data' => array());

		$where = array('restock_status'=>"restocking");
		$join = array(
			array('stockchannel','restockcart','channel_id')
		);
		$data = $this->project_model->select_join('restockcart',$join,false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-cart" data="'.$value->restock_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->restock_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->channel_name,
					$value->restock_code,
					$link
				);
			}
		}


		echo json_encode($result);
	}

	function regCart(){
		$id = $this->input->get('id');
		$this->session->set_userdata('regCart',$id);

		if ($this->session->userdata('regCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function closeCart(){
		$this->session->unset_userdata('regCart');
		if ($this->session->userdata('regCart') == FALSE) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function checkRegCart(){
		if ($this->session->userdata('regCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function fetchRestockable(){
		$result = array('data' => array());

		$list = array();
		$whererestock = array('restock_items.restock_id'=>$this->session->userdata('regCart'));
		$join = array(
			array('restockcart','restock_items','restock_id')
		);
		$cartitem = $this->project_model->select_join('restock_items',$join,false,$whererestock);

		if ($cartitem !=false) {
			foreach ($cartitem as $value0) {
				$list[] = $value0->origin_id;
			}
		}
		//check channel table
		$wherecart = array(
			"restock_id"=>$this->session->userdata('regCart')
		);
		$cart = $this->project_model->select('restockcart',false,$wherecart);
		if ($cart != false) {
			foreach ($cart as $value) {
				$channel = $value->channel_id;
			}
			$whereChannel = array(
				"channel_id"=>$channel
			);
			$checkChannel = $this->project_model->select('stockchannel',false,$whereChannel);
			if ($checkChannel != false) {
				foreach ($checkChannel as $value1) {
					if ($value1->channel_name == "Store") {
						$table = "menu_item";
						$where = array("stock_type"=>"instock","stock_dispose >"=>0);
						$stock = "stock";
						$dispose = "stock_dispose";
						$name = "item_name";
						$id = "menu_item_id";
						$unit = "unit";
						$this->session->set_userdata('table',$table);
						$join = array(
						array('store_menu',$table,'menu_id')
						);
						$cat = 'menu_name';
					}elseif ($value1->channel_name == "Production") {
						$table = "productionitems";
						$where = array("proditem_dispose >"=>0);
						$stock = "proditem_stock";
						$dispose = "proditem_dispose";
						$name = "proditem_name";
						$id = "production_id";
						$unit = "proditem_unit";
						$this->session->set_userdata('table',$table);
						$join = array(
						array('stockcategory',$table,'stockCat_id')
						);
						$cat = 'stockCat_name';
					}elseif ($value1->channel_name == "Office") {
						$table = "officeitems";
						$where = array("offitem_dispose >"=>0);
						$stock = "offitem_stock";
						$dispose = "offitem_dispose";
						$name = "offitem_name";
						$id = "office_id";
						$unit = "offitem_unit";
						$this->session->set_userdata('table',$table);
						$join = array(
						array('stockcategory',$table,'stockCat_id')
						);
						$cat = 'stockCat_name';
					}elseif ($value1->channel_name == "Stock Room") {
						$table = "stockitem";
						$where = array("stockDispose >"=>0);
						$stock = "stock_qqty";
						$dispose = "stockDispose";
						$name = "stock_name";
						$id = "stock_id";
						$unit = "stock_unit";
						$this->session->set_userdata('table',$table);
						$join = array(
						array('stockcategory',$table,'stockCat_id')
						);
						$cat = 'stockCat_name';
					}
				}


				$data = $this->project_model->select_join($table,$join,false,$where,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$list,$id);
				if ($data !== false) {
					foreach ($data as $key => $value) {
						$tstock = $value->$stock + $value->$dispose;
						if ($value->$stock < $tstock) {
							$link = '<a href="javascript:;" class="btn btn-success addToCart" data="'.$value->$id.'" title="Select"><i class="fa fa-angle-double-left"></i></a>
							';
							$result['data'][$key] = array(
								$value->$cat,
								$value->$name,
								$value->$unit,
								$value->$dispose,
								$link
							);
						}
					}
				}


			}
		}

		echo json_encode($result);
	}

	function fetchCartItem(){
		$result = array('data' => array());
		$id = $this->session->userdata('regCart');
		$where = array('restock_id'=>$id);
		$data = $this->project_model->select('restock_items',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-danger delete-cartitem" data="'.$value->restockitem_id.'" title="Select"><i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->restockitem_name,
					$value->restock_qqty.' ( '.$value->restock_unit.' ) ',
					$value->restock_cost,
					$link
				);
			}
		}


		echo json_encode($result);
	}

	function addCartItem(){
		$id  = $this->input->get('id');
		$process = $this->processAddCartItem($id);
		if ($process !== false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	private function processAddCartItem($id){
		//add items to cart items table
		//update stock table item stocks
		if ($this->session->userdata('table') == "menu_item") {
			$where = array(
			"menu_item_id"=>$id
			);
		}elseif ($this->session->userdata('table') == "productionitems") {
			$where = array(
			"production_id"=>$id
			);
		}elseif ($this->session->userdata('table') == "officeitems") {
			$where = array(
			"office_id"=>$id
			);
		}elseif ($this->session->userdata('table') == "stockitem") {
			$where = array(
			"stock_id"=>$id
			);
		}
		$table = $this->session->userdata('table');
		$cartid = $this->session->userdata('regCart');
		$item = $this->project_model->select($table,false,$where);
		if ($item != false) {
			foreach ($item as $value) {
				if ($this->session->userdata('table') == "menu_item") {
					$newstock = $value->stock_dispose + $value->stock;
					$name = $value->item_name;
					$dispose = $value->stock_dispose;
					$data = array(
						"stockCat_id"=>$value->menu_id,
						"restockitem_name"=>$value->item_name,
						"restock_qqty"=>$value->stock_dispose,
						"restock_cost"=>$value->item_price,
						"restock_id"=>$this->session->userdata('regCart'),
						"origin_id"=>$value->menu_item_id,
						"left_stock"=>$newstock,
						"restock_unit"=>$value->unit
					);
					$updateData = array(
						"stock"=>$newstock,
						"stock_dispose"=>'0'
					);
					$where = array("menu_item_id"=>$value->menu_item_id);
				}elseif ($this->session->userdata('table') == "productionitems") {
					$newstock = $value->proditem_dispose + $value->proditem_stock;
					$name = $value->proditem_name;
					$dispose = $value->proditem_dispose;
					$data = array(
						"stockCat_id"=>$value->stockCat_id,
						"restockitem_name"=>$value->proditem_name,
						"restock_qqty"=>$value->proditem_dispose,
						"restock_cost"=>$value->proditem_cost,
						"restock_id"=>$this->session->userdata('regCart'),
						"origin_id"=>$value->production_id,
						"left_stock"=>$newstock,
						"restock_unit"=>$value->proditem_unit
					);
					$updateData = array(
						"proditem_stock"=>$newstock,
						"proditem_dispose"=>'0'
					);
					$where = array("production_id"=>$value->production_id);
				}elseif ($this->session->userdata('table') == "officeitems") {
					$newstock = $value->offitem_dispose + $value->offitem_stock;
					$name = $value->offitem_name;
					$dispose = $value->offitem_dispose;
					$data = array(
						"stockCat_id"=>$value->stockCat_id,
						"restockitem_name"=>$value->offitem_name,
						"restock_qqty"=>$value->offitem_dispose,
						"restock_cost"=>$value->offitem_cost,
						"restock_id"=>$this->session->userdata('regCart'),
						"origin_id"=>$value->office_id,
						"left_stock"=>$newstock,
						"restock_unit"=>$value->offitem_unit
					);
					$updateData = array(
						"offitem_stock"=>$newstock,
						"offitem_dispose"=>'0'
					);
					$where = array("office_id"=>$value->office_id);
				}elseif ($this->session->userdata('table') == "stockitem") {
					$newstock = $value->stockDispose + $value->stock_qqty;
					$name = $value->stock_name;
					$dispose = $value->stockDispose;
					$data = array(
						"stockCat_id"=>$value->stockCat_id,
						"restockitem_name"=>$value->stock_name,
						"restock_qqty"=>$value->stockDispose,
						"restock_cost"=>$value->stockCost,
						"restock_id"=>$this->session->userdata('regCart'),
						"origin_id"=>$value->stock_id,
						"left_stock"=>$newstock,
						"restock_unit"=>$value->stock_unit
					);
					$updateData = array(
						"stock_qqty"=>$newstock,
						"stockDispose"=>'0'
					);
					$where = array("stock_id"=>$value->stock_id);
				}

				$insert = $this->project_model->insert('restock_items',$data);

				if ($insert != false) {
					$update = $this->project_model->updateNew($this->session->userdata('table'),$where,$updateData);
					if ($update != false) {
						if ($this->session->userdata('table') !== "stockitem") {
							$where2 = array('stock_name'=>$name);
							$stockitem = $this->project_model->select('stockitem',false,$where2);
							if ($stockitem != false) {
								foreach ($stockitem as $value2) {
									$updatedstock = $value2->stock_qqty - $dispose;
									$updateddispose = $value2->stockDispose+$dispose;
									$stockUpdate = array(
										'stock_qqty'=>$updatedstock,
										'stockDispose'=>$updateddispose
									);
									$stocktblwhere = array('stock_id'=>$value2->stock_id);
									$updatestocktbl = $this->project_model->updateNew('stockitem',$stocktblwhere,$stockUpdate);
									if ($updatestocktbl != false) {
										return true;
									}else{
										return "error update stock table";
									}
								}
							}else{
								return "error retrieving stock info";
							}
						}else{
							return true;
						}
						//retrieve data from stock table and update the existing data
					}else{
						//return false;
						return "error update";
					}
				}else{
					//return false;
					return "error insert";
				}
			}//end foreach
		}else{
			//return false;
			return "item error";
		}
	}

	function delCartItem(){
		//process data if Finish Button will be press.
		$id = $this->input->get('id');
		$result = $this->processDelCartItem($id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	private function processDelCartItem($id){
		$where = array('restockitem_id'=>$id);
		$get = $this->project_model->select('restock_items',false,$where);
		if ($get !== false) {
			foreach ($get as $value) {
				if ($this->session->userdata('table') == "menu_item") {
					$updateData = array(
						"stock"=>$value->left_stock,
						"stock_dispose"=>$value->restock_qqty
					);
					$where = array("menu_item_id"=>$value->origin_id);
				}elseif ($this->session->userdata('table') == "productionitems") {
					$updateData = array(
						"proditem_stock"=>$value->left_stock,
						"proditem_dispose"=>$value->restock_qqty
					);
					$where = array("production_id"=>$value->origin_id);
				}elseif ($this->session->userdata('table') == "officeitems") {
					$updateData = array(
						"offitem_stock"=>$value->left_stock,
						"offitem_dispose"=>$value->restock_qqty
					);
					$where = array("office_id"=>$value->origin_id);
				}elseif ($this->session->userdata('table') == "stockitem") {
					$updateData = array(
						"stock_qqty"=>$value->left_stock,
						"stockDispose"=>$value->restock_qqty
					);
					$where = array("stock_id"=>$value->origin_id);
				}
					$dispose = $value->restock_qqty;
					$name = $value->restockitem_name;
					$table = $this->session->userdata('table');
					$update = $this->project_model->updateNew($table,$where,$updateData);
					if ($update !== false) {

						if ($this->session->userdata('table') !== "stockitem") {
							$where2 = array('stock_name'=>$name);
							$stockitem = $this->project_model->select('stockitem',false,$where2);
							if ($stockitem != false) {
								foreach ($stockitem as $value2) {
									$updatedstock = $value2->stock_qqty + $dispose;
									$updateddispose = $value2->stockDispose-$dispose;
									$stockUpdate = array(
										'stock_qqty'=>$updatedstock,
										'stockDispose'=>$updateddispose
									);
									$stocktblwhere = array('stock_id'=>$value2->stock_id);
									$updatestocktbl = $this->project_model->updateNew('stockitem',$stocktblwhere,$stockUpdate);
									if ($updatestocktbl != false) {

										$del_where = array("restockitem_id"=>$id);
										$delete = $this->project_model->deleteNew('restock_items',$del_where);
										if ($delete === true) {
											return true;
										}else{
											return false;
											//return "delete error";
										}

									}else{
										return false;
									}
								}
							}else{
								return false;
							}
						}else{
							return true;
						}



					}else{
						return false;
						//return "update error";
					}
			}
		}else{
			return false;
			//return "item error";
		}
	}

	function delCart(){
		$id = $this->input->get('id');
		$get_where = array('restock_id'=>$id);
		$getitem = $this->project_model->select('restock_items',false,$get_where);
		if ($getitem !== false) {
			$i = 0;
			$counter = count($getitem);
			foreach ($getitem as $value) {
				$id = $value->restockitem_id;
				if ($this->processDelCartItem($id) !== false) {
					$i++;
				}else{
					$msg['success'] = false;
					$msg['error'] = "item delete error";
				}
			}
			if ($i === $counter) {
				$del_where = array('restock_id'=>$id);
				$delete = $this->project_model->deleteNew('restockcart',$del_where);
				if ($delete !== false) {
					if ($this->clearCartSession() === true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Eroor clearing session cart";
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Deleting cart error";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Counter error";
			}
		}else{
			$where = array('restock_id'=>$id);
			$delete = $this->project_model->deleteNew('restockcart',$where);
			if ($delete) {
				if ($this->clearCartSession() === true) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to clear cart session.";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to directly delete cart.";
			}
		}

		echo json_encode($msg);
	}

	function finishCart(){
		/* $process = $this->processCart();
		if ($process != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		} */
		$wherecheck = array("restock_id"=>$this->session->userdata('regCart'));
		$check = $this->project_model->check_numrows('restock_items',$wherecheck);
		if ($check != false) {
			$where = array("restock_id"=>$this->session->userdata('regCart'));
			$data = array(
				"restock_status"=>"stocked"
			);
			$update = $this->project_model->updateNew('restockcart',$where,$data);
			if ($update) {
				if ($this->clearCartSession() === true) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable clear session.";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to update restock cart.";
			}
		}else {
			$msg['success'] = false;
			$msg['error'] = "Sorry can't accept empty.";
		}
		echo json_encode($msg);
	}

	private function clearCartSession(){
		$sess_array  = array('table'=>'','regCart'=>'');
		$this->session->unset_userdata($sess_array);
		if ($this->session->userdata('regCart')==FALSE && $this->session->userdata('table')==FALSE) {
			return true;
		}else{
			return false;
		}
	}

/*====== Stock Disposing Interface ====*/
	function stockReleasing(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Releasing";
		$data['page'] = 'stockman';

		$data['category'] = $this->project_model->select('stockcategory');
		$data['record'] = $this->admin_model->property_info();


		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav',$data);
		$this->load->view('admin/body_headStock',$data);
		$this->load->view('stockMan/itemReleasing',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function createRelCart(){

		$this->form_validation->set_rules('orderid','Order','required');
		$this->form_validation->set_rules('channelid','Channel','required');
		$this->form_validation->set_rules('date','Date','required');
		if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
		}else{
			$code = substr($this->lastCode('releasecart',1,'release_code','release_code'),2)+1;
			$data = array(
				"channel_id"=>set_value('channelid'),
				"release_date"=>set_value('date'),
				"release_code"=>'RL'.$code,
				"releasing_status"=>"releasing",
				"order_id"=>set_value('orderid')
			);

			$insert = $this->project_model->insert('releasecart',$data,true);

			if ($insert[0]) {
				$this->session->set_userdata('relCart',$insert[1]);
				$msg['success'] = true;

			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error creating releasing cart.';
			}
		}

		echo json_encode($msg);
	}

	function fetchRelChannelList(){
		$where = array('restock_status'=>"releasing");
		$cart = $this->project_model->select('restockcart',false,$where);

		$cartList = array();

		if ($cart != false) {
			foreach ($cart as $val) {
				$cartList[] = $val->channel_id;
			}
		}
		$cartList[] = 1;
		$cartList[] = 4;

		$wherenotin = $cartList;
		$wni_col = "channel_id";
		$result = $this->project_model->select('stockchannel',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$wherenotin,$wni_col);

		echo json_encode($result);
	}

	function fetchRelCart(){
		$result = array('data' => array());

		$where = array('releasing_status'=>"releasing");
		$join = array(
			array('stockchannel','releasecart','channel_id'),
			array('order','releasecart','order_id')
		);
		$data = $this->project_model->select_join('releasecart',$join,false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-cart" data="'.$value->releaseCart_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->releaseCart_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->channel_name,
					$value->release_code,
					$value->order_code,
					$link
				);
			}
		}
		echo json_encode($result);
	}

	function fetchOrderList(){
		$order_list = array();
		$order = $this->project_model->select('releasecart');

		if ($order != false) {
			foreach ($order as $value) {
				$order_list[] = $value->order_id;
			}
		}

		$wherenotin = $order_list;
		$wni_col = "order_id";
		$result = $this->project_model->select('order',$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$wherenotin,$wni_col);

		echo json_encode($result);
	}

	function checkRCInfo(){
		$id = $this->session->userdata('relCart');
		$where = array(
			'releaseCart_id'=>$id
		);
		$join = array(
			array('order','releasecart','order_id'),
			array('stockchannel','releasecart','channel_id')
		);
		$result = $this->project_model->single_select('releasecart',$where,$join);
			$data['ordercode'] = $result->order_code;
			$data['channel'] = $result->channel_name;
		echo json_encode($data);
	}

	function regRelCart(){
		$id = $this->input->get('id');
		$this->session->set_userdata('relCart',$id);

		if ($this->session->userdata('relCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function closeRelCart(){
		$this->session->unset_userdata('relCart');
		if ($this->session->userdata('relCart') == FALSE) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	function checkRegRelCart(){
		if ($this->session->userdata('relCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function fetchRelItem(){
		$result = array('data' => array());

		$wherecart = array(
			"releaseCart_id"=>$this->session->userdata('relCart')
		);
		$cart = $this->project_model->select('releasecart',false,$wherecart);
		if ($cart != false) {
			foreach ($cart as $value) {
				$channel = $value->channel_id;
			}
			$whereChannel = array(
				"channel_id"=>$channel
			);
			$checkChannel = $this->project_model->select('stockchannel',false,$whereChannel);
			if ($checkChannel != false) {
				foreach ($checkChannel as $value1) {
					if ($value1->channel_name == "Production") {
						$table = "productionitems";
						$where = array("proditem_stock >"=>0);
						$stock = "proditem_stock";
						$dispose = "proditem_dispose";
						$name = "proditem_name";
						$id = "production_id";
						$unit = "proditem_unit";
						$this->session->set_userdata('reltable',$table);
					}elseif ($value1->channel_name == "Office") {
						$table = "officeitems";
						$where = array("offitem_stock >"=>0);
						$stock = "offitem_stock";
						$dispose = "offitem_dispose";
						$name = "offitem_name";
						$id = "office_id";
						$unit = "offitem_unit";
						$this->session->set_userdata('reltable',$table);
					}
				}
				$join = array(
					array('stockcategory',$table,'stockCat_id')
				);
				$data = $this->project_model->select_join($table,$join,false,$where);
				if ($data !== false) {
					foreach ($data as $key => $value) {
						$link = '<a href="javascript:;" class="btn btn-success addToCart" data="'.$value->$id.'" title="Cancel"> <i class="fa fa-plus"></i></a>';
						$result['data'][$key] = array(
							$value->stockCat_name,
							$value->$name,
							$value->$unit,
							$value->$stock,
							$link
						);
					}
				}


			}
		}

		echo json_encode($result);
	}

	function fetchRelCartItem(){
		$result = array('data' => array());
		$id = $this->session->userdata('relCart');
		$where = array('releaseCart_id'=>$id);
		$data = $this->project_model->select('releaseditem',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-danger delete-cartitem" data="'.$value->release_item_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->releaseitem_name,
					$value->releaseitem_qty.' ( '.$value->releaseitem_unit.' ) ',
					$value->releaseitem_cost,
					$link
				);
			}
		}
		echo json_encode($result);
	}

	function cartItemEdit(){
		$id = $this->input->get('id');
		$table = $this->session->userdata('reltable');

		if ($table == 'officeitems') {
			$where = array("office_id"=>$id);
		}elseif ($table == "productionitems") {
			$where = array("production_id"=>$id);
		}

		$result = $this->project_model->single_select($table,$where);
		echo json_encode($result);
	}

	function addRelCartItem(){
		$this->form_validation->set_rules('itemDispId','Item','required');
		$this->form_validation->set_rules('dispose','Dispose Qty','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{

			$table = $this->session->userdata('reltable');
			if ($table == "productionitems") {
				$where = array(
				"production_id"=>set_value('itemDispId')
				);
			}elseif ($table == "officeitems") {
				$where = array(
				"office_id"=>set_value('itemDispId')
				);
			}
			$cartid = $this->session->userdata('relCart');
			$item = $this->project_model->select($table,false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					if ($table == "productionitems") {
						$newstock = $value->proditem_stock - set_value('dispose');
						$newdispose = $value->proditem_dispose + set_value('dispose');
						$data = array(
							"releaseCart_id"=>$this->session->userdata('relCart'),
							"releaseitem_name"=>$value->proditem_name,
							"releaseitem_unit"=>$value->proditem_unit,
							"releaseitem_qty"=>set_value('dispose'),
							"releaseitem_cost"=>$value->proditem_cost,
							"stockCat_id"=>$value->stockCat_id
						);
						$updateData = array(
							"proditem_stock"=>$newstock,
							"proditem_dispose"=>$newdispose
						);
						$where = array("production_id"=>$value->production_id);
						$wherecheck = array(
							'releaseitem_name'=>$value->proditem_name,
							'releasecart.releaseCart_id'=>$cartid
							);
					}elseif ($table == "officeitems") {
						$newstock = $value->offitem_stock - set_value('dispose');
						$newdispose = $value->offitem_dispose + set_value('dispose');
						$data = array(
							"releaseCart_id"=>$this->session->userdata('relCart'),
							"releaseitem_name"=>$value->offitem_name,
							"releaseitem_unit"=>$value->offitem_unit,
							"releaseitem_qty"=>set_value('dispose'),
							"releaseitem_cost"=>$value->offitem_cost,
							"stockCat_id"=>$value->stockCat_id
						);
						$updateData = array(
							"offitem_stock"=>$newstock,
							"offitem_dispose"=>$newdispose
						);
						$where = array("office_id"=>$value->office_id);
						$wherecheck = array(
							'releaseitem_name'=>$value->offitem_name,
							'releasecart.releaseCart_id'=>$cartid
						);
					}
					$join = array(
						array('releasecart','releaseditem','releaseCart_id')
					);
					$check = $this->project_model->check_multi_duplicate('releaseditem',$wherecheck,'release_item_id',false,$join);
					if($check[0] != true){
						$insert = $this->project_model->insert('releaseditem',$data);

						if ($insert != false) {
							$update = $this->project_model->updateNew($table,$where,$updateData);
							if ($update != false) {
								$msg['success'] = true;
							}else{
								$msg['error'] = "Error updating ".$table." item.";
								$msg['success'] = false;
							}
						}else{
							$msg['error'] = "Error inserting item to release item table.";
							$msg['success'] = false;
						}
					}else{
						$whereupdate = array('release_item_id'=>$check[1]);
						$get = $this->project_model->select("releaseditem",false,$whereupdate);
						if($get != false){
							foreach($get as $value){
								$newqty = $value->releaseitem_qty+set_value('dispose');
								$dataUpdate = array(
									'releaseitem_qty'=>$newqty
								);

								$updateRe = $this->project_model->updateNew("releaseditem",$whereupdate,$dataUpdate);
								if($updateRe != false){
									$updateItem = $this->project_model->updateNew($table,$where,$updateData);
									if ($updateItem != false) {
										$msg['success'] = true;
									}else{
										$msg['error'] = "Error updating ".$table." item.";
										$msg['success'] = false;
									}
								}else{
									$msg['error'] = "Error updating released item data.";
									$msg['success'] = false;
								}
							}
						}else{
							$msg['error'] = "Unable to find release item data.";
							$msg['success'] = false;
						}
					}
				}
			}else{
				$msg['error'] = "Item not found.";
				$msg['success'] = false;
			}
		}
		echo json_encode($msg);
	}

	function delRelCartItem(){
		//process data if Finish Button will be press.
		$id = $this->input->get('id');

		$table = $this->session->userdata('reltable');
		$where = array('release_item_id'=>$id);
		$get = $this->project_model->select('releaseditem',false,$where);
		if ($get !== false) {
			foreach ($get as $value) {
				if ($table == "productionitems") {
					$name = $value->releaseitem_name;
					$where2 = array('proditem_name'=> $name);
					$get2 = $this->project_model->select('productionitems',false,$where2);
					foreach ($get2 as $value2) {
						$stock = $value2->proditem_stock+$value->releaseitem_qty;
						$dispose = $value2->proditem_dispose-$value->releaseitem_qty;
						$updateData = array(
							"proditem_stock"=>$stock,
							"proditem_dispose"=>$dispose
						);
						$where = array("production_id"=>$value2->production_id);
					}

				}elseif ($table == "officeitems") {
					$name = $value->releaseitem_name;
					$where2 = array('offitem_name'=> $name);
					$get2 = $this->project_model->select('officeitems',false,$where2);
					foreach ($get2 as $value2) {
						$stock = $value2->offitem_stock+$value->releaseitem_qty;
						$dispose = $value2->offitem_dispose-$value->releaseitem_qty;
						$updateData = array(
							"offitem_stock"=>$stock,
							"offitem_dispose"=>$dispose
						);
						$where = array("office_id"=>$value2->office_id);
					}

				}
					$update = $this->project_model->updateNew($table,$where,$updateData);
					if ($update !== false) {
						$del_where = array("release_item_id"=>$id);
						$delete = $this->project_model->deleteNew('releaseditem',$del_where);
						if ($delete != false) {
							$msg['success'] = true;
						}else{
							$msg['error'] = "Unable to delete item.";
							$msg['success'] = false;
						}
					}else{
						$msg['error'] = "Unable to update ".$table." item.";
						$msg['success'] = false;
					}
			}
		}else{
			$msg['error'] = "Item not found.";
			$msg['success'] = false;
		}

		echo json_encode($msg);
	}

	function delRelCart(){
		//process data if Finish Button will be press.
		$id = $this->input->get('id');
		$get_where = array('releaseCart_id'=>$id);
		$getitem = $this->project_model->select('releaseditem',false,$get_where);
		if ($getitem !== false) {
			$i = 0;
			$counter = count($getitem);
			foreach ($getitem as $value) {
				$id = $value->release_item_id;
				if ($this->processDelRelCartItem($id) !== false) {
					$i++;
				}else{
					//return false;
					$msg['error'] = "Error deleting item.";
					$msg['success'] = false;
				}
			}
			if ($i === $counter) {
				$del_where = array('releaseCart_id'=>$id);
				$delete = $this->project_model->deleteNew('releasecart',$del_where);
				if ($delete !== false) {
					if ($this->clearRelCartSession() === true) {
						$msg['success'] = true;
					}else{
						$msg['error'] = "Clearing session cart error.";
						$msg['success'] = false;
					}
				}else{
					$msg['error'] = "Delete cart error";
					$msg['success'] = false;
				}
			}else{
				$msg['error'] = "Counter error.";
				$msg['success'] = false;
			}
		}else{
			$where = array('releaseCart_id'=>$id);
			$delete = $this->project_model->deleteNew('releasecart',$where);
			if ($delete) {
				if ($this->clearRelCartSession() === true) {
					$msg['success'] = true;
				}else{
					//return false;
					$msg['error'] = "Error clearing session";
					$msg['success'] = false;
				}
			}else{
				//return false;
				$msg['error'] = "Error deleting release cart.";
				$msg['success'] = false;
			}
		}

		echo json_encode($msg);
	}

	function finishRelCart(){
		$where = array("releaseCart_id"=>$this->session->userdata('relCart'));
		$check = $this->project_model->check_numrows('releaseditem',$where);
		if ($check != false) {
			$data = array(
				"releasing_status"=>"released"
			);
			$update = $this->project_model->updateNew('releasecart',$where,$data);
			if ($update) {
				if ($this->clearRelCartSession() == true) {
					$msg['success'] = true;
				}else{
					$msg['error'] = "Error clearing session.";
					$msg['success'] = false;
				}
			}else{
				$msg['error'] = "Error updating release cart.";
				$msg['success'] = false;
			}
		}else{
			$msg['error'] = "Sorry! Cannot submit empty cart!";
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	private function clearRelCartSession(){
		$sess_array  = array('reltable'=>'','relCart'=>'');
		$this->session->unset_userdata($sess_array);
		if ($this->session->userdata('relCart')=="" && $this->session->userdata('reltable')=="") {
			return true;
		}else{
			return false;
		}
	}

/*====== Monthly Reports ==========*/
	function miscExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Miscellaneous Expenses";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/miscellaneous',$data);
		$this->load->view('admin/footer',$data);
	}

	function prodExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Production Expenses";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/production',$data);
		$this->load->view('admin/footer',$data);
	}

	function equipExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Equipment Expenses";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/equipment',$data);
		$this->load->view('admin/footer',$data);
	}

	function returnExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Return Expenses";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/returns',$data);
		$this->load->view('admin/footer',$data);
	}

	function stocksExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stocks Expenses";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/stocks',$data);
		$this->load->view('admin/footer',$data);
	}

	function salesRep(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Monthly Sales";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/restaurant_receipt',$data);
		$this->load->view('admin/footer',$data);
	}

	function employee_salary(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Employee Salary";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/employee_salary',$data);
		$this->load->view('admin/footer',$data);
	}

	function employee_credit(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Employee Credits";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v1',$data);
		$this->load->view('admin/body_header',$data);
		$this->load->view('reports/employee_credits',$data);
		$this->load->view('admin/body_footer',$data);
		$this->load->view('admin/footer',$data);
	}

	function incomeStatement(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Income Statements";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/incomeStatement',$data);
		$this->load->view('admin/footer',$data);
	}

	function employee_overtime(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Employee Overtime Record";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/employee_overtime',$data);
		$this->load->view('admin/footer',$data);
	}

	function attendance(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Employee Attendance Record";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/attendance',$data);
		$this->load->view('admin/footer',$data);
	}

/*====== Monthly Reports Processing ==========*/
	/*miscellaneous*/
		function fetchMisc(){
			$result = array('data' => array());

			$data = $this->project_model->select('expenses_misc');
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->misc_price*$value->misc_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->misc_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->misc_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->misc_date,
						$value->misc_desc,
						$value->misc_unit,
						$value->misc_qty,
						$value->misc_price,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addMisc(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'misc_desc'=>ucwords(set_value('desc')),
					'misc_qty'=>set_value('qty'),
					'misc_unit'=>set_value('unit'),
					'misc_price'=>set_value('cost'),
					'misc_note'=>set_value('note'),
					'misc_date'=>set_value('date'),
					'misc_mon'=>set_value('mon')
				);
				$add = $this->project_model->insert('expenses_misc',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function editMisc(){

			$id = $this->input->get('id');
			$where = array("misc_id"=>$id);
			$result = $this->project_model->single_select('expenses_misc',$where);
			echo json_encode($result);
		}
		function updateMisc(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'misc_desc'=>ucwords(set_value('desc')),
					'misc_qty'=>set_value('qty'),
					'misc_unit'=>set_value('unit'),
					'misc_price'=>set_value('cost'),
					'misc_note'=>set_value('note'),
					'misc_date'=>set_value('date'),
					'misc_mon'=>set_value('mon')
				);
				$id = set_value('id');
				$where = array('misc_id'=>$id);
				$result = $this->project_model->updateNew('expenses_misc',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function deleteMisc(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('expenses_misc','misc_id',$id);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printMiscList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Miscellaneous Expenses';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'misc_date'=>$param
			);
			$order = array('misc_date','asc');
			$data['result' ] = $this->project_model->select('expenses_misc',$like,$where=false,$order);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/miscList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*production*/
		function fetchExpProd(){
			$result = array('data' => array());

			$join = array(
				array('releasecart','releaseditem','releaseCart_id'),
				array('order','releasecart','order_id')
			);
			$data = $this->project_model->select_join('releaseditem',$join);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->releaseitem_cost * $value->releaseitem_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->release_item_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->release_date,
						$value->order_code,
						$value->releaseitem_name,
						$value->releaseitem_unit,
						$value->releaseitem_qty,
						$value->releaseitem_cost,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addExpProd(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'prod_desc'=>ucwords(set_value('desc')),
					'prod_qty'=>set_value('qty'),
					'prod_unit'=>set_value('unit'),
					'prod_price'=>set_value('cost'),
					'prod_note'=>set_value('note'),
					'prod_date'=>set_value('date'),
					'prod_mon'=>set_value('mon')
				);
				$add = $this->project_model->insert('expenses_prod',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function editExpProd(){
			$id = $this->input->get('id');
			$where = array("prod_id"=>$id);
			$result = $this->project_model->single_select('expenses_prod',$where);
			echo json_encode($result);
		}
		function updateExpProd(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'prod_desc'=>ucwords(set_value('desc')),
					'prod_qty'=>set_value('qty'),
					'prod_unit'=>set_value('unit'),
					'prod_price'=>set_value('cost'),
					'prod_note'=>set_value('note'),
					'prod_date'=>set_value('date'),
					'prod_mon'=>set_value('mon')
				);
				$id = set_value('id');
				$where = array('prod_id'=>$id);
				$result = $this->project_model->updateNew('expenses_prod',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function deleteExpProd(){
			$id = $this->input->get('id');
			$where = array(
				'release_item_id'=>$id
			);
			$result = $this->project_model->deleteNew('releaseditem',$where);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printProdList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Production Expenses';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'releasecart.release_date'=>$param
			);
			$join = array(
				array('releasecart','releaseditem','releaseCart_id'),
				array('order','releasecart','order_id')
			);
			$data['result' ] = $this->project_model->select_join('releaseditem',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/prodList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*equipment*/
		function fetchExpEquip(){
			$result = array('data' => array());

			$data = $this->project_model->select('expenses_equip');
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->expequip_price*$value->expequip_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->expequip_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->expequip_id.'" title="Edit"><i class="fa fa-pencil"></i></a>
					';
					$result['data'][$key] = array(
						$value->expequip_date,
						$value->expequip_desc,
						$value->expequip_unit,
						$value->expequip_qty,
						$value->expequip_price,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addExpEquip(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'expequip_desc'=>ucwords(set_value('desc')),
					'expequip_qty'=>set_value('qty'),
					'expequip_unit'=>set_value('unit'),
					'expequip_price'=>set_value('cost'),
					'expequip_note'=>set_value('note'),
					'expequip_date'=>set_value('date'),
					'expequip_mon'=>set_value('mon')
				);
				$add = $this->project_model->insert('expenses_equip',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function editExpEquip(){

			$id = $this->input->get('id');
			$where = array("expequip_id"=>$id);
			$result = $this->project_model->single_select('expenses_equip',$where);
			echo json_encode($result);
		}
		function updateExpEquip(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'expequip_desc'=>ucwords(set_value('desc')),
					'expequip_qty'=>set_value('qty'),
					'expequip_unit'=>set_value('unit'),
					'expequip_price'=>set_value('cost'),
					'expequip_note'=>set_value('note'),
					'expequip_date'=>set_value('date'),
					'expequip_mon'=>set_value('mon')
				);
				$id = set_value('id');
				$where = array('expequip_id'=>$id);
				$result = $this->project_model->updateNew('expenses_equip',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'No changes has been made.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function deleteExpEquip(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('expenses_equip','expequip_id',$id);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printEquipList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Equipment Expenses';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'expequip_date'=>$param
			);
			$data['result' ] = $this->project_model->select('expenses_equip',$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/equipList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*returns*/
		function fetchExpReturns(){
			$result = array('data' => array());

			$data = $this->project_model->select('expenses_returns');
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->returns_price*$value->returns_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->returns_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->returns_id.'" title="Edit"><i class="fa fa-pencil"></i></a>
					';
					$result['data'][$key] = array(
						$value->returns_date,
						$value->returns_desc,
						$value->return_type,
						$value->returns_unit,
						$value->returns_qty,
						$value->returns_price,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addExpReturns(){

			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'returns_desc'=>ucwords(set_value('desc')),
					'returns_qty'=>set_value('qty'),
					'returns_unit'=>set_value('unit'),
					'returns_price'=>set_value('cost'),
					'returns_note'=>set_value('note'),
					'returns_date'=>set_value('date'),
					'returns_mon'=>set_value('mon'),
					'return_type'=>set_value('type')
				);
				$add = $this->project_model->insert('expenses_returns',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function editExpReturns(){

			$id = $this->input->get('id');
			$where = array("returns_id"=>$id);
			$result = $this->project_model->single_select('expenses_returns',$where);
			echo json_encode($result);
		}
		function updateExpReturns(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('note','Note','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'returns_desc'=>ucwords(set_value('desc')),
					'returns_qty'=>set_value('qty'),
					'returns_unit'=>set_value('unit'),
					'returns_price'=>set_value('cost'),
					'returns_note'=>set_value('note'),
					'returns_date'=>set_value('date'),
					'returns_mon'=>set_value('mon'),
					'return_type'=>set_value('type')
				);
				$id = set_value('id');
				$where = array('returns_id'=>$id);
				$result = $this->project_model->updateNew('expenses_returns',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function deleteExpReturns(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('expenses_returns','returns_id',$id);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printReturnList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Return Expenses';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'returns_date'=>$param
			);
			$data['result' ] = $this->project_model->select('expenses_returns',$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/returnList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*stocks*/
		function fetchExpStocks(){
			$result = array('data' => array());

			$data = $this->project_model->select('expenses_stocks');
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->expstocks_price*$value->expstocks_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->expstocks_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->expstocks_id.'" title="Edit"><i class="fa fa-pencil"></i></a>';
					$result['data'][$key] = array(
						$value->expstocks_date,
						$value->expstocks_desc,
						$value->expstocks_unit,
						$value->expstocks_qty,
						$value->expstocks_price,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addExpStocks(){

			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'expstocks_desc'=>ucwords(set_value('desc')),
					'expstocks_qty'=>set_value('qty'),
					'expstocks_unit'=>set_value('unit'),
					'expstocks_price'=>set_value('cost'),
					'expstocks_note'=>set_value('note'),
					'expstocks_date'=>set_value('date'),
					'expstocks_mon'=>set_value('mon')
				);
				$add = $this->project_model->insert('expenses_stocks',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function editExpStocks(){

			$id = $this->input->get('id');
			$where = array("expstocks_id"=>$id);
			$result = $this->project_model->single_select('expenses_stocks',$where);
			echo json_encode($result);
		}
		function updateExpStocks(){
			$this->form_validation->set_rules('mon','Month','required');
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('note','Note','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'expstocks_desc'=>ucwords(set_value('desc')),
					'expstocks_qty'=>set_value('qty'),
					'expstocks_unit'=>set_value('unit'),
					'expstocks_price'=>set_value('cost'),
					'expstocks_note'=>set_value('note'),
					'expstocks_date'=>set_value('date'),
					'expstocks_mon'=>set_value('mon')
				);
				$id = set_value('id');
				$where = array('expstocks_id'=>$id);
				$result = $this->project_model->updateNew('expenses_stocks',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function deleteExpStocks(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('expenses_stocks','expstocks_id',$id);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printStockList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Stocks Expenses';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'expstocks_date'=>$param
			);
			$data['result' ] = $this->project_model->select('expenses_stocks',$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/stockList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*sales*/
		function getRestoReceipt(){
			$result = array('data' => array());
			$join = array(
				array('employee','order','emp_id')
				);
			$data = $this->project_model->select_join('order', $join);

			if ($data != false) {
				foreach ($data as $key => $value) {
					/*$buttons = '
						<a style="margin-left:5px;" style="cursor: pointer;" onclick="window.open('.base_url('admin/restaurant_bill_record/'.$value->order_id).', "newwindow", "width=900, height=400"); return false;" title="Update Stock"><i class="fa fa-print fa-2x"></i></a>
					';*/
					$link = base_url('admin/restaurant_bill_record/'.$value->order_id);
					$buttons = '<a href="javascript:;" class="btn btn-primary item-print" data="'.$link.'" title="Print"><i class="fa fa-print"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->order_id.'" title="Select"><i class="fa fa-times"></i></a>
					';

					$result['data'][$key] = array(
						$value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname,
						$value->cust_name,
						$value->order_code,
						"Php ".$this->cart->format_number($value->order_bill_amount-$value->order_discount),
						$value->order_date,
						$buttons
					);
				}
			}


			echo json_encode($result);
		}
		function printSalesList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Monthly Sales Report';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$param = $year.'-'.$month;
			$like = array(
				'order_date'=>$param
			);
			$data['result' ] = $this->project_model->select('order',$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/salesList',$data);
			$this->load->view('admin/footer',$data);
		}
		function deleteSales(){
			$id = $this->input->get('id');
			$where = array('order_id'=>$id);
			$result = $this->project_model->deleteNew('order',$where);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
	/*emp credit*/
		function fetchEmpCredit(){

			$result = array('data' => array());

			$join = array(
				array('employee','emp_credits','emp_id')
			);
			$data = $this->project_model->select_join('emp_credits',$join);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_credit_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_credit_id.'" title="Edit"><i class="fa fa-pencil"></i></a>
					';
					$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
					$amount = $value->credit_item_amount * $value->credit_item_qty;
					$result['data'][$key] = array(
						$value->credit_date,
						$name,
						$value->credit_item_name,
						$value->credit_item_amount,
						$value->credit_item_qty,
						$amount,
						$value->credit_status,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function editEmpCredit(){
			$id = $this->input->get('id');
			$join = array(
				array('employee','emp_credits','emp_id')
			);
			$where = array('emp_credit_id'=>$id);
			$data = $this->project_model->single_select('emp_credits',$where,$join);

			echo json_encode($data);
		}
		function add_EmpCredit(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('name','Item Name','required');
			$this->form_validation->set_rules('amount','Item Amount','required');
			$this->form_validation->set_rules('qty','Item Quantity','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"credit_item_name"=>ucwords(set_value('name')),
					"credit_item_amount"=>set_value('amount'),
					"credit_item_qty"=>set_value('qty'),
					"emp_id"=>set_value('employee'),
					"credit_date"=>set_value('date')
					);
				$table_name = 'emp_credits';
				$array = array(
					"credit_item_name"=>set_value('name'),
					"emp_id"=>set_value('employee'),
					"credit_date"=>set_value('date')
					);
				$check_duplicate = $this->admin_model->check_multi_duplicate($table_name,$array);
				if ($check_duplicate != true) {
					$add = $this->admin_model->add_table_record($data,$table_name);
					if ($add == true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Unable to add credit.";
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Duplicate record detected.";
				}
			}
			$msg['type'] = "Update";
			echo json_encode($msg);
		}
		function update_EmpCredit(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('name','Item Name','required');
			$this->form_validation->set_rules('amount','Item Amount','required');
			$this->form_validation->set_rules('qty','Item Quantity','required');
			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"credit_item_name"=>ucwords(set_value('name')),
					"credit_item_amount"=>set_value('amount'),
					"credit_item_qty"=>set_value('qty'),
					"emp_id"=>set_value('employee'),
					"credit_date"=>set_value('date')
				);
				$table_name = 'emp_credits';
				$id = set_value('id');
				$where = array(
					'emp_credit_id'=>$id
				);
				$result = $this->project_model->updateNew($table_name,$where,$data);

				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error updating data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function delete_EmpCredit(){
			$id = $this->input->get('id');
			$table_name = 'emp_credits';
			$table_id = 'emp_credit_id';
			$where = array(
				'emp_credit_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}

			echo json_encode($msg);
		}
		function printCreditList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Employee Deduction Record';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$data['emp'] = $this->uri->segment(5);
			$param = $year.'-'.$month;
			$like = array(
				'credit_date'=>$param
			);
			$join = array(
				array('employee','emp_credits','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('emp_credits',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/creditList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*salary*/
		function fetchEmp(){
			$where = array('emp_status'=>'active');
			$data = $this->admin_model->get_table_record('employee',$where);

			echo json_encode($data);
		}
		function fetchSalary(){
			$result = array('data' => array());
			$table = "emp_salary";
			$order_by = array('salary_id','DESC');
			$join = array(
				array("employee",$table,'emp_id')
			);
			$data = $this->project_model->select_join($table,$join,$like=false,$where=false,$order_by);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
					$buttons = '
	                    <a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->salary_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-print" data="'.base_url('admin/salary_slip/'.$value->salary_id.'/'.$value->emp_id).'" title="Edit"><i class="fa fa-print"></i></a>
					';
					$result['data'][$key] = array(
						$name,
						$value->salary_date_start,
						$value->salary_date_end,
						$value->salary_amount,
						$value->credit_amount,
						$value->overtime_tamount,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function create_salary(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('start','Start Date','required');
			$this->form_validation->set_rules('end','End Date','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				//salary
				$emp_where = array('employee.emp_id'=>set_value('employee'));
				$join = array(
					array('job_position','employee','job_position_id')
				);
				$employee = $this->admin_model->join_record('employee',$join,false,$emp_where);
				foreach ($employee as $empval) {
					$salary = $empval->salary_rate;
				}

				//credits
				$credit_where = array(
					'emp_id'=>set_value('employee')
				);
				$credit = $this->admin_model->get_table_record('emp_credits',$credit_where);
				$credit_id = array();
				$credit_total = 0;
				if ($credit != false) {
					foreach ($credit as $creditval) {
						if ($creditval->credit_date >= set_value('start') && $creditval->credit_date <= set_value('end')) {
							$subtotal = $creditval->credit_item_amount*$creditval->credit_item_qty;
							$credit_total = $credit_total+$subtotal;
							$credit_id[] = $creditval->emp_credit_id;
						}
					}
				}else{
					$credit_total = 0;
				}

				//overtime
				$ot_where = array('emp_overtime.emp_id'=>set_value('employee'));
				$join1 = array(
					array('overtime_type','emp_overtime','ot_type_id')
				);
				$ot = $this->admin_model->join_record('emp_overtime',$join1,false,$ot_where);
				$ot_tamount = 0;
				$thours = 0;
				$num_nights = count($ot);
				if ($ot != false) {
					foreach ($ot as $empot) {
						if ($empot->date >= set_value('start') && $empot->date <= set_value('end')) {
							/*$ot = $empot->num_hours*$empot->ot_rate;
							$ot_tamount = $ot_tamount+$ot;
							$thours = $thours+$empot->num_hours;*/
							//echo $empot->emp_overtime_id.'('.$empot->num_hours.'*'.$empot->ot_rate.')<br />';
							$ot = $empot->ot_rate;
							$ot_tamount = $ot_tamount+$ot;
							//$thours = $thours+$empot->num_hours;
						}
					}
				}else{
					$ot_tamount = 0;
				}

				//attendance
				$attendance_where = array("emp_id"=>set_value('employee'));
				$attendance = $this->admin_model->get_table_record('emp_attendance',$attendance_where);
				$days = 0;
				if ($attendance != false) {
					foreach ($attendance as $attendance) {
						//$date = substr($attendance->time_in, 0,10);
						$date = $attendance->attend_date;
						if ($date >= set_value('start') && $date <= set_value('end')) {
							$days++;
						}
					}
				}

				$data = array(
					'emp_id'=>set_value('employee'),
					'salary_amount'=>$salary*$days,
					'salary_date_start'=>set_value('start'),
					'salary_date_end'=>set_value('end'),
					'credit_amount'=>$credit_total,
					'overtime_thours'=>$num_nights,
					'overtime_tamount'=>$ot_tamount,
					'num_days'=>$days
				);

				$check_where = array(
					'emp_id'=>set_value('employee'),
				);
				$check_like = array(
					'salary_date_start'=>set_value('start'),
					'salary_date_end'=>set_value('end'),
					'emp_id'=>set_value('employee')
				);

				$check = $this->project_model->check_multi_duplicate('emp_salary',$check_like);
				if ($check != true) {
					$insert = $this->project_model->insert('emp_salary',$data);
					if ($insert != false) {
						$counter=0;
						$creditnum=0;
						foreach ($credit_id as $id) {
							$creditnum++;
							$update_data = array(
								'credit_status'=>'paid',
							);
							$where_update = array(
								'emp_credit_id'=>$id
								);
							$update = $this->project_model->updateNew('emp_credits',$where_update,$update_data);
							if ($update != false) {
								$counter++;
							}else{
								$msg['error'] = "Unable to update credit status";
								$msg['success'] = false;
							}
						}
						if ($creditnum == $counter) {
							$msg['success'] = true;
						}else{
							$msg['error'] = "Credit counter error.";
							$msg['success'] = false;
						}
					}else{
						$msg['error'] = "Unable to insert emp_salary";
						$msg['success'] = false;
					}
				}else{
					$msg['error'] = "Duplicate weekly salary detected.";
					$msg['success'] = false;
				}
			}
			echo json_encode($msg);
		}
		function delete_salary(){
			$salary_id = $this->input->get('id');

			$empsal_where = array("salary_id"=>$salary_id);
			$empsal = $this->project_model->select('emp_salary',false,$empsal_where);
			if ($empsal != false) {
				foreach ($empsal as $empsal) {
					$date = substr($empsal->salary_date_start,0,7);
					$credit_where = array('credit_status'=>'not_paid','emp_id'=>$empsal->emp_id);
					$credit_like = array('credit_date'=>$date);
					$credit = $this->project_model->select('emp_credits',$credit_like,$credit_where);
					if ($credit != false) {
						$item =0;
						$counter=0;
						foreach ($credit as $creditval) {
							if ($creditval->credit_date >= $empsal->salary_date_start && $creditval->credit_date <= $empsal->salary_date_end) {
								$item++;
								$update_data = array("credit_status"=>"not_paid");
								$where_update = array("emp_credit_id"=>$creditval->emp_credit_id);
								$update = $this->project_model->updateNew('emp_credits',$where_update,$update_data);
								if ($update != false) {
									$counter++;
								}else{
									$msg['error'] = "Unable to update credit status.";
									$msg['success'] = false;
								}
							}
						}

						if ($item == $counter) {
							$where_delete = array('salary_id'=>$salary_id);
							$delete = $this->project_model->deleteNew('emp_salary',$where_delete);
							if ($delete != false) {
								$msg['success'] = true;
							}else{
								$msg['error'] = "Unable to delete salary.";
								$msg['success'] = false;
							}
						}else{
							$msg['error'] = "Item counter error.";
							$msg['success'] = false;
						}
					}else{
						$where_delete = array('salary_id'=>$salary_id);
						$delete = $this->project_model->deleteNew('emp_salary',$where_delete);
						if ($delete != false) {
							$msg['success'] = true;
						}else{
							$msg['error'] = "Unable to delete salary.";
							$msg['success'] = false;
						}
					}
				}
			}else{
				$msg['error'] = "Unable to find salary.";
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function salary_slip(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Salary Slip';

			$salary_where = array('emp_salary.salary_id'=>$this->uri->segment(3));
			$join = array(
				array('employee','emp_salary','emp_id'),
				array('job_position','employee','job_position_id'),
				array('salary_term','job_position','salary_term_id')
			);
			$data['salary'] = $this->admin_model->join_record('emp_salary',$join,false,$salary_where);

			//credits
			$credit_where = array(
				'emp_id'=>$this->uri->segment(4)
			);
			$data['credit'] = $this->project_model->select('emp_credits',false,$credit_where);

			$data['property']= $this->project_model->select('property_info',false,false,false);
			$data['employee'] = false;
			$this->load->view('admin/header',$data);
			$this->load->view('print_form/salary_slip',$data);
			$this->load->view('admin/footer',$data);
		}
	/*employee overtime*/
		function fetchEmpOT(){
			$result = array('data' => array());

			$join = array(
				array('employee','emp_overtime','emp_id'),
				array('overtime_type','emp_overtime','ot_type_id')
			);

			$data = $this->project_model->select_join('emp_overtime',$join);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_overtime_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_overtime_id.'" title="Edit"><i class="fa fa-pencil"></i></a>';
					$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
					$rate = $value->ot_rate.' / '.$value->ot_type_term;
					$result['data'][$key] = array(
						$name,
						$value->date,
						$value->num_hours,
						$value->from,
						$value->to,
						$value->ot_type_name,
						$rate,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function fetchOtType(){
			$result = $this->project_model->select('overtime_type');
			echo json_encode($result);
		}
		function editEmpOT(){
			$id = $this->input->get('id');
			$where = array('emp_overtime_id'=>$id);
			$join = array(
				array('employee','emp_overtime','emp_id'),
				array('overtime_type','emp_overtime','ot_type_id')
			);

			$result = $this->project_model->single_select('emp_overtime',$where,$join);
				$data['emp_id'] = $result->emp_id;
				$data['emp_overtime_id'] = $result->emp_overtime_id;
				$data['date'] = $result->date;
				$data['ot_type_id'] = $result->ot_type_id;
				$from = new DateTime($result->from);
				$to = new DateTime($result->to);
				$data['from'] = $from->format('H:i');
				$data['to'] = $to->format('H:i');

			echo json_encode($data);
		}
		function add_EmpOT(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('ot_type','OT Type','required');
			$this->form_validation->set_rules('start_time','Start Time','required');
			$this->form_validation->set_rules('end_time','End Time','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$start = new Datetime(set_value('start_time'));
	            $end = new Datetime(set_value('end_time'));

	            $interval = $start->diff($end);
				$data = array(
					"emp_id"=>set_value('employee'),
					"date"=>set_value('date'),
					"num_hours"=>$interval->format('%h'),
					"from"=>$start->format('h:i A'),
					"to"=>$end->format('h:i A'),
					"ot_type_id"=>set_value('ot_type')
					);
				$table_name = 'emp_overtime';

				$array = array(
					"emp_id"=>set_value('employee'),
					"date"=>set_value('date')
					);
				$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$array);

				if ($check_duplicate != true) {
					$add = $this->project_model->insert($table_name,$data);

					if ($add == true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Error adding overtime.';
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Duplicate record found.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function update_EmpOT(){
			$this->form_validation->set_rules('id','ID','required');
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('ot_type','OT Type','required');
			$this->form_validation->set_rules('start_time','Start Time','required');
			$this->form_validation->set_rules('end_time','End Time','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$start = new Datetime(set_value('start_time'));
	            $end = new Datetime(set_value('end_time'));

	            $interval = $start->diff($end);
				$data = array(
					"emp_id"=>set_value('employee'),
					"date"=>set_value('date'),
					"num_hours"=>$interval->format('%h'),
					"from"=>$start->format('h:i A'),
					"to"=>$end->format('h:i A'),
					"ot_type_id"=>set_value('ot_type')
					);
				$table_name = 'emp_overtime';
				$id = set_value('id');
				$where = array(
					'emp_overtime_id'=>$id
				);
				$result = $this->project_model->updateNew($table_name,$where,$data);

				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error updating data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function delete_EmpOT(){
			$id = $this->input->get('id');
			$table_name = 'emp_overtime';
			$where = array(
				'emp_overtime_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}

			echo json_encode($msg);
		}
		function printOTList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Employee Overtime Record';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$data['emp'] = $this->uri->segment(5);
			$param = $year.'-'.$month;
			$like = array(
				'date'=>$param
			);
			$join = array(
				array('employee','emp_overtime','emp_id'),
				array('overtime_type','emp_overtime','ot_type_id')
			);
			$data['result' ] = $this->project_model->select_join('emp_overtime',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/otList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*employee attendance*/
		function fetchEmpAttend(){
			$result = array('data' => array());

			$join = array(
				array('employee','emp_attendance','emp_id'),
				array('job_position','employee','job_position_id'),
				array('salary_term','job_position','salary_term_id')
			);

			$data = $this->project_model->select_join('emp_attendance',$join);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$buttons = '
						<a href="javascript:;" class="btn btn-primary punch-out" data="'.$value->emp_attendance_id.'" title="Pounch Out"><i class="fa fa-sign-out"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_attendance_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_attendance_id.'" title="Edit"><i class="fa fa-pencil"></i></a>';
					$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
					$timein = new DateTime($value->time_in);
					$timeout = new DateTime($value->time_out);
					$result['data'][$key] = array(
						$value->attend_date,
						$name,
						$timein->format('h:i A'),
						$timeout->format('h:i A'),
						$value->job_position_name,
						$value->salary_rate,
						$value->salary_term_name,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function add_EmpAttend(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('timein','Time In','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$timein = new Datetime(set_value('timein'));

				$data = array(
					"emp_id"=>set_value('employee'),
					"attend_date"=>set_value('date'),
					"time_in"=>$timein->format('h:i A'),
					"punch_by"=>'0'
					);
				$table_name = 'emp_attendance';

				$array = array(
					"emp_id"=>set_value('employee'),
					"attend_date"=>set_value('date')
					);
				$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$array);

				if ($check_duplicate != true) {
					$add = $this->project_model->insert($table_name,$data);

					if ($add == true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Error adding attendance.';
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Duplicate record found.';
				}
			}
			$msg['type'] = 'Add';
			echo json_encode($msg);
		}
		function delete_EmpAttend(){
			$id = $this->input->get('id');
			$table_name = 'emp_attendance';
			$where = array(
				'emp_attendance_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}

			echo json_encode($msg);
		}
		function editEmpAttend(){
			$id = $this->input->get('id');
			$where = array('emp_attendance_id'=>$id);
			$join = array(
				array('employee','emp_attendance','emp_id'),
				array('job_position','employee','job_position_id'),
				array('salary_term','job_position','salary_term_id')
			);

			$result = $this->project_model->single_select('emp_attendance',$where,$join);
				$data['id'] = $result->emp_attendance_id;
				$data['emp_id'] = $result->emp_id;
				$data['attend_date'] = $result->attend_date;
				$timein = new DateTime($result->time_in);
				$data['time_in'] = $timein->format('H:i');

			echo json_encode($data);
		}
		function update_EmpAttend(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('timein','Time In','required');
			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$timein = new Datetime(set_value('timein'));

				$data = array(
					"emp_id"=>set_value('employee'),
					"attend_date"=>set_value('date'),
					"time_in"=>$timein->format('h:i A'),
					);
				$table_name = 'emp_attendance';
				$id = set_value('id');
				$where = array(
					'emp_attendance_id'=>$id
				);
				$result = $this->project_model->updateNew($table_name,$where,$data);

				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error updating data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function punchOut_EmpAttend(){
			$this->form_validation->set_rules('timeout','Time Out','required');
			$this->form_validation->set_rules('attend_id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$timeout = new Datetime(set_value('timeout'));
				$data = array(
					"time_out"=> $timeout->format('h:i A'),
					);
				$table_name = 'emp_attendance';
				$id = set_value('attend_id');
				$where = array(
					'emp_attendance_id'=>$id
				);
				$result = $this->project_model->updateNew($table_name,$where,$data);

				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error updating data.';
				}
			}
			$msg['type'] = 'Update';
			echo json_encode($msg);
		}
		function printAttendList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Employee Attendance Record';

			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			$data['emp'] = $this->uri->segment(5);
			$param = $year.'-'.$month;
			$like = array(
				'attend_date'=>$param
			);
			$join = array(
				array('employee','emp_attendance','emp_id'),
				array('job_position','employee','job_position_id'),
				array('salary_term','job_position','salary_term_id')
			);
			$data['result' ] = $this->project_model->select_join('emp_attendance',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/attendList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*income statement*/
		function fetchIncomeStatement(){
			$result = array('data' => array());

			$data = $this->project_model->select('incomeStatement');
			if ($data != false) {
				foreach ($data as $key => $value) {
					$texp = $this->cart->format_number($value->total_miscexp+$value->total_prodexp+$value->total_stocksexp+$value->total_salexp);
					$buttons = '
						<a href="javascript:;" class="btn btn-primary item-print" data="'.$value->statement_id.'" title="Print"><i class="fa fa-print"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->statement_id.'" title="Select"><i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->statement_date,
						$value->total_sales,
						$texp,
						$value->net_profit,
						$value->shop_share,
						$value->kim_share,
						$value->bank_balance,
						$value->deposit_amount,
						$buttons
					);
					/*<th>Statement Date</th>
                    <th>Total Sales</th>
                    <th>Total Expenses</th>
                    <th>Net Profit</th>
                    <th>Shop Share(40%)</th>
                    <th>Kim Share(60%)</th>
                    <th>Bank Bal.</th>
                    <th>Deposit Amount</th>
                    <th>Action</th>*/
				}
			}
			echo json_encode($result);
		}
		function createIncomeStatement(){
			$this->form_validation->set_rules('mon','Statement Month','required');
			$this->form_validation->set_rules('year','Statement Year','required');
			$this->form_validation->set_rules('bankBalance','Current Bank Balance','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$param = set_value('year').'-'.set_value('mon');

				/*misc*/
				$like = array(
				'misc_date'=>$param
				);
				$misc = $this->project_model->select('expenses_misc',$like);
				$misc_amount = 0;
	            $misc_tamount = 0;
				if ($misc != false) {
	                foreach ($misc as $item) {
	                    $misc_amount = $item->misc_qty * $item->misc_price;
	                    $misc_tamount = $misc_tamount + $misc_amount;
	                }
            	}

            	/*production*/
				$like = array(
					'releasecart.release_date'=>$param
				);
				$join = array(
				array('releasecart','releaseditem','releaseCart_id'),
				array('order','releasecart','order_id')
				);
				$prod = $this->project_model->select_join('releaseditem',$join,$like);
                $prod_amount = 0;
                $prod_tamount = 0;
				if ($prod != false) {
                    foreach ($prod as $item) {
                        $prod_amount = $item->releaseitem_qty * $item->releaseitem_cost;
                        $prod_tamount = $prod_tamount + $prod_amount;
                    }
                }

                /*equip*/
				$like = array(
				'expequip_date'=>$param
				);
				$equip = $this->project_model->select('expenses_equip',$like);
                $expequip_amount = 0;
                $expequip_tamount = 0;
				if ($equip != false) {
                    foreach ($equip as $item) {
                        $expequip_amount = $item->expequip_qty * $item->expequip_price;
                        $expequip_tamount = $expequip_tamount + $expequip_amount;
                    }
                }

                /*stocks*/
				$like = array(
				'expstocks_date'=>$param
				);
				$stocks = $this->project_model->select('expenses_stocks',$like);
                $expstocks_amount = 0;
			    $expstocks_tamount = 0;
			    if ($stocks != false) {
			        foreach ($stocks as $item) {
			            $expstocks_amount = $item->expstocks_qty * $item->expstocks_price;
			            $expstocks_tamount = $expstocks_tamount + $expstocks_amount;
			        }
			    }

			    /*salary*/
				$like = array(
				'salary_date_start'=>$param
				);
				$salary = $this->project_model->select('emp_salary',$like);
				$tsal = 0;
			    if ($salary != false) {
			        foreach ($salary as $value) {
			            $initsal= $value->salary_amount+$value->overtime_tamount;
			            $tsal= $initsal + $tsal;
			        }
			    }

			    /*returns*/
				$like = array(
				'returns_date'=>$param
				);
				$return = $this->project_model->select('expenses_returns',$like);
				$aRefund_amount = 0;
			    $total_aRefund = 0;
			    $oRefund_amount = 0;
			    $total_oRefund = 0;
			    if ($return != false) {
			        foreach ($return as $value) {
			            // account_refund or other_refund
			            if ($value->return_type == 'account_refund') {
			                $aRefund_amount = $value->returns_price*$value->returns_qty;
			                $total_aRefund = $total_aRefund + $aRefund_amount;
			            }elseif ($value->return_type == 'other_refund'){
			                $oRefund_amount = $value->returns_price*$value->returns_qty;
			                $total_oRefund = $total_oRefund + $oRefund_amount;
			            }
			        }
			    }

			    /*sales*/
				$like = array(
				'order_date'=>$param
				);
				$sales = $this->project_model->select('order',$like);
				$tax = 0;
			    $tamount = 0;
			    $totalSales = 0;
			    $sale = 0;
			    $totaltax = 0;
			    $totaldiscount = 0;
			    $totalamount = 0;
			    $tsales = 0;
			    if ($sales != false) {
			        foreach ($sales as $item) {
			            $tax = $item->order_bill_amount * 0.03;
			            $totaltax = $tax + $totaltax;
			            $tsales = $item->order_bill_amount-$item->order_discount;
			            $totalSales = $item->order_bill_amount + $totalSales;
			            $totaldiscount = $item->order_discount + $totaldiscount;

			            $tamount = $totalSales-$totaltax-$totaldiscount;
			        }
			    }

			    $totalSales = $totalSales-$totaldiscount;
                $profit = $totalSales - $totaltax - $misc_tamount - $prod_tamount - $tsal - $expequip_tamount - $total_aRefund;
			    $shop_share = $profit * 0.50;
			    $kim_share = $profit * 0.50;
			    $deposit  = $shop_share+$prod_tamount+$total_aRefund;
			    $total_refund = $total_aRefund+$total_oRefund;

                $data = array(
                	'total_sales'=>$totalSales,
                	'total_taxexp'=>$totaltax,
                	'total_miscexp'=>$misc_tamount,
                	'total_prodexp'=>$prod_tamount,
                	'total_stocksexp'=>$expstocks_tamount,
                	'total_salexp'=>$tsal,
                	'statement_date'=>$param,
                	'net_profit'=>$profit,
                	'shop_share'=>$shop_share,
                	'kim_share'=>$kim_share,
                	'bank_balance'=>set_value('bankBalance'),
                	'deposit_amount'=>$deposit,
                	'total_arefund'=>$aRefund_amount,
                	'total_orefund'=>$oRefund_amount,
                	'total_equipexp'=>$expequip_tamount
                );
                $like = array(
                	'statement_date'=>$param
                );
                $check = $this->project_model->check_multi_duplicate('incomestatement',$where=false,$return=false,$like);
                if ($check != true) {
                	$create = $this->project_model->insert('incomestatement',$data);
                	if ($create != false) {
                		$msg['success'] = true;
                	}else{
                		$msg['error'] = "Unable to create statement.";
                		$msg['success'] = false;
                	}
                }else{
                	$msg['error'] = "Duplicate record detected.";
                	$msg['success'] = false;
                }

			}
			echo json_encode($msg);

		}
		function deleteIncomeStatement(){
			$id = $this->input->get('id');
			$table_name = 'incomestatement';
			$where = array(
				'statement_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function printIncomeStatement(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Income Statement';

			$id = $this->uri->segment(3);

			$where = array(
				'statement_id'=>$id
				);
			$data['statement'] = $this->project_model->select('incomestatement',false,$where);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/incomeStatementForm',$data);
			$this->load->view('admin/footer',$data);
		}

//testing center
	function testFunction(){
		$result = array('data' => array());
		$data = $this->project_model->select('overtime_type');
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->ot_type_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->ot_type_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->ot_type_id,
					$value->ot_type_name,
					$value->ot_rate,
					$value->ot_type_term,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
}
