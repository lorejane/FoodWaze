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

<<<<<<< HEAD
		/**
		*Get one or many users
		*@param integer|void $user_id 
		*@return array
		*
		*/

		public function getEmployee(){
			return $this->db->query("SELECT * FROM employee WHERE StallId = '".$this->session->userdata('StallId')."' ");
			
		}

		/**
		*@param string $type admin or user
		*@param string $email
		*@param string $password do not encrypt
		*@return array
		*/
=======
>>>>>>> 465053d668091141442caf6ad459b9a97c6feca3
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

		//new 10/20/18

		public function category(){
				//$query = $this->db->get("category");
				//select = from category
				$query = $this->db->query("SELECT CategoryName FROM category")->result();
				return $query;

		}
	}
