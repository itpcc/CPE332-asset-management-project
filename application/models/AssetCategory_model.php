<?

class AssetCategory_model extends CI_Model {

        public $AssetClass;
        public $error;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_class($condition = NULL)
        {
            if(!empty($condition['AssetClass']))
            {
                if(is_array($condition['AssetClass']))
                    $this->db->where_in('AssetClass' ,$condition['AssetClass']);
                else
                    $this->db->where('AssetClass' ,$condition['AssetClass']);
            }
            
            return $this->db->get('AssetCategory');
        }

        public function insert_class($data)             
        {
                
                $query = $this->db->insert('AssetCategory',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_class($AssetClass) 
        {
                $query = $this->db->delete('AssetCategory', array('AssetClass' => $AssetClass));
                if(!$query)
                {
                    $error = $this->db->error();
                    return FALSE;
                }

                return TRUE;

        }

        public function delete_all_class()
        {
                $this->db->empty_table('AssetCategory');
        }

        public function update_class($AssetClass,$data)
        {
                
                $query = $this->db->update('AssetCategory', $data, array('AssetClass' => $AssetClass));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>
