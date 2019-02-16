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
		redirect(base_url('Login'));
	}

    public function Profile(){
        $this->load->view('include/header');        
        $data['profile'] = $this->ManagerModel->getManagerDetails();
        $this->load->view('manager/ManagerProfile', $data);
        $this->load->view('include/footer');
    }

    public function Menu(){

        $this->load->view('include/header');
        $this->load->view('Manager/ManageMenus/Menu');
        $this->load->view('include/footer');
    }

     public function Profiles(){

        $this->load->view('include/header');
        $this->load->view('Manager/ManagerProfile');
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
        $data['totalorders'] = $this->ManagerModel->TotalOrders();
        $data['totalprice'] = $this->ManagerModel->TotalSales();
        $this->load->view('Manager/Sales', $data);
        $this->load->view('include/footer');
    }

    public function Save(){        
        $this->ManagerModel->save($this->input->post('employee'));
    } 

    public function SaveMenu(){        
        $this->MenuModel->save($this->input->post('menu'));
    }     

    public function GetAll(){
        echo $this->convert($this->CategoriesModel->_list());
    }

    public function GetEmployee($id){        
        echo $this->convert($this->ManagerModel->_get($id));
    }

    public function GetMenu($id){        
        echo $this->convert($this->ManagerModel->_getMenu($id));
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
                .'" <img style=\"width:50%;\" src='.base_url('pics/'.$data->Image).' class=\"img-circle\" >",'
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

    public function generateTableMenus(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenu() as $data){                 
           $json .= '['
                .'"'.$data->CategoryId.'",'
                .'" <img style=\"width:40%; margin: 5px 115px;\" src='.base_url('pics/'.$data->Image).' >",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
               .'"<a onclick = \"Menu_Modal.edit('.$data->MenuId.');\" data-toggle=\"tooltip\" title=\"EDIT\"><span class=\"btn btn-float btn-info text-white icon fa fa-edit fa-2x\"></span></a><a onclick = \"Menu_Modal.delete('.$data->MenuId.');\"><span class=\"btn btn-float btn-danger icon fa fa-remove fa-2x\" data-toggle=\"tooltip\" title=\"DELETE\"></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateMostSaleable(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->MostSaleable() as $data){
            $json .= '['
                .'"'.$this->ManagerModel->getMenuName($data->MenuId).'",'
                .'"'.$data->Quantity.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateLeastSaleable(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->LeastSaleable() as $data){
            $json .= '['
                .'"'.$this->ManagerModel->getMenuName($data->MenuId).'",'
                .'"'.$data->Quantity.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTotalByEmployee(){
        //print_r($this->ManagerModel->TotalSalesByCashier());
        $json = '{ "data": [';
        foreach($this->ManagerModel->TotalSalesByCashier() as $data){
            // print_r($data);115px`1 
            $emperador = $this->ManagerModel->getEmployee($data->EmployeeId);
            $json .= '['
                .'"'.$data->EmployeeId.'",'
                .'"'.$emperador->Lastname.','.$emperador->Firstname.'",'
                .'"'.$data->Total.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}