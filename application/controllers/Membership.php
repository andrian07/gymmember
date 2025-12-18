<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Membership extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->model('dashboard_model');
		$this->load->model('membership_model');
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
		if($check_auth == 0){
			redirect('Auth', 'refresh');
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				redirect('Auth', 'refresh');
			}else{
				$user_id  = $_SESSION['user_id'];
				$my_package['my_package'] = $this->membership_model->my_package()->result_array();
				$gym_package_member['gym_package_member'] = $this->membership_model->gym_package_member()->result_array();	
				$data['data']  = array_merge($gym_package_member, $my_package);
				$this->load->view('Pages/membership', $data);
			}
		}
	}


}

?>