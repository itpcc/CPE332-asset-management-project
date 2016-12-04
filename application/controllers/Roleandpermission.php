<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleandpermission extends CI_Controller {

	private $sectionConfig;

	function __construct(){
		parent::__construct();
		$this->config->load('main_form'); 
		$this->sectionConfig = $this->config->item('section_detail', 'roleandpermission'); 
	}

	public function index()	{
		$this->search();
	}

	public function search(){
		if($searchID = $this->input->get('id'))
			$this->db->where($this->sectionConfig['id_key'], $searchID);
		else if($searchName = $this->input->get('q'))
			$this->db->like('RoleName', $searchName);
		
		$queryResult = $this->db->get('roleandpermission');
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
