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

}