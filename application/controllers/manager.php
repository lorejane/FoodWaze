<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Manager extends _BaseController {

	public function __construct(){

	parent::__construct();
	}

	public function index()
	{
		redirect(base_url('login'));
	}

    public function Profile(){
        $this->load->view('include/header');
        $this->load->view('manager/Profile');
        $this->load->view('include/footer');
    }

    public function Categories(){

        $this->load->view('include/header');
        $this->load->view('Manager/ManageCategories/Categories');
        $this->load->view('include/footer');
    }

    public function Menu(){

        $this->load->view('include/header');
        $this->load->view('Manager/ManageMenus/Menu');
        $this->load->view('include/footer');
    }

    public function Accounts()
    {
        $this->load->view('include/header');
        $this->load->view('Manager/ManageAccounts/Accounts');
        $this->load->view('include/footer');
        
    } 
    
    public function Sales(){
        $this->load->view('include/header');
        $this->load->view('manager/sales');
        $this->load->view('include/footer');
    }

    public function Save(){        
        $this->ManagerModel->save($this->input->post('employee'));
    } 

    public function SaveCategory(){        
        $this->CategoriesModel->save($this->input->post('category'));
    } 

    public function SaveMenu(){        
        $this->MenuModel->save($this->input->post('menu'));
    }     

    public function GetEmployee($id){        
        echo $this->convert($this->ManagerModel->_get($id));
    }

    public function GetCategory($id){        
        echo $this->convert($this->ManagerModel->_getCategories($id));
    }

    public function GetAll(){
        echo $this->convert($this->CategoriesModel->_list());
    }

    public function GetMenu($id){        
        echo $this->convert($this->ManagerModel->_getMenu($id));
    }

    public function DeleteCategories($id){        
        echo $this->convert($this->CategoriesModel->delete($id));
    }

    public function DeleteMenu($id){        
        echo $this->convert($this->MenuModel->delete($id));
    }

    public function DeleteAccount($id){        
        echo $this->convert($this->AdminModel->delete($id));
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
                    $this->MenuModel->saveImage($this->input->post('MenuId'), $data['upload_data']['file_name']);
                    print_r($data);
                }
            }
        }    
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
                    $this->AdminModel->saveImage($this->input->post('EmployeeId'), $data['upload_data']['file_name']);
                    print_r($data);
                }
            }
        }    
    }

    public function ValidateEmployee(){
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
 
    public function ValidateMenus(){
        $menu = $this->input->post('menu');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($menu['Name'])){
            $str .= $this->invalid('Name', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->MenuModel->_exist('Name', $menu['Name']);            
            if(is_object($ifExist)){
                if($ifExist->MenuId != $menu['MenuId']){
                    $str .= $this->invalid('Name', 'Menu already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    } 

	//DisplayTableFor E M P L O Y E E
	public function GenerateTableEmployee(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getEmployeeManager() as $data){
            $json .= '['
                .'"'.$data->EmployeeId.'",'
                .'"'.$data->EmployeeAccount.'",'
                .'"'.$data->Lastname.', '.$data->Firstname.'",'
                .'"'.$this->foodwaze_model->getPositionName($data->PositionId).'",'               
              .'"<a onclick = \"Employee_Modal.edit('.$data->EmployeeId.');\" ><span class=\"icon fa fa-edit\"></a><a onclick = \"Employee_Modal.delete('.$data->EmployeeId.');\"  ><span class=\"icon fa fa-remove\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
	
    public function generateTableCategories(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getCategories() as $data){                 
           $json .= '['
                .'"'.$data->CategoryId.'",'
                .'"'.$data->CategoryName.'",'              
             .'"<a onclick = \"Categories_Modal.edit('.$data->CategoryId.');\" ><span class=\"icon fa fa-edit\"></a><a onclick = \"Categories_Modal.delete('.$data->CategoryId.');\" ><span class=\"icon fa fa-remove\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function generateTableMenus(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenu() as $data){                 
           $json .= '['
                .'"'.$data->CategoryId.'",'
                .'" <img style=\"width:20%;\" src='.base_url('pics/'.$data->Image).' >",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
             .'"<a onclick = \"Menu_Modal.edit('.$data->MenuId.');\" ><span class=\"icon fa fa-edit\"></a><a onclick = \"Menu_Modal.delete('.$data->MenuId.');\" ><span class=\"icon fa fa-remove\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}