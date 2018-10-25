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

    public function Meal(){

        $this->load->view('include/header');
        $this->load->view('manager/menu/meal');
        $this->load->view('include/footer');
    }

    public function Pasta(){

        $this->load->view('include/header');
        $this->load->view('manager/menu/pasta');
        $this->load->view('include/footer');
    }
    public function Dessert(){

        $this->load->view('include/header');
        $this->load->view('manager/menu/dessert');
        $this->load->view('include/footer');
    }

    public function Drinks(){

        $this->load->view('include/header');
        $this->load->view('manager/menu/drinks');
        $this->load->view('include/footer');
    }

    public function Accounts()
    {
        $this->load->view('include/header');
        $this->load->view('manager/accounts');
        $this->load->view('include/footer');
        
    }  
		//DisplayTableFor E M P L O Y E E
	public function GenerateTableEmployee(){
        $json = '{ "data": [';
        foreach($this->foodwaze_model->getEmployee() as $data){
            $json .= '['
                .'"'.$data->EmployeeId.'",'
                .'"'.$data->EmployeeAccount.'",'
                .'"'.$data->Firstname.'",'
                .'"'.$data->PositionId.'",'
                .'"'.$data->StallId.'",'                
              .'"<a href=\"'.base_url('manager/view_employee/'.$data->EmployeeId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->EmployeeId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    //DisplayTableForMeal M E A L
   	public function getMeal(){
        $json = '{ "data": [';
        foreach($this->Order_model->getMenuMeal() as $data){                 
           $json .= '['
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
             .'"<a href=\"'.base_url('Menu/view_menu/'.$data->MenuId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('Menu/delete_meal/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

   	public function getPasta(){
        $json = '{ "data": [';
        foreach($this->Order_model->getMenuPasta() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                 .'"<a href=\"'.base_url('Menu/view_menu/'.$data->MenuId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('Menu/delete_pasta/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }    

   	public function getDessert(){
        $json = '{ "data": [';
        foreach($this->Order_model->getMenuDessert() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                 .'"<a href=\"'.base_url('Menu/view_menu/'.$data->MenuId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('Menu/delete_dessert/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
   	public function getDrinks(){
        $json = '{ "data": [';
        foreach($this->Order_model->getMenuDrinks() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                 .'"<a href=\"'.base_url('Menu/view_menu/'.$data->MenuId).'\" class=\"btn btn-info\" >Update</a><a href=\"'.base_url('Menu/delete_drinks/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
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

    public function view_employee(){
        $this->load->view('include/header');
        $data['empdetails'] = $this->foodwaze_model->getEmployee();
        $this->load->view('manager/viewaccount', $data);
        $this->load->view('include/footer');
    }

	public function delete_employee()
	{
        $u = $this->uri->segment(3);
        $this->foodwaze_model->delete($u);
        redirect('manager/Accounts', 'refresh');
	}

	
}