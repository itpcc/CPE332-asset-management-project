<?

class AssetLocationMovementMovement_model extends CI_Model {

        public $MovementNO;
        public $AssetID;
        public $error1;
        public $error2;
        
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_movement_detail_by_AssetID($condition = NULL)
        {
            if(!empty($condition['AssetID']))
            {
                if(is_array($condition['AssetID']))
                    $this->db->where_in('AssetID' ,$condition['AssetID']);
                else
                    $this->db->where('AssetID' ,$condition['AssetID']);
            }
            
            return $this->db->get('AssetLocationMovement');
        }

        public function get_movement_detail_by_MovementNO($condition = NULL)
        {
            if(!empty($condition['MovementNO']))
            {
                if(is_array($condition['MovementNO']))
                    $this->db->where_in('MovementNO' ,$condition['MovementNO']);
                else
                    $this->db->where('MovementNO' ,$condition['MovementNO']);
            }
            
            return $this->db->get('AssetLocationMovement');
        }

        public function insert_movement($data)             
        {
                
                $query = $this->db->insert('AssetLocationMovement',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_movement_asset($AssetID) 
        {
                $query = $this->db->delete('AssetLocationMovement', array('AssetID' => $AssetID));
                 if(!$query)
                {
                    $error1 = $this->db->error();
                    return FALSE;
                }

                return TRUE;

        }

        public function delete_movement_list($MovementNO)
        {
                $query = $this->db->delete('AssetLocationMovement', array('MovementNO' => $MovementNO));
                 if(!$query)
                {
                    $error2 = $this->db->error();
                    return FALSE;
                }

                return TRUE;
        }

        public function delete_all_movement()
        {
                $this->db->empty_table('AssetLocationMovement');
        }

        public function update_movement($MovementNO,$data)
        {
                
                $query = $this->db->update('AssetLocationMovement', $data, array('MovementNO' => $MovementNO));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>
