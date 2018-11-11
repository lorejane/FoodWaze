<?php 
	class Position_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function insert($data)
		{
		    $this->db->insert('employee',$data);
		    return true;
		}

		public function delete($EmployeeId){
			$this->db->where(['EmployeeId' => $EmployeeId]);
			return $this->db->delete('employee');

		}

}
