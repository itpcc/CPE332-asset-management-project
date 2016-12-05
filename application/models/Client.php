<?
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
			return $this->db->get('Client');
		}
        public function insert_client($data)             //array of data (1 row)
        {
			$this->db->insert('Client',$data);
        }
        public function delete_client_by_id($Client_id) 
        {
                $this->db->delete('Client', array('ClientID' => $Client_id))
        }
        public function edit_client_by_id($Client_id,$data)
        {
			$this->db->update('Client', $data, array('ClientID' => $Client_id))
        }
		public function get_client_by_name($condition = NULL)
		{
			if(!empty($condition['FirstName']))
			{
				if(is_array($condition['FirstName']))
					$this->db->where_in('FirstName', $condition['FirstName']);
				else
					$this->db->where('FirstName',$condition['FirstName']);
			}	
			return $this->db->get('Client');
		}
		 public function delete_client_by_name($Client_id) 
        {
                $this->db->delete('Client', array('FirstName' => $Client_id))
        }
        public function edit_client_by_name($Client_id,$data)
        {
			$this->db->update('Client', $data, array('FirstName' => $Client_id))
        }
}
?>