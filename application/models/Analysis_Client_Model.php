<?
class Analysis_Client_model extends CI_Model {

        /*
           
        */
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function MostBuy()//12.หา client ที่ซื้อของเรามาสุด จำนวน และมูลค่า 10 อันดับแรก
        {
        		return $this->db->select('cl.FirstName, cl.LastName, count(s.SoldID) as BoughtTime')
                        ->from('AssetSold as s')
                        ->join('Client as cl', 's.ClientID = cl.ClientID')
                        ->group_by('cl.ClientID')
                        ->order_by('cl.FirstName ASC, cl.LastName ASC')
                        ->limit(10)
                        ->get(); 

        }

        
}
?>
