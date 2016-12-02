<?


class Asset_model extends CI_Model {

        public $asset_id;
        /*public $AssetName;
        public $AssetNumber_Quantity;
        public $AssetClass;
        public $PurchaseDate;
        public $AcquisitionDate;
        public $CapitalCost;
        public $DepreciationType;
        public $UsefulLife;
        public $LocationID;
        public $LocationDepartment;
        public $EmployeeID;
        public $VendorID;
        public $Manufacturer;
        public $SalvageValue;
        public $DepreciationValue_perYear;
        public $DepreciationRatio;
        public $DepreciationArea;
        public $data;*/

        /*
        array of $data
        $asset_id = $this->input->post('AssetID');
        $AssetName = $this->input->post('AssetName');
        $AssetNumber_Quantity = $this->input->post('AssetNumber_Quantity');
        $AssetClass = $this->input->post('AssetClass');
        $PurchaseDate = $this->input->post('PurchaseDate');
        $AcquisitionDate = $this->input->post('AcquisitionDate');
        $CapitalCost = $this->input->post('CapitalCost');
        $DepreciationType = $this->input->post('DepreciationType');
        $UsefulLife = $this->input->post('UsefulLife');
        $LocationID = $this->input->post('LocationID');
        $LocationDepartment = $this->input->post('LocationDepartment');
        $EmployeeID = $this->input->post('EmployeeID');
        $VendorID = $this->input->post('VendorID');
        $Manufacturer = $this->input->post('Manufacturer');
        $SalvageValue = $this->input->post('SalvageValue');
        $DepreciationValue_perYear = $this->input->post('DepreciationValue_perYear');
        $DepreciationRatio = $this->input->post('DepreciationRatio');
        $DepreciationArea = $this->input->post('DepreciationArea');*/

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                //$this->load->database();
        }

        public function get_all_asset()
        {
                $query = $this->db->get('AssetMain');
                return $query->result();
        }

        public function get_asset_by_id($asset_id)
        {
                if($asset_id != FALSE) {
                    $this->db->where('AssetID',$asset_id);
                    $query = $this->db->get('AssetMain');
                    return $query->result();
                  }
                else {
                    return FALSE;
  }
        }

        public function insert_asset($data)             //array of data (1 row)
        {
                
                $this->db->insert('AssetMain',$data);

        }

        public function delete_asset_by_id($asset_id) 
        {
                $this->db->delete('AssetMain', array('AssetID' => $asset_id))

        }

        public function edit_asset_by_id($asset_id,$data)
        {
                
                $this->db->update('AssetMain', $data, array('AssetID' => $asset_id))

        }

}
?>