<?
class Asset_model extends CI_Model {
        public $vendor_id;
       
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }
        public function get_vendor()
        {
                $query = $this->db->get('AssetMain');
                return $query->result();
        }
        public function get_vendor_by_id($vendor_id)
        {
                if($asset_id != FALSE) {
                    $this->db->where('Vendor',$asset_id);
                    $query = $this->db->get('Vendor');
                    return $query->result();
                  }
                else 
					{
						return FALSE;
					}
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