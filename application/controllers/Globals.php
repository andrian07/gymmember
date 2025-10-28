<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Globals extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('auth_model');
		$this->load->model('global_model');
		$this->load->helper(array('url', 'html'));
	}

	public function index()
	{
		echo 'Global';die();
	}

	public function get_class_list()
	{
		$get_class_list['get_class_list'] = $this->global_model->get_class_list()->result_array();
		$response = [
			'code' 		=> '200',
			'result'  	=> $get_class_list,
			'csrfName' 	=> $this->security->get_csrf_token_name(),
			'csrfHash'	=> $this->security->get_csrf_hash()
		];
		echo json_encode($response);
	}

	public function get_class_price()
	{
		$id = $this->input->post('id');
		$get_class_price['get_class_price'] = $this->global_model->get_class_price($id)->result_array();
		$response = [
			'code' 		=> '200',
			'result'  	=> $get_class_price,
			'csrfName' 	=> $this->security->get_csrf_token_name(),
			'csrfHash'	=> $this->security->get_csrf_hash()
		];
		echo json_encode($response);
	}
}

?>