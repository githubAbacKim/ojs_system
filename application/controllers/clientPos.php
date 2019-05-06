<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientPos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_log_in();
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('content/nav');
		$this->load->view('content/pos_main');
		$this->load->view('footer');
	}

	function fetchItems(){
		$result = array('data' => array());

		$join = array(
				array("stock_class","stockitem","stockclass_id"),
				array("stockcategory","stockitem","stockCat_id")
			);
		$like = array("stock_class.stockclass_name"=>"FINISHED");
		$data = $this->project_model->select_join('stockitem',$join,$like);
		if ($data != false) {
			if ($this->session->userdata('posCart') !== FALSE) {
				if ($data !== false) {
					$where = array("order_id"=>$this->session->userdata('posCart'));
					$order = $this->project_model->select('order',false,$where);
					foreach ($order as $val2) {
						if ($val2->order_status === "paid") {
							$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-plus"></i> Add </a>';
							if ($data != false) {
								foreach ($data as $key => $value) {
									$result['data'][$key] = array(
										$link,
										$value->stockCat_name,
										$value->stock_name,
										$value->stockCost
									);
								}
							}
						}else{
							if ($data != false) {
								foreach ($data as $key => $value) {
									if ($value->stock_qqty > 0 && $value->stock_type == "instock") {
										$link = '<a javascript:; class="btn btn-default addToCart" data="'.$value->stock_id.'"> <i class="fa fa-hand-plus"></i> Add </a>';
									}elseif ($value->stock_type == "nonstock") {

										if ($value->stockCat_name == "Vinyl Stickers" || $value->stockCat_name == "Siser Materials" || $value->stockCat_name == "Tarp") {
											$link = '<a javascript:; class="btn btn-default addCustItem" data="'.$value->stock_id.'"> <i class="fa fa-hand-plus"></i> Add </a>';
										}else{
											$link = '<a javascript:; class="btn btn-default addToCart" data="'.$value->stock_id.'"> <i class="fa fa-hand-plus"></i> Add </a>';
										}
									}else{
										$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-plus"></i> Add </a>';
									}

									$result['data'][$key] = array(
										$link,
										$value->stockCat_name,
										$value->stock_name,
										$value->stockCost
									);
								}
							}

						}
					}

				}
			}else{
				if ($data !== false) {
					$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-plus"></i> Add </a>';
					foreach ($data as $key => $value) {
						$result['data'][$key] = array(
							$link,
							$value->stockCat_name,
							$value->stock_name,
							$value->stockCost
						);
					}
				}
			}
		}
		echo json_encode($result);
	}

	function fetchOrderCart(){
		$result = array('data' => array());

		$where = array('order_status'=>"not_paid");
		$data = $this->project_model->select('order',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-cart" data="'.$value->order_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->order_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->order_type,
					$value->order_code,
					$value->cust_name,
					$link
				);
			}
		}

		echo json_encode($result);
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

