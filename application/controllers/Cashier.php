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
		$data['categories'] = $this->CashierModel->getCategories();
		$data['cat1'] = $this->Order_model->getMenuMeal();
		$data['cat2'] = $this->Order_model->getMenuPasta();
		$data['cat3'] = $this->Order_model->getMenuDessert();
		$data['cat4'] = $this->Order_model->getMenuDrinks();
		$this->load->view('Cashier/Order', $data);
		$this->load->view('include/footer');
	}

	public function AddToCart(){
		$x = $this->input->post('Order');
        $order = array('id' => $x['id'], 'qty' => $x['qty'], 'price' => $x['price'], 'name' => $x['name']);
        $this->cart->insert($order);
    }
    
    public function Remove($id){
        $this->cart->remove($id);
    }
    
    public function RemoveAll(){
        $this->cart->destroy();
    }
    
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