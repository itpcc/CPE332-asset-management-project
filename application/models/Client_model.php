<?php
class Client_model extends CI_Model {
        public $Client_id;
		public $data;
		public $condition;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get_client($condition = NULL)
		{
			if(!empty($condition['ClientID']))
			{
				if(is_array($condition['ClientID']))
					$this->db->where_in('ClientID', $condition['ClientID']);
				else
					$this->db->where('ClientID',$condition['ClientID']);
			}
			if(!empty($condition['FirstName']))
			{
				if(is_array($condition['FirstName']))
					$this->db->or_where_in('FirstName', $condition['FirstName'])->or_where_in('LastName', $condition['FirstName']);
				else
					$this->db->or_where('FirstName',$condition['FirstName'])->or_where('LastName', $condition['FirstName']);
			}	
			return $this->db->get('client');
		}
        public function insert_client($data)             //array of data (1 row)
        {
			$this->db->insert('client',$data);
        }
        public function delete_client_by_id($Client_id) 
        {
                	$this->db->delete('client', array('ClientID' => $Client_id));
        }
        public function edit_client_by_id($Client_id,$data)
        {
			$this->db->update('client', $data, array('ClientID' => $Client_id));
        }
}