<?

class AssetPurchase_model extends CI_Model {

        public $AssetID;
        public $PurchaseID;
        public $error1;
        public $error2;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_purchased_list_by_AssetID($condition = NULL)
        {
            if(!empty($condition['AssetID']))
            {
                if(is_array($condition['AssetID']))
                    $this->db->where_in('AssetID' ,$condition['AssetID']);
                else
                    $this->db->where('AssetID' ,$condition['AssetID']);
            }
            
            return $this->db->get('AssetPurchase');
        }

        public function get_purchased_list_by_PurchaseID($condition = NULL)
        {
        	if(!empty($condition['PurchaseID']))
            {
                if(is_array($condition['PurchaseID']))
                    $this->db->where_in('PurchaseID' ,$condition['PurchaseID']);
                else
                    $this->db->where('PurchaseID' ,$condition['PurchaseID']);
            }
            
            return $this->db->get('AssetPurchase');
        }

        public function insert_purchased_asset($data)             //array of data (1 row)
        {
                
                $query = $this->db->insert('AssetPurchase',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_purchased_asset($AssetID) 
        {
                $query = $this->db->delete('AssetPurchase', array('AssetID' => $AssetID));
                if(!$query)
                {
                    $error1 = $this->db->error();
                    return FALSE;
                }

                return TRUE;
        }

        public function delete_purchased_list($condition = NULL)
        {
        	if(!empty($condition['PurchaseID']))
            {
                if(is_array($condition['PurchaseID']))
                    $this->db->where_in('PurchaseID' ,$condition['PurchaseID']);
                else
                    $this->db->where('PurchaseID' ,$condition['PurchaseID']);
            }
            
            $query = $this->db->delete('AssetPurchase');
            if(!$query)
                {
                    $error2 = $this->db->error();
                    return FALSE;
                }

                return TRUE;
        }

        public function delete_all_purchased_list()
        {
                $this->db->empty_table('AssetPurchase');

        }

        public function update_purchased_asset($PurchaseID,$data)
        {
                
                $query = $this->db->update('AssetPurchase', $data, array('PurchaseID' => $PurchaseID));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>
