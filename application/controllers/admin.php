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
		$data['employees'] = $this->position_model->get();
		$data['details'] = $this->foodwaze_model->getEmployeeDetails();		
		$this->load->view('include/header');
		$this->load->view('admin/home', $data);
		$this->load->view('include/footer');

	}

	public function account()
	{
		$this->load->view('include/header');		
		$data['employees'] = $this->position_model->get();
		$this->load->view('admin/newaccount',$data);
		$this->load->view('include/footer');
	}

	public function new_user()
	{
		$this->load->view('include/header');
		$this->load->view('admin/newaccount');
		$this->load->view('include/footer');			
	}

	public function create_user()
	{
		$EmployeeAccount = $this->input->post('EmployeeAccount');
		$password = $this->input->post('password');

		$this->position_model->create($EmployeeAccount, $password);	
	}

	public function edit_user($EmployeeId)
	{
		$this->position_model->delete($EmployeeId);
	}
	

	public function delete_user($EmployeeId)
	{
		$this->position_model->delete($EmployeeId);
	}
	
	
}