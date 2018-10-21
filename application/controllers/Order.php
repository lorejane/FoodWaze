<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct(){

	parent::__construct();
	}

		public function addToCart($MenuId, $Name, $qty, $Price){		
		$data = array('MenuId' => $MenuId, 'qty' => $qty, 'Price' => $Price, 'Name' => $Name);
		$this->cart->insert($data);
		echo $this->displayCart();		
	}

	public function displayCart(){
		$str = '
		<thead>
		  <tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>total price</th><th>Action</th></tr>
		</thead>
		<tbody>';
		foreach($this->cart->contents() as $items){
			$str .= '
		  <tr>        
		    <td>'.$items['MenuId'].'</td>
		    <td>'.str_replace('_', ' ', str_replace('_00', ')', str_replace('00_', '(', $items['Name']))).'</td>
		    <td>'.$items['Price'].'</td>
		    <td>'.$items['qty'].'</td>
		    <td>'.$items['Price'] * $items['qty'].'</td>
		    <td>
		      <a href = "'.base_url('removeFromCart/'.$items['rowid']).'">Remove from cart</a>
		    </td>
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


}	