<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacted_company extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ContactedCompany_model');
	}

	public function index()	{
		$this->search();
	}

	public function search(){
		try{
			$fieldData = array(
				'CompanyID'	=> $this->input->get('id'),
				'CompanyName'	=> $this->input->get('q')
			);
			$queryResult = $this->ContactedCompany_model->get_ContactedCompany($fieldData);
			if($queryResult){
				$result =  $queryResult->result_array();
				echo json_encode(array('data' => $result, '__sql' => $this->db->last_query(), '__data' => $fieldData));
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

	public function add(){
		try{
			$this->load->model('validationHelper');

			if ($this->validationHelper->validate_section('contactedCompany', 'add') == FALSE){
				$error = $this->validationHelper->errors;
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			$this->ContactedCompany_model->insert_ContactedCompany($this->input->post($this->validationHelper->fieldList));
			if($this->db->affected_rows() != 1){
				echo json_encode(array('error'	=> $this->db->error(), 'error_type' => 'db'));
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

	public function edit(){
		try{
			$this->load->model('validationHelper');

			if ($this->validationHelper->validate_section('contactedCompany', 'edit') == FALSE){
				$error = $this->validationHelper->errors;
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			$this->ContactedCompany_model->edit_ContactedCompany_by_id($this->input->post('CompanyID'), $this->input->post($this->validationHelper->fieldList));
			if($this->db->error()['code']){
				echo json_encode(array('error'	=> $this->db->error(), 'error_type' => 'db'));
			}else{
				echo json_encode(array('status' => 'success'));
			}
		}catch (Exception $e) {
			echo json_encode(array(
				'error' => array(
					'msg' => $e->getMessage(),
					'code' => $e->getCode(),
				),
				'error_type'	=> 'system'
			));
		}
	}

	public function delete(){
		try{
			$deleteID = $this->input->get('id');
			if(!is_numeric($deleteID)){
				echo json_encode(array(
					'error' => 'No required ID',
					'error_type'	=> 'form'
				));
			}

			$this->ContactedCompany_model->delete_ContactedCompany_by_id($deleteID);
			echo json_encode(array('status' => 'success'));
		}catch (Exception $e) {
			echo json_encode(array(
				'error' => array(
					'msg' => $e->getMessage(),
					'code' => $e->getCode(),
				),
				'error_type'	=> 'system'
			));
		}
	}
}
