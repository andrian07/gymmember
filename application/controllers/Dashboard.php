<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->model('dashboard_model');
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
		$banner_data['banner_data'] = $this->dashboard_model->banner_data()->result_array();
		$class_data['class_data'] = $this->dashboard_model->class_data()->result_array();
		$pt_data['pt_data'] = $this->dashboard_model->pt_data()->result_array();
		$today_class_data['today_class_data'] = $this->dashboard_model->today_class_data()->result_array();
		$cookies['cookies'] = 0;
		if($check_auth == 0){
			$data['data']  = array_merge($banner_data, $class_data, $pt_data, $today_class_data, $cookies);
			$this->load->view('Pages/dashboard', $data);
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				$data['data']  = array_merge($banner_data, $class_data, $pt_data, $today_class_data, $cookies);
				$this->load->view('Pages/dashboard', $data);
			}else{
				$user_id  = $_SESSION['user_id'];
				$cookies['cookies'] = 1;
				$dasboard_history['dasboard_history'] = $this->dashboard_model->dasboard_history($user_id)->result_array();
				$my_data['my_data'] = $this->dashboard_model->my_data($user_id)->result_array();
				$data['data']  = array_merge($banner_data, $class_data, $pt_data, $today_class_data, $my_data, $cookies, $dasboard_history);
				$this->load->view('Pages/dashboard', $data);
			}
		}
	}


}

?>