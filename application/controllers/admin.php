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
		$this->form_validation->set_rules('tin','TIN','required');

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
				"tin"=>set_value('tin'),
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

	function access_control(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Manage Access";
		$data['page'] = 'Administrator';

		$data['term'] = $this->admin_model->get_table_record('assign_access',false,false,false);

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('admin/access',$data);
		$this->load->view('admin/footer',$data);
	}
	function fetchAccess(){
		$result = array('data' => array());
		$data = $this->project_model->select('assign_access');
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->assign_access_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';
				$result['data'][$key] = array(
					$value->account_type,
					$value->mac_address,
					$value->computer,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function addAccess(){
		$this->form_validation->set_rules('account_type','Account Type','required');
		$this->form_validation->set_rules('mac','MAC Address','required');
		$this->form_validation->set_rules('computer','Computer Name','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				"account_type"=>set_value('account_type'),
				"mac_address"=>set_value('mac'),
				"computer"=>set_value('computer')
			);
			$table_name = 'assign_access';
			$cwhere = array(
				'account_type'=>set_value('account_type'),
				'mac_address'=>set_value('mac')
			);
			$check_duplicate = $this->admin_model->check_multi_duplicate($table_name,$cwhere);
			if ($check_duplicate != true) {
				$add = $this->project_model->insert('assign_access',$data);
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
	function deleteAccess(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('assign_access','assign_access_id',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
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
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('mname','Middle Name','required');
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('bdate','Birthdate','');
		$this->form_validation->set_rules('home_address','Home Address','');
		$this->form_validation->set_rules('contact_num','Contact Number','');
		$this->form_validation->set_rules('email_address','Email Address','');
		$this->form_validation->set_rules('position','Position','required');
		$this->form_validation->set_rules('status','Status','required');

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
				"emp_status"=>set_value('status')
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
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('mname','Middle Name','required');
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('bdate','Birthdate','');
		$this->form_validation->set_rules('home_address','Home Address','');
		$this->form_validation->set_rules('contact_num','Contact Number','');
		$this->form_validation->set_rules('email_address','Email Address','');
		$this->form_validation->set_rules('position','Position','required');
		$this->form_validation->set_rules('status','Status','required');
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
				"emp_status"=>set_value('status')
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
			$where = array(
				"emp_username"=>set_value('username'),
				"emp_dept"=>set_value('dept')
			);
			$check = $this->project_model->check_multi_duplicate('emp_accounts',$where);
				if ($check != true) {
					$add = $this->project_model->insert('emp_accounts',$data);
				if ($add != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error duplicate record found.';
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

	private function getLowStock(){

	}

	function fetchLowStock(){
		$date = date("Y-m-d");
		$dataarray = array();
		$join  = array(
				array('suppliers','stockitem','supplier_id'),
				array('stockcategory','stockitem','stockCat_id'),
				array('stock_class','stockitem','stockclass_id')
		);
		$where = array("stock_type"=>"instock");
		$items = $this->project_model->select_join('stockitem',$join,false,$where);
		foreach ($items as $result) {
			$where = array('stock_id'=>$result->stock_id,"delivery_stat"=>"received");
			$tstock = 0;
			$new = $this->project_model->select('stock_newlog',false,$where);
			if ($new != false) {
				foreach ($new as $value) {
					$tstock = $tstock + $value->nstock_qqty;
				}
			}

			$where3 = array('stock_id'=>$result->stock_id);
			$like = array('transfer_date <='=>$date);
			$branch = $this->project_model->select('branch_stocks',false,$where3);
			$tbranch = 0;
			if ($branch != false) {
				foreach ($branch as $value3) {
					$tbranch = $tbranch + $value3->bstocks_qty;
				}
			}

			$where4 = array('stock_id'=>$result->stock_id);
			$release = $this->project_model->select('releaseditem',false,$where3);
			$trelease = 0;
			if ($release != false) {
				foreach ($release as $value4) {
					$trelease = $trelease + $value4->releaseitem_qty;
				}
			}

			$where2 = array('stock_id'=>$result->stock_id);
			$sold = $this->project_model->select('ordered_item',false,$where2);
			$tsold = 0;
			$tout = 0;
			if ($sold != false) {
				foreach ($sold as $value2) {
						$tsold = $tsold + $value2->order_qty;
				}
			}

			$tout = $tsold + $tbranch + $trelease;

			$tcurrent = $tstock - $tout;

			$dataarray[] = array(
				"class"=>$result->stockclass_name,
				"category"=>$result->stockCat_name,
				"item"=>$result->stock_name,
				"unit"=>$result->stock_unit,
				"total"=>$this->cart->format_number($tcurrent),
				"out"=>$this->cart->format_number($tout),
				"receive"=>$this->cart->format_number($tstock),
				"supplier"=>$result->supplier_name,
				"telephone"=>$result->supplier_tel,
				"mobile"=>$result->supplier_mobile

			);
			$result = $dataarray;
		}
		if($dataarray != false){
			foreach ($dataarray as $key => $value) {
					$result['data'][$key] = array(
						$value['class'],
						$value['category'],
						$value['item'],
						$value['unit'],
						$value['total'],
						/* $value['out'],
						$value['receive'], */
						$value['supplier'],
						$value['telephone'],
						$value['mobile']
					);
			}
		}
		echo json_encode($result);
	}

	function stockFinished_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Finished Stock Inventory';

		// $order = array('stockCat_id','ASC');
		// $join = array(
		// 	array('suppliers','stockitem','supplier_id'),
		// 	array('stockcategory','stockitem','stockCat_id'),
		// 	array('stock_class','stockitem','stockclass_id')
		// );
		// $data['result'] = $this->project_model->select_join('stockitem',$join,$like=false,$where=false,$order);
		$date = $this->uri->segment(3);
		$dataarray = array();
		$iwhere = array('stockclass_name'=>"FINISHED","stock_type"=>"instock");
		$join  = array(
				array('suppliers','stockitem','supplier_id'),
				array('stockcategory','stockitem','stockCat_id'),
				array('stock_class','stockitem','stockclass_id')
		);
		$items = $this->project_model->select_join('stockitem',$join,false,$iwhere);
		foreach ($items as $result) {
			$where = array('stock_id'=>$result->stock_id,'delivery_date <='=>$date,"delivery_stat"=>"received");
			$tcurrent = 0;
			$new = $this->project_model->select('stock_newlog',false,$where);
			if ($new != false) {
				foreach ($new as $value) {
					$tcurrent = $tcurrent + $value->nstock_qqty;
				}
			}

			$where3 = array('stock_id'=>$result->stock_id);
			$like = array('transfer_date <='=>$date);
			$branch = $this->project_model->select('branch_stocks',false,$where3);
			$tbranch = 0;
			if ($branch != false) {
				foreach ($branch as $value3) {
					$tbranch = $tbranch + $value3->bstocks_qty;
				}
			}

			$where2 = array('stock_id'=>$result->stock_id,'order_date <='=>$date);
			$sold = $this->project_model->select('ordered_item',false,$where2);
			$tsold = 0;
			$tout = 0;
			if ($sold != false) {
				foreach ($sold as $value2) {
					$tsold = $tsold + $value2->order_qty;
				}
			}

			$tout = $tsold + $tbranch;


			$total = $tcurrent - $tout;
			//echo $result->stock_name.': '.$tcurrent.' - '.$tbranch.' - '.$tsold.' = [out:'.$tout.'][left:'.$total.']<br />';
			//echo $result->stock_name.': '.$tcurrent.' - '.$tbranch.' = '.$total.'<br />';
			$dataarray[] = array(
				"category"=>$result->stockCat_name,
				"supplier"=>$result->supplier_name,
				"item"=>$result->stock_name,
				"unit"=>$result->stock_unit,
				"total"=>$total,
				"receive"=>$tcurrent,
				"out"=>$tout
			);
			$data['result'] = $dataarray;
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/stocklist',$data);
		$this->load->view('admin/footer',$data);
	}

	function stockRaw_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Raw Stock Inventory';

		// $order = array('stockCat_id','ASC');
		// $join = array(
		// 	array('suppliers','stockitem','supplier_id'),
		// 	array('stockcategory','stockitem','stockCat_id'),
		// 	array('stock_class','stockitem','stockclass_id')
		// );
		// $data['result'] = $this->project_model->select_join('stockitem',$join,$like=false,$where=false,$order);
		$date = $this->uri->segment(3);
		$dataarray = array();
		$iwhere = array('stockclass_name'=>"RAW","stock_type"=>"instock");
		$join  = array(
				array('suppliers','stockitem','supplier_id'),
				array('stockcategory','stockitem','stockCat_id'),
				array('stock_class','stockitem','stockclass_id')
		);
		$items = $this->project_model->select_join('stockitem',$join,false,$iwhere);
		foreach ($items as $result) {
			$where = array('stock_id'=>$result->stock_id,"delivery_stat"=>"received");
			$tcurrent = 0;
			$new = $this->project_model->select('stock_newlog',false,$where);
			if ($new != false) {
				foreach ($new as $value) {
					$tcurrent = $tcurrent + $value->nstock_qqty;
				}
			}
			$where2 = array('stock_id'=>$result->stock_id);
			$sold = $this->project_model->select('releaseditem',false,$where2);
			$tsold = 0;
			if ($sold != false) {
				foreach ($sold as $value2) {
					$tsold = $tsold + $value2->releaseitem_qty;
				}
			}

			$total = $tcurrent - $tsold;
			//echo $result->stock_name.': '.$tcurrent.' - '.$tsold.' = '.$total.'<br />';
			$dataarray[] = array("category"=>$result->stockCat_name,"supplier"=>$result->supplier_name,"item"=>$result->stock_name,"unit"=>$result->stock_unit,"total"=>$total,"receive"=>$tcurrent,"out"=>$tsold);
			$data['result'] = $dataarray;
		}

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/stocklist',$data);
		$this->load->view('admin/footer',$data);
	}

	function stockInfo_sheet(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = ' Stock Information Sheet';

		$order = array('suppliers.supplier_id','ASC');
		$join = array(
			array('suppliers','stockitem','supplier_id'),
			array('stockcategory','stockitem','stockCat_id'),
			array('stock_class','stockitem','stockclass_id')
		);
		$data['result'] = $this->project_model->select_join('stockitem',$join,$like=false,$where=false,$order);
		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/printStockDetails',$data);
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

	function production_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Produce Stocks Form';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/produce_stocks',$data);
		$this->load->view('admin/footer',$data);
	}

	function damagestocks_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Damage Stocks Form';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/damage_stock',$data);
		$this->load->view('admin/footer',$data);
	}

	function withdrawal_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Stock Withdrawal Form';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/stock_withdrawal',$data);
		$this->load->view('admin/footer',$data);
	}

	function request_form(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Produce Stocks Form';

		$data['property']= $this->admin_model->get_table_record('property_info',false,false,false);
		$this->load->view('admin/header',$data);
		$this->load->view('print_form/request_form',$data);
		$this->load->view('admin/footer',$data);
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
		$data['suppliers'] = $this->project_model->select('suppliers');
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
	function suppliers(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Suppliers";
		$data['page'] = 'Stock';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('storage/suppliers',$data);
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
	function resetStocks(){
		$where = array('stockclass_name'=>'FINISHED');
		$get = $this->project_model->single_select('stock_class',$where);
		$data = array(
			"stock_qqty"=>0,
			"stockDispose"=>0
			);
		$where2 = array('stockclass_id'=>$get->stockclass_id);
		$reset = $this->project_model->updateNew('stockitem',$where2,$data);
		if ($reset != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = "Unable to reset stocks.";
		}
		echo json_encode($msg);
	}
	function fetchStockItem(){
		$result = array('data' => array());

		$join = array(
				array('stockcategory','stockitem','stockCat_id'),
				array('suppliers','stockitem','supplier_id'),
				array('stock_class','stockitem','stockclass_id')
			);
		$data = $this->project_model->select_join('stockitem',$join);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$tcost = $this->cart->format_number($value->stockCost*$value->stock_qqty);
				$buttons = '
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stock_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stock_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
				';

				/*$where = array('stock_id'=>$value->stock_id);

				$tcurrent = 0;
				$new = $this->project_model->select('stock_newlog',false,$where);
				if ($new != false) {
					foreach ($new as $value1) {
						$tcurrent = $tcurrent + $value1->nstock_qqty;
					}
				}


				$branch = $this->project_model->select('branch_stocks',false,$where);
				$tbranch = 0;
				if ($branch != false) {
					foreach ($branch as $value3) {
						$tbranch = $tbranch + $value3->bstocks_qty;
					}
				}


				$sold = $this->project_model->select('ordered_item',false,$where);
				$tsold = 0;
				if ($sold != false) {
					foreach ($sold as $value2) {
						$tsold = $tsold + $value2->order_qty;
					}
				}

				$total= 0;
				$tout = 0;

				if ($value->stock_type=="instock") {
					$tout = $tsold + $tbranch;
					$total = $tcurrent - $tout;
				}else{
					$tout = 0;
					$total = 0;
				}*/
				$tout = 0;
				$total = 0;
				$result['data'][$key] = array(
					$value->stockclass_name,
					$value->stockCat_name,
					$value->supplier_name,
					$value->stock_name,
					$value->stock_unit,
					/*$total,
					$tout,*/
					$value->stock_alert,
					$value->stockCost,
					$value->retail_price,
					$tcost,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function createItem(){
		$type = $this->input->post('stock_type');

		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('name','Item name','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('cost','Cost','required');
		$this->form_validation->set_rules('rp','Retail Price','required');
		$this->form_validation->set_rules('stockclass','Stock class','required');
		$this->form_validation->set_rules('stock_type','Stock type','required');
		$this->form_validation->set_rules('supplier','Supplier','required');

		if ($type == "instock") {
			$this->form_validation->set_rules('alert','Alert quantity','required');
			$this->form_validation->set_rules('qty','Stock Quantity','required');
		}

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			if ($type == "instock") {
			  $data = array(
			    "stockCat_id"=>set_value('category'),
			    "stock_name"=>ucwords(set_value('name')),
			    "stock_unit"=>set_value('unit'),
			    "stock_qqty"=>set_value('qty'),
			    "stockCost"=>set_value('cost'),
			    "stockclass_id"=>set_value('stockclass'),
			    "stock_type"=>set_value('stock_type'),
					"stock_alert"=>set_value('alert'),
			    "supplier_id"=>set_value('supplier'),
					"retail_price"=>set_value('rp')
			  );
			}else{
			  $data = array(
			    "stockCat_id"=>set_value('category'),
			    "stock_name"=>ucwords(set_value('name')),
			    "stock_unit"=>set_value('unit'),
			    "stock_qqty"=>0,
			    "stockclass_id"=>set_value('stockclass'),
			    "stockCost"=>set_value('cost'),
			    "stock_type"=>set_value('stock_type'),
					"stock_alert"=>0,
			    "supplier_id"=>set_value('supplier'),
					"retail_price"=>set_value('rp')
			  );
			}
			$like = array('stock_name'=>ucwords(set_value('name')),"stockCat_id"=>set_value('category'));
			$check = $this->project_model->check_multi_duplicate('stockitem',$where=false,$return=false,$like,$join=false);
			if ($check != true) {
					$result = $this->project_model->insert('stockitem',$data);
					$msg['type'] = 'add';
					if ($result) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Error adding item';
					}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Duplicate record found.';
			}
		}

		$msg['type'] = 'add';
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

		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('name','Item name','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('cost','Cost','required');
		$this->form_validation->set_rules('rp','Retail Price','required');
		$this->form_validation->set_rules('stockclass','Stock class','required');
		$this->form_validation->set_rules('stock_type','Stock type','required');
		$this->form_validation->set_rules('supplier','Supplier','required');

		if ($type == "instock") {
			$this->form_validation->set_rules('alert','Alert quantity','required');
			$this->form_validation->set_rules('qty','Stock Quantity','required');
		}

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			if ($type == "instock") {
				$data = array(
					"stockCat_id"=>set_value('category'),
					"stock_name"=>ucwords(set_value('name')),
					"stock_unit"=>set_value('unit'),
					"stock_qqty"=>set_value('qty'),
					"stockCost"=>set_value('cost'),
					"stockclass_id"=>set_value('stockclass'),
					"stock_type"=>set_value('stock_type'),
					"stock_alert"=>set_value('alert'),
					"supplier_id"=>set_value('supplier'),
					"retail_price"=>set_value('rp')
				);
			}else{
				$data = array(
					"stockCat_id"=>set_value('category'),
					"stock_name"=>ucwords(set_value('name')),
					"stock_unit"=>set_value('unit'),
					"stock_qqty"=>0,
					"stockDispose"=>0,
					"stockclass_id"=>set_value('stockclass'),
					"stockCost"=>set_value('cost'),
					"stock_type"=>set_value('stock_type'),
					"stock_alert"=>0,
					"supplier_id"=>set_value('supplier'),
					"retail_price"=>set_value('rp')
				);
			}
			$id = $this->input->post('id');
			$where = array('stock_id'=>$id);
			$result = $this->project_model->updateNew('stockitem',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error updating item';
			}
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

/*====== Stock Class ======*/
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

	/*====== Stock Suppliers ======*/
		function fetchSuppliers(){
			$result = array('data' => array());

			$data = $this->project_model->select('suppliers');

			if ($data != false) {
				foreach ($data as $key => $value) {
					$buttons = '
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->supplier_id.'" title="Print"><i class="fa fa-pencil"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->supplier_id.'" title="Select"><i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->supplier_name,
						$value->supplier_tel,
						$value->supplier_mobile,
						$value->supplier_email,
						$value->supplier_desc,
						$buttons
					);
				}
			}

			echo json_encode($result);
		}
		function addSupplier(){
			$this->form_validation->set_rules("company","Company/Suppliers Name","required");
			$this->form_validation->set_rules("telephone","Telephone","");
			$this->form_validation->set_rules("mobile","Mobile","");
			$this->form_validation->set_rules("email","Email Address","");
			$this->form_validation->set_rules("desc","Supplies","");
			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					'supplier_name'=>ucwords(set_value("company")),
					'supplier_tel'=>set_value("telephone"),
					'supplier_mobile'=>set_value("mobile"),
					'supplier_email'=>set_value("email"),
					'supplier_desc'=>set_value("desc")
					);
				$where =  array("supplier_name"=>ucwords(set_value("company")));
				$check = $this->project_model->check_multi_duplicate('suppliers',$where);
				if ($check != true) {
					$insert = $this->project_model->insert('suppliers',$data);
					if ($insert != false) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Error adding data.";
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Sorry! Duplicate record found.";
				}
			}
			$msg['type'] = 'add';
			echo json_encode($msg);
		}
		function editSupplier(){
			$id = $this->input->get('id');
			$where = array("supplier_id"=>$id);
			$result = $this->project_model->single_select('suppliers',$where);
			echo json_encode($result);
		}
		function updateSupplier(){
			$msg['type'] = 'update';
			$this->form_validation->set_rules("company","Company/Suppliers Name","required");
			$this->form_validation->set_rules("telephone","Telephone","");
			$this->form_validation->set_rules("mobile","Mobile","");
			$this->form_validation->set_rules("email","Email Address","");
			$this->form_validation->set_rules("desc","Supplies","");
			$this->form_validation->set_rules("supplierId","Data Id","required");
			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
					$data = array(
						'supplier_name'=>ucwords(set_value("company")),
						'supplier_tel'=>set_value("telephone"),
						'supplier_mobile'=>set_value("mobile"),
						'supplier_email'=>set_value("email"),
						'supplier_desc'=>set_value("desc")
						);
					$where = array('supplier_id'=>set_value("supplierId"));
					$result = $this->project_model->updateNew('suppliers',$where,$data);
					if ($result != false) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Error updating data.';
					}
			}
			echo json_encode($msg);
		}
		function deleteSupplier(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('suppliers','supplier_id',$id);
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

/*====== Monthly Reports ==========*/
	function branchStocks(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Branch Stocks";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/branchStocks',$data);
		$this->load->view('admin/footer',$data);
	}
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

	function stocksArr(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "New Stocks";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/stocks',$data);
		$this->load->view('admin/footer',$data);
	}

	function stocksExp(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Stock Expense";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/stockExp',$data);
		$this->load->view('admin/footer',$data);
	}

	function dailyOutput(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Daily Output";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/dailyOutput',$data);
		$this->load->view('admin/footer',$data);
	}

	function mishandle(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Mishandle Report";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/mishandle',$data);
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
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/employee_credits',$data);
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

	function cashierLogHistory(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Cashier Log";
		$data['page'] = 'reports';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/nav_v2',$data);
		$this->load->view('reports/cashierLog',$data);
		$this->load->view('admin/footer',$data); } function printCahierLog(){
		$data['title'] = "Administrator"; $data['sub_heading'] = "POS System";
		$data['page'] = 'Cashier Login Record';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$param = $year.'-'.$month;
		$like = array(
			'log_date'=>$param
		);
		$order = array('log_date','asc');
		$join = array(
			array('employee','cashier_logbook','emp_id')
		);
		$data['result' ] = $this->project_model->select_join('cashier_logbook',$join,$like,$where=false,$order);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('reports/printCashierLog',$data);
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
					'misc_date'=>set_value('date')
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
					'misc_date'=>set_value('date')
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

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$order = array('misc_date','asc');
			$data['result' ] = $this->project_model->select('expenses_misc',$like=false,$where=false,$order);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/miscList',$data);
			$this->load->view('admin/footer',$data);
		}

	/*stock expense*/
		function fetchstockExp(){
			$result = array('data' => array());

			$data = $this->project_model->select('expenses_stocks');
				if ($data != false) {
					foreach ($data as $key => $value) {
						$buttons = '
							<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->expstocks_id.'" title="Cancel"> <i class="fa fa-pencil"></i></a>
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->expstocks_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
						';
						$result['data'][$key] = array(
							$value->expstocks_date,
							$value->expstocks_desc,
							$value->expstocks_unit,
							$value->expstocks_qty,
							$value->expstocks_amount,
							$buttons
						);
					}
				}
				echo json_encode($result);
		}
		function deletestockExp(){
			$id = $this->input->get('id');
			$result = $this->project_model->delete('expenses_stocks','expstocks_id',$id);
			if ($result) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
			echo json_encode($msg);
		}
		function editstockExp(){
			$id = $this->input->get('id');
			$where = array("expstocks_id"=>$id);
			$result = $this->project_model->single_select('expenses_stocks',$where);
			echo json_encode($result);
		}
		function updatestockExp(){
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('cost','Cost','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'expstocks_desc'=>ucwords(set_value('desc')),
					'expstocks_qty'=>set_value('qty'),
					'expstocks_unit'=>set_value('unit'),
					'expstocks_amount'=>set_value('cost'),
					'expstocks_date'=>set_value('date')
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
		function printstockExp(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Stock Expenses';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$order = array('expstocks_date','asc');
			$data['result' ] = $this->project_model->select('expenses_stocks',$like=false,$where=false,$order);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/stockExpList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*production*/
		function fetchExpProd(){
			$result = array('data' => array());
			$join = array(
				array('stockitem','releaseditem','stock_id')
			);
			$data = $this->project_model->select_join('releaseditem',$join);
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->stockCost * $value->releaseitem_qty);
					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->release_item_id.'" title="Cancel"> <i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->release_date,
						$value->stock_name,
						$value->releaseitem_unit,
						$value->releaseitem_qty,
						$tcost,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function deleteExpProd(){
			$id = $this->input->get('id');

			$where = array(
				'release_item_id'=>$id
			);

			$get = $this->project_model->single_select('releaseditem',$where);
			$where2 = array(
				'stock_id'=>$get->stock_id
			);
			$stock = $this->project_model->single_select('stockitem',$where2);

			$newstock = $stock->stock_qqty + $get->releaseitem_qty;
			$newdispose = $stock->stockDispose - $get->releaseitem_qty;
			$data = array(
				"stock_qqty"=>$newstock,
				"stockDispose"=>$newdispose
			);
			$update = $this->project_model->updateNew('stockitem',$where2,$data);
			if ($update != false) {
				$result = $this->project_model->deleteNew('releaseditem',$where);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to delete item.";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to update stocks!";
			}


			echo json_encode($msg);
		}
		function printProdList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Production Expenses';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$join = array(
				array('stockitem','releaseditem','stock_id')
			);
			$data['result' ] = $this->project_model->select_join('releaseditem',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/prodList',$data);
			$this->load->view('admin/footer',$data);
		}
		function printProdTPList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Production Third Party Stocks Expenses';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$join = array(
				array('stockitem','ordered_item','stock_id'),
				array('stock_class','stockitem','stockclass_id')
			);
			$data['result' ] = $this->project_model->select_join('ordered_item',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/3rdPProdList',$data);
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
	/*branch stocks*/
		function fetchBranchItem(){
			$result = array('data' => array());
			$join = array(
					array('stockitem','branch_stocks','stock_id'),
					array('employee','branch_stocks','emp_id')
				);
			$data = $this->project_model->select_join('branch_stocks',$join);
				if($data != false){
					foreach ($data as $key => $value) {
						$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->branch_stocksid.'" title="Select"><i class="fa fa-times"></i></a>';
						$result['data'][$key] = array(
							$value->transfer_date,
							$value->branch_name,
							$value->stock_name,
							$value->bstocks_unit,
							$value->bstocks_qty,
							$value->emp_lname,
							$buttons
						);
					}
				}
			echo json_encode($result);
		}
		function deleteBranchStocks(){
			$id = $this->input->get('id');
			$where = array('branch_stocksid'=>$id);
			$info = $this->project_model->single_select('branch_stocks',$where);
			if ($info != false) {
				$where2 = array("stock_id"=>$info->stock_id);
				$getStocks = $this->project_model->single_select('stockitem',$where2);

				$newstock = $getStocks->stock_qqty + $info->bstocks_qty;
				$data = array(
					"stock_qqty"=>$newstock
				);
				$update = $this->project_model->updateNew('stockitem',$where2,$data);
				if ($update != false) {
					$result = $this->project_model->delete('branch_stocks','branch_stocksid',$id);
					if ($result) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Unable to delete record!";
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to return stocks!";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to find record!";
			}


			echo json_encode($msg);
		}
		function printBranchStock(){
			$data['title'] = "Production";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Branch Stock Report';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$branch = $this->uri->segment(5);
			$join = array(
					array('stockitem','branch_stocks','stock_id'),
					array('employee','branch_stocks','emp_id')
				);
			$data['result'] = $this->project_model->select_join('branch_stocks',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/printBranchStocks',$data);
			$this->load->view('admin/footer',$data);
		}
	/*stocks*/
		function fetchstocksArr(){
			$result = array('data' => array());

			$join = array(
				array('stockitem','stock_newlog','stock_id'),
				array('stock_class','stockitem','stockclass_id')
			);
			$data_emp = $this->project_model->select('employee');
			$data = $this->project_model->select_join('stock_newlog',$join);
			$name = "";
			if ($data != false) {
				foreach ($data as $key => $value) {
					$tcost = $this->cart->format_number($value->stockCost*$value->nstock_qqty);
					if($value->delivery_stat == "received"){
						$buttons = '
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stock_newid.'" title="Select"><i class="fa fa-times"></i></a>
							<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stock_newid.'" title="Edit"> <i class="fa fa-pencil"></i></a>
							<a href="javascript:;" class="btn btn-success disabled" data="" title="Delivered"> <i class="fa fa-check-circle"></i></a>
						';
					}else{
						$buttons = '
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->stock_newid.'" title="Select"><i class="fa fa-times"></i></a>
							<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->stock_newid.'" title="Edit"> <i class="fa fa-pencil"></i></a>
							<a href="javascript:;" class="btn btn-warning disabled" data="" title="Delivered"> <i class="fa fa-truck"></i></a>
						';
					}

					foreach ($data_emp as $value2) {
						if ($value->emp_id == $value2->emp_id) {
							$name = $value2->emp_fname;
						}
					}
					$result['data'][$key] = array(
						$value->delivery_date,
						$value->stockclass_name,
						$value->delivery_stat,
						$value->stock_name,
						$value->nstock_status,
						$value->nstock_unit,
						$value->nstock_qqty,
						$tcost,
						$name,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function addstocksArr(){
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
				$add = $this->project_model->insert('stock_newlog',$data);
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
		function editArr(){

			$id = $this->input->get('id');
			$where = array("stock_newid"=>$id);
			$result = $this->project_model->single_select('stock_newlog',$where);
			echo json_encode($result);
		}
		function updateArr(){
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('id','Id','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$data = array(
					'nstock_qqty'=>set_value('qty')
				);
				$id = set_value('id');
				$where = array('stock_newid'=>$id);
				$result = $this->project_model->updateNew('stock_newlog',$where,$data);
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
		function deletestocksArr(){
			$id = $this->input->get('id');
			// update first the stock qty before deleting the record.
			$where = array('stock_newid'=>$id);

			$join = array(
				array('stockitem','stock_newlog','stock_id')
			);
			$get = $this->project_model->select_join('stock_newlog',$join,false,$where);
			foreach ($get as $value) {
				if ($value->nstock_status == "GOOD") {

				}
				$where2 = array('stock_id'=>$value->stock_id);
				$newqty = $value->stock_qqty - $value->nstock_qqty;
				$data = array('stock_qqty'=>$newqty);
				$update = $this->project_model->updateNew('stockitem',$where2,$data);
				if ($update != false) {
					$result = $this->project_model->delete('stock_newlog','stock_newid',$id);
					if ($result) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Unable to delete ";
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to deduct stock quantity.";
				}
			}
			echo json_encode($msg);
		}
		function printStockList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'New Stocks';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			$data['class'] = $this->uri->segment(5);
			$data['stat'] = $this->uri->segment(6);
			$join = array(
				array('stockitem','stock_newlog','stock_id'),
				array('stock_class','stockitem','stockclass_id'),
			);
			$like = array("stock_class.stockclass_name"=>$this->uri->segment(5));
			$data['result'] = $this->project_model->select_join('stock_newlog',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/stockList',$data);
			$this->load->view('admin/footer',$data);
		}
		function markedDel(){
				$data = array(
					'delivery_stat'=>"to_receive"
				);
				$id = $this->input->get('id');
				$where = array('stock_newid'=>$id);
				$result = $this->project_model->updateNew('stock_newlog',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error adding data.';
				}
			echo json_encode($msg);
		}
	/*sales*/
		function voidOrder(){
			$id = $this->input->get('id');
					$where = array("order_id"=>$id);
					$data = array(
						'order_bill_amount'=>'0.00',
						'order_cash_amount'=>'0.00',
						'order_discount'=>'0.00',
						'order_status'=>'not_paid'
					);
					$void = $this->project_model->updateNew('order',$where,$data);
					if ($void != false) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Unable to void order.';
					}
			echo json_encode($msg);
		}
		function getRestoReceipt(){
			$result = array('data' => array());
			$join = array(
				array('employee','order','emp_id')
				);
			$like = array(
				"order_date"=>date("Y-m")
			);
			$data = $this->project_model->select_join('order',$join);

			if ($data != false) {
				foreach ($data as $key => $value) {
					/*$buttons = '
						<a style="margin-left:5px;" style="cursor: pointer;" onclick="window.open('.base_url('admin/restaurant_bill_record/'.$value->order_id).', "newwindow", "width=900, height=400"); return false;" title="Update Stock"><i class="fa fa-print fa-2x"></i></a>
					';*/
					$link = base_url('admin/restaurant_bill_record/'.$value->order_id);
					$buttons = '
						<a href="javascript:;" class="btn btn-primary item-print" data="'.$link.'" title="Print"><i class="fa fa-print"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->order_id.'" title="Delete"><i class="fa fa-trash"></i></a>
						<a href="javascript:;" class="btn btn-warning item-void" data="'.$value->order_id.'" title="Void"><i class="fa fa-exclamation-triangle"></i></a>
					';

					$result['data'][$key] = array(
						$value->emp_fname,
						$value->order_code,
						$value->order_type,
						$value->payment_type,
						$value->cust_name,
						"Php ".$this->cart->format_number(($value->order_bill_amount+$value->gcashfee)-$value->order_discount),
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
			$data['page'] = 'Daily Sales Report';

			$date = $this->uri->segment(3);
			$emp = $this->uri->segment(4);
			$order = $this->uri->segment(5);
			$payment = $this->uri->segment(6);

			if ($emp != 'all') {
				$where = array(
					'order.emp_id'=>$emp
				);
			}else{
				$where = false;
			}

			if ($order != 'all' && $payment != 'all') {
				$like = array(
					'order_type'=>$order,
					'payment_type'=>$payment,
					'order_date'=>$date
				);
			}elseif ($order != 'all' && $payment == 'all') {
				$like = array(
					'order_type'=>$order,
					'order_date'=>$date
				);
			}elseif ($order == 'all' && $payment != 'all') {
				$like = array(
					'payment_type'=>$payment,
					'order_date'=>$date
				);
			}else{
				$like = array(
					'order_date'=>$date
				);
			}

			$join = array(
				array('employee','order','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('order',$join,$like,$where);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/salesList',$data);
			$this->load->view('admin/footer',$data);
		}
		function printSalesItemList(){

			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Daily Sold Item Report';

			$date = $this->uri->segment(3);
			$emp = $this->uri->segment(4);
			$order = $this->uri->segment(5);
			$payment = $this->uri->segment(6);

			if($emp != 'all'){
				$where = array(
					'order.emp_id'=>$emp,
					'ordered_item.order_date'=>$date,
				);
			}else{
				$where = array('ordered_item.order_date'=>$date);
			}

			if ($order != 'all' && $payment != 'all') {
				$like = array(
					'order_type'=>$order,
					'payment_type'=>$payment
				);
			}elseif ($order != 'all' && $payment == 'all') {
				$like = array(
					'order_type'=>$order
				);
			}elseif ($order == 'all' && $payment != 'all') {
				$like = array(
					'payment_type'=>$payment
				);
			}else{
				$like = false;
			}

			$join = array(
				array('order','ordered_item','order_id'),
				array('employee','order','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('ordered_item',$join,$like,$where);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/salesItemList',$data);
			$this->load->view('admin/footer',$data);
		}
		function printSalesDiscList(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Discount Reports';

			$date = $this->uri->segment(3);
			$emp = $this->uri->segment(4);
			$order = $this->uri->segment(5);
			$discount = $this->uri->segment(6);

			$where = array(
				'order.emp_id'=>$emp
			);
			if ($order != 'all' && $discount != 'all') {
				$like = array(
					'order_type'=>$order,
					'discount_type'=>$discount,
					'order_date'=>$date
				);
			}elseif ($order != 'all' && $discount == 'all') {
				$like = array(
					'order_type'=>$order,
					'order_date'=>$date
				);
			}elseif ($order == 'all' && $discount != 'all') {
				$like = array(
					'discount_type'=>$discount,
					'order_date'=>$date
				);
			}else{
				$like = array(
					'order_date'=>$date
				);
			}

			$join = array(
				array('employee','order','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('order',$join,$like,$where);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/discountRep',$data);
			$this->load->view('admin/footer',$data);
		}
		function printVatSales(){

			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Daily Vatable Sales Report';

			$month = $this->uri->segment(4);
			$year = $this->uri->segment(3);
			$param =  $year.'-'.$month;

			$like = array(
				'order_date'=>$param
			);
			$join = array(
				array('employee','order','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('order',$join,$like);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/printvatSales',$data);
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
					$result['data'][$key] = array(
						$value->credit_date,
						$name,
						strtoupper($value->credit_item_name),
						$value->credit_item_amount,
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
			//$this->form_validation->set_rules('qty','Item Quantity','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"credit_item_name"=>ucwords(set_value('name')),
					"credit_item_amount"=>set_value('amount'),
					//"credit_item_qty"=>set_value('qty'),
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
			//$this->form_validation->set_rules('qty','Item Quantity','required');
			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"credit_item_name"=>ucwords(set_value('name')),
					"credit_item_amount"=>set_value('amount'),
					//"credit_item_qty"=>set_value('qty'),
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

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			//$param = $year.'-'.$month;
			// $like = array(
			// 	'credit_date'=>$param
			// );
			$join = array(
				array('employee','emp_credits','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('emp_credits',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/creditList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*daily output*/
		function fetchOutput(){
			$result = array('data' => array());
			$join = array(
				array('employee','daily_output','emp_id')
			);
			$data = $this->project_model->select_join('daily_output',$join);
				if($data != false){
					foreach ($data as $key => $value) {
						$buttons = '
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->dailyout_id.'" title="Select"><i class="fa fa-times"></i></a>
							<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->dailyout_id.'" title="Edit"><i class="fa fa-pencil"></i></a>
						';
							$result['data'][$key] = array(
								$value->output_date,
								$value->output_desc,
								$value->batch_num,
								$value->output_unit,
								$value->output_qty,
								$value->packing,
								$value->emp_fname,
								$buttons
							);
						}
				}
			echo json_encode($result);
		}
		function addOutput(){
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('batchnum','Batch Number','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('packing','Packing','required');
			$this->form_validation->set_rules('date','Date','required');
			//$this->form_validation->set_rules('note','Note','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['error'] = validation_errors();
				$msg['success'] = false;
			}else{
				$amount = set_value('cost')*set_value('qty');
				$data = array(
					'output_desc'=>ucwords(set_value('desc')),
					'output_qty'=>set_value('qty'),
					'output_unit'=>set_value('unit'),
					'batch_num'=>set_value('batchnum'),
					'output_date'=>set_value('date'),
					'packing'=>set_value('packing'),
					'emp_id'=>$this->session->userdata('current_id')
				);
				$add = $this->project_model->insert('daily_output',$data);
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
		function editOutput(){
			$id = $this->input->get('id');
			$where = array('dailyout_id'=>$id);
			$data = $this->project_model->single_select('daily_output',$where);

			echo json_encode($data);
		}
		function update_output(){
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('batchnum','Batch Number','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('packing','Packing','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					'output_desc'=>ucwords(set_value('desc')),
					'output_qty'=>set_value('qty'),
					'output_unit'=>set_value('unit'),
					'batch_num'=>set_value('batchnum'),
					'output_date'=>set_value('date'),
					'packing'=>set_value('packing')
				);
				$table_name = 'daily_output';
				$id = set_value('id');
				$where = array(
					'dailyout_id'=>$id
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
		function delete_output(){
			$id = $this->input->get('id');
			$table_name = 'daily_output';
			$table_id = 'dailyout_id';
			$where = array(
				'dailyout_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}

			echo json_encode($msg);
		}
		function printOutput(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'New Stocks';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);

			$join = array(
				array('employee','daily_output','emp_id')
			);
			$data['result'] = $this->project_model->select_join('daily_output',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/printOutput',$data);
			$this->load->view('admin/footer',$data);
		}
	/*mishandle report*/
		function fetchMishandle(){
			$result = array('data' => array());
			$join = array(
				array('employee','mishandle_reports','emp_id')
			);
			$data = $this->project_model->select_join('mishandle_reports',$join);
				if($data != false){
					foreach ($data as $key => $value) {
						if ($value->report_stat == "confirm") {
							$buttons = '
								<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->report_id.'" title="Delete"><i class="fa fa-times"></i></a>
								<a href="javascript:;" class="btn btn-success disabled" data="" title="Confirm"><i class="fa fa-check-circle"></i></a>
							';
						}else{
							$buttons = '
								<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->report_id.'" title="Delete"><i class="fa fa-times"></i></a>
								<a href="javascript:;" class="btn btn-success item-confirm" data="'.$value->report_id.'" title="Confirm"><i class="fa fa-spinner fa-spin"></i></a>
							';
						}
							$result['data'][$key] = array(
								$value->report_date,
								$value->type,
								$value->section,
								$value->item,
								$value->unit,
								$value->qty,
								$value->emp_fname,
								$value->report_stat,
								$value->action,
								$value->desc,
								$buttons
							);
						}
				}
			echo json_encode($result);
		}
		function editMishandle(){
			$id = $this->input->get('id');
			$where = array('report_id'=>$id);
			$data = $this->project_model->single_select('mishandle_reports',$where);

			echo json_encode($data);
		}
		function updateMishandle(){
			$this->form_validation->set_rules('desc','Desciption','required');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('batchnum','Batch Number','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('packing','Packing','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					'output_desc'=>ucwords(set_value('desc')),
					'output_qty'=>set_value('qty'),
					'output_unit'=>set_value('unit'),
					'batch_num'=>set_value('batchnum'),
					'output_date'=>set_value('date'),
					'packing'=>set_value('packing')
				);
				$table_name = 'daily_output';
				$id = set_value('id');
				$where = array(
					'dailyout_id'=>$id
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
		function deleteMishandle(){
			$id = $this->input->get('id');
			$table_name = 'mishandle_reports';
			$table_id = 'report_id';
			$where = array(
				'report_id'=>$id
			);
			$delete = $this->project_model->deleteNew($table_name,$where);

			if ($delete != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}

			echo json_encode($msg);
		}
		function confirmReport(){
				$data = array(
					'report_stat'=>"confirm"
				);
				$id = $this->input->get('id');
				$where = array('report_id'=>$id);
				$result = $this->project_model->updateNew('mishandle_reports',$where,$data);
				if ($result != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Error confirming data.';
				}
			echo json_encode($msg);
		}
		function printMishandle(){
			$data['title'] = "Administrator";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Employee Attendance Record';

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			//$data['emp'] = $this->uri->segment(5);
			// $param = $year.'-'.$month;
			// $like = array(
			// 	'attend_date'=>$param
			// );
			$join = array(
				array('employee','mishandle_reports','emp_id')
			);
			$data['result' ] = $this->project_model->select_join('mishandle_reports',$join);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/mishandleList',$data);
			$this->load->view('admin/footer',$data);
		}
	/*salary*/
		function fetchEmp(){
			$where = array('emp_status'=>'active');
			$data = $this->admin_model->get_table_record('employee',$where);

			echo json_encode($data);
		}
		function fetchCashier(){
			$where = array('emp_dept'=>'cashier');
			$join = array(
				array('emp_accounts','employee','emp_id')
			);
			$data = $this->project_model->select_join('employee',$join,$where);

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
					$wsalary = $empval->salary_rate;
					$hsalary = $wsalary / 2;
					$dsalary = $wsalary * 2;
				}

				//deduction
				$credit_where = array(
					'emp_id'=>set_value('employee')
				);
				$credit = $this->admin_model->get_table_record('emp_credits',$credit_where);
				$credit_id = array();
				$credit_total = 0;
				if ($credit != false) {
					foreach ($credit as $creditval) {
						if ($creditval->credit_date >= set_value('start') && $creditval->credit_date <= set_value('end')) {
							$credit_total = $credit_total+$creditval->credit_item_amount;
							$credit_id[] = $creditval->emp_credit_id;
						}
					}
				}else{
					$credit_total = 0;
				}

				//overtime
				$ot_where = array("emp_id"=>set_value('employee'));
				$ot = $this->admin_model->get_table_record('emp_attendance',$ot_where);
				$ot_tamount = 0;
				$thours = 0;
				$num_nights = count($ot);
				if ($ot != false) {
					foreach ($ot as $empot) {
						$date = $empot->attend_date;
						if ($date >= set_value('start') && $date <= set_value('end')) {
							/*$ot = $empot->num_hours*$empot->ot_rate;
							$ot_tamount = $ot_tamount+$ot;
							$thours = $thours+$empot->num_hours;*/
							//echo $empot->emp_overtime_id.'('.$empot->num_hours.'*'.$empot->ot_rate.')<br />';
							$thours = $thours + $empot->num_OT;
							$ot_tamount = $ot_tamount+$empot->t_OT;
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
				$wdays = 0;
				$hdays = 0;
				$sal = 0;
				if ($attendance != false) {
					foreach ($attendance as $attendance) {
						//$date = substr($attendance->time_in, 0,10);
						$date = $attendance->attend_date;
						if ($date >= set_value('start') && $date <= set_value('end')) {
							$days++;
							//$sal = ($attendance->duty === "" || $attendance->duty === "whole") ? $sal = $sal + $wsalary : $sal + $hsalary ;
							if($attendance->duty === "double"){
								$sal += $dsalary;
							}elseif ($attendance->duty === "" || $attendance->duty === "whole"){
								$sal += $wsalary;
							}else{
								$sal += $hsalary;
							}
						}
					}
				}
				
				$data = array(
					'emp_id'=>set_value('employee'),
					'salary_amount'=>$sal,
					'salary_date_start'=>set_value('start'),
					'salary_date_end'=>set_value('end'),
					'credit_amount'=>$credit_total,
					'overtime_thours'=>$thours,
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
						$msg['success'] = true;
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
				// foreach ($empsal as $empsal) {
				// 	$date = substr($empsal->salary_date_start,0,7);
				// 	$credit_where = array('credit_status'=>'not_paid','emp_id'=>$empsal->emp_id);
				// 	$credit_like = array('credit_date'=>$date);
				// 	$credit = $this->project_model->select('emp_credits',$credit_like,$credit_where);
				// 	if ($credit != false) {
				// 		$item =0;
				// 		$counter=0;
				// 		foreach ($credit as $creditval) {
				// 			if ($creditval->credit_date >= $empsal->salary_date_start && $creditval->credit_date <= $empsal->salary_date_end) {
				// 				$item++;
				// 				$update_data = array("credit_status"=>"not_paid");
				// 				$where_update = array("emp_credit_id"=>$creditval->emp_credit_id);
				// 				$update = $this->project_model->updateNew('emp_credits',$where_update,$update_data);
				// 				if ($update != false) {
				// 					$counter++;
				// 				}else{
				// 					$msg['error'] = "Unable to update credit status.";
				// 					$msg['success'] = false;
				// 				}
				// 			}
				// 		}
				//
				// 		if ($item == $counter) {
				// 			$where_delete = array('salary_id'=>$salary_id);
				// 			$delete = $this->project_model->deleteNew('emp_salary',$where_delete);
				// 			if ($delete != false) {
				// 				$msg['success'] = true;
				// 			}else{
				// 				$msg['error'] = "Unable to delete salary.";
				// 				$msg['success'] = false;
				// 			}
				// 		}else{
				// 			$msg['error'] = "Item counter error.";
				// 			$msg['success'] = false;
				// 		}
				// 	}else{
				// 		$where_delete = array('salary_id'=>$salary_id);
				// 		$delete = $this->project_model->deleteNew('emp_salary',$where_delete);
				// 		if ($delete != false) {
				// 			$msg['success'] = true;
				// 		}else{
				// 			$msg['error'] = "Unable to delete salary.";
				// 			$msg['success'] = false;
				// 		}
				// 	}
				// }

				$where_delete = array('salary_id'=>$salary_id);
				$delete = $this->project_model->deleteNew('emp_salary',$where_delete);
				if ($delete != false) {
					$msg['success'] = true;
				}else{
					$msg['error'] = "Unable to delete salary.";
					$msg['success'] = false;
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
		function printPayRoll(){
			$data['title'] = "Administrator - Print Pay Roll";
			$data['sub_heading'] = "POS System";
			$data['page'] = 'Print Pay Roll';

			$end = $this->uri->segment(4);
			$start = $this->uri->segment(3);
			$join = array(
				array('employee','emp_salary','emp_id'),
				array('job_position','employee','job_position_id')
			);
			//$where = array('salary_date_start'=>$start,"salary_date_end"=>$end);
			$order = array("employee.emp_lname","asc");
			$data['result'] = $this->project_model->select_join('emp_salary',$join,$like=false,$where=false,$order);

			$otherL = array();
			$where2 = array("credit_item_name"=>"OTHERS");
			$others = $this->project_model->select('emp_credits',false,$where2);
			if ($others != false) {
				foreach ($others as $value1) {
					if ($value1->credit_date >= $start && $value1->credit_date <= $end) {
							$otherL[] = array('id'=>$value1->emp_id,'amount'=>$value1->credit_item_amount);
					}
				}
			}
			$amountO = array();
			if (count($otherL) > 0) {
				foreach($otherL as $list1) {
						$index = $this->bank_exists($list1['id'], $amountO);
						if ($index < 0) {
								$amountO[] = $list1;
						}
						else {
								$amountO[$index]['id'] +=  $list1['amount'];
						}
				}
			}
			$data['amountO'] = $amountO;

			$caL = array();
			$where2 = array("credit_item_name"=>"CA");
			$ca = $this->project_model->select('emp_credits',false,$where2);
			if ($ca != false) {
				foreach ($ca as $value2) {

						if ($value2->credit_date >= $start && $value2->credit_date <= $end) {
								$caL[] = array('id'=>$value2->emp_id,'amount'=>$value2->credit_item_amount);
						}
					}

			}
			$amountCA = array();
			if ($caL != false) {
				foreach($caL as $list2) {
						$index = $this->bank_exists($list2['id'], $amountCA);
						if ($index < 0) {
								$amountCA[] = $list2;
						}
						else {
								$amountCA[$index]['id'] +=  $list2['amount'];
						}
				}
			}
			$data['amountCA'] = $amountCA;

			$sssL = array();
			$where2 = array("credit_item_name"=>"SSS");
			$sss = $this->project_model->select('emp_credits',false,$where2);
			if ($sss != false) {
				foreach ($sss as $value3) {
					if ($value3->credit_date >= $start && $value3->credit_date <= $end) {
							$sssL[] = array('id'=>$value3->emp_id,'amount'=>$value3->credit_item_amount);
					}
				}
			}
			$amountSSS = array();
			if (count($sssL) > 0) {
				foreach($sssL as $list3) {
						$index = $this->bank_exists($list3['id'], $amountSSS);
						if ($index < 0) {
								$amountSSS[] = $list3;
						}
						else {
								$amountSSS[$index]['id'] +=  $list3['amount'];
						}
				}
			}
			$data['amountSSS'] = $amountSSS;

			$philhL = array();
			$where2 = array("credit_item_name"=>"PHILH");
			$philh = $this->project_model->select('emp_credits',false,$where2);
			if ($philh != false) {
				foreach ($philh as $value4) {
					if ($value4->credit_date >= $start && $value4->credit_date <= $end) {
							$philhL[] = array('id'=>$value4->emp_id,'amount'=>$value4->credit_item_amount);
					}
				}
			}
			$amountPhil = array();
			if ($philhL > 0) {
				foreach($philhL as $list4) {
						$index = $this->bank_exists($list4['id'], $amountPhil);
						if ($index < 0) {
								$amountPhil[] = $list4;
						}
						else {
								$amountPhil[$index]['id'] +=  $list4['amount'];
						}
				}
			}
			$data['amountPhil'] = $amountPhil;

			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/printPayRoll',$data);
			$this->load->view('admin/footer',$data);
		}
		function bank_exists($bankname, $array) {
			$result = -1;
			for($i=0; $i<sizeof($array); $i++) {
					if ($array[$i]['id'] == $bankname) {
							$result = $i;
							break;
					}
			}
			return $result;
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

				/*$array = array(
					"emp_id"=>set_value('employee'),
					"from"=>$start->format('h:i A')
					);
				$check_duplicate = $this->project_model->check_multi_duplicate($table_name,$array);

				if ($check_duplicate != true) {*/
					$add = $this->project_model->insert($table_name,$data);

					if ($add == true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = 'Error adding overtime.';
					}
				/*}else{
					$msg['success'] = false;
					$msg['error'] = 'Duplicate record found.';
				}*/
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
					$sal = ($value->duty === "" || $value->duty === "whole") ? $value->salary_rate : $value->salary_rate/2;

					$buttons = '
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->emp_attendance_id.'" title="Select"><i class="fa fa-times"></i></a>
						<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->emp_attendance_id.'" title="Edit"><i class="fa fa-pencil"></i></a>';
					$name = $value->emp_fname.' '.$value->emp_mname.' '.$value->emp_lname;
					$result['data'][$key] = array(
						$value->attend_date,
						$name,
						$value->job_position_name,
						$sal,
						$value->num_OT,
						$value->t_OT,
						$value->duty,
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function add_EmpAttend(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			$this->form_validation->set_rules('duty','Duty','required');
			//$this->form_validation->set_rules('salRate','Salary Rate','required');
			$this->form_validation->set_rules('num_OT','Number Of OT','required');
			$this->form_validation->set_rules('t_OT','OT Total Amount','required');

			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"emp_id"=>set_value('employee'),
					"attend_date"=>set_value('date'),
					"salRate"=>0,
					"num_OT"=>set_value('num_OT'),
					"t_OT"=>set_value('t_OT'),
					"duty"=>set_value('duty')
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
			$data['salRate'] = $result->salRate;
			$data['num_OT'] = $result->num_OT;
			$data['t_OT'] = $result->t_OT;
			$data['duty'] = $result->duty;

			echo json_encode($data);
		}
		function update_EmpAttend(){
			$this->form_validation->set_rules('employee','Employee','required');
			$this->form_validation->set_rules('date','Date','required');
			//$this->form_validation->set_rules('salRate','Salary Rate','required');
			$this->form_validation->set_rules('num_OT','Number Of OT','required');
			$this->form_validation->set_rules('t_OT','OT Total Amount','required');
			$this->form_validation->set_rules('id','ID','required');
			$this->form_validation->set_rules('duty','Duty','required');


			if ($this->form_validation->run() == FALSE) {
				$msg['success'] = false;
				$msg['error'] = validation_errors();
			}else{
				$data = array(
					"emp_id"=>set_value('employee'),
					"attend_date"=>set_value('date'),
					"salRate"=>0,
					"num_OT"=>set_value('num_OT'),
					"t_OT"=>set_value('t_OT'),
					"duty"=>set_value('duty')
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

			$data['start'] = $this->uri->segment(3);
			$data['end'] = $this->uri->segment(4);
			//$data['emp'] = $this->uri->segment(5);
			// $param = $year.'-'.$month;
			// $like = array(
			// 	'attend_date'=>$param
			// );
			$join = array(
				array('employee','emp_attendance','emp_id'),
				array('job_position','employee','job_position_id'),
				array('salary_term','job_position','salary_term_id')
			);
			$data['result' ] = $this->project_model->select_join('emp_attendance',$join);
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
					$tdeposit = $value->net_income + $value->prod_exp;
					$tax = $value->gross_income * 0.03;
					$texp = $value->prod_exp + $value->misc_exp + $value->salary_exp + $tax;
					$net = $value->gross_income - $texp;
					$buttons = '
						<a href="javascript:;" class="btn btn-primary item-print" data="'.$value->statement_id.'" title="Print"><i class="fa fa-print"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->statement_id.'" title="Select"><i class="fa fa-times"></i></a>
					';
					$result['data'][$key] = array(
						$value->statement_date,
						$this->cart->format_number($value->misc_exp),
						$this->cart->format_number($value->prod_exp),
						$this->cart->format_number($value->salary_exp),
						$this->cart->format_number($tax),
						$this->cart->format_number($value->gross_income),
						$this->cart->format_number($net),
						$buttons
					);
				}
			}
			echo json_encode($result);
		}
		function createIncomeStatement(){
			$this->form_validation->set_rules('mon','Statement Month','required');
			$this->form_validation->set_rules('year','Statement Year','required');

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
				$tproduction_amount = 0;
				$like = array(
					'release_date'=>$param
				);
				$join = array(
					array('stockitem','releaseditem','stock_id')
				);
				$rawMat = $this->project_model->select_join('releaseditem',$join,$like);
				$rawMat_amount = 0;
				$rawMat_tamount = 0;
				if ($rawMat != false) {
						foreach ($rawMat as $item) {
								$rawMat = $item->releaseitem_qty * $item->stockCost;
								$rawMat_tamount = $rawMat_tamount + $rawMat;
						}
				}

				$like = array('order_date'=>$param);
				$join = array(
					array('stockitem','ordered_item','stock_id')
				);
				$whereinstock = array('stock_type'=>'instock');
				$instock = $this->project_model->select_join('ordered_item',$join,$like);
				$instock_amount = 0;
				$instock_tamount = 0;
				if ($instock != false) {
						foreach ($instock as $item) {
								$instock_amount = $item->order_qty * $item->stockCost;
								$instock_tamount = $instock_tamount + $instock_amount;
						}
				}

				$tproduction_amount = $rawMat_tamount + $instock_tamount;

				$like = array(
				'expstocks_date'=>$param
				);
				$stocks = $this->project_model->select('expenses_stocks',$like);
					$expstocks_amount = 0;
					$expstocks_tamount = 0;
					if ($stocks != false) {
							foreach ($stocks as $item) {
									$expstocks_amount = $item->expstocks_qty * $item->expstocks_amount;
									$expstocks_tamount = $expstocks_tamount + $expstocks_amount;
							}
					}

				/*salary*/
				$like = array(
				'salary_date_start'=>$param
				);
				$salary = $this->project_model->select('emp_salary',$like);
				$tsal = 0;
				$initsal = 0;
				if ($salary != false) {
					foreach ($salary as $value) {
							$initsal= $value->salary_amount+$value->overtime_tamount;
							$tsal= $initsal + $tsal;
					}
				}

				/*sales*/
				$like = array(
				'order_date'=>$param
				);
				$sales = 0;
				$tsales = 0;
				$gross = $this->project_model->select('order',$like);
				if ($gross != false) {
						foreach ($gross as $item) {
							$sales = $item->order_bill_amount - $item->order_discount;
							$tsales = $tsales + $sales;
						}
				}

				$tax = $tsales * 0.03;
				$net = $tsales - $tax - $misc_tamount - $tsal - $tproduction_amount;

				$data = array(
					'gross_income'=>$tsales,
					'prod_exp'=>$tproduction_amount,
					'misc_exp'=>$misc_tamount,
					'stocks_exp'=>0,
					'salary_exp'=>$tsal,
					'gross_taxable'=>0,
					'tax'=>$tax,
					'net_income'=> $net,
					'statement_date'=>$param
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
			$data['statement'] = $this->project_model->single_select('incomestatement',$where);
			$data['property']= $this->project_model->select('property_info');

			$this->load->view('admin/header',$data);
			$this->load->view('reports/incomeStatementForm',$data);
			$this->load->view('admin/footer',$data);
		}

 	// cashier login history
	function fetchCashierPreLog(){
		$result = array('data' => array());
		$join = array(
				array('employee','cashier_logbook','emp_id')
		);
		$order = array('log_date','ASC');
		$data = $this->project_model->select_join('cashier_logbook',$join,$like=false,$where=false,$order);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$name = $value->emp_fname.' '.$value->emp_lname;
				$result['data'][$key] = array(
					$value->log_date,
					$name,
					$value->opening_cash,
					$value->closing_cash
				);
			}
		}
		echo json_encode($result);
	}
	function fetchCashierLog(){
		$result = array('data' => array());
		$join = array(
				array('employee','cashier_logbook','emp_id')
		);
		$order = array('log_date','ASC');
		$data = $this->project_model->select_join('cashier_logbook',$join,$like=false,$where=false,$order);
		if ($data != false) {
			foreach ($data as $key => $value) {
				$buttons = '
					<a href="javascript:;" class="btn btn-danger item-delete" data="'.$value->logid.'" title="Select"><i class="fa fa-times"></i></a>
					<a href="javascript:;" class="btn btn-primary item-edit" data="'.$value->logid.'" title="Edit"><i class="fa fa-pencil"></i></a>';
				$name = $value->emp_fname.' '.$value->emp_lname;
				$result['data'][$key] = array(
					$value->log_date,
					$name,
					$value->login_time,
					$value->logout_time,
					$value->opening_cash,
					$value->closing_cash,
					$value->deposit,
					$buttons
				);
			}
		}
		echo json_encode($result);
	}
	function editCashierlog(){
		$id = $this->input->get('id');
		$where = array("logid"=>$id);
		$result = $this->project_model->single_select('cashier_logbook',$where);
		echo json_encode($result);
	}
	function updateCashierlog(){
		$this->form_validation->set_rules('op_money','Opening Money','required');
		$this->form_validation->set_rules('closingCash','Closing Cash','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('id','Id','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$deposit = set_value("closingCash") - set_value('op_money');
			$data = array(
				"opening_cash"=>set_value('op_money'),
				"closing_cash"=>set_value("closingCash"),
				"deposit"=>$deposit,
				"log_status"=>set_value("status")
			);
			$id = set_value('id');
			$where = array('logid'=>$id);
			$result = $this->project_model->updateNew('cashier_logbook',$where,$data);
			if ($result != false) {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Error update cashier log book data.';
			}
		}
		$msg['type'] = 'Update';
		echo json_encode($msg);
	}
	function deleteCashierlog(){
		$id = $this->input->get('id');
		$result = $this->project_model->delete('cashier_logbook','logid',$id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}
//testing center
	function testFunction(){
		$date = '2021-11-9';
		$emp = 8;
		$order = 'receivable';
		$discount = 'spwd';

		$where = array(
			'order.emp_id'=>$emp
		);

		if ($order != 'all' && $discount != 'all') {
			$like = array(
				'order_type'=>$order,
				'discount_type'=>$discount,
				'order_date'=>$date
			);
		}elseif ($order != 'all' && $discount == 'all') {
			$like = array(
				'order_type'=>$order,
				'order_date'=>$date
			);
		}elseif ($order == 'all' && $discount != 'all') {
			$like = array(
				'discount_type'=>$discount,
				'order_date'=>$date
			);
		}else{
			$like = array(
				'order_date'=>$date
			);
		}

		$join = array(
			array('employee','order','emp_id')
		);
		$data = $this->project_model->select_join('order',$join,$like,$where);
		if ($data != false) {
			foreach ($data as $value) {
				echo $value->order_code.'<br>';
			}
		}else{
			echo 'no data';
		}
	}
}
