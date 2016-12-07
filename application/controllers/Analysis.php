<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Analysis extends CI_Controller {

		private $analyticsConfig;

		function __construct(){
			parent::__construct();
			$this->config->load('analysis_table'); 
			$this->analysisConfig = $this->config->item('analysis_table'); 
		}

		public function index(){
			echo json_encode(array(
				'error'	=> 'no analytics applied',
				'error_type'	=> 'general'
			));
		}

		public function get($type){
			try {
				if(!isset($this->analysisConfig[$type])){
					echo json_encode(array(
						'error'	=> sprintf('no analytics name: %s applied', $type),
						'error_type'	=> 'general'
					));
					return;
				}

				if(empty($this->analysisConfig[$type]['model']) OR empty($this->analysisConfig[$type]['method'])){
					echo json_encode(array(
						'error'	=> sprintf('analytics name: %s has no method', $type),
						'error_type'	=> 'general'
					));
					return;
				}

				$this->load->model($this->analysisConfig[$type]['model'], 'analytic_model');

				if(isset($this->analysisConfig[$type]['argument'])){
					$isCorrect = false;
					$argument = $this->input->get('arg');
					switch($this->analysisConfig[$type]['argument'][0]['validate']){
						case 'valid_date': 
							$isCorrect = preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$argument);
						break;
						case 'decimal': 
							$isCorrect = is_numeric($argument);
						break;
					}

					if(!$isCorrect){
						echo json_encode(array(
							'error'	=> sprintf('Argument incorrect (expected argument type: %s)', $this->analysisConfig[$type]['argument'][0]['validate']),
							'error_type'	=> 'general'
						));
						return;
					}
					$queryResult = $this->analytic_model->{$this->analysisConfig[$type]['method']}($argument);
				}else{
					$queryResult = $this->analytic_model->{$this->analysisConfig[$type]['method']}();
				}

				echo json_encode(array(
					'data'	=> $queryResult->result_array()
				));

			} catch (Exception $e) {
				echo json_encode(array(
					'error'	=> $e->getMessage(),
					'error_type'	=> 'system'
				));
				return;
			}
			
		}
	}