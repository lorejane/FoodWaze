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
		redirect(base_url('Login'));
	}

    public function Dashboard()
    {   
        $this->load->view('include/header');
        $data['totalstalls'] = $this->AdminModel->Stalls();
        $data['totalmanagers'] = $this->AdminModel->Managers();
        $data['totalcashiers'] = $this->AdminModel->Cashiers();
        $this->load->view('Admin/Dashboard', $data);
        $this->load->view('include/footer');

    }

    public function Categories()
    {   
        $this->load->view('include/header');
        $this->load->view('Admin/ManageCategories/Categories');
        $this->load->view('include/footer');

    }

	public function Stalls()
	{	
		$this->load->view('include/header');
        $this->load->view('Admin/ManageStalls/Stalls');
		$this->load->view('include/footer');

	}

    public function Profile()
    {   
        $this->load->view('include/header');
        $data['profile'] = $this->AdminModel->getEmployeeDetails();
        $this->load->view('Admin/Profile', $data);
        $this->load->view('include/footer');

    }

    public function Accounts()
    {
        $this->load->view('include/header');        
        $this->load->view('Admin/ManageAccounts/EmployeeAccounts');
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

    public function GetEmpImage($id){        
        echo $this->convert($this->AdminModel->_getEmployeeImage($id));
    }

    
    public function GetCategory($id){        
        echo $this->convert($this->AdminModel->_getCategories($id));
    }

    public function Save(){        
        $this->AdminModel->save($this->input->post('employee'));
    }
    
    public function SaveCategory(){        
        $this->CategoriesModel->save($this->input->post('category'));
    } 

    public function SaveStall(){        
        $this->Stall_model->save($this->input->post('stall'));
    }

    public function UploadProfile(){
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            if($_FILES['image']['error'] != 4){
                $config['upload_path'] = './pics';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')){
                    $error = array('error' => $this->upload->display_errors());            
                    print_r($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $this->AdminModel->saveProfile($this->input->post('EmployeeId'), $data['upload_data']['file_name']);
                    print_r($data);
                }
            }
        }    
    }

    public function UploadImage(){
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            if($_FILES['image']['error'] != 4){
                $config['upload_path'] = './pics';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')){
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

    public function ValidateCategories(){
        $category = $this->input->post('category');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($category['CategoryName'])){
            $str .= $this->invalid('CategoryName', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->CategoriesModel->_exist('CategoryName', $category['CategoryName']);            
            if(is_object($ifExist)){
                if($ifExist->CategoryId != $category['CategoryId']){
                    $str .= $this->invalid('CategoryName', 'Category already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    } 

    public function GenerateTableCategories(){
        $json = '{ "data": [';
        foreach($this->AdminModel->getCategories() as $data){                 
           $json .= '['
                .'"'.$data->CategoryId.'",'
                .'"'.$data->CategoryName.'",'              
             .'"<a onclick = \"Categories_Modal.edit('.$data->CategoryId.');\" data-toggle=\"tooltip\" title=\"EDIT\"><span class=\"btn btn-float btn-info text-white icon fa fa-edit fa-2x\"></span></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
 
	public function GenerateStall(){
        $json = '{ "data": [';
        foreach($this->AdminModel->getStall() as $data){
            $json .= '['
                .'"'.$data->StallId.'",'                
                .'" <img style=\"width:30%; margin: 10px 250px;\" src='.base_url('pics/'.$data->Image).' >",'
                .'"'.$data->Name.'",'
            	.'"<a onclick = \"Stall_Modal.edit('.$data->StallId.');\" data-toggle=\"tooltip\" title=\"EDIT\"><span class=\"btn btn-float btn-info text-white icon fa fa-edit fa-2x\"></span></a><a onclick = \"Stall_Modal.delete('.$data->StallId.');\"><span class=\"btn btn-float btn-danger icon fa fa-remove fa-2x\" data-toggle=\"tooltip\" title=\"DELETE\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }	

    public function GenerateStallDashboard(){
        $json = '{ "data": [';
        foreach($this->AdminModel->getStall() as $data){
            $json .= '['
                .'"'.$data->StallId.'",'                
                .'"'.$data->Name.'",'
                .'"<a onclick = \"Stall_Modal.edit('.$data->StallId.');\" data-toggle=\"tooltip\" title=\"EDIT\"><span class=\"btn btn-float btn-info text-white icon fa fa-edit fa-2x\"></span></a><a onclick = \"Stall_Modal.delete('.$data->StallId.');\"><span class=\"btn btn-float btn-danger icon fa fa-remove fa-2x\" data-toggle=\"tooltip\" title=\"DELETE\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }   

    public function GenerateTableEmployee(){
        $json = '{ "data": [';
        foreach($this->AdminModel->getEmployee() as $data){
            $json .= '['
                .'"'.$data->EmployeeId.'",'
                .'" <img style=\"width:60%; margin: 10px 50px;\" src='.base_url('pics/'.$data->Image).' class=\"img-circle\" >",'
                .'"'.$data->EmployeeAccount.'",'
                .'"'.$data->Lastname.', '.$data->Firstname.'",'
                .'"'.$this->foodwaze_model->getPositionName($data->PositionId).'",'
                .'"'.$this->foodwaze_model->getStallName($data->StallId).'",'    
                .'"<a onclick = \"Employee_Modal.edit('.$data->EmployeeId.');\" data-toggle=\"tooltip\" title=\"EDIT\"><span class=\"btn btn-float btn-info text-white icon fa fa-edit fa-2x\"></span></a><a onclick = \"Employee_Modal.delete('.$data->EmployeeId.');\"><span class=\"btn btn-float btn-danger icon fa fa-remove fa-2x\" data-toggle=\"tooltip\" title=\"DELETE\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateEmployeeImage(){
        echo $this->convert($this->AdminModel->getEmployeeImage());
    }

    public function Delete($id){        
        echo $this->convert($this->AdminModel->delete($id));
    }

    public function EmpLastname($id){
        echo $this->convert($this->AdminModel->getEmployeeName($id));
    }

    public function DeleteStall($id){        
        echo $this->convert($this->Stall_model->delete($id));
        echo $this->convert($this->MenuModel->deleteMenu($id));
        echo $this->convert($this->AdminModel->deleteEmployee($id));
    }

    

}