<?php
class ContactedCompany_model extends CI_Model {
	public $ContactedCompany_id;
	public $data;
	public $condition;
	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
			//$this->load->database();
	}
	public function get_ContactedCompany($condition = NULL)
	{
		if(!empty($condition['CompanyID'])){
			if(is_array($condition['CompanyID']))
				$this->db->where_in('CompanyID', $condition['CompanyID']);
			else
				$this->db->where('CompanyID',$condition['CompanyID']);
		}
		if(!empty($condition['CompanyName']))
		{
			if(is_array($condition['CompanyName']))
				$this->db->or_where_in('CompanyName', $condition['CompanyName']);
			else
				$this->db->or_where('CompanyName',$condition['CompanyName']);
		}
		return $this->db->get('contactedcompany');
	}
	public function insert_ContactedCompany($data)             //array of data (1 row)
	{
		$this->db->insert('contactedcompany',$data);
	}
	public function delete_ContactedCompany_by_id($ContactedCompany_id) 
	{
			$this->db->delete('contactedcompany', array('CompanyID' => $ContactedCompany_id));
	}
	public function edit_ContactedCompany_by_id($ContactedCompany_id,$data)
	{
		$this->db->update('contactedcompany', $data, array('CompanyID' => $ContactedCompany_id));
	}
}