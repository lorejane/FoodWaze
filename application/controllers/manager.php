<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function __construct(){

	parent::__construct();
	}

	public function index()
	{
		redirect(base_url('login'));
	}

	public function dashboard()
	{
		$this->load->view('manager/inc/header');
		$this->load->view('manager/inc/footer');
		$this->load->view('manager/inc/nav');
		$this->load->view('manager/home');
		$this->load->model('foodwaze_model');
		$data['employees'] = $this->foodwaze_model->get();
		$data['details'] = $this->position_model->getEmployeeDetails();
		$this->load->view('admin/home', $data);
		
	}

	public function account(){
		$this->load->view('manager/inc/header');
		$this->load->view('manager/inc/footer');
		$this->load->view('manager/inc/nav');
		$this->load->model('employee_model');
		$employees = $this->employee_model->get();
		$this->load->view('manager/account', ['employees' => $employees]);
	}

	public function new_employee(){
		$this->load->view('manager/inc/header');
		$this->load->view('manager/inc/footer');
		$this->load->view('manager/inc/nav');		
		$this->load->view('manager/newaccount');
	}

	public function create_employee()
	{
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$password = $this->input->post('password');

		$this->load->model('employee_model');
		$this->employee_model->create($EmployeeAccount, $password);	
	}

	public function edit_employee($EmployeeId)
	{
		$this->load->model('employee_model');
		$this->employee_model->edit($EmployeeId);
	}

	public function delete_employee($EmployeeId)
	{
		$this->load->model('employee_model');
		$this->employee_model->delete($EmployeeId);
	}
	
	
}