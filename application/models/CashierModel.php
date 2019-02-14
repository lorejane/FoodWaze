<?php 
	class CashierModel extends _BaseModel
	{

	public function __construct(){		
	}

	public function getCategories(){ //display categories
		return $this->db->query("SELECT * FROM category")->result();
	}

	public function getOrder(){
		return $this->db->query("SELECT * FROM orders WHERE IsActive = '1' ")->result();	
	}

	public function getOrderDetails($id){
		return $this->db->query("SELECT * FROM orderdetails WHERE OrderId = '".$id."' ")->result();	
	}
	
	public function getMenu($menuid){
		return $this->db->query("SELECT * FROM menu WHERE MenuId = '".$menuid."' ")->result();	
	}

	public function getEmployeeDetails(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		
	}

	public function SaveOrder(){
		$this->db->query("INSERT into orders "
			."(StallId, IsActive) VALUES ("
		 			."'".$this->session->userdata('StallId')."',"	
		 			."'0'"
		 			.")" 
				);
		$orderid = $this->db->query("SELECT MAX(OrderId) AS OrderId FROM orders")->row()->OrderId;
		foreach($this->cart->contents() as $menu) {
		$this->db->query("INSERT into orderdetails "
		 		."(OrderId, MenuId, Quantity) VALUES ("
		 			."'".$orderid."',"	
		 			."'".$menu['id']."',"
		 			."'".$menu['qty']."'"
		 		.")"
		 	);
		}
		print_r($orderid);
	}

	public function SaveReceipt($array){
		$this->db->insert('receiptmanagement', $array);
		return $this->db->insert_id();
		// $this->db->query("INSERT into receiptmanagement "
		// 		."(OrderId, Discount, Total, Cash, Change, PositionId, StallId) VALUES ("	
		// 			."'3',"	
		// 			."'".$discount['discount']."',"
		// 			."'".$puretotal['puretotal']."',"
		// 			."'".$ReceivedAmnt['ReceivedAmnt']."',"
		// 			."'".$change['change']."',"
		// 			."'".$this->session->userdata('PositionId')."',"
		// 			//."'".$this->session->userdata('EmployeeAccount')."',"
		// 			."'".$this->session->userdata('StallId')."'"						
		// 		.")"
		// 	);
		// print_r($receipt);
	}
}
