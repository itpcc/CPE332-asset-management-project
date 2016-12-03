<?
class Asset_model extends CI_Model {
        public $Vendor_id;
		public $data;
		public $condition;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
		public function get($condition = NULL)
		{
			if(!empty($condition['VendorID']))
			{
				if(is_array($condition['VendorID']))
					$this->db->where_in($condition['VendorID']);
				else
					$this->db->where($condition['VendorID']);
			}	
			return $this->db->get('Vendor');
		}
        public function insert_asset($data)             //array of data (1 row)
        {
			$this->db->insert('Vendor',$data);
        }
        public function delete_vendor_by_id($Vendor_id) 
        {
                $this->db->delete('Vendor', array('VendorID' => $Vendor_id))
        }
        public function edit_vendor_by_id($Vendor_id,$data)
        {
			$this->db->update('VendorMain', $data, array('VendorID' => $Vendor_id))
        }

}
?>