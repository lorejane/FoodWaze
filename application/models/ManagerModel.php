<?php 
	class ManagerModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"employee",
				"EmployeeId",
			)
		);
	}

		public function save($employee){
			if($employee['EmployeeId'] == 0){//insert			
				$this->db->query("INSERT into employee "
					."(EmployeeAccount,Firstname, Lastname, PositionId, StallId, Password) VALUES ("                   
						."'".$employee['EmployeeAccount']."',"
						."'".$employee['Firstname']."',"
						."'".$employee['Lastname']."',"
						."'3',"	
						."'".$this->session->userdata('StallId')."'"
						."'".$employee['Password']."'"						
					.")"
				);

			}
			else{//update
				$this->db->query("UPDATE employee SET "
	                ."EmployeeAccount = '".$employee['EmployeeAccount']."',"
	                ."Firstname = '".$employee['Firstname']."',"
	                ."Lastname = '".$employee['Lastname']."',"
	                ."Password = '".$employee['Password']."'"
	                ."WHERE EmployeeId = '".$employee['EmployeeId']."'"
				);			
			}
	    }

		public function getEmployeeManager(){
			return $this->db->query("SELECT * FROM employee WHERE StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function _getMenu($id){
			$dbList = $this->db->query("SELECT * FROM menu WHERE MenuId = '".$id."'")->row();
			return $dbList;		
		}

		public function getMenuMeal(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '1' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuPasta(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '2' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuDessert(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '3' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuDrinks(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '4' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function delete($MenuId){
			$this->db->where(['MenuId' => $MenuId]);
			return $this->db->delete('menu');

		}
}		