<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();				
	}

	public function AddToCart(){		
		$this->input->post('order');
		echo $this->displayCart();		
	}

	public function DisplayCart(){
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

		  </tr>';
		}
		$str .= '<tr><td>Total</td><td>'.$this->cart->total().'</td></tr>';
		return $str.'</tbody>';
	}

	public function RemoveFromCart($rowid){		
		$this->cart->remove($rowid);
		redirect(base_url('Order/'));
	}

	public function EmptyCart(){
		$this->cart->destroy();
		redirect(base_url('Order/'));
	}
	public function Dashboard(){
		//$this->session->unset_userdata('sf');
		$this->load->view('include/header');
		$data['cat1'] = $this->Stall_model->getCustomerMenuMeal();
		//$data['cat2'] = $this->Stall_model->getCustomerMenuPasta();
		//$data['cat3'] = $this->Stall_model->getCustomerMenuDessert();
		//$data['cat4'] = $this->Stall_model->getCustomerMenuDrinks();
		$this->load->view('homepage', $data);
		$this->load->view('include/footer');
	}

    public function Do_upload()
    {
            $config['upload_path']          = './bootstrap/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }
}	