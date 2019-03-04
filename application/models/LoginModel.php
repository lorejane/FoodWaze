<?php 

	class LoginModel extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function Login($PositionId, $EmployeeAccount, $password)
		{
			$query = $this->db->query("SELECT * FROM employee WHERE EmployeeAccount = '".$EmployeeAccount."' AND password = '".$password."'");
			$ok = false;
			$session_data = [];
			foreach($query->result() as $row){
				$session_data = array(
					'PositionId' => $row->PositionId,
					'CustomerId' => $row->CustomerId,
					'EmployeeId' => $row->EmployeeId,
					'StallId' => $row->StallId,
					'logged_in' => true
				);
				$ok = true;
			}
			if($ok){
				return $session_data;
			}
			else{
				return false;
			}
		}

	public function Signup($PositionId, $EmployeeAccount, $Firstname, $Lastname, $ContactNumber, $Password){
		$this->db->query("INSERT into employee "
				."(EmployeeAccount,Firstname, Lastname, PositionId,StallId, ContactNumber, Password) VALUES ("                   
					."'$EmployeeAccount',"	
					."'$Firstname',"	
					."'$Lastname',"	
					."'4',"	
					."'0',"	
					."'$ContactNumber',"
					."'$Password'"							
				.")"
			);
	}

	public function UpdateProfile($EmployeeAccount, $Firstname, $Lastname, $Password){
				$this->db->query("UPDATE employee SET "
                ."EmployeeAccount = '".$EmployeeAccount."',"
                ."Firstname = '".$Firstname."',"
                ."Lastname = '".$Lastname."',"
                //."PositionId = '".$this->session->userdata('PositionId')."',"
                ."StallId = '0',"
                ."Password = '".$Password."'"
                ."WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'"
			);	
	}
}