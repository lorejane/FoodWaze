<?php 

	class Foodwaze_model extends CI_Model
	{
		private $menu = "menu";
		public function __construct()
		{
			parent:: __construct();
		}

		function addorder($data){
			$this->db->insert_batch('order', $data); 
			return $this->db->insert_id();
		}

		function addorderdetails($data){
			$this->db->insert_batch('orderdetails', $data); 
		}

		function getlastorder(){
			$this->db->select('*');
			$this->db->from('order');
			return $this->db->insert_id('order_id');
		}

		public function getEmployeeDetails(){
			return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		}

		public function getPosition(){
	
			return $this->db->query("SELECT * FROM position WHERE PositionId = '".$this->session->userdata('PositionId')."'")->row();
		}

		public function getStalll(){
	
			return $this->db->query("SELECT * FROM stall WHERE StallId = '".$this->session->userdata('StallId')."'")->row();
		}

		public function getPositionName($positionId){
			return $this->db->query("SELECT PositionName FROM position WHERE PositionId = '".$positionId."'")->row()->PositionName;	
		} 

		public function getStallName($stallId){
			return $this->db->query("SELECT Name FROM stall WHERE StallId = '".$stallId."'")->row()->Name;	
		} 
		
		// view menu
		public function getMenu($stallId){			
			$query=$this->db->query('SELECT * FROM menu WHERE StallId = "'.$stallId.'"')->result();
			return $query;
		}

		public function getCategory($stallId){			
			$query=$this->db->query('SELECT * FROM category WHERE CategoryId in (SELECT CategoryId FROM menu WHERE StallId = "'.$stallId.'" group by CategoryId)')->result();
			return $query;
		}

		// view stall list
		public function getStall(){
			$stall=$this->db->query('SELECT * FROM stall')->result();
			return $stall;
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
	}
