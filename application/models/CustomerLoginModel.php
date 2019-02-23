<?php 

	class CustomerLoginModel extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function Login($CustomerAccount, $password)
		{
			$query = $this->db->query("SELECT * FROM customer WHERE CustomerAccount = '".$CustomereAccount."' AND password = '".$password."'");
			$ok = false;
			$session_data = [];
			foreach($query->result() as $row){
				$session_data = array(
					'CustomerId' => $row->CustomerId,
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