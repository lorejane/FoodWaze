<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();				
	}

	public function addToCart($MenuId=null, $Name=null, $qty=null, $Price=null){		
		$data = array('MenuId' => $MenuId, 'qty' => 1, 'Name' => $Name, 'Price' => $Price, );
		$this->cart->insert($data);
		echo $this->displayCart();		
	}

	public function displayCart(){
		$str = '
		<thead>
		  <tr>
		  	<th>ID</th>
		  	<th>NAME</th>
		  	<th>PRICE</th>
		  	<th>QUANTITY</th>
		  	<th>total price</th><th>Action</th></tr>
		</thead>
		<tbody>';
		foreach($this->cart->contents() as $items){
			$str .= '
		  <tr>        
		    <td>'.$items['MenuId'].'</td>
		    <td>'.$items['Name'].'</td>
		    <td>'.$items['Price'].'</td>
		    <td>'.$items['qty'].'</td>
		    <td>'.$items['Price'] * $items['qty'].'</td>

		  </tr>';
		}
		$str .= '<tr><td>Total</td><td>'.$this->cart->total().'</td></tr>';
		return $str.'</tbody>';
	}

	public function removeFromCart($rowid){		
		$this->cart->remove($rowid);
		redirect(base_url('Order/'));
	}

	public function emptyCart(){
		$this->cart->destroy();
		redirect(base_url('Order/'));
	}
	public function dashboard(){
		//$this->session->unset_userdata('sf');
		$this->load->view('include/header');
		$data['cat1'] = $this->Stall_model->getCustomerMenuMeal();
		//$data['cat2'] = $this->Stall_model->getCustomerMenuPasta();
		//$data['cat3'] = $this->Stall_model->getCustomerMenuDessert();
		//$data['cat4'] = $this->Stall_model->getCustomerMenuDrinks();
		$this->load->view('homepage', $data);
		$this->load->view('include/footer');
	}

}	