<?php
class Analysis_Sold_model extends CI_Model {

    
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function BestSell_Car()//4. counting item sold of each Car (VC_CA) ’s manufacture (Find Best Seller Manufacture)
        {
                return $this->db->select('m.Manufacturer, count(s.SoldID) as TotalSoldNumber')
                            ->from('assetsold as s')
                            ->join('assetmain as m','s.AssetID = m.AssetID')
                            ->where('m.AssetClass','VC_CA')
                            ->group_by('m.Manufacturer')
                            ->order_by('TotalSoldNumber','DESC')
                            ->limit(10)
                            ->get();
        }

        public function BestSell_Computer() // 5. counting item sold of each Computer’s manufacture(Find Best Seller Manufacture)
        {
                return $this->db->select('m.Manufacturer, count(s.SoldID) as TotalSoldNumber')
                            ->from('assetsold as s')
                            ->join('assetmain as m','s.AssetID = m.AssetID')
                            ->where('m.AssetClass','EQ_PC')
                            ->group_by('m.Manufacturer')
                            ->order_by('TotalSoldNumber','DESC')
                            ->limit(10)
                            ->get();

        }

        public function BestSell_Asset($Idate)  //10.find best seller item after ... date to current
        {
                return $this->db->select('m.AssetName, count(s.SoldID) as SoldNumber')
                            ->from('assetsold as s')
                            ->join('assetmain as m','s.AssetID = m.AssetID')
                            ->where('s.SoldDate >=', $Idate)
                            ->group_by('m.AssetName')
                            ->order_by('SoldNumber DESC')
                            ->limit(10)
                            ->get();
        }

        public function ByClass() //6. counting item sold of each asset type
        {
            return $this->db->select('m.AssetClass, count(s.SoldID) as SoldNumber')
                            ->from('assetsold as s')
                            ->join('assetmain as m','s.AssetID = m.AssetID')
                            ->group_by('m.AssetClass')
                            ->order_by('m.AssetClass ASC')
                            ->get();
        }

        public function Monthly_Car($year)  //9.ยอดขายที่ขายรถได้ในแต่ละเดิอน of ... year
        {
            return $this->db->select("date('M') as 'SaleMonth', 'count(s.SoldID) as SoldNumber' ")
                            ->from('assetsold as s')
                            ->join('assetmain as m','s.AssetID = m.AssetID')
                            ->where('m.AssetClass','VC_CA')
                            ->where('YEAR(s.SoldDate)', $year)
                            ->group_by('MONTH(s.SoldDate)')
                            ->order_by('SaleMonth','ASC')
                            ->get();
        }
}