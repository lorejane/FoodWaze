
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {
	public function __construct(){

	parent::__construct();
	}

	public function Order(){
		$this->load->view('include/header');
		$data['categories'] = $this->foodwaze_model->getCategories();
		$data['cat1'] = $this->Order_model->getMenuMeal();
		$data['cat2'] = $this->Order_model->getMenuPasta();
		$data['cat3'] = $this->Order_model->getMenuDessert();
		$data['cat4'] = $this->Order_model->getMenuDrinks();
		$this->load->view('Cashier/Order', $data);
		$this->load->view('include/footer');
	}

	public function MakeOrder(){
		echo json_encode($this->Order_model->getMenuMeal);
	}
}	