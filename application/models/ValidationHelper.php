<?php
class ValidationHelper extends CI_Model {
	private $sectionDetail = array();
	public $validationHelper = array();
	public $fieldList;

	function __construct(){
		parent::__construct();
		$this->config->load('main_form');
	}

	private function _clearError(){
		$this->errors = array();
		$this->fieldList = array();
	}

	public function validate_section($sectionName, $type = 'add'){
		try{
			$this->_clearError();
			if(!isset($this->sectionDetail[$sectionName])){
				$this->sectionDetail[$sectionName] = $this->config->item($sectionName, 'section_detail');
				if(empty($this->sectionDetail[$sectionName])){
					unset($this->sectionDetail[$sectionName]);
					$this->errors['general'] = 'Section: '.$sectionName.' not exist';
					return false;
				}
			}

			if($type==='edit')
				$this->form_validation->set_rules($this->sectionDetail[$sectionName]['id_key'], $this->sectionDetail[$sectionName]['fields'][$this->sectionDetail[$sectionName]['id_key']]['name'], 'required');

			$this->errors['field'] = array();
			foreach ($this->sectionDetail[$sectionName]['fields'] as $fieldName => $fieldDetail) {
				switch ($type) {
					case 'add':
						if(!empty($fieldDetail['input']['required'])){
							if(empty($this->form_validation->required($fieldName))){
								$this->errors['field'][$fieldName] = 'Required!';
							}else{
								if(!empty($fieldDetail['validation'])){
									$this->form_validation->set_rules($fieldName, $fieldDetail['name'], $fieldDetail['validation']);
								}
								$this->fieldList[] = $fieldName;								
							}
						}
					break;
					case 'edit':
						if(
							$fieldName != $this->sectionDetail[$sectionName]['id_key'] && 
							!empty($this->input->post($fieldName))							
						){
							if(!empty($fieldDetail['validation']))
								$this->form_validation->set_rules($fieldName, $fieldDetail['name'], $fieldDetail['validation']);
							$this->fieldList[] = $fieldName;
						}
					break;				
					default:
						$this->errors['general'] = 'Type: '.$type.' not exist';
						return false;
					break;
				}
			}

			if(!empty($this->errors['field'])){
				return false;
			}else if($this->form_validation->run() === FALSE){
				$this->errors['field'] = $this->form_validation->error_array();
				if(!empty($this->errors['field']))
					return false;
				return true;
			}

			return true;	
		}catch(Exception $e) {
			$this->errors['system']	= $e;
			return false;
		}

		return false;
	}
}