<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		$this->is_log_in();
		$this->utype();
		$this->user();

}

		private function is_log_in(){
			if($this->session->userdata('isprod_log') == false){
					redirect('main');
			}
		}

		private function filter_page(){
			if ($this->session->userdata('acct_type') == "production") {
				$page = $this->uri->segment(2);
				if ($page != "lowstocks" || $page != "newstocks" || $page != "outItems" || $page != "dailyOutput") {
					redirect('production/lowstocks');
				}
			}
		}

	function logout(){
		if ($this->session->userdata('isprod_log') == true) {
			$array = array('isprod_log'=>"",'acct_type'=>"",'uname'=>"");
			$this->session->unset_userdata($array);
			redirect('main');
		}
	}
	// pages
	function index(){
		$this->filter_page();
		$data['title'] = "Dashboard";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/home',$data);
		$this->load->view('production/footer',$data);
	}

	function orders(){
		$this->filter_page();
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
		$this->filter_page();
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
		$this->filter_page();
		$data['title'] = "New Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/miscExp',$data);
		$this->load->view('production/footer',$data);
	}

	function stockExp(){
		$this->filter_page();
		$data['title'] = "New Stocks";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/stockExp',$data);
		$this->load->view('production/footer',$data);
	}

	function dailyOutput(){
		$data['title'] = "Daily Output";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/dailyOutput',$data);
		$this->load->view('production/footer',$data);
	}

	function mishandle(){
		$data['title'] = "Mishandle Reports";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/mishandle_reports',$data);
		$this->load->view('production/footer',$data);
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
			$where = array('stock_id'=>$result->stock_id);
			$nwhere = array('stock_id'=>$result->stock_id,"delivery_stat"=>"received");
			$tstock = 0;
			$new = $this->project_model->select('stock_newlog',false,$nwhere);
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
						$value['out'],
						$value['receive'],
						$value['supplier'],
						$value['telephone'],
						$value['mobile']
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

	function printStockList(){
		$data['title'] = "Production";
		$data['sub_heading'] = "POS System";
		$data['page'] = 'Stock List';

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
		$this->load->view('production/stockList',$data);
		$this->load->view('admin/footer',$data);
	}

	function getItem(){
		$id = $this->input->get('id');
		$where = array('stock_id'=>$id);
		$nwhere = array('stock_id'=>$id,"delivery_stat"=>"received","nstock_status"=>"GOOD");
		$join = array(
			array("stockcategory","stockitem","stockCat_id")
		);

		$item = $this->project_model->single_select('stockitem',$where,$join);

		$tcurrent = 0;
		$new = $this->project_model->select('stock_newlog',false,$nwhere);
		if ($new != false) {
			foreach ($new as $value) {
				$tcurrent = $tcurrent + $value->nstock_qqty;
			}
		}


		$branch = $this->project_model->select('branch_stocks',false,$where);
		$tbranch = 0;
		if ($branch != false) {
			foreach ($branch as $value3) {
				$tbranch = $tbranch + $value3->bstocks_qty;
			}
		}

		$release = $this->project_model->select('releaseditem',false,$where);
		$trelease = 0;
		if ($release != false) {
			foreach ($release as $value4) {
				$trelease = $trelease + $value4->releaseitem_qty;
			}
		}


		$sold = $this->project_model->select('ordered_item',false,$where);
		$tsold = 0;
		$tout = 0;
		if ($sold != false) {
			foreach ($sold as $value2) {
				$tsold = $tsold + $value2->order_qty;
			}
		}

		$tout = $tsold + $tbranch + $trelease;

		$total = $tcurrent - $tout;

		$result['category'] = $item->stockCat_name;
		$result['id'] = $item->stock_id;
		$result['item'] = $item->stock_name;
		$result['type'] = $item->stock_type;
		$result['unit'] = $item->stock_unit;
		$result['rp'] = $item->retail_price;
		$result['current'] = $this->cart->format_number($total);

		echo json_encode($result);
	}
	function fetchNewItem(){
		$result = array('data' => array());
		$join = array(
				array('suppliers','stockitem','supplier_id'),
				array('stock_class','stockitem','stockclass_id')
			);
		$where = array('stock_type'=>"instock");
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
		if($data != false){
			foreach ($data as $key => $value) {
					$buttons = '
						<a href="javascript:;" class="btn btn-success item-add" data="'.$value->stock_id.'" title="Add Good Item"> <i class="fa fa-plus"></i></a>
						<a href="javascript:;" class="btn btn-danger item-addD" data="'.$value->stock_id.'" title="Add Damage Item"> <i class="fa fa-trash"></i></a>
					';
					$result['data'][$key] = array(
						$value->stockclass_name,
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
		$order = array('stock_newlog.stock_newid','DESC');
		$data = $this->project_model->select_join('stock_newlog',$join,$like=false,$where=false,$order);
			if($data != false){
				foreach ($data as $key => $value) {
						if($value->delivery_stat == "received"){
							$buttons = '
								<a href="javascript:;" class="btn btn-success disabled" data="" title="Delivered"> <i class="fa fa-archive"></i></a>
							';
						}else{
							$buttons = '
								<a href="javascript:;" class="btn btn-primary item-stat" data="'.$value->stock_newid.'" title="Undeliver"> <i class="fa fa-hand-o-up"></i></a>
							';
						}
						$result['data'][$key] = array(
							$value->delivery_date,
							$value->supplier_name,
							$value->stock_name,
							$value->nstock_status,
							$value->nstock_unit,
							$value->nstock_qqty,
							// $value->nstock_status,
							$buttons
						);
					}
			}
		echo json_encode($result);
	}
	function addNewStock(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$this->form_validation->set_rules('date','Date','required');

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
					$data = array(
						"stock_id"=>$value->stock_id,
						"nstock_qqty"=>set_value('qty'),
						"nstock_unit"=>$value->stock_unit,
						"nstock_status"=>"GOOD",
						"delivery_date"=>set_value('date'),
						"nstock_pqty"=>$value->stock_qqty,
						"delivery_stat"=>'to_receive',
						"emp_id"=>$this->session->userdata('current_id')
					);
					$insert = $this->project_model->insert('stock_newlog',$data);
					if ($insert != false) {
						$msg['success'] =  true;
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
						"delivery_date"=>$date,
						"delivery_stat"=>"undeliver",
						"emp_id"=>$this->session->userdata('current_id')
					);
					$insert = $this->project_model->insert('stock_newlog',$data);
					if ($insert != false) {
							$msg['success'] =  true;
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
	function markedDel(){
			$data = array(
				'delivery_stat'=>"received"
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
		$order = array('releaseditem.release_item_id','DESC');
		$data = $this->project_model->select_join('releaseditem',$join,$like=false,$where=false,$order);
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
		$dataarray = array();
		$result = array('data' => array());
		$join = array(
				array('stock_class','stockitem','stockclass_id')
			);
		$where = array('stock_type'=>"instock",'stockclass_name'=>"RAW");
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $value) {
					$where = array('stock_id'=>$value->stock_id,'delivery_stat'=>"received");
					$tstock = 0;
					$new = $this->project_model->select('stock_newlog',false,$where);
					if ($new != false) {
						foreach ($new as $value1) {
							$tstock = $tstock + $value1->nstock_qqty;
						}
					}

					/* $where3 = array('stock_id'=>$value->stock_id);
					$branch = $this->project_model->select('branch_stocks',false,$where3);
					$tbranch = 0;
					if ($branch != false) {
						foreach ($branch as $value3) {
							$tbranch = $tbranch + $value3->bstocks_qty;
						}
					} */

					$where4 = array('stock_id'=>$value->stock_id);
					$release = $this->project_model->select('releaseditem',false,$where4);
					$trelease = 0;
					if ($release != false) {
						foreach ($release as $value4) {
							$trelease = $trelease + $value4->releaseitem_qty;
						}
					}

					/* $where2 = array('stock_id'=>$value->stock_id);
					$sold = $this->project_model->select('ordered_item',false,$where2);
					$tsold = 0;
					$tout = 0;
					if ($sold != false) {
						foreach ($sold as $value2) {
							$tsold = $tsold + $value2->order_qty;
						}
					} */

					// $tout = $tbranch + $trelease;

					$tcurrent = $tstock - $trelease;
					$buttons = '
						<a href="javascript:;" class="btn btn-success item-add" data="'.$value->stock_id.'" title="Add Good Item"> <i class="fa fa-plus"></i></a>
					';
					if ($tcurrent > 0) {
						$dataarray[] = array(
							"item"=>$value->stock_name,
							"button"=>$buttons
						);
					}

					$result = $dataarray;
				}
				if($dataarray != false){
					foreach ($dataarray as $key => $value) {
							$result['data'][$key] = array(
							$value['item'],
								$value['button']
							);
					}
				}
			}
		echo json_encode($result);
	}
	function addOutStock(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');
		$this->form_validation->set_rules('date','Date','required');

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
					$where = array('stock_id'=>$value->stock_id,'delivery_date <='=>set_value('date'));
					$tstock = 0;
					$new = $this->project_model->select('stock_newlog',false,$where);
					if ($new != false) {
					  foreach ($new as $value1) {
					    $tstock = $tstock + $value1->nstock_qqty;
					  }
					}
					$where = array('stock_id'=>$value->stock_id);
					$traw = 0;
					$raw = $this->project_model->select('releaseditem',false,$where);
					if ($raw != false) {
					  foreach ($raw as $value4) {
					    $traw = $traw + $value4->releaseitem_qty;
					  }
					}

					$tcurrent = $tstock - $traw;
					$data = array(
						"releaseitem_unit"=>$value->stock_unit,
						"releaseitem_qty"=>set_value('qty'),
						"stock_id"=>$value->stock_id,
						"release_date"=>set_value('date'),
						"emp_id"=>$this->session->userdata('current_id')
					);
					if ($tcurrent >= set_value('qty')) {
						$insert = $this->project_model->insert('releaseditem',$data);
						if ($insert != false) {
								$msg['success'] =  true;
						}else{
							$msg['success'] = false;
							$msg['error'] = "error insert";
						}
					}else{
						$msg['success'] = false;
						$msg['error'] = "Insufficient item quantity.";
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

	function getProdItem(){
		$id = $this->input->get('id');
		$where = array('stock_id'=>$id);

		$join = array(
			array("stockcategory","stockitem","stockCat_id")
		);

		$item = $this->project_model->single_select('stockitem',$where,$join);

		$tcurrent = 0;
		$where1 = array('stock_id'=>$id, 'delivery_stat'=>"received");
		$new = $this->project_model->select('stock_newlog',false,$where1);
		if ($new != false) {
			foreach ($new as $value) {
				$tcurrent = $tcurrent + $value->nstock_qqty;
			}
		}


		$release = $this->project_model->select('releaseditem',false,$where);
		$trelease = 0;
		if ($release != false) {
			foreach ($release as $value3) {
				$trelease = $trelease + $value3->releaseitem_qty;
			}
		}

		$total = $tcurrent - $trelease;

		$result['category'] = $item->stockCat_name;
		$result['id'] = $item->stock_id;
		$result['item'] = $item->stock_name;
		$result['type'] = $item->stock_type;
		$result['unit'] = $item->stock_unit;
		$result['rp'] = $item->retail_price;
		$result['current'] = $this->cart->format_number($total);

		echo json_encode($result);
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
		$where = array('stock_type'=>"instock",'stockclass_name'=>"FINISHED");
		$data = $this->project_model->select_join('stockitem',$join,false,$where);
			if($data != false){
				foreach ($data as $key => $value) {
						$where = array('stock_id'=>$value->stock_id);
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
						$tout = 0;
						if ($sold != false) {
							foreach ($sold as $value2) {
								$tsold = $tsold + $value2->order_qty;
							}
						}

						$tout = $tsold + $tbranch;
						$total = $tcurrent - $tout;


						if ($total > 0) {
							$link = '<a javascript:; class="btn btn-default item-add" data="'.$value->stock_id.'"> <i class="fa fa-hand-plus"></i> Add </a>';
						}else{
							$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-ban"></i> Add</a>';
						}

						//echo $result->stock_name.' '.$total.' '.$link.'<br />';

						$result['data'][$key] = array(
							$value->stockCat_name,
							$value->stock_name,
							$link
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

		$date = $this->uri->segment(3);
		$branch = $this->uri->segment(4);

		$join = array(
				array('stockitem','branch_stocks','stock_id'),
				array('employee','branch_stocks','emp_id')
			);

		$like = array('transfer_date'=>$date);
		$where = array('branch_name'=>$branch);
		$data['result'] = $this->project_model->select_join('branch_stocks',$join,$like,$where);
		$data['property']= $this->project_model->select('property_info');

		$this->load->view('admin/header',$data);
		$this->load->view('production/printBranchStocks',$data);
		$this->load->view('admin/footer',$data);
	}

	function fetchMiscExp(){
		$result = array('data' => array());
		$join = array(
			array('employee','expenses_misc','emp_id')
		);
		$data = $this->project_model->select_join('expenses_misc',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->misc_date,
							$value->misc_desc,
							$value->misc_qty,
							$value->misc_unit,
							$value->misc_price,
							$value->emp_fname
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
				'misc_date'=>set_value('date'),
				'emp_id'=>$this->session->userdata('current_id')
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


	function fetchStockExp(){
		$result = array('data' => array());
		$join = array(
			array('employee','expenses_stocks','emp_id')
		);
		$data = $this->project_model->select_join('expenses_stocks',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->expstocks_date,
							$value->expstocks_desc,
							$value->expstocks_qty,
							$value->expstocks_unit,
							$value->expstocks_amount,
							$value->emp_fname
						);
					}
			}
		echo json_encode($result);
	}
	function addStockExp(){
		$this->form_validation->set_rules('desc','Desciption','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('cost','Cost','required');
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('date','Date','required');
		//$this->form_validation->set_rules('note','Note','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$amount = set_value('cost')*set_value('qty');
			$data = array(
				'expstocks_desc'=>ucwords(set_value('desc')),
				'expstocks_qty'=>set_value('qty'),
				'expstocks_unit'=>set_value('unit'),
				'expstocks_amount'=>set_value('cost'),
				'expstocks_date'=>set_value('date'),
				'emp_id'=>$this->session->userdata('current_id')
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

	function fetchOutput(){
		$result = array('data' => array());
		$join = array(
			array('employee','daily_output','emp_id')
		);
		$data = $this->project_model->select_join('daily_output',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->output_date,
							$value->output_desc,
							$value->output_unit,
							$value->batch_num,
							$value->output_qty,
							$value->packing,
							$value->emp_fname
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
			//$amount = set_value('cost')*set_value('qty');
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

	function fetchMishandle(){
		$result = array('data' => array());
		$join = array(
			array('employee','mishandle_reports','emp_id')
		);
		$data = $this->project_model->select_join('mishandle_reports',$join);
			if($data != false){
				foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$value->report_date,
							$value->section,
							$value->type,
							$value->item,
							$value->unit,
							$value->qty,
							$value->emp_fname,
							$value->action,
							$value->report_stat
						);
					}
					// <th>Date</th>
					// <th>Section</th>
					// <th>Type</th>
					// <th>Item</th>
					// <th>Unit</th>
					// <th>Qty</th>
					// <th>Emp</th>
					// <th>Status</th>
			}
		echo json_encode($result);
	}
	function addMishandle(){
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('section','Section','required');
		$this->form_validation->set_rules('item','Item','required');
		$this->form_validation->set_rules('qty','Quantity','required|number');
		$this->form_validation->set_rules('action','Action','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('desc','Description','required');
		//$this->form_validation->set_rules('note','Note','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$data = array(
				'item'=>ucwords(set_value('item')),
				'type'=>set_value('type'),
				'qty'=>set_value('qty'),
				'emp_id'=>$this->session->userdata('current_id'),
				'report_stat'=>"pending",
				'report_date'=>set_value('date'),
				'section'=>set_value('section'),
				'unit'=>set_value('unit'),
				'action'=>set_value('action'),
				'desc'=>set_value('desc')
			);
			$add = $this->project_model->insert('mishandle_reports',$data);
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

	function utype(){
		$where = array('emp_account_id'=>$this->session->userdata('account_id'));
		$type = $this->project_model->single_select('emp_accounts',$where);
		if ($type != false) {
			$data = array("acct_type"=>$type->emp_dept);
			$this->session->set_userdata($data);
			return $this->session->userdata("acct_type");
		}else{
			return false;
		}
	}

	function user(){
		$where = array('emp_id'=>$this->session->userdata('current_id'));
		$user = $this->project_model->single_select('employee',$where);
		if ($user != false) {
			$name = $user->emp_fname.' '.$user->emp_lname;
			$data = array('uname'=>$name);
			return $this->session->set_userdata($data);
		}else{
			return false;
		}
	}

	function test(){
		$qty = "2";
		$id = "194";
		$date = date("Y-m-d");

			$where = array(
				"stock_id"=>$id
			);
			$item = $this->project_model->select("stockitem",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$where = array('stock_id'=>$value->stock_id,'delivery_date <='=>$date);
					$tstock = 0;
					$new = $this->project_model->select('stock_newlog',false,$where);
					if ($new != false) {
					  foreach ($new as $value1) {
					    $tstock = $tstock + $value1->nstock_qqty;
					  }
					}
					$where = array('stock_id'=>$value->stock_id);
					$traw = 0;
					$raw = $this->project_model->select('releaseditem',false,$where);
					if ($raw != false) {
					  foreach ($raw as $value4) {
					    $traw = $traw + $value4->releaseitem_qty;
					  }
					}

					$tcurrent = $tstock - $traw;
					$data = array(
						"releaseitem_unit"=>$value->stock_unit,
						"releaseitem_qty"=>set_value('qty'),
						"stock_id"=>$value->stock_id,
						"release_date"=>$date,
						"emp_id"=>$this->session->userdata('current_id')
					);
					echo 'name: '.$value->stock_name.'<br>';
					echo 'total stock: '.$tstock.'<br>';
					echo 'total out: '.$traw.'<br>';

				}
			}else{
				echo "false";
			}

	}

}
