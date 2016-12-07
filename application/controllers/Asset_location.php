<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_location extends CI_Controller {
	private $sectionID = 'asset_location';
	private $sectionKey = 'LocationID';

	private $modelName = 'AssetLocation_model';

	private $getMethod = 'get_location_detail';
	private $addMethod = 'insert_location';
	private $editMethod = 'update_location';
	private $deleteMethod = 'delete_location';

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
				$this->sectionKey	=> $this->input->get('id'),
				'LocationName'		=> $this->input->get('q')
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

			if ($this->validationHelper->validate_section($this->sectionID, 'add') == FALSE){
				$error = $this->validationHelper->errors;
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			//die(var_dump($this->input->post($this->validationHelper->fieldList)));

			$this->{$this->modelName}->{$this->addMethod}($this->sectionID, $this->input->post($this->validationHelper->fieldList));
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

			if ($this->validationHelper->validate_section($this->sectionID, 'edit') == FALSE){
				$error = $this->validationHelper->errors;
				echo json_encode(array('error'	=> $error, 'error_type'	=> 'form'));
				return false;
			}

			$this->{$this->modelName}->{$this->editMethod}($this->input->post($this->sectionKey), $this->input->post($this->validationHelper->fieldList));
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
