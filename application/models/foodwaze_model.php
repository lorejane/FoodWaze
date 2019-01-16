<?php 

	class Foodwaze_model extends _BaseModel
	{
		private $menu = "menu";
		public function __construct()
		{
			parent:: __construct();
		}

		function addorder($data){
			$this->db->insert_batch('orders', $data); 
			return $this->db->insert_id();
		}

		function addorderdetails($data){
			$this->db->insert_batch('orderdetails', $data); 
		}

		function getlastorder(){
			$this->db->select('*');
			$this->db->from('orders');
			return $this->db->insert_id('order_id');
		}

		public function getEmployeeDetails(){
			return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		}

		public function getPosition(){
	
			return $this->db->query("SELECT * FROM position WHERE PositionId = '".$this->session->userdata('PositionId')."'")->row();
		}

		// view stall list
		//public function getStall(){
		//	$stall=$this->db->query('SELECT * FROM stall')->result();
		//	return $stall;
		//}		
		public  function getStall(){ //display stalls without none
			return $this->db->query("SELECT * FROM stall where StallId > 0")->result();
		}
		
		public function getPositionName($positionId){
			return $this->db->query("SELECT PositionName FROM position WHERE PositionId = '".$positionId."'")->row()->PositionName;	
		} 

		public function getStallName($stallId){


			$query=$this->db->query('SELECT * FROM stall WHERE StallId = "'.$stallId.'"')->row();
			if(is_object($query)){
				return $query->Name;
			}
			return $query;
		}

		public function getCategory($stallId){			
			$query=$this->db->query('SELECT * FROM category WHERE CategoryId in (SELECT CategoryId FROM menu WHERE StallId = "'.$stallId.'" group by CategoryId)')->result();
			return $query;
		}

		public function readitem_f($condition=null){
			$this->db->select('*');
			$this->db->from($this->menu);
			if( isset($condition) ) 
			{			
				$this->db->where_in('menuid',$condition);
			}		
			$query=$this->db->get();
			return $query->result_array();		
		}

		public function getMenu($stallid){
		return $this->db->query("SELECT * FROM menu WHERE StallId = '".$stallid."' ")->result();	
	}
	}
