<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

class Discovery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->model('dashboard_model');
		$this->load->model('discovery_model');
		$this->load->helper(array('url', 'html'));
		$this->csrf_name = $this->security->get_csrf_token_name();
		$this->csrf_hash = $this->security->get_csrf_hash();
	}

	private function check_auth()
	{
		if(isset($_SESSION['user_name']) == null){
			return 0;
		}else{
			return 1;
		}
	}

	private function check_cookies()
	{
		$user_id = $_SESSION['user_id'];
		$check_cookies = $this->global_model->check_cookies($user_id)->result_array();
		if($check_cookies == null){
			return 0;
		}else{
			$cookies_name = $_COOKIE['cookies_name'];
			if($check_cookies[0]['member_cookies'] != $cookies_name){
				return 0;
			}else{
				return 1;
			}
		}
	}
	public function index()
	{
		$check_auth = $this->check_auth();
		$coach_data['coach_data'] = $this->discovery_model->coach_data_pt()->result_array();
		$class_data['class_data'] = $this->discovery_model->class_data_detail_all()->result_array();
		if($check_auth == 0){
			$cookies['cookies'] = 0;
			$data['data'] = array_merge($coach_data, $class_data, $cookies);
			$this->load->view('Pages/discovery', $data);
		}else{
			$check_cokies = $this->check_cookies();
			$cookies['cookies'] = $check_cokies;
			$data['data'] = array_merge($coach_data, $class_data, $cookies);
			$this->load->view('Pages/discovery', $data);
		}
	}

	public function detailclass()
	{
		$check_auth = $this->check_auth();
		$class_id = $this->input->get('id');
		$header_class['header_class'] = $this->discovery_model->header_class($class_id)->result_array();
		$detail_class['detail_class'] = $this->discovery_model->detail_class($class_id)->result_array();
		$class_package['class_package'] = $this->discovery_model->class_package_by_id($class_id)->result_array();
		if($check_auth == 0){
			$cookies['cookies'] = 0;
			$data['data'] = array_merge($detail_class, $cookies, $header_class, $class_package);
			$this->load->view('Pages/detailclass', $data);
		}else{
			$check_cokies = $this->check_cookies();
			$cookies['cookies'] = $check_cokies;
			$data['data'] = array_merge($detail_class, $cookies, $header_class, $class_package);
			$this->load->view('Pages/detailclass', $data);
		}

	}

	public function get_package_price(){
		$package_id = $this->input->post('package_id');
		
		if($package_id == null){
			$response = [
				'code' => '0',
				'result' => 'Package ID is required',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);die();
		}

		$price = $this->discovery_model->get_package_price($package_id)->result_array();
		
		if($price){
			$response = [
				'code' => '200',
				'result' => $price[0]['package_price'],
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
		}else{
			$response = [
				'code' => '0',
				'result' => 'Package not found',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
		}
	}
	public function detailpt()
	{
		$check_auth = $this->check_auth();
		$class_id = $this->input->get('id');
		$pt_information['pt_information'] = $this->discovery_model->pt_information($class_id)->result_array();
		if($check_auth == 0){
			$cookies['cookies'] = 0;
			$data['data'] = array_merge($pt_information, $cookies);
			$this->load->view('Pages/detailpt', $data);
		}else{
			$check_cokies = $this->check_cookies();
			$cookies['cookies'] = $check_cokies;
			$data['data'] = array_merge($pt_information, $cookies);
			$this->load->view('Pages/detailpt', $data);
		}
	}

}