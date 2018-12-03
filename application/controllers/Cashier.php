
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {
	public function __construct(){

	parent::__construct();
	}

	public function Order(){
		$this->load->view('include/header');
		$data['categories'] = $this->foodwaze_model->getCategory();
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
	        public function getMenu($stallId)
        {
        echo $this->convert($this->foodwaze_model->getMenu($stallId));
        }
    
        public function clearcart()
        {
            session_destroy(); 
            exit();
        }
        
        public function cart(){
			$itemcart=$_SESSION['cart'];
	   		$cart = array_column($itemcart, 'id');					
			$rs = $this->foodwaze_model->readitem_f($cart);	
			foreach($rs as $r)
			{
				$item[] = array(
					'MenuId' => $r['MenuId'],
					'Name' => $r['Name'],
					'StallId' => $r['StallId'],
					'Price' => $r['Price'],
					'CategoryId' => $r['CategoryId'],
					'Qty'=> $_SESSION['cart'][$r['MenuId']]['qty']
				);
			}
			print_r($rs);
			print_r($item);
		}
        public function addtocart()
        {            
            if(isset($_POST['item_id']))
              {
                if(isset($_POST['item_id']))
                {
                    $_SESSION['cart'][$_POST['item_id']]['id']=$_POST['item_id'];
					$_SESSION['cart'][$_POST['item_id']]['name']=$_POST['item_name'];                    
                    $_SESSION['cart'][$_POST['item_id']]['price']=$_POST['item_price'];                    
                    $_SESSION['cart'][$_POST['item_id']]['qty']=$_SESSION['cart'][$_POST['item_id']]['qty']+1; 
					$_SESSION['cart']['total']=$_SESSION['cart']['total']+1;
                }
                
                echo count($_SESSION['cart']);
              }
        }
    
        public function showcart()
        {           
			$itemcart=$_SESSION['cart'];
	   		$cart = array_column($itemcart, 'id');					
			$rs = $this->foodwaze_model->readitem_f($cart);	
			foreach($rs as $r)
			{
				$item[] = array(
					'MenuId' => $r['MenuId'],
					'Name' => $r['Name'],
					'StallId' => $r['StallId'],
					'Price' => $r['Price'],
					'CategoryId' => $r['CategoryId'],
					'Qty'=> $_SESSION['cart'][$r['MenuId']]['qty']
				);
			}
			echo json_encode($item);			
        }
        public function getCategory($stallId)
        {
            echo $this->convert($this->foodwaze_model->getCategory($stallId));
        }

}	