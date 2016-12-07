<?php

class DepreciationKey_model extends CI_Model {

        public $DepreciationType;
        public $error;
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_key_detail($condition = NULL)
        {
            if(!empty($condition['DepreciatoinType']))
            {
                if(is_array($condition['DepreciationType']))
                    $this->db->where_in('DepreciationType' ,$condition['DepreciationType']);
                else
                    $this->db->where('DepreciationType' ,$condition['DepreciationType']);
            }
            
            return $this->db->get('depreciationkey');
        }

        public function insert_key($data)             
        {
                
                $query = $this->db->insert('depreciationkey',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_key($DepreciationType) 
        {
                $query = $this->db->delete('depreciationkey', array('DepreciationType' => $DepreciationType));
                if(!$query)
                {
                    $error = $this->db->error();
                    return FALSE;
                }
                return TRUE;

        }

        public function delete_all_key()
        {
                $query = $this->db->empty_table('depreciationkey');
                if(!$query)
                {
                    $error = $this->db->error();
                    return FALSE;
                }
                return TRUE;
        }

        public function update_key($DepreciationType,$data)
        {
                
                $query = $this->db->update('depreciationkey', $data, array('DepreciationType' => $DepreciationType));
                return ($query && $this->db->affected_rows() > 0);
        }

}