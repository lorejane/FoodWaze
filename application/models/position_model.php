<?php 
	class Position_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function get($EmployeeId = null){
			if ($EmployeeId == null){
				$query = $this->db->get('employee');
			} else{
				$query = $this->db->get_where('employee', ['EmployeeId' => $EmployeeId]);
			}
			return $query->result();
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

	    public function retrieve_user($EmployeeId = '') {
		     $this->db->where('EmployeeId', $EmployeeId);  // get users record
		     $q = $this->db->get('employee');   // this would be changed to your users table name

		      if($q->num_rows() > 0) {
		        // return a single db row array $row['name'];
		        return $q->row_array();
		        // return a single db object $row->name;
		        // return $q->row;      
		      }
		      return FALSE; 
     	}

}
