<?php
class Analysis_Client_model extends CI_Model {

  

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function MostBuy()//12.หา client ที่ซื้อขอกE��รามาสุกEจำนวกEและมูลกE��า 10 อันดับแรกE
        {
        		return $this->db->select('c.FirstName, c.LastName, count(s.SoldID) as BoughtTime')
                        ->from('assetsold as s')
                        ->join('client as c', 's.ClientID = c.ClientID')
                        ->group_by('c.ClientID')
                        ->order_by('BoughtTime','DESC')
                        ->limit(10)
                        ->get(); 

        }

        
}