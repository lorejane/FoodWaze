<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Customer extends _BaseController {
	public function __construct(){

	parent::__construct();
	}

        public function Signup()
        {
            $this->load->view('include/header');
            $this->load->view('Customer/Signup'); // for stall list
            $this->load->view('include/footer');
        }

        public function Homepage()
        {
            session_destroy(); 
            $data['stall'] = $this->Foodwaze_model->getStall(); //stall list
            $this->load->view('include/header');
            $this->load->view('Customer/Homepage', $data); // for stall list
            $this->load->view('include/footer');
        }

        public function Profile()
        {
            $this->load->view('include/header');
            $this->load->view('Customer/Profile'); // for stall list
            $this->load->view('include/footer');
        }

        public function Receipt()
        {
            $this->load->view('include/header');
            $this->load->view('Customer/Receipt'); // for stall list
            $this->load->view('include/footer');
        }

        public function Login($submit = null){
	
		if ($submit == null){
			$this->load->view('Login');	
			return true;
		}

		$this->session->set_userdata($this->user->Login($this->input->post('CustomerAccount'), $this->input->post('CustomerAccount'), $this->input->post('password')));		
		
		$CustomerAccount = $this->input->post('CustomerAccount');
		$password = $this->input->post('password');

        $user = $this->user->Login($CustomerAccount, $password);
        if($this->session->has_userdata('isLoggedIn')){
            redirect(base_url('Customer/Homepage'));
        }
        else{
        	$this->session->set_flashdata('login_fail', ' Invalid Account/Password!');
        	redirect('Customer/Login');
    	}
	}

	public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url('Customer/Login'));		
	}


}  