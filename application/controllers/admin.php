<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Admin extends _BaseController {

	public function __construct(){

	parent::__construct();
	}

	public function index()
	{
		redirect(base_url('login'));
	}

	public function Stalls()
	{	
		$this->load->view('include/header');
		$this->load->view('admin/home');
		$this->load->view('include/footer');

	}

	public function Accounts()
	{
		$this->load->view('include/header');		
		$this->load->view('admin/user_accounts');
		$this->load->view('include/footer');
	}

	public function Get($id){        
        echo $this->convert($this->AdminModel->_get($id));
    }

    public function GetStall($id){        
        echo $this->convert($this->AdminModel->_getStallName($id));
    }

    public function Save(){        
        $this->AdminModel->save($this->input->post('employee'));
    }

    public function SaveStall(){        
        $this->Stall_model->save($this->input->post('stall'));
    }

    public function Validate(){
        $Employee = $this->input->post('employee');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($employee['Firstname'])){
            $str .= $this->invalid('Firstname', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->author->_exist('Firstname', $employee['Firstname']);            
            if(is_object($ifExist)){
                if($ifExist->EmployeeId != $employee['EmployeeId']){
                    $str .= $this->invalid('Firstname', 'Author already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }    


    
	public function delete_user($EmployeeId)
	{
        $u = $this->uri->segment(3);
        $this->position_model->delete($u);
        redirect('admin/account', 'refresh');
	}

	public function GenerateTableStall(){
		// print_r($this->Stall_model->getStall());
        $json = '{ "data": [';
        foreach($this->AdminModel->getStall() as $data){
            $json .= '['
                .'"'.$data->StallId.'",'                
                .'"'.$data->Name.'",'
            	.'"<a onclick = \"Stall_Modal.edit('.$data->StallId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->StallId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }	

    public function GenerateTableEmployeeAdmin(){
        $json = '{ "data": [';
        foreach($this->AdminModel->getEmployee() as $data){
            $json .= '['
                .'"'.$data->EmployeeId.'",'
                .'"'.$data->EmployeeAccount.'",'
                .'"'.$data->Lastname.', '.$data->Firstname.'",'
                .'"'.$this->foodwaze_model->getPositionName($data->PositionId).'",'
                .'"'.$data->StallId.'",'                
              .'"<a onclick = \"Employee_Modal.edit('.$data->EmployeeId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->EmployeeId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}