<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Customer extends _BaseController {
	public function __construct(){

	parent::__construct();
	}

        public function Signup()
        {
            $this->load->view('include/header');
            $this->load->view('Customer/Signup'); // for stall list
            $this->load->view('include/footer');
        }

        public function Homepage()
        {
            $this->load->view('include/header');
            //session_destroy(); 
            $data['stall'] = $this->Foodwaze_model->getStall(); //stall list
            $this->load->view('Customer/Homepage', $data); // for stall list
            $this->load->view('include/footer');
        }

        public function Profile(){
            $this->load->view('include/header');        
            $data['profile'] = $this->CustomerModel->CustomerDetails();
            $this->load->view('Customer/Profile', $data);
            $this->load->view('include/footer');
        }

        public function Receipt()
        {
            $this->load->view('include/header');
            $this->load->view('Customer/Receipt'); // for stall list
            $this->load->view('include/footer');
        }


        public function GenerateReceipts(){
            $json = '{ "data": [';
            foreach($this->CustomerModel->Receipts() as $data){
                $json .= '['
                 //   .'"'.$this->ManagerModel->getMenuName($data->MenuId).'",'
                    .'"'.$data->DateTime.'",'
                    .'"<a onclick = \"Receipt_Modal.edit('.$data->OrderId.');\" data-toggle=\"tooltip\" title=\"View\"><span class=\"btn btn-float btn-info text-white icon fa fa-eye fa-2x\"></span></a>"'
                .']';            
                $json .= ',';
            }
            $json = $this->removeExcessComma($json);
            $json .= ']}';
            echo $json;        
        }

	public function Logout(){
		session_destroy(); 
		redirect(base_url('Customer/Login'));		
	}

    public function GetReceipt($id){        
        echo $this->convert($this->CustomerModel->_getReceipt($id));
    }

    public function GetReceipts($id){        
        echo $this->convert($this->CustomerModel->_getReceipts($id));
    }

}  