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
		$this->load->view('include/header');
		$this->load->view('admin/home');
		$this->load->view('include/footer');

	}

	public function account()
	{
		$this->load->view('include/header');		
		$data['employees'] = $this->position_model->get();
		$this->load->view('admin/user_accounts',$data);
		$this->load->view('include/footer');
	}

	public function create_user(){
	    if (isset($_POST['submit'])){
	        $data = array(
	        		'Firstname'=>$_POST['Firstname'],
	                'Lastname'=>$_POST['Lastname'],
	                'EmployeeAccount'=>$_POST['EmployeeAccount'],
	                'PositionId'=>$_POST['PositionId'],
	                'StallId'=>$_POST['StallId'],
	                'Password'=>$_POST['Password']);
	         $this->position_model->insert($data);
	         redirect('admin/account', 'refresh');
	    }
	}

	public function edit_user($EmployeeId)
	{
		$this->position_model->delete($EmployeeId);
	}
	

	public function delete_user($EmployeeId)
	{
        $u = $this->uri->segment(3);
        $this->position_model->delete($u);
        redirect('admin/account', 'refresh');
	}

	public function Stall(){
        $json = '{ "data": [';
        foreach($this->Stall_model->getStall() as $data){
            $json .= '['
                .'"'.$data->StallId.'",'                
                .'"'.$data->Name.'"'
              //.'"<a href=\"'.base_url('admin/view_stall/'.$data->StallId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('admin/delete_stall/'.$data->StallId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }	
}