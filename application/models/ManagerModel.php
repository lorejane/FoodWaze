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
					."'".$this->session->userdata('StallId')."',"
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

  	public function saveImage($EmployeeId, $Image){
		$this->db->query("UPDATE stall SET "                			
			."Image = '".$Image."' "
			."WHERE EmployeeId = '".$EmployeeId."'"
		);	
	}

	public function getManagerDetails(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		
	}

	public function getEmployeeManager(){ //display employees by stall
		return $this->db->query("SELECT * FROM employee WHERE StallId = '".$this->session->userdata('StallId')."' AND EmployeeId != '".$this->session->userdata('EmployeeId')."' ")->result();
		
	}

	public function _getMenu($id){ //update menu
		$dbList = $this->db->query("SELECT * FROM menu WHERE MenuId = '".$id."'")->row();
		return $dbList;		
	}

	public function getStallname(){ //display menu 
		return $this->db->query("SELECT Name FROM stall WHERE StallId = '".$this->session->userdata('StallId')."'")->row();
		
	}

	public function getMenu(){ //display menu 
		return $this->db->query("SELECT * FROM menu WHERE StallId = '".$this->session->userdata('StallId')."'")->result();
		
	}

	public function getMenuName($menuid){
		return $this->db->query("SELECT Name FROM menu WHERE MenuId = '".$menuid."' ")->row()->Name;
	}

	public function TotalOrders(){
		return $this->db->query("SELECT COUNT(OrderId) as OrderId FROM orders WHERE IsActive = 0 AND StallId = '".$this->session->userdata('StallId')."' ")->row()->OrderId;
			}

	public function TotalSales(){
		return $this->db->query("SELECT SUM(Total) as Total FROM receiptmanagement WHERE StallId = '".$this->session->userdata('StallId')."' ")->row()->Total;
			}

	public function TotalSalesByCashier(){
		return $this->db->query("SELECT SUM(Total) as Total, EmployeeId from receiptmanagement WHERE StallId = '".$this->session->userdata('StallId')."' Group by EmployeeId")->result();
	}

	public function getEmployee($getEmployee){ //display employees by stall
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$getEmployee."' ")->row();	
	}

	public function MostSaleable(){
		return $this->db->query("SELECT SUM(Quantity) as Quantity, MenuId FROM orderdetails WHERE OrderId IN (SELECT OrderId from orders where StallId = '".$this->session->userdata('StallId')."') group by MenuId order by Quantity DESC LIMIT 5 ")->result();
	}

	public function LeastSaleable(){
		return $this->db->query("SELECT SUM(Quantity) as Quantity, MenuId FROM orderdetails WHERE OrderId IN (SELECT OrderId from orders where StallId = '".$this->session->userdata('StallId')."')group by MenuId order by Quantity ASC LIMIT 5 ")->result();
	}

	public function displayReceiptTbl($where){
		return $this->db->query("SELECT * FROM receiptmanagement WHERE StallId =  '".$this->session->userdata('StallId')."' ".$where)->result();
	}

	public function SalePerEmployee(){
		$this->db->query("");
	}
}		