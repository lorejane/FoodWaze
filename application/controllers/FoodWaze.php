<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodWaze extends CI_Controller {
    public function __construct(){

        parent::__construct();
        }
    
        public function index()
        {
            $this->load->view('include/header');
            $data['cat'] = $this->Stall_model->getCustomerMenuMeal();
			$this->load->view('homepage', $data);
            $this->load->view('include/footer');
        }

        public function dashboard(){
		//$this->session->unset_userdata('sf');
		$this->load->view('include/header');
		$data['cat'] = $this->Stall_model->getCustomerMenuMeal();
		$this->load->view('homepage', $data);
		$this->load->view('include/footer');
	}

        
}