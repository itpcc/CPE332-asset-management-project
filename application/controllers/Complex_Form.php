<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complex_Form extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Vendor_model');
		$this->load->model('Employee_model');
		$this->load->model('Asset_model');
		$this->load->model('ContactedCompany_model');
		$this->load->model('Client_model');
		$this->load->model('AssetSold_model');
		$this->load->model('AssetPurchase_model');
		$this->load->model('AssetLocation_model');
		$this->load->model('AssetLocationMovement_model');


	}

	public function buy(){
		try{
			$this->load->model('validationHelper');

			//die(var_dump($this->input->post($this->validationHelper->fieldList)));

			$this->Vendor_model->insert_vendor($this->input->post($this->validationHelper->fieldList));
			$this->Asset_model->insert_asset($this->input->post($this->validationHelper->fieldList));
			$this->AssetPurchase_model->insert_purchased_asset($this->input->post($this->validationHelper->fieldList));
			//if new company
			$this->contactedcompany_model->insert_contactedcompany($this->input->post($this->validationHelper->fieldList));
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

	public function sold()
	{
		try{
			$this->load->model('validationHelper');
			$deleteID = $this->input->post('asset_id');
			$quantity = $this->input->post('quantity');
			/*$data = array(
				'FirstName' => $this->input->post('FirstName'),
				'LastName' => $this->input->post('LastName'),
				'Address'  => $this->input->post('Address'),
				'PhoneNO'   => $this->input->post('PhoneNO'),
				'Email'   => $this->input->post('Email'),
				'CompanyID'  => $this->input->post('CompanyID'),
				'RoleID' => 3
				);
			*/
			//die(var_dump($this->input->post($this->validationHelper->fieldList)));
			//$data['RoleID'] = 3;			
			
			$this->Client_model->insert_client($this->input->post($this->validationHelper->fieldList));
			$this->AssetSold_model->insert_sold_asset($this->input->post($this->validationHelper->fieldList));
			//if new company
			$this->contactedcompany_model->insert_contactedcompany($this->input->post($this->validationHelper->fieldList));
			$query = $this->Asset_model->get_asset($deleteID);
			$row = $query->row_array();

			if($row['AssetNumber_Quantity'] > 1)
			{
				$this->Asset_model->update_asset_by_id($deleteID,array('AssetNumber_Quantity' => $row['AssetNumber_Quantity'] - $quantity));
			}
			else
				$this->Asset_model->delete_asset_by_id($deleteID);
			
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

	public function transfer_asset()
	{
		try{
			$this->load->model('validationHelper');

			//die(var_dump($this->input->post($this->validationHelper->fieldList)));

			$this->AssetLocationMovement_model->insert_movement($this->input->post($this->validationHelper->fieldList));
			$this->AssetLocation_model->update_location($this->input->post('LocationID'),$this->input->post($this->validationHelper->fieldList));
			$this->Asset_model->update_asset_by_id($this->input->post('AssetID'),$this->input->post($this->validationHelper->fieldList));
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

	public function add_client_vendor()
	{
		try{
			$this->load->model('validationHelper');

			//die(var_dump($this->input->post($this->validationHelper->fieldList)));

			$this->Vendor_model->insert_vendor($this->input->post($this->validationHelper->fieldList));
			$this->Client_model->insert_asset($this->input->post($this->validationHelper->fieldList));
			$this->ContactedCompany_model->insert_contactedcompany($this->input->post($this->validationHelper->fieldList));

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

}
