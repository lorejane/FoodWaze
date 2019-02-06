<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Cashier extends _BaseController {
	public function __construct(){

	parent::__construct();
	}

	public function Order(){
		$this->load->view('include/header');
		$this->load->view('Cashier/Order');
		$this->load->view('include/footer');
	}

    // public function removeFromCart($id){     
    //     $this->cart->remove($id);
    //     redirect(base_url('Cashier/Order/'));
    // }

    public function Payment(){
        $this->load->view('include/header');
        $this->load->view('Cashier/Payment');
        $this->load->view('include/cash_footer');
    }

    public function Profile(){
        $this->load->view('include/header');
        $data['res'] = $this->CashierModel->getEmployee();
        $this->load->view('Cashier/Profile', $data);
        $this->load->view('include/footer');
    }


	public function AddToCart(){
		$x = $this->input->post('Order');
        $order = array('id' => $x['id'], 'qty' => $x['qty'], 'price' => $x['price'], 'name' => $x['name']);
        $this->cart->insert($order);
    }
    
    public function DeletePendingOrders($id){        
        echo $this->convert($this->PendingOrdersModel->delete($id));
    }

    public function DeleteAllPendingOrders(){        
        echo $this->convert($this->PendingOrdersModel->deleteAll());
    }

    public function Remove($id){
        $this->cart->remove($id);
    }
    
    public function RemoveAll(){
        $this->cart->destroy();
        redirect(base_url('Cashier/Order/'));
    }
    
    // public function RemoveAll(){
    //     $this->cart->destroy();
    // }
    
    public function displayCartOrder(){
    	echo $this->convert($this->cart->contents());
    }
   
    public function getCategory($stallId)
    {
        echo $this->convert($this->foodwaze_model->getCategory($stallId));
    }

    public function GetOrders()
    {
        echo $this->convert($this->CashierModel->getOrder());
    }

    public function GetOrderDetails()
    {
    	// print_r($this->input->post('orderid'));
        echo $this->convert($this->CashierModel->getOrderDetails($this->input->post('orderid')));
    }

    public function GetMenu($menuid)
    {
    	echo $this->convert($this->CashierModel->getMenu($menuid));
    }
}	