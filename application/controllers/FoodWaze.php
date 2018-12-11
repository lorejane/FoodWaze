<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodWaze extends CI_Controller {
    public function __construct(){

        parent::__construct();
        }

        public function index()
        {
            $data['stall'] = $this->AdminModel->getStall(); //stall list
            $this->load->view('include/header');
            $this->load->view('homepage', $data); // for stall list
            $this->load->view('include/footer');
        }

        public function dashboard(){
            $this->load->view('include/header');
            $data['cat'] = $this->Stall_model->getCustomerMenuMeal();
            $this->load->view('homepage', $data);
            $this->load->view('include/footer');
        }
        public function getMenu($stallId)
        {
            echo $this->convert($this->foodwaze_model->getMenu($stallId));
        }
    
        public function clearcart()
        {
            session_destroy(); 
            redirect(base_url('foodwaze'), 'refresh');
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
    
        public function deletetocart()
        {                        
            $_SESSION['cart']['total']=$_SESSION['cart']['total']-$_SESSION['cart'][$_POST['item_id']]['qty'];                       unset($_SESSION['cart'][$_POST['item_id']]);            
        }
    
        public function minus1()
        {   
            $_SESSION['cart'][$_POST['item_id']]['qty']=$_SESSION['cart'][$_POST['item_id']]['qty']-1;
            $_SESSION['cart']['total']=$_SESSION['cart']['total']-1;
            if($_SESSION['cart'][$_POST['item_id']]['qty']==0)
            {
                $_SESSION['cart']['total']=$_SESSION['cart']['total']-$_SESSION['cart'][$_POST['item_id']]['qty'];                   unset($_SESSION['cart'][$_POST['item_id']]);  
            }
                                                                       
        }
        public function showcart()
        {           
            if($_SESSION['cart']!=null){
                $itemcart=$_SESSION['cart'];
                $cart = array_column($itemcart, 'id');					
                $rs = $this->foodwaze_model->readitem_f($cart);	
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
        public function getCategory($stallId)
        {
            echo $this->convert($this->foodwaze_model->getCategory($stallId));
        }


        //converts any query to json
        public function convert($param){
            $str = '{';		
            $counter = 0;				
            foreach($param as $data => $record){
                if($counter != 0){
                    $str .= ',';
                }
                if(is_array($record) || is_object($record)){
                    $str .= '"'.$counter.'":{';							
                    $first = true;
                    foreach($record as $column => $value){
                        if(!$first){
                            $str .= ',';
                        }
                        $str .= '"'.$column.'":"'.$value.'"';
                        $first = false;
                    }
                    $str .= '}';				
                }else{
                    $str .= '"'.$data .'":"'.$record.'"';
                }
                $counter++;			
            }
            $str .= '}';
            if($str == '{}')
                return "No data";
            return $str;
        }
        
        
}
