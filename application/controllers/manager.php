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
    
    public function Save(){        
        $this->ManagerModel->save($this->input->post('employee'));
    } 

    public function Sales(){

        $this->load->view('include/header');
        $this->load->view('Manager/sales');
        $this->load->view('include/footer');
    }

    public function Meal(){

        $this->load->view('include/header');
        $this->load->view('Manager/menu/meal');
        $this->load->view('include/footer');
    }

    public function Pasta(){

        $this->load->view('include/header');
        $this->load->view('Manager/menu/pasta');
        $this->load->view('include/footer');
    }
    public function Dessert(){

        $this->load->view('include/header');
        $this->load->view('Manager/menu/dessert');
        $this->load->view('include/footer');
    }

    public function Drinks(){

        $this->load->view('include/header');
        $this->load->view('Manager/menu/drinks');
        $this->load->view('include/footer');
    }

    public function Accounts()
    {
        $this->load->view('include/header');
        $this->load->view('Manager/accounts');
        $this->load->view('include/footer');
        
    } 
    
    public function Get($id){        
        echo $this->convert($this->ManagerModel->_get($id));
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
              .'"<a onclick = \"Employee_Modal.edit('.$data->EmployeeId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('Manager/delete_employee/'.$data->EmployeeId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

	public function delete_employee()
	{
        $u = $this->uri->segment(3);
        $this->position_model->delete($u);
        redirect('Manager/Accounts', 'refresh');
	}

	
}