<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {
	public function index()	{
		$this->search();
	}

	public function search(){
		$queryResult = $this->db->get('vendor');
		if($queryResult){
			echo json_encode(array('data' => $queryResult->result_array()));
		}
	}

	public function dummy_company(){
		if($searchCompany = $this->input->get('q'))
			$this->db->like('CompanyName', $searchCompany);
		
		$queryResult = $this->db->get('contactedcompany');
		if($queryResult){
			echo json_encode(array('data' => $queryResult->result_array()));
		}
	}
}
