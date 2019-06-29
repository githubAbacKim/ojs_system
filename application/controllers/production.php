<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		$this->is_log_in();
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
		$this->load->view('production/branchstocks',$data);
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

	function outItems(){
		$data['title'] = "New Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/outItem',$data);
		$this->load->view('production/footer',$data);
	}

	function miscExp(){
		$data['title'] = "New Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/miscExp',$data);
		$this->load->view('production/footer',$data);
	}

	function test(){
		$this->fetchNewItem();

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

	function fetchStockRoom(){
		$result = array('data' => array());
		$where = array('stockDispose >'=>0);
		$join = array(
				array('stockcategory','stockitem','stockCat_id'),
				array('suppliers','stockitem','supplier_id')
			);
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
						$tstock = $value->stock_qqty + $value->stockDispose;
						$result['data'][$key] = array(
							$value->stockCat_name,
							$value->stock_name,
							$value->stock_unit,
							$value->stock_qqty,
							$tstock,
							$value->supplier_name,
							$value->supplier_tel,
							$value->supplier_mobile
						);
				}
			}

		echo json_encode($result);
	}

	function printLowStock(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Low Stock Report';

		$join = array(
				array('stockcategory','stockitem','stockCat_id'),
				array('suppliers','stockitem','supplier_id')
			);
		$where = array(
				"stock_type"=>"instock"
		);
		$data['result'] = $this->project_model->select_join('stockitem',$join,false,$where);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/lowStockReport',$data);
		$this->load->view('admin/footer',$data);
	}

	function getItem(){
		$id = $this->input->get('id');
		$where = array("stockitem.stock_id"=>$id);
		$join = array(
			array("stockcategory","stockitem","stockCat_id")
		);
		$result = $this->project_model->single_select("stockitem",$where,$join);
		echo json_encode($result);
	}
	function fetchNewItem(){
		$result = array('data' => array());
		$join = array(
				array('suppliers','stockitem','supplier_id')
			);
		$where = array('stock_type'=>"instock");
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
						$buttons = '
							<a href="javascript:;" class="btn btn-success item-add" data="'.$value->stock_id.'" title="Add Good Item"> <i class="fa fa-plus"></i></a>
							<a href="javascript:;" class="btn btn-danger item-addD" data="'.$value->stock_id.'" title="Add Damage Item"> <i class="fa fa-plus"></i></a>
						';
						$result['data'][$key] = array(
							$value->supplier_name,
							$value->stock_name,
							$buttons
						);
					}
			}
		echo json_encode($result);
	}
	function fetchItemArrivalLog(){
		$result = array('data' => array());
		$join = array(
				array('stockitem','stock_newlog','stock_id'),
				array('suppliers','stockitem','supplier_id')
			);
		$data = $this->project_model->select_join('stock_newlog',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->delivery_date,
							$value->supplier_name,
							$value->stock_name,
							$value->nstock_unit,
							$value->nstock_qqty,
							$value->nstock_status
						);
					}
			}
		echo json_encode($result);
	}
	function addNewStock(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$date = date("Y-m-d");

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			$where = array(
				"stock_id"=>set_value('id')
			);
			$cartid = $this->session->userdata('posCart');
			$item = $this->project_model->select("stockitem",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$newstock = $value->stock_qqty + set_value('qty');
					$data = array(
						"stock_id"=>$value->stock_id,
						"nstock_qqty"=>set_value('qty'),
						"nstock_unit"=>$value->stock_unit,
						"nstock_status"=>"GOOD",
						"delivery_date"=>$date,
						"nstock_pqty"=>$value->stock_qqty
					);
					$updateMData = array(
						"stock_qqty"=>$newstock,
						"stockDispose"=>0
					);
					$wherecheck = array(
						'stock_id'=>$value->stock_id,
						'delivery_date'=>$date,
						'nstock_status'=>'GOOD'
					);
					$check = $this->project_model->single_select('stock_newlog',$wherecheck);
					if ($check != false) {
						$newqty = set_value('qty')+$check->nstock_qqty;
						$updateNData = array(
							'nstock_qqty'=>$newqty
						);
						$where = array('stock_newid'=>$check->stock_newid);
						$updateitem = $this->project_model->updateNew('stock_newlog',$where,$updateNData);
						if ($updateitem != false) {
							if ($value->stock_type == 'instock') {
								$where = array("stock_id"=>$value->stock_id);
								$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
								if ($update != false) {
									$msg['success'] =  true;
								}else{
									$msg['success'] = false;
									$msg['error'] = 'Error in updating menu_item.';
								}
							}else{
								$msg['success'] = true;
							}
						}else{
							$msg['success'] = false;
							$msg['error'] = "Error update";
						}
					}else {
						$insert = $this->project_model->insert('stock_newlog',$data);
						if ($insert != false) {
							$where = array("stock_id"=>$value->stock_id);
							$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
							if ($update != false) {
								$msg['success'] =  true;
							}else{
								$msg['success'] = false;
								$msg['error'] = 'Error in updating item.';
							}
						}else{
							$msg['success'] = false;
							$msg['error'] = "error insert";
						}
					}
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "item error";
			}
		}
		echo json_encode($msg);
	}
	function addNewDamageStock(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$date = date("Y-m-d");

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			$where = array(
				"stock_id"=>set_value('id')
			);
			$cartid = $this->session->userdata('posCart');
			$item = $this->project_model->select("stockitem",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$newstock = $value->stock_qqty + set_value('qty');
					$data = array(
						"stock_id"=>$value->stock_id,
						"nstock_qqty"=>set_value('qty'),
						"nstock_unit"=>$value->stock_unit,
						"nstock_status"=>"DAMAGE",
						"delivery_date"=>$date
					);
					$updateMData = array(
						"stock_qqty"=>$newstock,
						"stockDispose"=>0
					);
					$wherecheck = array(
						'stock_id'=>$value->stock_id,
						'delivery_date'=>$date,
						'nstock_status'=>'DAMAGE'
					);
					$check = $this->project_model->single_select('stock_newlog',$wherecheck);
					if ($check != false) {
						$newqty = set_value('qty')+$check->nstock_qqty;
						$updateNData = array(
							'nstock_qqty'=>$newqty
						);
						$where = array('stock_newid'=>$check->stock_newid);
						$updateitem = $this->project_model->updateNew('stock_newlog',$where,$updateNData);
						if ($updateitem != false) {
								$msg['success'] = true;
						}else{
							$msg['success'] = false;
							$msg['error'] = "Error update";
						}
					}else {
						$insert = $this->project_model->insert('stock_newlog',$data);
						if ($insert != false) {
								$msg['success'] =  true;
						}else{
							$msg['success'] = false;
							$msg['error'] = "error insert";
						}
					}
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "item error";
			}
		}
		echo json_encode($msg);
	}
	function printGoodStock(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Good Stock Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$param = $year.'-'.$month;

		$join = array(
				array('stockitem','stock_newlog','stock_id'),
				array('suppliers','stockitem','supplier_id')
			);
		$like = array('delivery_date'=>$param);
		$where = array('nstock_status'=>"GOOD");
		$data['result'] = $this->project_model->select_join('stock_newlog',$join,$like,$where);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/printGoodStock',$data);
		$this->load->view('admin/footer',$data);
	}
	function printDamageStock(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Damage Stock Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$param = $year.'-'.$month;

		$join = array(
				array('stockitem','stock_newlog','stock_id'),
				array('suppliers','stockitem','supplier_id')
			);
		$where = array('nstock_status'=>"DAMAGE");
		$data['result'] = $this->project_model->select_join('stock_newlog',$join,FALSE,$where);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/printBadStock',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchOutItem(){
		$result = array('data' => array());
		$join = array(
				array('stockitem','releaseditem','stock_id'),
				array('employee','releaseditem','emp_id')
			);
		$data = $this->project_model->select_join('releaseditem',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->release_date,
							$value->stock_name,
							$value->releaseitem_unit,
							$value->releaseitem_qty,
							$value->emp_lname
						);
					}
			}
		echo json_encode($result);
	}
	function fetchRawItem(){
		$result = array('data' => array());
		$join = array(
				array('stock_class','stockitem','stockclass_id')
			);
		$where = array('stock_type'=>"instock",'stockclass_name'=>"RAW","stock_qqty >"=>0);
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
						$buttons = '
							<a href="javascript:;" class="btn btn-success item-add" data="'.$value->stock_id.'" title="Add Good Item"> <i class="fa fa-plus"></i></a>
						';
						$result['data'][$key] = array(
							$value->stock_name,
							$buttons
						);
					}
			}
		echo json_encode($result);
	}
	function addOutStock(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$date = date("Y-m-d");

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			$where = array(
				"stock_id"=>set_value('id')
			);
			$item = $this->project_model->select("stockitem",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$newqty = $value->stock_qqty - set_value('qty');
					$newdispose = $value->stockDispose + set_value('qty');
					$data = array(
						"releaseitem_unit"=>$value->stock_unit,
						"releaseitem_qty"=>set_value('qty'),
						"stock_id"=>$value->stock_id,
						"release_date"=>$date,
						"emp_id"=>$this->session->userdata('current_id')
					);
					$updateMData = array(
						"stock_qqty"=>$newqty,
						"stockDispose"=>$newdispose
					);

					$insert = $this->project_model->insert('releaseditem',$data);
					if ($insert != false) {
						$where = array("stock_id"=>$value->stock_id);
						$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
						if ($update != false) {
							$msg['success'] =  true;
						}else{
							$msg['success'] = false;
							$msg['error'] = 'Error in updating item.';
						}
					}else{
						$msg['success'] = false;
						$msg['error'] = "error insert";
					}
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "item error";
			}
		}
		echo json_encode($msg);
	}
	function printOutStock(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Out Stock Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$param = $year.'-'.$month;

		$join = array(
				array('stockitem','releaseditem','stock_id'),
				array('employee','releaseditem','emp_id')
			);

		$like = array('release_date'=>$param);
		$data['result'] = $this->project_model->select_join('releaseditem',$join,$like);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/printOutStock',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchBranchItem(){
		$result = array('data' => array());
		$join = array(
				array('stockitem','branch_stocks','stock_id'),
				array('employee','branch_stocks','emp_id')
			);
		$data = $this->project_model->select_join('branch_stocks',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->transfer_date,
							$value->branch_name,
							$value->stock_name,
							$value->bstocks_unit,
							$value->bstocks_qty,
							$value->emp_lname
						);
					}
			}
		echo json_encode($result);
	}
	function fetchFinishedItem(){
		$result = array('data' => array());
		$join = array(
				array('stock_class','stockitem','stockclass_id'),
				array('stockcategory','stockitem','stockCat_id'),

			);
		$where = array('stock_type'=>"instock",'stockclass_name'=>"FINISHED","stock_qqty >"=>0);
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
						$buttons = '
							<a href="javascript:;" class="btn btn-success item-add" data="'.$value->stock_id.'" title="Add Good Item"> <i class="fa fa-plus"></i></a>
						';
						$result['data'][$key] = array(
							$value->stockCat_name,
							$value->stock_name,
							$buttons
						);
					}
			}
		echo json_encode($result);
	}
	function addBranchStock(){
		$this->form_validation->set_rules('branch','Branch','required');
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$date = date("Y-m-d h:i A");

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			$where = array(
				"stock_id"=>set_value('id')
			);
			$item = $this->project_model->select("stockitem",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$newqty = $value->stock_qqty - set_value('qty');
					$newdispose = $value->stockDispose + set_value('qty');
					$data = array(
						"branch_name"=>set_value('branch'),
						"bstocks_unit"=>$value->stock_unit,
						"bstocks_qty"=>set_value('qty'),
						"stock_id"=>$value->stock_id,
						"transfer_date"=>$date,
						"emp_id"=>$this->session->userdata('current_id')
					);
					$updateMData = array(
						"stock_qqty"=>$newqty,
						"stockDispose"=>$newdispose
					);

					$insert = $this->project_model->insert('branch_stocks',$data);
					if ($insert != false) {
						$where = array("stock_id"=>$value->stock_id);
						$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
						if ($update != false) {
							$msg['success'] =  true;
						}else{
							$msg['success'] = false;
							$msg['error'] = 'Error in updating item.';
						}
					}else{
						$msg['success'] = false;
						$msg['error'] = "error insert";
					}
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "item error";
			}
		}
		echo json_encode($msg);
	}
	function printBranchStock(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Branch Stock Report';

		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$branch = $this->uri->segment(5);
		$param = $year.'-'.$month;

		$join = array(
				array('stockitem','branch_stocks','stock_id'),
				array('employee','branch_stocks','emp_id')
			);

		$like = array('transfer_date'=>$param);
		$where = array('branch_name'=>$branch);
		$data['result'] = $this->project_model->select_join('branch_stocks',$join,$like,$where);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/printBranchStocks',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchMiscExp(){
		$result = array('data' => array());
		$data = $this->project_model->select('expenses_misc');
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->misc_date,
							$value->misc_desc,
							$value->misc_qty,
							$value->misc_unit,
							$value->misc_price,
							$value->misc_note
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
	function printMiscList(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Miscellaneous Report';

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
		$this->load->view('production/printMisc',$data);
		$this->load->view('admin/footer',$data);
	}

}
