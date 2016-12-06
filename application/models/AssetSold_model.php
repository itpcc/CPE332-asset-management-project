<?

class AssetSold_model extends CI_Model {

        public $AssetID;
        public $SoldID;
        public $error1;
        public $error2;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_sold_list_by_asset($condition = NULL)
        {
            if(!empty($condition['AssetID']))
            {
                if(is_array($condition['AssetID']))
                    $this->db->where_in('AssetID' ,$condition['AssetID']);
                else
                    $this->db->where('AssetID' ,$condition['AssetID']);
            }
            
            return $this->db->get('AssetSold');
        }

        public function get_sold_list_by_SoldID($condition = NULL)
        {
        	if(!empty($condition['SoldID']))
            {
                if(is_array($condition['SoldID']))
                    $this->db->where_in('SoldID' ,$condition['SoldID']);
                else
                    $this->db->where('SoldID' ,$condition['SoldID']);
            }
            
            return $this->db->get('AssetSold');
        }

        public function insert_sold_asset($data)             //array of data (1 row)
        {
                
                $query = $this->db->insert('AssetSold',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_sold_asset($AssetID) 
        {
               $query = $this->db->delete('AssetSold', array('AssetID' => $AssetID));
               if(!$query)
                {
                    $error1 = $this->db->error();
                    return FALSE;
                }

                return TRUE;

        }

        public function delete_sold_list($condition = NULL)
        {
            	if(!empty($condition['SoldID']))
                {
                    if(is_array($condition['SoldID']))
                        $this->db->where_in('SoldID' ,$condition['SoldID']);
                    else
                        $this->db->where('SoldID' ,$condition['SoldID']);
                }
                
                $query = $this->db->delete('AssetSold');

                if(!$query)
                {
                    $error2 = $this->db->error();
                    return FALSE;
                }

                return TRUE;
        }

         public function delete_all_sold_list()
        {
                $this->db->empty_table('AssetSold');

        }


        public function update_sold_asset($SoldID,$data)
        {
                
                $query = $this->db->update('AssetSold', $data, array('SoldID' => $SoldID));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>
