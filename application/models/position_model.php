<?php 

	/**
	* 
	*/
	class Position_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		/**
		*Get one or many users
		*@param integer|void $user_id 
		*@return array
		*
		*/

	/**	public function get($EmployeeId = null){
			if ($EmployeeId == null){
				$query = $this->db->get('employee');
			} else{
				$query = $this->db->get_where('employee', ['EmployeeId' => $EmployeeId]);
			}
			return $query->result();
		}
	*/

		/**
		*@param string $type admin or user
		*@param string $email
		*@param string $password do not encrypt
		*@return array
		*/

		/**public function getall($EmployeeId){
			$this->db->select('EmployeeId', 'EmployeeAccount');
			$this->db->where('EmployeeAccount', $EmployeeId);
			$q = $this->db->get('employee');
			return $q->row_array();
		}
		*/
		public function Login($PositionId, $EmployeeAccount, $password)
		{
			$query = $this->db->query("SELECT * FROM employee WHERE EmployeeAccount = '".$EmployeeAccount."' AND password = '".$password."'");
			$ok = false;
			$session_data = [];
			foreach($query->result() as $row){
				$session_data = array(
					'PositionId' => $row->PositionId,
					'EmployeeId' => $row->EmployeeId,
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
			// return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '1'")->row();
		}

		public function getPosition(){
			return $this->db->query("SELECT * FROM position WHERE PositionId = '".$this->session->userdata('PositionId')."'")->row();
			// return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '1'")->row();
		}

		/**public function authenticate($EmployeeAccount, $password){
			$query = $this->db->query("SELECT * FROM employee WHERE EmployeeAccount = '".$EmployeeAccount."' AND password = '".$password."'")->row();	
			if(is_object($query)){
				return $query->PositionId;
			}else{
				return 0;
			}
		*/

 
	}
