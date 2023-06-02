<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientPos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_log_in();
		date_default_timezone_set('Asia/Manila');
	}

	public function index(){
		$where = array('emp_id'=>$this->session->userdata('current_id'));
		$data['employee'] = $this->project_model->single_select('employee',$where);
		echo $this->session->userdata('discount_type');
		$data['title'] = "Cashier";

		$this->load->view('header',$data);
		$this->load->view('content/nav');
		$this->load->view('content/pos_main');
		$this->load->view('footer');
	}

	public function newPos(){
		$where = array('emp_id'=>$this->session->userdata('current_id'));
		$data['employee'] = $this->project_model->single_select('employee',$where);
		echo $this->session->userdata('discount_type');
		$data['title'] = "Cashier";

		$this->load->view('newHeader',$data);
		$this->load->view('content/cashierv2');
		$this->load->view('footer');
	}

	function fetchItems(){
		$result2 = array('data' => array());

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
								foreach ($data as $key => $result) {
									$result2['data'][$key] = array(
										$link,
										//$result->stockCat_name,
										$result->stock_name,
										$result->retail_price
									);
								}
							}
						}else{
							if ($data != false) {
								foreach ($data as $key => $result) {
									// $where = array('stock_id'=>$result->stock_id,"delivery_stat"=>"received");
									// $tcurrent = 0;
									// $new = $this->project_model->select('stock_newlog',false,$where);
									// if ($new != false) {
									// 	foreach ($new as $value) {
									// 		$tcurrent = $tcurrent + $value->nstock_qqty;
									// 	}
									// }
									//
									// $where3 = array('stock_id'=>$result->stock_id);
									// $branch = $this->project_model->select('branch_stocks',false,$where3);
									// $tbranch = 0;
									// if ($branch != false) {
									// 	foreach ($branch as $value3) {
									// 		$tbranch = $tbranch + $value3->bstocks_qty;
									// 	}
									// }
									//
									// $where2 = array('stock_id'=>$result->stock_id);
									// $sold = $this->project_model->select('ordered_item',false,$where2);
									// $tsold = 0;
									// $tout = 0;
									// if ($sold != false) {
									// 	foreach ($sold as $value2) {
									// 		$tsold = $tsold + $value2->order_qty;
									// 	}
									// }
									//
									// $tout = $tsold + $tbranch;
									// $total = $tcurrent - $tout;
									//
									//
									// if ($total > 0 && $result->stock_type == "instock") {
									// 	$link = '<a javascript:; class="btn btn-default addToCart" data="'.$result->stock_id.'"> <i class="fa fa-hand-plus"></i> Add </a>';
									//
									// }elseif ($result->stock_type == "nonstock") {
									//
									// 	$link = '<a javascript:; class="btn btn-default addToCart" data="'.$result->stock_id.'"> <i class="fa fa-hand-plus"></i> Add</a>';
									//
									// }else{
									// 	$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-ban"></i> Add</a>';
									// }

									//echo $result->stock_name.' '.$total.' '.$link.'<br />';
									$link = '<a javascript:; class="btn btn-default addToCart" data="'.$result->stock_id.'"> <i class="fa fa-hand-plus"></i> Add</a>';
									$result2['data'][$key] = array(
										$link,
										//$result->stockCat_name,
										$result->stock_name,
										$result->retail_price
									);
								}
							}

						}
					}

				}
			}else{
				if ($data !== false) {
					$link = '<a javascript:; class="btn btn-danger disabled"> <i class="fa fa-hand-plus"></i> Add </a>';
					foreach ($data as $key => $result) {
						$result2['data'][$key] = array(
							$link,
							$result->stock_name,
							$result->retail_price
						);
					}
				}
			}
		}
		echo json_encode($result2);
	}

	function fetchOrderCart(){
		$result = array('data' => array());

		$where = array('order_status'=>'not_paid','order_type'=>'purchase','emp_id'=>$this->session->userdata('current_id'));
		$data = $this->project_model->select('order',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-cart" data="'.$value->order_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->order_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->order_code,
					$value->order_type,
					// $value->payment_type,
					$value->cust_name,
					$link
				);
			}
		}

		echo json_encode($result);
	}

	function fetchUnpaidCart(){
		$result = array('data' => array());

		$where = array('order_status'=>'not_paid','order_type'=>'receivable','emp_id'=>$this->session->userdata('current_id'));
		$data = $this->project_model->select('order',false,$where);

		if ($data != false) {
			foreach ($data as $key => $value) {
				$link = '<a href="javascript:;" class="btn btn-primary select-unpaid" data="'.$value->order_id.'" title="Select"><i class="fa fa-hand-pointer-o"></i></a>
				<a href="javascript:;" class="btn btn-danger delCart" data="'.$value->order_id.'" title="Cancel"> <i class="fa fa-times"></i></a>';
				$result['data'][$key] = array(
					$value->order_code,
					$value->order_type,
					// $value->payment_type,
					$value->cust_name,
					$link
				);
			}
		}

		echo json_encode($result);
	}

	function getItem(){
		$id = $this->input->get('id');
		/*$where = array("stockitem.stock_id"=>$id);
		$join = array(
			array("stockcategory","stockitem","stockCat_id")
		);
		$result = $this->project_model->single_select("stockitem",$where,$join);
		$dataarr = array();
		$dataarr[] = array(

		);*/

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


		$sold = $this->project_model->select('ordered_item',false,$where);
		$tsold = 0;
		$tout = 0;
		$total = 0;
		if ($sold != false) {
			foreach ($sold as $value2) {
				$tsold = $tsold + $value2->order_qty;
			}
		}

		$tout = $tsold + $tbranch;

		if ($item->stock_type == "instock") {
			$total = $tcurrent - $tout;
		}


		$result['category'] = $item->stockCat_name;
		$result['id'] = $item->stock_id;
		$result['item'] = $item->stock_name;
		$result['type'] = $item->stock_type;
		$result['rp'] = $item->retail_price;
		$result['current'] = $total;

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
		$this->form_validation->set_rules('order_type','Order Type','required');
		$this->form_validation->set_rules('cust_name1','Customer Name','required');
		//$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('downpayment','Downpayment','required');
		// $this->form_validation->set_rules('tax','Tax','required');
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

			$setdate = $this->session->userdata('setdate');
			$initcode = substr($this->session->userdata('setdate'),5,5);
			$occode = str_replace("-","",$initcode);

			if (set_value('order_type') == "order") {
				$data = array(
					'cust_name'=>strtoupper(set_value('cust_name1')),
					'order_code'=>'OC'.$occode.'-'.$couter,
					'order_date'=>$setdate." ".date('h:i A'),
					'emp_id'=>$this->session->userdata('current_id'),
					'order_type'=>set_value('order_type'),
					'order_downpayment'=>set_value('downpayment'),
					'or_num'=>'',
					//'tax_rate'=>set_value('tax'),
					'pickup_date'=>set_value('date'),
					'pickup_time'=>set_value('time')
				);
			}else{
				// order type payment validation

				// end
				$data = array(
					'cust_name'=>strtoupper(set_value('cust_name1')),
					'order_code'=>'OC'.$occode.'-'.$couter,
					'order_date'=>$setdate." ".date('h:i A'),
					'emp_id'=>$this->session->userdata('current_id'),
					'order_type'=>set_value('order_type'),
					'order_downpayment'=>set_value('downpayment'),
					'or_num'=>''
				);
			}

			$insert = $this->project_model->insert('order',$data,true);
			if ($insert[0]) {
				$cartData = array(
					'posCart'=>$insert[1]);
				$this->session->set_userdata($cartData);
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Unable to create cart.';
			}
		}
		echo json_encode($msg);
	}

	function regPosCart(){
		$id = $this->input->get('id');
		//$this->session->set_userdata('posCart',$id);
		$where = array(
			'order_id'=>$id
		);
		$discount = "";
		$cart = $this->project_model->select('order',false,$where);
		if ($cart != false) {
			foreach ($cart as $cartval) {
				$discount = $cartval->discount_type;
			}
		}
		$cartData = array(
			'posCart'=>$id,
			'cartdiscount'=>$discount
		);
		$this->session->set_userdata($cartData);
		if ($this->session->userdata('posCart') !='') {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = "Unable to register POS Cart";
		}
		echo json_encode($msg);
	}

	function closeCart(){
		$cartData = array(
			'posCart',
			'cartdiscount'
		);
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
			$where = array(
				'order_id'=>$this->session->userdata('posCart')
			);
			$cart = $this->project_model->select('order',false,$where);
			if ($cart != false) {
				foreach ($cart as $cartval) {
					$order = $cartval->order_type;
				}
			}
			$msg['success'] = true;
			$msg['data'] = $order;
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
			$item = $this->project_model->single_select("stockitem",$where);
			if($item != false){
						$setdate = $this->session->userdata('setdate');
		        $data = array(
						  "order_id"=>$cartid,
						  "order_name"=>$item->stock_name,
						  "order_price"=>$item->retail_price,
						  "order_qty"=>set_value('qty'),
						  "order_date"=>$setdate,
						  "order_stock_type"=>$item->stock_type,
						  "stock_id"=>$item->stock_id,
						  "order_unit"=>$item->stock_unit
		        );
		        /*$newstock = $item->stock_qqty - set_value('qty');
						$newDispose = $item->stockDispose + set_value('qty');
		        $updateMData = array(
						"stock_qqty"=>$newstock,
						"stockDispose"=>$newDispose
			        );*/

		        $wherecheck = array(
					  'order_id'=>$cartid,
					  'stock_id'=>$item->stock_id,
					  'order_name'=>$item->stock_name
		        );
	        	// instock
				if ($item->stock_type == "instock") {
					$where = array('stock_id'=>$item->stock_id,"delivery_stat"=>"received","nstock_status"=>"GOOD");
					$tcurrent = 0;
					$new = $this->project_model->select('stock_newlog',false,$where);
					if ($new != false) {
						foreach ($new as $value) {
							$tcurrent = $tcurrent + $value->nstock_qqty;
						}
					}

					$where3 = array('stock_id'=>$item->stock_id);
					$branch = $this->project_model->select('branch_stocks',false,$where3);
					$tbranch = 0;
					if ($branch != false) {
						foreach ($branch as $value3) {
							$tbranch = $tbranch + $value3->bstocks_qty;
						}
					}

					$where2 = array('stock_id'=>$item->stock_id);
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

					if ($total >= set_value('qty')) {
						$check = $this->project_model->single_select('ordered_item',$wherecheck);
						if ($check != false) {
							$newqty = set_value('qty')+$check->order_qty;
							$updateOData = array(
								'order_qty'=>$newqty
							);
							$where = array('order_item_id'=>$check->order_item_id);
							$updateitem = $this->project_model->updateNew('ordered_item',$where,$updateOData);
							if ($updateitem != false) {
								/*$where = array("stock_id"=>$item->stock_id);
								$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
								if ($update != false) {
									$msg['success'] =  true;
								}else{
									$msg['success'] = false;
									$msg['error'] = 'Error in updating menu_item.';
								}*/
								$msg['success'] =  true;
							}else{
								$msg['success'] = false;
								$msg['error'] = "Error update";
							}
						}else {
							$insert = $this->project_model->insert('ordered_item',$data);
							if ($insert != false) {
									/*$where = array("stock_id"=>$item->stock_id);
									$update = $this->project_model->updateNew("stockitem",$where,$updateMData);
									if ($update != false) {
										$msg['success'] =  true;
									}else{
										$msg['success'] = false;
										$msg['error'] = 'Error in updating stock item.';
									}*/
								$msg['success'] =  true;
							}else{
								$msg['success'] = false;
								$msg['error'] = "error insert";
							}
						}
					}else{
						$msg['success'] = false;
						$msg['error'] = "Not enought stocks!";
					}

				}else{
			        // not instock
			        $check = $this->project_model->single_select('ordered_item',$wherecheck);
			        if ($check != false) {
			          $newqty = set_value('qty')+$check->order_qty;
			          $updateOData = array(
			            'order_qty'=>$newqty
			          );
			          $where = array('order_item_id'=>$check->order_item_id);
			          $updateitem = $this->project_model->updateNew('ordered_item',$where,$updateOData);
			          if ($updateitem != false) {
			              $msg['success'] =  true;
			          }else{
			            $msg['success'] = false;
			            $msg['error'] = "Error update";
			          }
			        }else {
			          $insert = $this->project_model->insert('ordered_item',$data);
			          if ($insert != false) {
			              $msg['success'] =  true;
			          }else{
			            $msg['success'] = false;
			            $msg['error'] = "error insert";
			          }
			        }
			    }//else not instock
			}else{
				$msg['success'] = false;
				$msg['error'] = "Stock item not found.";
			}
		}
		echo json_encode($msg);
	}

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
								"stock_qqty"=>$item->stock_qqty + $ordereditem->order_qty,
								"stockDispose"=>$item->stockDispose - $ordereditem->order_qty,
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
			$this->session->set_userdata('counter',count($getitem));
			foreach ($getitem as $value) {
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
								'stock_id'=>$ordereditem->stock_id
							);
							$item = $this->project_model->select('stockitem',false,$item_where);
							if ($item != false) {
								foreach ($item as $item) {
									$stock_data = array(
										"stock_qqty"=>$item->stock_qqty + $ordereditem->order_qty,
										'stockDispose'=>$item->stockDispose-$ordereditem->order_qty
									);
									$return_stock = $this->project_model->updateNew('stockitem',$item_where,$stock_data);
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

			if ($i == $this->session->userdata('counter')) {
				$del_where = array('order_id'=>$id);
				$delete = $this->project_model->deleteNew('order',$del_where);
				if ($delete !== false) {
					if ($id == $this->session->userdata('posCart')) {
						if ($this->clearCartSession() === true) {
							$msg['success'] = true;
							$this->session->unset_userdata('counter');
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
		$cartData = array(
			'posCart'=>'',
			'cartdiscount'=>''
		);
		$this->session->unset_userdata($cartData);
		if ($this->session->userdata('posCart') == FALSE) {
			return true;
		}else{
			return false;
		}
	}

	function lastOR(){
		$table = 'order';
		$column = 'order_id';
		$limit = 1;
		$return = 'or_num';
		$order = array('order'.'.'.$column,'DESC');
		$prim = 1;
		$where = array("or_num !="=>'');
		$last_id = $this->project_model->select($table,$like=false,$where,$order,$group=false,$where_or=false,$limit);
		if ($last_id != false) {
			foreach ($last_id as $value) {
				if ($value->or_num != 'none') {
					$currentnum = $value->$return+1;
					$data['num'] = str_pad($currentnum, 3, '0', STR_PAD_LEFT);
				}else{
					$data['num'] = str_pad($prim, 3, '0', STR_PAD_LEFT);
				}
			}
		}else{
			$data['num'] = false;
		}
		echo json_encode($data);
	}

	function order_payment(){
		$this->form_validation->set_rules('cust_name','Customer Name','required');
		$this->form_validation->set_rules('cash','Cash Amount','required');
		$this->form_validation->set_rules('discount','Discount','');
		$this->form_validation->set_rules('ornum','OR Number','required');
		$this->form_validation->set_rules('num_spwd','SPWD','');
		$this->form_validation->set_rules('num_cust','Number of Customers','');
		$this->form_validation->set_rules('account_num','Account Number','');
		$this->form_validation->set_rules('payment_type','Payment Type','required');
		$this->form_validation->set_rules('discount_type','Discount Type','required');

		if ($this->input->post('discount_type') == "spwd") {
			//$this->form_validation->set_rules('spwdid','SPWD ID','required');
			$this->form_validation->set_rules('spwdDetails','SPWD Details','required');
		}else if ($this->input->post('discount_type') == "regular") {
			$this->form_validation->set_rules('tin','TIN','required');
		}else{
			$this->form_validation->set_rules('spwdid','SPWD ID','');
			$this->form_validation->set_rules('tin','TIN','');
		}

		if ($this->form_validation->run() == FALSE) {
			$data['success'] = false;
			$data['error'] = validation_errors();
		}else{
			$where = array('order_id'=>$this->session->userdata('posCart'));
			$order = $this->project_model->select('order',false,$where);

			$discount_selectort = "";
			$spwdid = "";
			if (set_value('discount_type') == "spwd") {
				$spwdid = set_value('spwid');
			}else{
				$spwdid = "none";
			}

			foreach ($order as $value) {
				$downpayment = $value->order_downpayment;
				$gcashfee = $value->gcashfee;

				$orderitem_where = array('order_id'=>$this->session->userdata('posCart'));
				$orderitem = $this->project_model->select('ordered_item',false,$orderitem_where);
				if ($orderitem != false) {

					$amount=0;
					foreach ($orderitem as $item) {
						$subtotal = $item->order_price*$item->order_qty;
						$amount = $amount+$subtotal;
					}

					$total = $amount - $downpayment;
					$total = $amount + $gcashfee;
					//$tax = set_value('tax') / 100;
					//$tax_amount = $amount * $tax;
					if (set_value('discount_type') == "regular") {
						$discount = set_value('discount');
					}elseif (set_value('discount_type') == "spwd") {
						$rate = 0.20;
						$rateper = $amount / set_value('num_cust');
						$tspwd = $rateper * set_value('num_spwd');
						$discount = $tspwd * $rate;
					}else{
						$discount = 0;
					}
					$total = $total - $discount;

					if ($value->order_type == "purchase") {
						$payment_type = 'cash';
					}else{
						$payment_type = set_value('payment_type');
					}

					$payment_data = array(
						'cust_name'=>strtoupper(set_value('cust_name')),
						'order_bill_amount'=>$amount,
						'order_cash_amount'=>set_value('cash'),
						'order_status'=>'paid',
						'order_discount'=>$discount,
						'or_num'=>set_value('ornum'),
						//'spwd_id'=>set_value('spwdid'),
						'cust_tin'=>set_value('tin'),
						'discount_type'=>set_value('discount_type'),
						'payment_type'=>$payment_type,
						'account_num'=>set_value('account_num'),
						'num_cust'=>set_value('num_cust'),
						'num_spwd'=>set_value('num_spwd'),
						'spwd_info'=>set_value('spwdDetails')
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
			$data['gcashfee'] = 0;
			$data['stat'] = "";


			$subtotal = '0.00';
			$amount = '0.00';
			$tax_rate = $value->tax_rate / 100;
			$total = '0.00';
			$taxes = '0.00';
			$downpayment = $value->order_downpayment;
			$change = '0.00';
			$gcashfee = '0.00';
			$stat="";
			if ($items != false) {
				foreach ($items as $value2) {
					$subtotal = $value2->order_qty * $value2->order_price;
					$amount = $amount + $subtotal;
				}
				// $taxes = $amount * $tax_rate;
				// $amount = $amount + $taxes;
				if ($value->order_type == "receivable") {
					$gcashfee = $amount * 0.03;
					$total = ($amount + $gcashfee) - $downpayment - $value->order_discount;

					$data = array(
						'gcashfee'=>$gcashfee
					);
					$payment = $this->project_model->update('order','order_id',$data,$this->session->userdata('posCart'));
					if ($payment != false) {
						$stat = 'update pass';
					}else{
						$stat  = 'update fail';
					}
				}else{
					$total = $amount - $downpayment - $value->order_discount;
					$stat  = 'idle';
				}

				if ($value->order_cash_amount == 0) {
					$change;
				}else{
					$change = $value->order_cash_amount - $total;
				}
			}
			$data['name'] = $value->cust_name;
			$data['customer'] = $value->cust_name.'('.$value->order_code.')';
			$data['change'] = $this->cart->format_number($change);
			$data['amount'] = $this->cart->format_number($amount);
			$data['cash'] = $value->order_cash_amount;
			$data['total'] = $this->cart->format_number($total);
			$data['downpayment'] = $this->cart->format_number($downpayment);
			$data['gcashfee'] = $this->cart->format_number($gcashfee);
			$data['stat'] = $stat;
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
			$sess = array(
				"ispos_log"=>'',
				"current_id"=>'',
				"posCart"=>'',
				"cartdiscount"=>'',
				"setdate"=>''
			);
			$this->session->unset_userdata($sess);
			$this->session->sess_destroy();
			redirect('main');
		}
	}
/*========= Printable =========*/
	function posBill(){
			$data['title'] = "Casher";
			$data['page'] = 'Serving Slip';

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

	function processClosing(){
		$this->form_validation->set_rules('closingCash','Closing Cash','required');

		if ($this->form_validation->run() == FALSE) {
			$msg['success'] = false;
			$msg['error'] = validation_errors();
		}else{
			//$date = date('Y-m-d');
			$emp = $this->session->userdata('current_id');
			$where = array('logid'=>$this->session->userdata('cashierLog'));
			$check = $this->project_model->single_select('cashier_logbook',$where);
			if ($check != false) {
				$deposit = set_value("closingCash") - $check->opening_cash;
				$data = array(
					"logout_time"=>date("h:i A"),
					"closing_cash"=>set_value("closingCash"),
					"deposit"=>$deposit,
					"log_status"=>"close"
				);
				$close = $this->project_model->updateNew('cashier_logbook',$where,$data);
				if ($close != false) {
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = "Unable to close cashier!";
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = "Log-in not found!";
			}
		}
		echo json_encode($msg);
	}
	function closingPage(){
		$data['title'] = "Closing Page";
		$this->load->view('production/header',$data);

		$where = array();
		$get = $this->project_model->select();

		$this->load->view('content/closingPage',$data);
		$this->load->view('production/footer');
	}
	function checkClosing(){
		//$date = date('Y-m-d');
		$emp = $this->session->userdata('current_id');
		$where = array('logid'=>$this->session->userdata('cashierLog'));
		$check = $this->project_model->single_select('cashier_logbook',$where);
		if ($check != false) {
			if ($check->deposit == "0.00" && $check->log_status == "open") {
				$msg['success'] = true;
			}else{
				$msg['success'] = false;
			}
		}else{
			$msg['success'] = false;
			$msg['error'] = "Can't find log-in history.";
		}
		echo json_encode($msg);
	}
	function closingLogOut(){
		if ($this->session->userdata('ispos_log') == true) {
			$sess = array(
				"ispos_log"=>'',
				"current_id"=>'',
				"posCart"=>'',
				"cartdiscount"=>""
			);
			$this->session->unset_userdata($sess);
			$this->session->sess_destroy();
		}

		if ($this->session->userdata('ispos_log') == false || $this->session->userdata('ispos_log') =="") {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
			$msg['error'] = "Unable to logout";
		}

		echo json_encode($msg);
	}
	function printClosingReceipt(){
			$data['title'] = "Cashier";
			$data['page'] = 'Closing Cash Receipt';

			//defind where here
			$date = date('Y-m-d');
			$emp = $this->session->userdata('current_id');
			$where = array('logid'=>$this->session->userdata('cashierLog'));
			$join = array(
				array('employee','cashier_logbook','emp_id')
			);
			$data['log']= $this->project_model->select_join('cashier_logbook',$join,false,$where);
			$data['property']= $this->project_model->select('property_info');

			$where3 = array('emp_id'=>$emp);
			$data['employee'] = $this->project_model->select('employee',false,$where3);

			$this->load->view('header',$data);
			$this->load->view('content/closingReceipt',$data);
			$this->load->view('footer');
	}

	function voidOrder(){
		$this->form_validation->set_rules('code','Order Code','required');
		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['success'] = false;
		}else{
			$where = array("order_code"=>set_value("code"));
			$check = $this->project_model->single_select('order',$where);
			if ($check != false) {
				$data = array(
					'order_bill_amount'=>'0.00',
					'order_cash_amount'=>'0.00',
					'order_status'=>'not_paid'
				);
				$where = array('order_id'=>$check->order_id);
				$void = $this->project_model->updateNew('order',$where,$data);
				if ($void != false) {
					$this->session->set_userdata('posCart',$check->order_id);
					$msg['success'] = true;
				}else{
					$msg['success'] = false;
					$msg['error'] = 'Unable to void order.';
				}
			}else{
				$msg['success'] = false;
				$msg['error'] = 'Unable to find order';
			}
		}
		echo json_encode($msg);
	}

/*========= test =======*/
	function loaditemqty(){

	}

	function test(){
			// $initcode = substr($this->session->userdata('setdate'),5,5);
			// echo $occode = str_replace("-","",$initcode);

			//echo $this->fetchUnpaidCart();
			echo (2*3*4+1+5)/2;
	}
}
