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
		$this->load->view('include/header');
		$data['employees'] = $this->position_model->get();
		$data['details'] = $this->foodwaze_model->getEmployeeDetails();
		$this->load->view('manager/home', $data);
		$this->load->view('include/footer');
		
	}

	public function Account()
	{
		$this->load->view('include/header');
		$data['employees'] = $this->foodwaze_model->getEmployee();
		$this->load->view('manager/account', $data);
		$this->load->view('include/footer');
		
	}

	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->foodwaze_model->getEmployee() as $data){
            $json .= '['
                .'"'.$data->EmployeeAccount.'",'
                .'"'.$data->EmployeeId.'",'
                .'"'.$data->PositionId.'",'
                .'"<a href=\"'.base_url('manager/edit_employee/'.$data->EmployeeId).'\">Update</a><button onclick = \"delete('.$data->EmployeeId.')\" class=\"btn btn-danger\">Delete</button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

	public function removeExcessComma($str){
		if($str != '{ "data": ['){
            $str = substr($str, 0, strlen($str) - 1);
		}
		return $str;
	}

	public function new_employee(){
		$this->load->view('include/header');
		
		$this->load->view('manager/newaccount');
		$this->load->view('include/footer');
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
	
	//new 10/20/18
	public function menu(){

		$this->load->view('include/header');
		$this->load->model('employee_model');
		$data['category']=$this->employee_model->category();
		$this->load->view('manager/menu', $data);
		$this->load->view('include/footer');
	}
	
}