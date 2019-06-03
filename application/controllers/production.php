<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		//$this->is_log_in();
	}

	private function is_log_in(){
		if($this->session->userdata('isprod_log') == false){
			redirect('main');
		}
	}

	function logout(){
		if ($this->session->userdata('isprod_log') == true) {
			$this->session->unset_userdata('isprod_log');
			redirect('main');
		}
	}
	// pages
	function index(){
		$data['title'] = "Dashboard";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/home',$data);
		$this->load->view('production/footer',$data);
	}

	function orders(){
		$data['title'] = "Orders";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$date = date("Y-m-d");
		$like = array('pickup_date'=>$date,"order_type"=>"order");
		$data['today'] = $this->project_model->select('order',$like);

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/orders',$data);
		$this->load->view('production/footer',$data);
	}

	function lowstocks(){
		$data['title'] = "Low Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/lowstocks',$data);
		$this->load->view('production/footer',$data);
	}

	function newstocks(){
		$data['title'] = "New Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/newstocks',$data);
		$this->load->view('production/footer',$data);
	}

	function branchstocks(){
		$data['title'] = "Branch Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/newstocks',$data);
		$this->load->view('production/footer',$data);
	}

	function itemlist(){
			$data['title'] = "Order List";
			$data['page'] = 'Production';

			$where = array(
				"order.order_id"=>$this->session->userdata('order')
			);
			$data['bill'] = $this->project_model->select('order',false,$where);

			$where2 = array("order_id"=>$this->session->userdata('order'));
			$data['items']= $this->project_model->select('ordered_item',false,$where2);

			$data['property']= $this->project_model->select('property_info');

			$where3 = array('emp_id'=>$this->session->userdata('current_id'));
			$data['employee'] = $this->project_model->select('employee',false,$where3);

			$this->load->view('header',$data);
			$this->load->view('production/itemlist',$data);
			$this->load->view('footer');
		}

	function test(){
		$id = $this->session->userdata('order');
		$where = array("order_id"=>$id);

		$order = $this->project_model->select('order',false,$where);
		foreach ($order as $value) {
			$data['code'] = $value->order_code;
		}

		echo json_encode($data);
	}

	// functions
	function fetchcurrentorder(){
		$date = date("Y-m-d");
		$like = array('pickup_date'=>$date,"order_type"=>"order");
		$data = $this->project_model->select('order',$like);

		echo json_encode($data);
	}

	function searchorder(){
		$this->form_validation->set_rules('date','Date','required');
		if ($this->form_validation->run() == FALSE){
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$like = array('pickup_date'=>set_value('date'),"order_type"=>"order");
			$msg['data'] = $this->project_model->select('order',$like);
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	function regOrder(){
		$id = $this->input->get('id');
		$this->session->set_userdata('order',$id);

		if ($this->session->userdata('order') != null) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = "Unable to register POS Cart";
		}
		echo json_encode($msg);
	}

	function fetchItem(){
		$result = array('data' => array());
		$id = $this->session->userdata('order');
		$where = array('order_id'=>$id);
		$data = $this->project_model->select('ordered_item',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$result['data'][$key] = array(
					$value->order_name,
					$value->order_unit,
					$value->order_qty
				);
			}
		}
		echo json_encode($result);
	}

	function checkOrder(){
		if ($this->session->userdata('order')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = 'No POS Cart is resgistered.';
		}

		echo json_encode($msg);
	}

	function closeOrder(){
		$this->session->unset_userdata('order');
		if ($this->session->userdata('ordered') == FALSE) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = 'Unable to close order.';
		}
		echo json_encode($msg);
	}

	function donepacking(){
		$data = array("order_status"=>"packed");
		$where = array("order_id"=>$this->session->userdata('order'));
		$update = $this->project_model->updateNew('order',$where,$data);
		if ($update != false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = 'Unable to update order status.';
		}

		echo json_encode($msg);
	}

	function fetchOrderInfo(){
		$id = $this->session->userdata('order');
		$where = array("order_id"=>$id);

		$order = $this->project_model->select('order',false,$where);
		foreach ($order as $value) {
			$data['code'] = $value->order_code;
			$data['status'] = $value->order_status;
		}

		echo json_encode($data);
	}

}
