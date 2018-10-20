<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){

	parent::__construct();
			$this->load->model('position_model', 'user');
	}

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');
	}

	public function dashboard(){
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('order');
		$this->load->view('include/footer');

	}

	public function Account()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/footer');
		$this->load->view('admin/inc/nav');
		$data['details'] = $this->position_model->getEmployeeDetails();
		$data['detailpos'] = $this->position_model->getPosition();
		$this->load->view('account', $data);

	}

	public function login($submit = null){
		$this->load->view('include/header');
		$this->load->view('include/footer');
		if ($submit == null){
			$this->load->view('login');	
			return true;
		}

		$this->session->set_userdata($this->user->Login($this->input->post('EmployeeAccount'), $this->input->post('EmployeeAccount'), $this->input->post('password')));		
		
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$password = $this->input->post('password');

        $user = $this->user->Login($EmployeeAccount, $password);
        $position = $this->session->userdata('PositionId');
        if($position == 1){
            redirect('admin/dashboard');
        }else if($position == 2){
            redirect('manager/dashboard');
        }else if($position == 3){
            redirect('home/dashboard');
        }else{
        	$this->session->set_flashdata('login_fail', ' Invalid Account/Password!');
        	redirect('home/login');
    	}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('home/login'));		
	}

}
