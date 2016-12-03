<?
class ContactedCompany_model extends CI_Model {
        public $ContactedCompany_id;
		public $data;
		public $condition;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get_ContactedCompany($condition = NULL)
		{
			if(!empty($condition['ContactedCompanyID']))
			{
				if(is_array($condition['ContactedCompanyID']))
					$this->db->where_in('ContactedCompanyID', $condition['ContactedCompanyID']);
				else
					$this->db->where('ContactedCompanyID',$condition['ContactedCompanyID']);
			}	
			return $this->db->get('ContactedCompany');
		}
        public function insert_ContactedCompany($data)             //array of data (1 row)
        {
			$this->db->insert('ContactedCompany',$data);
        }
        public function delete_ContactedCompany_by_id($ContactedCompany_id) 
        {
                $this->db->delete('ContactedCompany', array('ContactedCompanyID' => $ContactedCompany_id))
        }
        public function edit_ContactedCompany_by_id($ContactedCompany_id,$data)
        {
			$this->db->update('ContactedCompanyMain', $data, array('ContactedCompanyID' => $ContactedCompany_id))
        }
}
?>