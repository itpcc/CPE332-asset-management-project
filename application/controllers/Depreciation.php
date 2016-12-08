<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depreciation extends CI_Controller {
	private $sectionID = 'depreciation';
	private $sectionKey = 'DepreciationType';

	private $modelName = 'DepreciationKey_model';

	private $getMethod = 'get_key_detail';
	private $addMethod = 'insert_key';
	private $editMethod = 'update_key';
	private $deleteMethod = 'delete_key';

	function __construct(){
		parent::__construct();
		$this->load->model($this->modelName);
	}

	public function index()	{
		$this->search();
	}

	public function search(){
		try{
			$queryResult = $this->{$this->modelName}->{$this->getMethod}(array(
				$this->sectionKey	=> $this->input->get('id')
			));
			if($queryResult){
				echo json_encode(array('data' => $queryResult->result_array()));
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
			$error = array();
			if ($this->validationHelper->validate_section($this->sectionID, 'add') === FALSE){
				$error = $this->validationHelper->errors;
			}

			if(!empty($error)){
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			log_message('debug', "ADD Depreciation: ".json_encode($this->input->post($this->validationHelper->fieldList)));
			$fieldList = array($this->sectionKey => $this->input->post($this->sectionKey)) + $this->input->post($this->validationHelper->fieldList);

			if(!$this->{$this->modelName}->{$this->addMethod}(
				$fieldList
			)) {
				echo json_encode(array('error'	=> $this->db->error(), 'error_type' => 'db'));
			}else{
				echo json_encode(array('status' => 'success', '__sql' => $this->db->queries[0]));
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
			$queryResult = $this->db->where(array('DepreciationType'   => $this->input->post($this->sectionKey)))->get('depreciationkey');
            //var_dump($queryResult->num_rows());
            if(!$queryResult OR !$queryResult->num_rows()) {
            	$this->add();
            	return;
            }
			$this->load->model('validationHelper');

			if ($this->validationHelper->validate_section($this->sectionID, 'edit') == FALSE){
				$error = $this->validationHelper->errors;
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			$this->{$this->modelName}->{$this->editMethod}($this->input->post($this->sectionKey), $this->input->post($this->validationHelper->fieldList));
			if($this->db->error()['code']){
				echo json_encode(array('error'	=> $this->db->error(), 'error_type' => 'db'));
			}else{
				echo json_encode(array('status' => 'success', 'ID' => $this->input->post($this->sectionKey), '__sql' => $this->db->queries[0]));
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

			$this->{$this->modelName}->{$this->deleteMethod}($deleteID);
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
