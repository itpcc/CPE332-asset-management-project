<?
class Analysis_NumberAsset_model extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function CurrentTotalAsset_ofLocation_Type()  //1. total number of each type of asset in each location. Order by location ID and Asset Class.
        {
                return $this->db->select('m.LocationID, l.LocationName, m.AssetClass, count(m.AssetID) as NumberOfAsset')
                        ->from('AssetMain as m')
                        ->join('AssetLocation as l', 'l.LocationID = m.LocationID')
                        ->group_by('m.LocationID')
                        ->order_by('m.LocationID ASC, m.AssetClass ASC')
                        ->get();

        }

        public function AssetAllCompany() // 2. Report of counting item which is bought from same company (from max to min )  Order by companyName  
        {
                return $this->db->select('c.companyName, count(p.PurchaseID) as totalBoughtItem')
                        ->from('AssetPurchase as p')
                        ->join('Vendor as v', 'p.VendorID = v.VendorID')
                        ->join('ContactedCompany as c', 'v.CompanyID = c.CompanyID')
                        ->group_by('c.CompanyID')
                        ->order_by('c.CompanyName ASC')
                        ->get(); 
        }



        
}
?>
