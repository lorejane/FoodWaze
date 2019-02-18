<?php 
	class CashierModel extends _BaseModel
	{

	public function __construct(){		
	}

	public function getCategories(){ //display categories
		return $this->db->query("SELECT * FROM category")->result();
	}

	public function getOrder(){
		return $this->db->query("SELECT * FROM orders WHERE IsActive = '1' AND StallId = '".$this->session->userdata('StallId')."'")->result();	
	}

	public function updateOrder($id){
		return $this->db->query("UPDATE orders SET IsActive='0' WHERE OrderId = '".$id."' ");	

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
	}
}
