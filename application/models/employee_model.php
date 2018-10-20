<?php 

	/**
	* 
	*/
	class Employee_model extends CI_Model
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

		public function get($EmployeeId = null){
			if ($EmployeeId == null){
				$query = $this->db->get('employee');
			} else{
				$query = $this->db->get_where('employee',['EmployeeId' => $EmployeeId]);
			}
			return $query->result();
		}

		/**
		*@param string $type admin or user
		*@param string $email
		*@param string $password do not encrypt
		*@return array
		*/
		public function create($EmployeeAccount, $password){
			$this->form_validation->set_rules('EmployeeAccount', 'EmployeeAccount', 'is_unique[user.username]');
			if ($this->form_validation->run() ==false){
				return false;
			}

			//create record
			return $this->db->insert('employee',[
				'EmployeeAccount' => $EmployeeAccount,
				'password' => $password

			]);

			return $result;

		}
		
		public function edit($EmployeeId){
			$this->db->where(['EmployeeId' => $EmployeeId]);
			return $this->db->edit('employee');

		}

		public function delete($EmployeeId){
			$this->db->where(['EmployeeId' => $EmployeeId]);
			return $this->db->delete('employee');

		}
	}
