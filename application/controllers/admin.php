<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){

	parent::__construct();
	}

	public function index()
	{
		redirect(base_url('login'));
	}

	public function dashboard()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/footer');
		$this->load->view('admin/inc/nav');
		$this->load->model('foodwaze_model');
		$data['employees'] = $this->foodwaze_model->get();
		$data['details'] = $this->position_model->getEmployeeDetails();
		$this->load->view('admin/home', $data);

	}

	public function account()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/footer');
		$this->load->view('admin/inc/nav');
		$this->load->model('foodwaze_model');
		$employees = $this->foodwaze_model->get();
		$this->load->view('admin/newaccount', ['employees' => $employees]);
	}

	public function new_user()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/footer');
		$this->load->view('admin/inc/nav');		
		$this->load->view('admin/newaccount');
	}

	public function create_user()
	{
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$password = $this->input->post('password');

		$this->load->model('foodwaze_model');
		$this->foodwaze_model->create($EmployeeAccount, $password);	
	}

	public function edit_user($EmployeeId)
	{
		$this->load->model('foodwaze_model');
		$this->foodwaze_model->delete($EmployeeId);
	}
	

	public function delete_user($EmployeeId)
	{
		$this->load->model('foodwaze_model');
		$this->foodwaze_model->delete($EmployeeId);
	}
	
	
}