/*====== Store Interface ======*/
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
		$this->form_validation->set_rules('cust_name','Customer Name','required');
		$this->form_validation->set_rules('order_type','Order Type','required');

		$this->form_validation->set_rules('downpayment','Downpayment','required');
		$this->form_validation->set_rules('tax','Tax','required');
		if ($this->input->post('order_type') == "order") {
			$this->form_validation->set_rules('date','Pick-up date','required');
			$this->form_validation->set_rules('time','Pick-up time','required');
		}

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$release = date("Y-m-d");
			$code = $this->lastCode('order',1,'order_id','order_code');
			$length = strlen($this->lastCode('order',1,'order_id','order_code'));
			$couter = substr($this->lastCode('order',1,'order_id','order_code'),7,$length) + 1;
			//$code  = str_pad($code, 2, '0', STR_PAD_LEFT);

			if (set_value('order_type') == "order") {
				$data = array(
					'order_code'=>'OC'.date('md').'-'.$couter,
					'cust_name'=>strtoupper(set_value('cust_name')),
					'order_date'=>date('Y-m-d h:i A'),
					'emp_id'=>$this->session->userdata('current_id'),
					'order_type'=>set_value('order_type'),
					'order_downpayment'=>set_value('downpayment'),
					'or_num'=>'',
					'tax_rate'=>set_value('tax'),
					'pickup_date'=>set_value('date'),
					'pickup_time'=>set_value('time')
				);
			}else{
				$data = array(
					'order_code'=>'OC'.date('md').'-'.$couter,
					'cust_name'=>strtoupper(set_value('cust_name')),
					'order_date'=>date('Y-m-d h:i A'),
					'emp_id'=>$this->session->userdata('current_id'),
					'order_type'=>set_value('order_type'),
					'order_downpayment'=>set_value('downpayment'),
					'or_num'=>'',
					'tax_rate'=>set_value('tax')
				);
			}

			$insert = $this->project_model->insert('order',$data,true);
			if ($insert[0]) {
				$this->session->set_userdata('posCart',$insert[1]);
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Unable to create cart.';
			}
		}
		echo json_encode($msg);
	}

	function fetchPosCart(){
		$result = array('data' => array());

		$where = array('order_status'=>"not_paid");
		$data = $this->project_model->select('order',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-cart" data="'.$value->order_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->order_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->order_type,
					$value->order_code,
					$value->cust_name,
					$link
				);
			}
		}


		echo json_encode($result);
	}

	function regPosCart(){
		$id = $this->input->get('id');
		$this->session->set_userdata('posCart',$id);

		if ($this->session->userdata('posCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = "Unable to register POS Cart";
		}
		echo json_encode($msg);
	}

	function closeCart(){
		$this->session->unset_userdata('posCart');
		if ($this->session->userdata('posCart') == FALSE) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = 'Unable to unset POS Cart.';
		}
		echo json_encode($msg);
	}

	function checkRegPosCart(){
		if ($this->session->userdata('posCart')) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = 'No POS Cart is resgistered.';
		}

		echo json_encode($msg);
	}

	function fetchCartPosItem(){
		$result = array('data' => array());
		$id = $this->session->userdata('posCart');
		$where = array('order_id'=>$id);
		$data = $this->project_model->select('ordered_item',false,$where);

		$order = $this->project_model->select('order',false,$where);
		if ($order != false) {
			foreach ($order as $orderval) {
				if ($data != false) {
					foreach ($data as $key => $value) {
						if ($orderval->order_status !== "not_paid") {
							$link = '<a href="javascript:;" class="btn btn-default disabled"> <i class="fa fa-hand-cross"></i> Remove </a>';
						}else{
							$link = '<a href="javascript:;" class="btn btn-default delete-cartitem" data="'.$value->order_item_id.'"> <i class="fa fa-hand-cross"></i> Remove </a>';
						}

						$result['data'][$key] = array(
							$value->order_name,
							$value->order_unit,
							$value->order_qty,
							$value->order_price,
							$link
						);
					}
				}
			}

		}


		echo json_encode($result);
	}

	function addCartItem(){
		$this->form_validation->set_rules('qty','Quantity','required');
		$this->form_validation->set_rules('id','Item','required');

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
					$name = $value->stock_name;
					$newstock = $value->stock_qqty - set_value('qty');
					$data = array(
						"order_id"=>$cartid,
						"order_name"=>$value->stock_name,
						"order_price"=>$value->stockCost,
						"order_qty"=>set_value('qty'),
						"order_date"=>date("Y-m-d"),
						"order_stock_type"=>$value->stock_type,
						"stock_id"=>$value->stock_id,
						"order_unit"=>$value->stock_unit
					);
					$updateMData = array(
						"stock_qqty"=>$newstock
					);
					$wherecheck = array(
						'order_id'=>$cartid,
						'stock_id'=>$value->stock_id,
						'order_name'=>$name
					);
					$check = $this->project_model->single_select('ordered_item',$wherecheck);
					if ($check != false) {
						$newqty = set_value('qty')+$check->order_qty;
						$updateOData = array(
							'order_qty'=>$newqty
						);
						$where = array('order_item_id'=>$check->order_item_id);
						$updateitem = $this->project_model->updateNew('ordered_item',$where,$updateOData);
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
						$insert = $this->project_model->insert('ordered_item',$data);
						if ($insert != false) {
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
								$msg['success'] =  true;
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

	/* private function processAddCartItem($id,$qty){
		//add items to cart items table
		//update stock table item stocks
		$where = array(
		"menu_item_id"=>$id
		);

		$cartid = $this->session->userdata('posCart');
		$item = $this->project_model->select("menu_item",false,$where);
		if ($item != false) {
			foreach ($item as $value) {
				$newstock = $value->stock_dispose + $value->stock;
				$name = $value->item_name;
				$dispose = $value->stock_dispose;
				$data = array(
					"order_id"=>$cartid,
					"order_name"=>$value->item_name,
					"order_price"=>$value->item_price,
					"order_qty"=>$qty,
					"order_date"=>date("Y-m-d"),
					"order_stock_type"=>$value->stock_type,
					"menu_item_id"=>$value->menu_item_id,
					"order_unit"=>$value->unit
				);
				$updateData = array(
					"stock"=>$newstock,
					"stock_dispose"=>'0'
				);
				$where = array("menu_item_id"=>$value->menu_item_id);

				$insert = $this->project_model->insert('ordered_item',$data);

				if ($insert != false) {
					$update = $this->project_model->updateNew("menu_item",$where,$updateData);
					if ($update != false) {
						return true;
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
	} */

	function addCustItem(){
		$this->form_validation->set_rules('id','Item','required');
		$this->form_validation->set_rules('quant','Quantity','required');
		$this->form_validation->set_rules('width','Width','required');
		$this->form_validation->set_rules('height','Height','required');
		$this->form_validation->set_rules('color','Color','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			$where = array(
			"menu_item_id"=>set_value('id')
			);
			$cartid = $this->session->userdata('posCart');
			$item = $this->project_model->select("menu_item",false,$where);
			if ($item != false) {
				foreach ($item as $value) {
					$dimension = set_value('width')*set_value('height');
					$name = $value->item_name.' ('. set_value('width').'x'.set_value('height').') '.set_value('color').' Color(s)';
					$rate = $value->item_price*$dimension*set_value('color');
					$newstock = $value->stock - set_value('quant');
					$dispose = $value->stock_dispose + set_value('quant');

					$getcatwhere = array('menu_id'=>$value->menu_id);
					$getcat = $this->project_model->select('store_menu',false,$getcatwhere);
					if ($getcatwhere != false) {
						foreach ($getcat as $catval) {
							if ($catval->menu_name == "Vinyl Stickers") {
								if (set_value('color') == 1) {
									if ($rate < 55) {
										$rate = 55;
									}
								}elseif (set_value('color') == 2) {
									if ($rate < 75) {
										$rate = 75;
									}
								}elseif (set_value('color') == 3) {
									if ($rate < 95) {
										$rate = 95;
									}
								}
							}elseif ($catval->menu_name == "Siser Materials") {
									if ($value->item_name == "P.S Film") {
										if ($rate < 100) {
											$rate = 100;
										}
									}elseif ($value->item_name == "P.S Electric") {
										if ($rate < 100) {
											$rate = 100;
										}
									}elseif ($value->item_name == "3D-XPD") {
										if ($rate < 130) {
											$rate = 130;
										}
									}
							}
						}
					}
					$data = array(
						"order_id"=>$cartid,
						"order_name"=>$name,
						"order_price"=>$rate,
						"order_qty"=>set_value('quant'),
						"order_date"=>date("Y-m-d"),
						"order_stock_type"=>$value->stock_type,
						"menu_item_id"=>$value->menu_item_id,
						"order_unit"=>$value->unit
					);
					$updateMData = array(
						"stock"=>$newstock,
						"stock_dispose"=>$dispose
					);

					$wherecheck = array(
						'order_id'=>$cartid,
						'menu_item_id'=>$value->menu_item_id,
						'order_name'=>$name
					);
					$check = $this->project_model->single_select('ordered_item',$wherecheck);
					if ($check != false) {
						$newqty = set_value('quant')+$check->order_qty;
						$updateOData = array(
							'order_qty'=>$newqty
						);
						$where = array('order_item_id'=>$check->order_item_id);
						$updateitem = $this->project_model->updateNew('ordered_item',$where,$updateOData);
						if ($updateitem != false) {
							if ($value->stock_type == 'instock') {
								$where = array("menu_item_id"=>$value->menu_item_id);
								$update = $this->project_model->updateNew("menu_item",$where,$updateMData);
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
						$insert = $this->project_model->insert('ordered_item',$data);
						if ($insert != false) {
							if ($value->stock_type == 'instock') {
								$where = array("menu_item_id"=>$value->menu_item_id);
								$update = $this->project_model->updateNew("menu_item",$where,$updateData);
								if ($update != false) {
									$msg['success'] =  true;
								}else{
									$msg['success'] = false;
									$msg['error'] = 'Error in updating menu_item.';
								}
							}else{
								$msg['success'] =  true;
							}
						}else{
							$msg['success'] = false;
							$msg['error'] = "Unable to add new cart item.";
						}
					}
					/* $where = array("menu_item_id"=>$value->menu_item_id);
					$insert = $this->project_model->insert('ordered_item',$data);

					if ($insert != false) {
						$update = $this->project_model->updateNew("menu_item",$where,$updateData);
						if ($update != false) {
							$msg['success'] = true;
						}else{
							$msg['success'] = false;
							$msg['error'] = "Unable to update Menu Item.";
						}
					}else{
						$msg['success'] = false;
						$msg['error'] = "Unable to insert item to cart.";
					} */
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to find item";
			}
		}
		echo json_encode($msg);
	}

	/* private function processAddCustItem($id,$qty,$width,$height,$color){
		//add items to cart items table
		//update stock table item stocks
		$where = array(
		"menu_item_id"=>$id
		);

		$cartid = $this->session->userdata('posCart');
		$item = $this->project_model->select("menu_item",false,$where);
		if ($item != false) {
			foreach ($item as $value) {
				$dimension = $width*$height;
				$name = $value->item_name.' ('. $width.'x'.$height.') '.$color.' Color(s)';
				$rate = $value->item_price*$dimension*$color;
				$newstock = $value->stock_dispose + $value->stock;
				$dispose = $value->stock_dispose;

				if ($rate < 55) {
					$rate = 55;
				}
				$data = array(
					"order_id"=>$cartid,
					"order_name"=>$name,
					"order_price"=>$rate,
					"order_qty"=>$qty,
					"order_date"=>date("Y-m-d"),
					"order_stock_type"=>$value->stock_type,
					"menu_item_id"=>$value->menu_item_id,
					"order_unit"=>$value->unit
				);
				$updateData = array(
					"stock"=>$newstock,
					"stock_dispose"=>'0'
				);
				$where = array("menu_item_id"=>$value->menu_item_id);

				$insert = $this->project_model->insert('ordered_item',$data);

				if ($insert != false) {
					$update = $this->project_model->updateNew("menu_item",$where,$updateData);
					if ($update != false) {
						return true;
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
	} */

	function delCartPosItem(){
		//process data if Finish Button will be press.
		/* $id = $this->input->get('id');
		$result = $this->processDelCartPosItem($id);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		} */
		$id = $this->input->get('id');
		$where = array('order_item_id'=>$id);
		$get = $this->project_model->select('ordered_item',false,$where);
		if ($get !== false) {
			foreach ($get as $ordereditem) {
				$endpost = strpos($ordereditem->order_name, '(');
				if ($endpost == false) {
					$name = $ordereditem->order_name;
				}else{
					$name = substr($ordereditem->order_name, 0, $endpost);
				}
				if ($ordereditem->order_stock_type == 'instock') {
					$item_where = array(
						'stock_id'=>$ordereditem->stock_id
					);
					$item = $this->project_model->select('stockitem',false,$item_where);
					if ($item != false) {
						foreach ($item as $item) {
							$stock_data = array(
								"stock_qqty"=>$item->stock_qqty + $ordereditem->order_qty
							);
							$return_stock = $this->project_model->updateNew('stockitem',$item_where,$stock_data);
							if ($return_stock != false) {
								$delete = $this->project_model->deleteNew('ordered_item',$where);
								if ($delete !== false) {
									$msg['success'] =  true;
								}else{
									$msg['success'] =  false;
									$ms['error'] = 'Unable to delete item';
								}
							}else{
								$msg['success'] =  false;
								$ms['error'] = 'Unable to return stock to menu item.';
							}
						}
					}else{
						$msg['success'] =  false;
						$ms['error'] = 'Unable to find menu item.';
					}
				}else{
					$delete = $this->project_model->deleteNew('ordered_item',$where);
					if ($delete !== false) {
						$msg['success'] =  true;
					}else{
						$msg['success'] =  false;
						$ms['error'] = 'Unable to directly delete ordered item.';
					}
				}
			}//foreach ordereditem end
		}else{
			$msg['success'] =  false;
			$msg['error'] = 'Unable to find item';
		}

		echo json_encode($msg);
	}

	/* private function processDelCartPosItem($id){
		$where = array('order_item_id'=>$id);
		$get = $this->project_model->select('ordered_item',false,$where);
		if ($get !== false) {
			foreach ($get as $ordereditem) {
				$endpost = strpos($ordereditem->order_name, '(');
				if ($endpost == false) {
					$name = $ordereditem->order_name;
				}else{
					$name = substr($ordereditem->order_name, 0, $endpost);
				}
				$item_where = array('item_name'=>$name);
				$item = $this->project_model->select('menu_item',false,$item_where);
				if ($item != false) {
					$i2 = 0;
					foreach ($item as $item) {
						if ($item->stock_type == "instock") {
							$stock_data = array(
								"stock"=>$value->stock+$ordereditem->order_qty,
								'stock_dispose'=>$item->stock_dispose-$ordereditem->order_qty
							);
							$updatewhere = array(
								"menu_item_id"=>$item->menu_item_id
							);
							$return_stock = $this->project_model->updateNew('menu_item',$updatewhere,$stock_data);
							if ($return_stock != false) {
								$deletewhere=array(
									'order_item_id'=>$item_id
								);
								$delete = $this->project_model->deleteNew('ordered_item',$deletewhere);
								if ($delete !== false) {
									return true;
								}else{
									return false;
								}
							}else{
								return false;
							}
						}else{
							$delete = $this->project_model->delete('ordered_item','order_item_id',$id);
							if ($delete !== false) {
								return true;
							}else{
								return false;
							}
						}
					}
				}
			}
		}else{
			return false;
		}
	} */

	function cancelOrder(){
		//process data if Finish Button will be press.
		/* $id = $this->input->get('id');
		if ($this->processCancelOrder($id) !== false) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		} */
		$id = $this->input->get('id');
		$get_where = array('order_id'=>$id);
		$getitem = $this->project_model->select('ordered_item',false,$get_where);
		if ($getitem != false) {
			$i = 0;
			$counter = count($getitem);
			foreach ($getitem as $value) {
				/* $itemid = $value->order_item_id;
				if ($this->processDelCartPosItem($itemid) !== false) {
					$i++;
				}else{
					$msg['success'] = false;
					$msg['error'] = "Error in item loop.";
				} */
				$itemid = $value->order_item_id;
				$where = array('order_item_id'=>$itemid);
				$get = $this->project_model->select('ordered_item',false,$where);
				if ($get !== false) {
					foreach ($get as $ordereditem) {
						$endpost = strpos($ordereditem->order_name, '(');
						if ($endpost == false) {
							$name = $ordereditem->order_name;
						}else{
							$name = substr($ordereditem->order_name, 0, $endpost);
						}
						if ($ordereditem->order_stock_type == 'instock') {
							$item_where = array(
								'menu_item_id'=>$ordereditem->menu_item_id
							);
							$item = $this->project_model->select('menu_item',false,$item_where);
							if ($item != false) {
								foreach ($item as $item) {
									$stock_data = array(
										"stock"=>$item->stock + $ordereditem->order_qty,
										'stock_dispose'=>$item->stock_dispose-$ordereditem->order_qty
									);
									$return_stock = $this->project_model->updateNew('menu_item',$item_where,$stock_data);
									if ($return_stock != false) {
										$delete = $this->project_model->deleteNew('ordered_item',$where);
										if ($delete !== false) {
											$i++;
										}else{
											$msg['success'] =  false;
											$ms['error'] = 'Unable to delete item';
										}
									}else{
										$msg['success'] =  false;
										$ms['error'] = 'Unable to return stock to menu item.';
									}
								}
							}else{
								$msg['success'] =  false;
								$ms['error'] = 'Unable to find menu item.';
							}
						}else{
							$delete = $this->project_model->deleteNew('ordered_item',$where);
							if ($delete !== false) {
								$i++;
							}else{
								$msg['success'] =  false;
								$ms['error'] = 'Unable to directly delete ordered item.';
							}
						}
					}//foreach ordereditem end
				}else{
					$msg['success'] =  false;
					$msg['error'] = 'Unable to find item';
				}
			}

			if ($i == $counter) {
				$del_where = array('order_id'=>$id);
				$delete = $this->project_model->deleteNew('order',$del_where);
				if ($delete !== false) {
					if ($id == $this->session->userdata('posCart')) {
						if ($this->clearCartSession() === true) {
							$msg['success'] = true;
						}else{
							$msg['success'] = false;
							$msg['error'] = "Unable to clear order session.";
						}
					}else{
						$msg['success'] = true;
					}
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to delete order";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Item counter error.";
			}

		}else{
			$where = array('order_id'=>$id);
			$delete = $this->project_model->deleteNew('order',$where);
			if ($delete) {
				if ($id == $this->session->userdata('posCart')) {
					if ($this->clearCartSession() === true) {
						$msg['success'] = true;
					}else{
						$msg['success'] = false;
						$msg['error'] = "Unable to clear order session.";
					}
				}else{
					$msg['success'] = true;
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Unable to delete order";
			}
		}
		echo json_encode($msg);
	}

	/* private function processCancelOrder($id){
		$get_where = array('order_id'=>$id);
		$getitem = $this->project_model->select('ordered_item',false,$get_where);
		if ($getitem != false) {
			echo "item here.";
			$i = 0;
			$counter = count($getitem);
			foreach ($getitem as $value) {
				$itemid = $value->order_item_id;
				if ($this->processDelCartPosItem($itemid) !== false) {
					$i++;
				}else{
					return false;
				}
			}
			if ($i == $counter) {
				$del_where = array('order_id'=>$id);
				$delete = $this->project_model->deleteNew('order',$del_where);
				if ($delete !== false) {
					if ($id == $this->session->userdata('posCart')) {
						if ($this->clearCartSession() === true) {
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
			}else{
				return false;
			}

		}else{
			$where = array('order_id'=>$id);
			$delete = $this->project_model->deleteNew('order',$where);
			if ($delete) {
				if ($id == $this->session->userdata('posCart')) {
					if ($this->clearCartSession() === true) {
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
	} */

	private function clearCartSession(){
		$this->session->unset_userdata('posCart');
		if ($this->session->userdata('posCart') == FALSE) {
			return true;
		}else{
			return false;
		}
	}

	function order_payment(){
		$this->form_validation->set_rules('cash','Cash Amount','required');
		$this->form_validation->set_rules('discount','Discount','required');
		$this->form_validation->set_rules('ornum','OR Number','required');
		$this->form_validation->set_rules('tax','Tax','required');
		if ($this->form_validation->run() == FALSE) {
			$data['success'] = false;
			$data['error'] = validation_errors();
		}else{
			$where = array('order_id'=>$this->session->userdata('posCart'));
			$order = $this->project_model->select('order',false,$where);

			foreach ($order as $value) {
				$downpayment = $value->order_downpayment;

				$orderitem_where = array('order_id'=>$this->session->userdata('posCart'));
				$orderitem = $this->project_model->select('ordered_item',false,$orderitem_where);
				if ($orderitem != false) {
					$amount=0;
					foreach ($orderitem as $item) {
						$subtotal = $item->order_price*$item->order_qty;
						$amount = $amount+$subtotal;
					}

					$total = $amount - $downpayment;
					$tax = set_value('tax') / 100;
					$tax_amount = $amount * $tax;
					$total = $total - set_value('discount');

					$payment_data = array(
						'order_bill_amount'=>$amount,
						'order_cash_amount'=>set_value('cash'),
						'order_status'=>'paid',
						'order_discount'=>set_value('discount'),
						'or_num'=>set_value('ornum'),
						'tax_amount'=>$tax_amount
					);

					if (set_value('cash') >= $total) {
						$payment = $this->project_model->update('order','order_id',$payment_data,$this->session->userdata('posCart'));
						if ($payment != false) {
							$data['success'] = true;
						}else{
							$data['success'] = false;
							$data['error'] = 'Unable to update payment';
						}
					}else {
							$data['success'] = false;
							$data['error'] = 'Cash is insuficient for the total bill amount.';
					}

				}else{
					$data['success'] = false;
					$data['error'] = 'Unable to find ordered items.';
				}
			}
		}



		echo json_encode($data);
	}

	function fetchcartinfo(){
		$id = $this->session->userdata('posCart');
		$where = array("order_id"=>$id);

		$order = $this->project_model->select('order',false,$where);
		foreach ($order as $value) {
			$items = $this->project_model->select('ordered_item',false,$where);
			$data['total'] = 0;
			$data['taxes'] = 0;
			$data['amount'] = 0;
			$data['downpayment'] = 0;


			$subtotal = '0.00';
			$amount = '0.00';
			$tax_rate = $value->tax_rate / 100;
			$total = '0.00';
			$taxes = '0.00';
			$downpayment = $value->order_downpayment;
			if ($items != false) {
				foreach ($items as $value2) {
					$subtotal = $value2->order_qty * $value2->order_price;
					$amount = $amount + $subtotal;
				}
				$taxes = $amount * $tax_rate;
				$amount = $amount + $taxes;
				$total = $amount - $downpayment - $value->order_discount;
			}

			$data['amount'] = $this->cart->format_number($amount);
			$data['taxes'] = $taxes;
			$data['total'] = $this->cart->format_number($total);
			$data['downpayment'] = $this->cart->format_number($downpayment);
		}

		echo json_encode($data);
	}

	function fetchbillurl(){
		$id = $this->session->userdata('posCart');
		$data['url'] = base_url('clientPos/posBill');

		echo json_encode($data);
	}

	function fetchreceipturl(){
		$id = $this->session->userdata('posCart');
		$data['url'] = base_url('clientPos/posReceipt');

		echo json_encode($data);
	}



	function checkcartstat(){
		$where = array("order_id"=>$this->session->userdata('posCart'));
		$cart = $this->project_model->select('order',false,$where);
		if ($cart != false) {
			foreach ($cart as $value) {
				if ($value->order_status == "paid") {
					$data['status'] = true;
				}else{
					$data['status'] = false;
				}
			}
		}

		echo json_encode($data);
	}

	private function is_log_in(){
		if($this->session->userdata('ispos_log') == false){
			redirect('main');
		}
	}

	function logout(){
		if ($this->session->userdata('ispos_log') == true) {
			$this->session->unset_userdata('ispos_log');
			$this->session->sess_destroy();
			redirect('main');
		}
	}
/*========= Printable =========*/
	function posBill(){
			$data['title'] = "Casher";
			$data['sub_heading'] = "Five-N";
			$data['page'] = 'Order Bill';

			$where = array(
				"order.order_id"=>$this->session->userdata('posCart')
			);
			$data['bill'] = $this->project_model->select('order',false,$where);

			$where2 = array("order_id"=>$this->session->userdata('posCart'));
			$data['items']= $this->project_model->select('ordered_item',false,$where2);
			$data['property']= $this->project_model->select('property_info');

			$where3 = array('emp_id'=>$this->session->userdata('current_id'));
			$data['employee'] = $this->project_model->select('employee',false,$where3);

			$this->load->view('header',$data);
			$this->load->view('content/bill_form',$data);
			$this->load->view('footer');
		}

	function posReceipt(){
		$data['title'] = "Casher";
		$data['sub_heading'] = "Five-N";
		$data['page'] = 'Purchase Receipt';

		$where = array(
			"order.order_id"=>$this->session->userdata('posCart')
		);
		$data['bill'] = $this->project_model->select('order',false,$where);

		$where2 = array("order_id"=>$this->session->userdata('posCart'));
		$data['items']= $this->project_model->select('ordered_item',false,$where2);
		$data['property']= $this->project_model->select('property_info');

		$where3 = array('emp_id'=>$this->session->userdata('current_id'));
		$data['employee'] = $this->project_model->select('employee',false,$where3);

		$this->load->view('header',$data);
		$this->load->view('content/receipt_form',$data);
		$this->load->view('footer');
	}

/*========= test =======*/
	function test(){
		$data = array(
			'order_code'=>'OC0001',
			'cust_name'=>"Kim",
			'order_date'=>date('Y-m-d h:i A'),
			'emp_id'=>'4',
			'order_type'=>'purchase',
			'order_downpayment'=>'0.00',
			'or_num'=>'000',
			'tax_rate'=>'0'
		);
		$insert = $this->project_model->insert('order',$data,true);
		if ($insert[0] != false) {
			echo "success";
		}else{
			echo "error";
		}
	}

}
