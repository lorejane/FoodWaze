<?php 
	class CustomerModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"receiptmanagement",
				"OrderId",
			)
		);
	}

	public function Receipts(){ //display menu 
		return $this->db->query("SELECT * FROM receiptmanagement WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->result();
	
	}

	public function CustomerDetails(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."' ")->row();	
	}

	public function _getReceipt($id){ //update menu
		$dbList = $this->db->query("SELECT * FROM receiptmanagement WHERE OrderId = '".$id."'")->row();
		return $dbList;		
	}

	public function _getReceipts($id){ //update menu
		$dbList = $this->db->query("SELECT * FROM orderdetails WHERE OrderId = '".$id."'")->row();
		return $dbList;		
	}

}
