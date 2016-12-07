<?php
class Employee_model extends CI_Model {
        public $Employee_id;
		public $data;
		public $condition;
        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get_employee($condition = NULL){
			if(!empty($condition['EmployeeID']))
			{
				if(is_array($condition['EmployeeID']))
					$this->db->where_in('EmployeeID', $condition['EmployeeID']);
				else
					$this->db->where('EmployeeID',$condition['EmployeeID']);
			}
			if(!empty($condition['FirstName'])){
				if(is_array($condition['FirstName']))
					$this->db->or_where_in('FirstName', $condition['FirstName'])->or_where_in('LastName', $condition['FirstName']);
				else
					$this->db->or_where('FirstName',$condition['FirstName'])->or_where('LastName',$condition['FirstName']);
			}
			return $this->db->get('employee');
		}
        public function insert_employee($data){             //array of data (1 row)
			$this->db->insert('employee',$data);
        }
        public function delete_employee_by_id($Employee_id) 
        {
                $this->db->delete('employee', array('EmployeeID' => $Employee_id));
        }
        public function edit_employee_by_id($Employee_id,$data)
        {
			$this->db->update('employee', $data, array('EmployeeID' => $Employee_id));
        }
}