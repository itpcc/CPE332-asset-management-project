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
		if($searchID = $this->input->get('id'))
			$this->db->where('CompanyID', $searchID);
		else if($searchCompany = $this->input->get('q'))
			$this->db->like('CompanyName', $searchCompany);
		
		$queryResult = $this->db->get('contactedcompany');
		if($queryResult){
			echo json_encode(array('data' => $queryResult->result_array()));
		}
	}

	function add(){
		try{
			$error = array();
			$data = array();
			$this->config->load('main_form'); 
			$sectionDetails = $this->config->item('section_detail');
			foreach($sectionDetails['vendor']['fields'] AS $fieldName => $fieldDetail){
				$data[$fieldName] = $this->input->post($fieldName);
				if(!empty($fieldDetail['input']['required'])){
					if(empty($data[$fieldName]))
						$error[$fieldName] = 'Required!';
					else if(!empty($fieldDetail['validation']))
						$this->form_validation->set_rules($fieldName, $fieldDetail['name'], $fieldDetail['validation']);
				}
			}

			if ($this->form_validation->run() == FALSE){
				$error += $this->form_validation->error_array();
			}

			if(!empty($error)){
				echo json_encode(array('error'	=> $error));
				return false;
			}

			$this->db->insert('vendor', $data);
			if($this->db->affected_rows() != 1){
				echo json_encode(array('error'	=> $this->db->_error_message(), 'error_type' => 'db'));
			}else{
				echo json_encode(array('status' => 'success'));
			}
		}catch (Exception $e) {
			echo json_encode(array(
				'error' => array(
					'msg' => $e->getMessage(),
					'code' => $e->getCode(),
				)
			));
		}

	}
}
