<?php
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
			if(!empty($condition['RoleID']))
			{
				if(is_array($condition['RoleID']))
					$this->db->where_in('RoleID', $condition['RoleID']);
				else
					$this->db->where('RoleID',$condition['RoleID']);
			}	
			return $this->db->get('roleandpermission');
		}
        public function insert_RoleAndPermission($data)             //array of data (1 row)
        {
			$this->db->insert('roleandpermission',$data);
        }
        public function delete_RoleAndPermission_by_id($RoleAndPermission_id) 
        {
                $this->db->delete('roleandpermission', array('RoleID' => $RoleAndPermission_id));
        }
        public function edit_RoleAndPermission_by_id($RoleAndPermission_id,$data)
        {
			$this->db->update('roleandpermission', $data, array('RoleID' => $RoleAndPermission_id));
        }
}