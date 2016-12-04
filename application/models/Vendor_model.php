<?php
class Vendor_model extends CI_Model {
	public $Vendor_id;
		public $data;
		public $condition;
	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
		//$this->load->database();
	}
	public function get_vendor($condition = NULL){
		if(!empty($condition['VendorID'])){
			if(is_array($condition['VendorID']))
				$this->db->or_where_in('VendorID', $condition['VendorID']);
			else
				$this->db->or_where('VendorID',$condition['VendorID']);
		}
		if(!empty($condition['FirstName'])){
			$this->db->or_like('FirstName', $condition['FirstName']);
		}
		if(!empty($condition['LastName'])){
			$this->db->or_like('FirstName', $condition['LastName']);
		}
		return $this->db->get('vendor');
	}
	public function insert_vendor($data)             //array of data (1 row)
	{
		$this->db->insert('vendor',$data);
	}
	public function delete_vendor_by_id($Vendor_id) 
	{
		$this->db->delete('vendor', array('VendorID' => $Vendor_id));
	}
	public function edit_vendor_by_id($Vendor_id,$data){
		//var_dump($Vendor_id, $data);
		$this->db->update('vendor', $data, array('VendorID' => $Vendor_id));
	}
}

// in model, no need to close tag to make sure no exceed unwanted space going out from SV