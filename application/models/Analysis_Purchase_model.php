<?php
class Analysis_Purchase_model extends CI_Model {
        public $year;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function TotalByYear($year)// 11.犧吭ｸｱ犧壟ｸ｢犧ｭ犧扉ｸ≒ｸｲ犧｣犧金ｸｷ犹犧ｭ犧｣犧ｧ犧｡犹・ｸ吭ｹ≒ｸ歩ｹ謂ｸ･犧ｰ犧巵ｸ｣犧ｰ犹犧犧・asset 犹・ｸ・.... year
        {
        		return $this->db->select('m.AssetClass, count(p.PurchaseID) as totalPurchaseItem')
                        ->from('assetpurchase as p')
                        ->join('assetmain as m', 'm.AssetID = p.AssetID')
                  		->where('year(p.PurchaseDate)',$year)
                        ->group_by('m.AssetClass')
                        ->order_by('m.AssetClass ASC')
                        ->get(); 
        }

        
}