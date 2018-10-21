<?php 
	class Position_model extends CI_Model
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

		public function getEmployeeDetails(){
			return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		}

		public function getPosition(){
			return $this->db->query("SELECT * FROM position WHERE PositionId = '".$this->session->userdata('PositionId')."'")->row();
	
		}

		public function getEmployee(){
			return $this->db->query("SELECT * FROM employee WHERE StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}


}
