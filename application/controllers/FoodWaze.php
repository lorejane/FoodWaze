<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodWaze extends CI_Controller {
    public function __construct(){

        parent::__construct();
        }
    
        public function index()
        {
            $data['stall'] = $this->foodwaze_model->getStall(); //stall list
            $this->load->view('include/header');
            $this->load->view('homepage', $data); // for stall list
            $this->load->view('include/footer');
        }
        public function clearcart()
        {
            session_destroy(); 
            exit();
        }
        public function showcart()
        {
            $itemcart = $_SESSION['cart'];
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
			// print_r($rs);
			print_r($item);
            // print_r( $_SESSION['cart']);
        }
        public function addtocart()
        {            
            if(isset($_POST['item_id']))
              {
                $_SESSION['cart'][$_POST['item_id']]['id']=$_POST['item_id'];                   
                $_SESSION['cart'][$_POST['item_id']]['qty']=$_SESSION['cart'][$_POST['item_id']]['qty']+1; 
				$_SESSION['cart']['total']=$_SESSION['cart']['total']+1;
                echo count($_SESSION['cart']);
              }
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

        public function getCategory($stallId)
        {
            echo $this->convert($this->foodwaze_model->getCategory($stallId));
        }

        // public function getPrice($stallId)
        // {
        //     echo $this->convert($this->foodwaze_model->getPrice($stallId));
        // }





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