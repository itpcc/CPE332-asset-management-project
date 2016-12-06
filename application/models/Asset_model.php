<?


class Asset_model extends CI_Model {

        public $asset_id;
        public $error;
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

        public function get_asset($condition = NULL)
        {
            if(!empty($condition['AssetID']))
            {
                if(is_array($condition['AssetID']))
                    $this->db->where_in('AssetID', $condition['AssetID']);
                else
                    $this->db->where('AssetID', $condition['AssetID']);
            }
            
            return $this->db->get('AssetMain');
        }

        public function insert_asset($data)             //array of data (1 row)
        {
                
                $query = $this->db->insert('AssetMain',$data);
                return ($query && $this->db->affected_rows() > 0);

        }

        public function delete_asset_by_id($asset_id) 
        {
                $query = $this->db->delete('AssetMain', array('AssetID' => $asset_id));
                if(!$query)
                {
                    $error = $this->db->error();
                    return FALSE;
                }

                return TRUE;
        }

        public function update_asset_by_id($asset_id,$data)
        {
                
                $query = $this->db->update('AssetMain', $data, array('AssetID' => $asset_id));
                return ($query && $this->db->affected_rows() > 0);

        }

}
?>