<?
class Employee_Analysis_model extends CI_Model {

          
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function Purchase_PIC() //3. Counting of Employee who manage assetPurchase (PIC = person in charge)
        {
                return $this->db->select('e.FirstName, e.LastName, count(p.PurchaseID) as PurchaseInChargeNumber')
                        ->from('AssetPurchase as p')
                        ->join('Employee as e', 'e.EmployeeID = p.EmployeeID')
                        ->group_by('p.EmployeeID')
                        ->order_by('e.FirstName ASC, e.LastName ASC')
                        ->get();

        }

        public function VehicleSold_PIC() //7.หา Employee ที่ ขาย vehicle ได้มากสุด (10 order)
        {
                return $this->db->select('e.FirstName, e.LastName, count(s.SoldID) as SoldNumber')
                            ->from('AssetSold as s')
                            ->join('Employee as e', 'e.EmployeeID = s.EmployeeID')
                            ->like('s.AssetID', 'VC', 'after')
                            ->group_by('s.EmployeeID')
                            ->order_by('SoldNumber','DESC')
                            ->limit(10)
                            ->get();
        }

         public function MaxBuildingSold_PIC() // 8.Employee ขาออสังหาได้มากสุด
        {
                return $this->db->select('e.FirstName, e.LastName, count(s.SoldID) as SoldNumber')
                            ->from('AssetSold as s')
                            ->join('Employee as e', 'e.EmployeeID = s.EmployeeID')
                            ->group_by('s.EmployeeID')
                            ->order_by('SoldNumber','DESC')
                            ->limit(1)
                            ->get();
        }

        
}
?>
