<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class FoodWaze extends _BaseController {
    public function __construct(){
        parent::__construct();
        }

        // public function index()
        // {
        //     // session_destroy(); 
        //     $data['stall'] = $this->Foodwaze_model->getStall();
        //     $this->load->view('include/header');
        //     $this->load->view('Customer/Homepage', $data); // for stall list
        //     $this->load->view('include/footer');
        // }

        public function Homepage()
        {
            //session_destroy(); 
            $data['stall'] = $this->Foodwaze_model->getStall(); //stall list
            $this->load->view('include/header');
            $this->load->view('Customer/Homepage', $data); // for stall list
            $this->load->view('include/footer');
        }


        public function Dashboard(){
            $this->load->view('include/header');
            $data['cat'] = $this->Stall_model->getCustomerMenuMeal();
            $this->load->view('Homepage', $data);
            $this->load->view('include/footer');
        }
        
        public function GetMenu($stallId)
        {
            $_SESSION['stallId']=$stallId;
            echo $this->convert($this->Foodwaze_model->getMenu($stallId));
        }
        
        public function Checkout()
        {
            $order = array(
                    'StallId' => $_SESSION['stallId'],
                    'EmployeeId'=> $_SESSION['EmployeeId'],
                    //'Contact_Number'=> $_POST['ContactNo'],
                );
            $orders[]=$order;
            $last_id = $this->Foodwaze_model->addorder($orders);
            $itemcart=$_SESSION['cart'];
            $cart = array_column($itemcart, 'id');  
            for ($x = 0; $x < count($cart); $x++) {
                $item = array(
                    'OrderId' => $last_id,
                    'MenuId' => $cart[$x],
                    'Quantity'=> $_SESSION['cart'][$cart[$x]]['qty']
                );
                $items[]=$item;
            }
            $this->Foodwaze_model->addorderdetails($items);
            redirect(base_url('Customer/Homepage'), 'refresh');

            
        }

        
        public function Clearcart()
        {
            session_destroy(); 
            redirect(base_url('FoodWaze'), 'refresh');
        }
        public function Clearsession()
        {
            //
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']); 
            }
            else{
                echo 'no cart';
            }
        }

        public function Cart(){
			$itemcart=$_SESSION['cart'];
	   		$cart = array_column($itemcart, 'id');					
			$rs = $this->Foodwaze_model->readitem_f($cart);	
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
        public function Addtocart()
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
    
        public function Deletetocart()
        {                        
            $_SESSION['cart']['total']=$_SESSION['cart']['total']-$_SESSION['cart'][$_POST['item_id']]['qty'];                       
            unset($_SESSION['cart'][$_POST['item_id']]); 

        }
        
        public function Minus1()
        {   
            $_SESSION['cart'][$_POST['item_id']]['qty']=$_SESSION['cart'][$_POST['item_id']]['qty']-1;
            $_SESSION['cart']['total']=$_SESSION['cart']['total']-1;
            if($_SESSION['cart'][$_POST['item_id']]['qty']==0)
            {
                $_SESSION['cart']['total']=$_SESSION['cart']['total']-$_SESSION['cart'][$_POST['item_id']]['qty'];                   unset($_SESSION['cart'][$_POST['item_id']]);  
            }                                                     
        }
        public function Showcart()
        {           
            if($_SESSION['cart']!=null){
                if($_SESSION['cart']['total']==0)
                {
                    unset($_SESSION['cart']['total']); 
                } 
                $itemcart=$_SESSION['cart'];
                if($itemcart==null)
                {
                    $item[] = array(
                        'Id' => 'no cart',
                        'Name' => '1',
                        'StallId' => '1',
                        'Price' => '1',
                        'CategoryId' => '1',
                        'Qty'=> '1'
                    );
                    echo json_encode($item);
                }
                else{
                    $cart = array_column($itemcart, 'id');					
                    $rs = $this->Foodwaze_model->readitem_f($cart);	
                    foreach($rs as $r)
                    {
                        $item[] = array(
                            'Id' => $r['MenuId'],
                            'Name' => $r['Name'],
                            'StallId' => $r['StallId'],
                            'Price' => $r['Price'],
                            'CategoryId' => $r['CategoryId'],
                            'Qty'=> $_SESSION['cart'][$r['MenuId']]['qty']
                        );
                    }
                    echo json_encode($item);	
                }
            }
                
        }
        public function GetCategory($stallId)
        {
            echo $this->convert($this->Foodwaze_model->getCategory($stallId));
        }
     
}
