<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){

	parent::__construct();
			$this->load->model('LoginModel', 'user');
	}

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('Login');
		$this->load->view('include/footer');
	}

	public function Login($submit = null){
	
		if ($submit == null){
			$this->load->view('Login');	
			return true;
		}

		$this->session->set_userdata($this->user->Login($this->input->post('EmployeeAccount'), $this->input->post('EmployeeAccount'), $this->input->post('password')));		
		
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$password = $this->input->post('password');

        $user = $this->user->Login($EmployeeAccount, $password);
        $position = $this->session->userdata('PositionId');
       	if($position == 1){
			$this->session->set_userdata(array('is_admin' => true));
            redirect('Admin/Dashboard');
        }else if($position == 2){
			$this->session->set_userdata(array('is_manager' => true));
            redirect('Manager/Dashboard');
        }else if($position == 3){
			$this->session->set_userdata(array('is_cashier' => true));
            redirect('Cashier/Order');
        }else if($position == 4){
			$this->session->set_userdata(array('is_customer' => true));
            redirect('FoodWaze/Homepage');
        }
        else{
        	$this->session->set_flashdata('login_fail', ' Invalid Account/Password!');
        	redirect('Home/Login');
    	}
	}

	public function Signup($submit = null){
	
		if ($submit == null){
			$this->load->view('Login');	
			return true;
		}

		$this->session->set_userdata($this->user->Signup($this->input->post('EmployeeAccount'), $this->input->post('Firstname'), $this->input->post('Lastname'), $this->input->post('ContactNumber'),$this->input->post('Password')));		
		
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$Firstname = $this->input->post('Firstname');
		$Lastname = $this->input->post('Lastname');
		$ContactNumber = $this->input->post('ContactNumber');
		$Password = $this->input->post('Password');
        $employee = $this->user->Signup($PositionId, $EmployeeAccount,$Firstname, $Lastname, $ContactNumber, $Password);

        $position = $this->session->userdata('PositionId');
		if($submit != null){
			$this->session->set_userdata(array('is_customer' => true));
            redirect('FoodWaze/Homepage');
        }
        else{
        	$this->session->set_flashdata('login_fail', ' Invalid Account/Password!');
        	redirect('Customer/Signup');
    	}	
    }

	public function UpdateProfile($submit = null){
		$this->session->set_userdata($this->user->UpdateProfile($this->input->post('EmployeeAccount'), $this->input->post('Firstname'), $this->input->post('Lastname'),$this->input->post('ContactNumber'), $this->input->post('Password')));		
		
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$Firstname = $this->input->post('Firstname');
		$Lastname = $this->input->post('Lastname');
		$ContactNumber = $this->input->post('ContactNumber');
		$Password = $this->input->post('Password');
        $user = $this->user->UpdateProfile($EmployeeAccount,$Firstname, $Lastname, $ContactNumber, $Password);
        //$position = $this->session->userdata('PositionId');
       		if($submit == null){
			//$this->session->set_userdata(array('is_customer' => true));
            redirect('Customer/Profile');
        }
       } 

	public function Logout(){
		session_destroy(); 
		//$this->session->set_userdata(array('EmployeeAccount' => '', 'is_logged_in' => ''));
		redirect(base_url('Home/Login'));		
	}

}
