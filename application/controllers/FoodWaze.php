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

        public function getMenu($stallId)
        {
            echo $this->convert($this->foodwaze_model->getMenu($stallId));
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
        // public function order()
        // {
        //     $this->load->view('include/header');
        //     $this->load->view('orderpage');
        //     $this->load->view('include/footer');
        // }

        // public function about()
        // {
        //     $this->load->view('include/header');
        //     $this->load->view('aboutpage');
        //     $this->load->view('include/footer');
        // }
        
}