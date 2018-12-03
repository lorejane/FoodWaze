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
       // $data['stall'] = $this->Stall_model->_getStallName();
		//$this->load->view('admin/ManageStalls/StallModal',$data);
        $this->load->view('admin/ManageStalls/Stalls');
		$this->load->view('include/footer');

	}

    public function UploadImage(){
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            if($_FILES['image']['error'] != 4){
                $config['upload_path'] = './pics';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')){//lol imposibleng mag-error 'to
                    $error = array('error' => $this->upload->display_errors());            
                    print_r($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $this->Stall_model->saveImage($this->input->post('StallId'), $data['upload_data']['file_name']);
                    print_r($data);
                }
            }
        }    
    }
    
	public function Accounts()
	{
		$this->load->view('include/header');		
		$this->load->view('admin/ManageAccounts/EmployeeAccounts');
		$this->load->view('include/footer');
	}

	public function Get($id){        
        echo $this->convert($this->AdminModel->_get($id));
    }

    public function GetAll(){
        echo $this->convert($this->Stall_model->_list());
    }
    
    public function GetAllPos(){
        echo $this->convert($this->PositionModel->_list());
    }

    public function GetStall($id){        
        echo $this->convert($this->AdminModel->_getStallName($id));
    }

    public function Save(){        
        $this->AdminModel->save($this->input->post('employee'));
    }

    public function Delete(){        
        $this->AdminModel->delete($this->input->post('employee'));
    }

    public function SaveStall(){        
        $this->Stall_model->save($this->input->post('stall'));
    }

    public function Validate(){
        $employee = $this->input->post('employee');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($employee['EmployeeAccount'])){
            $str .= $this->invalid('EmployeeAccount', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->AdminModel->_exist('EmployeeAccount', $employee['EmployeeAccount']);            
            if(is_object($ifExist)){
                if($ifExist->EmployeeId != $employee['EmployeeId']){
                    $str .= $this->invalid('EmployeeAccount', 'Account already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }    

    public function ValidStall(){
        $stall = $this->input->post('stall');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($stall['Name'])){
            $str .= $this->invalid('Name', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->Stall_model->_exist('Name', $stall['Name']);            
            if(is_object($ifExist)){
                if($ifExist->StallId != $stall['StallId']){
                    $str .= $this->invalid('Name', 'Account already exist');
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
                .'" <img style=\"width:20%;\" src='.base_url('pics/'.$data->Image).' >",'
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
                .'"'.$this->foodwaze_model->getStallName($data->StallId).'",'    
              .'"<a onclick = \"Employee_Modal.edit('.$data->EmployeeId.');\"  class=\"btn btn-info\" >Update</a><a onclick = \"Employee_Modal.remove('.$data->EmployeeId.');\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}