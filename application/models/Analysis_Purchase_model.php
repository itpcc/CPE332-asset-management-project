 <?
class Analysis_Purchase_model extends CI_Model {

        /*
           
        */
        public $year;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function TotalByYear($year)// 11.นับยอดการซืเอรวมในแต่ละประเภท asset ใน .... year
        {
        		return $this->db->select('m.AssetClass, count(p.PurchaseID) as totalPurchaseItem')
                        ->from('AssetPurchase as p')
                        ->join('AssetMain as m', 'm.AssetID = p.AssetID')
                  		->where('p.PurchaseDate',$year)
                        ->group_by('m.AssetClass')
                        ->order_by('m.AssetClass ASC')
                        ->get(); 
        }

        
}
?>


  