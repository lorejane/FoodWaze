<?php 

	class Stall_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public  function getStall(){
			$query =  $this->db->select('stall'); 
    		return $query->result();
		}
}