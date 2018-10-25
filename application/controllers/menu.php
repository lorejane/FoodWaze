<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller {
    public function __construct(){

        parent::__construct();
            $this->load->model("foodwaze_model", "foodwaze");
        }
    
        public function index()
        {
            $menucat=$this->foodwaze->readMenu();

            foreach($menucat as $mc)
            {
                $menu = array(

                    'MenuId' => $mc['MenuId'],
                    'Name' => $mc['Name'],
                    'StallId' => $mc['StallId'],
                    'Price' => $mc['Price'],
                    'CategoryId' => $mc['CategoryId'],
                    );
                $menus[]=$menu;
            }



            $this->load->view('include/header');
            $this->load->view('homepage');
            $this->load->view('include/footer');
        }

        
}