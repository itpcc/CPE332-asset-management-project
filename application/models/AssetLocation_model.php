<?

class AssetLocation_model extends CI_Model {

        public $LocationID;
        public $error;
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_location_detail($condition = NULL)
        {
            if(!empty($condition['LocationID']))
            {
                if(is_array($condition['LocationID']))
                    $this->db->where_in('LocationID' ,$condition['LocationID']);
                else
                    $this->db->where('LocationID' ,$condition['LocationID']);
            }
            
            return $this->db->get('AssetLocation');
        }

        public function insert_location($data)             
        {
                
                $query = $this->db->insert('AssetLocation',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_location($LocationID) 
        {
                $query = $this->db->delete('AssetLocation', array('LocationID' => $LocationID));
                if(!$query)
                {
                    $error = $this->db->error();
                    return FALSE;
                }

                return TRUE;


        }

        public function delete_all_location()
        {
                $this->db->empty_table('AssetLocation');
        }

        public function update_location($LocationID,$data)
        {
                
                $query = $this->db->update('AssetLocation', $data, array('LocationID' => $LocationID));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>
