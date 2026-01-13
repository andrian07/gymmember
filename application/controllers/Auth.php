<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('auth_model');
		$this->load->model('global_model');
		$this->load->helper(array('url', 'html', 'cookie'));
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
			$this->load->view('Pages/login');
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				$this->load->view('Pages/login');
			}else{
				redirect('Dashboard', 'refresh');
			}
		}
	}

	public function login(){
		$username = $this->input->post('name');
		$password = md5($this->input->post('pass'));
		
		if($username == null){
			$response = [
				'code' => '0',
				'result' => 'Masukan No Telepon',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}

		if($password == null){
			$response = [
				'code' => '0',
				'result' => 'Masukan Password',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}

		$login = $this->auth_model->get_login_data($username, $password)->result_array();
		if($login != null){
			$user_name 		= $login[0]['member_name'];
			$user_id  		= $login[0]['member_id'];
			$date 			= date("Y-m-d H:i:s");

			$newdata = [
				'user_name'  	=> $user_name,
				'user_id' 		=> $user_id,
				'logged_in' 	=> TRUE,
			];
			$this->session->set_userdata($newdata);

			$cookies_val = md5($user_name.$date);

			$cookies_data = [
				'member_cookies'  	=> $cookies_val
			];
			$this->auth_model->update_cookies($cookies_data, $username);


			setcookie("cookies_name", $cookies_val, time() + (30 * 24 * 60 * 60), "/");

			$response = [
				'code' => '200',
				'result' => 'Succes Login',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else{
			$response = [
				'code' => '0',
				'result' => 'Username Atau Password Salah',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
			die();
		}	
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Auth', 'refresh');
	}

}

?>