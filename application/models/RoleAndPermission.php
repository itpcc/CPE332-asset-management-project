<?
class RoleAndPermission_model extends CI_Model {
        public $RoleAndPermission_id;
		public $data;
		public $condition;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get_RoleAndPermission($condition = NULL)
		{
			if(!empty($condition['RoleAndPermissionID']))
			{
				if(is_array($condition['RoleAndPermissionID']))
					$this->db->where_in('RoleAndPermissionID', $condition['RoleAndPermissionID']);
				else
					$this->db->where('RoleAndPermissionID',$condition['RoleAndPermissionID']);
			}	
			return $this->db->get('RoleAndPermission');
		}
        public function insert_RoleAndPermission($data)             //array of data (1 row)
        {
			$this->db->insert('RoleAndPermission',$data);
        }
        public function delete_RoleAndPermission_by_id($RoleAndPermission_id) 
        {
                $this->db->delete('RoleAndPermission', array('RoleAndPermissionID' => $RoleAndPermission_id))
        }
        public function edit_RoleAndPermission_by_id($RoleAndPermission_id,$data)
        {
			$this->db->update('RoleAndPermissionMain', $data, array('RoleAndPermissionID' => $RoleAndPermission_id))
        }
}
?>