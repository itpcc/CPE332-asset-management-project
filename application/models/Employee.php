<?
class Employee_model extends CI_Model {
        public $Employee_id;
		public $data;
		public $condition;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get_employee($condition = NULL)
		{
			if(!empty($condition['EmployeeID']))
			{
				if(is_array($condition['EmployeeID']))
					$this->db->where_in('EmployeeID', $condition['EmployeeID']);
				else
					$this->db->where('EmployeeID',$condition['EmployeeID']);
			}	
			return $this->db->get('Employee');
		}
        public function insert_employee($data)             //array of data (1 row)
        {
			$this->db->insert('Employee',$data);
        }
        public function delete_employee_by_id($Employee_id) 
        {
                $this->db->delete('Employee', array('EmployeeID' => $Employee_id))
        }
        public function edit_employee_by_id($Employee_id,$data)
        {
			$this->db->update('EmployeeMain', $data, array('EmployeeID' => $Employee_id))
        }
}
?>