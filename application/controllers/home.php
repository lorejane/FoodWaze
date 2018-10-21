<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){

	parent::__construct();
			$this->load->model('foodwaze_model', 'user');
			$this->load->model('Order_model', 'ord');
	}

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');
	}

	public function dashboard(){
		//$this->session->unset_userdata('sf');
		$this->load->view('include/header');
		$data['cat1'] = $this->Order_model->getCat1();
		$data['cat2'] = $this->Order_model->getCat2();
		$data['cat3'] = $this->Order_model->getCat3();
		$data['cat4'] = $this->Order_model->getCat4();
		$this->load->view('order', $data);
		$this->load->view('include/footer');
	}

	public function Account()
	{
		$this->load->view('include/header');
		$data['details'] = $this->foodwaze_model->getEmployeeDetails();
		$data['detailpos'] = $this->foodwaze_model->getPosition();
		$this->load->view('account', $data);
		$this->load->view('include/footer');
	}

	public function login($submit = null){
	
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
			$this->session->set_userdata(array('is_admin' => true));
            redirect('admin/dashboard');
        }else if($position == 2){
			$this->session->set_userdata(array('is_manager' => true));
            redirect('manager/dashboard');
        }else if($position == 3){
			$this->session->set_userdata(array('is_cashier' => true));
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
