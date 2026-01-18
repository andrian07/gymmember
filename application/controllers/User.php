<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('global_model');
		$this->load->model('setting_model');
		$this->load->library('session');
		$this->load->helper(array('url', 'html'));
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
		/*if(isset($_SESSION['user_name'] ) != null || isset($_SESSION['user_branch'] ) != null){
			redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/dashboard');
			//$this->load->view('Pages/login');
		}*/

		$this->load->view('Pages/dashboard');
	}

	public function setting()
	{
		/*if(isset($_SESSION['user_name'] ) != null || isset($_SESSION['user_branch'] ) != null){
			redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/dashboard');
			//$this->load->view('Pages/login');
		}*/

		$this->load->view('Pages/User/setting');
	}


	public function absence()
	{
		$check_auth = $this->check_auth();
		if($check_auth == 0){
			redirect('Auth', 'refresh');
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				redirect('Auth', 'refresh');
			}else{
				$this->load->library('ciqrcode');
				$check_cokies = $this->check_cookies();
				$cookies['cookies'] = $check_cokies;
				$user_id  = $_SESSION['user_id'];
				$config['imagedir'] = './assets/qrcode/';
				$this->ciqrcode->initialize($config);

				$qr_name = 'Member_'.$user_id.'.png';
				if(!file_exists(FCPATH.'assets/qrcode/'.$qr_name)){
					$params['data']     = 'https://backoffice.ellunaindonesia.com/absencemember?id='.$user_id;
					$params['level']    = 'H';
					$params['size']     = 8;
					$params['savename'] = FCPATH.'assets/qrcode/'.$qr_name;
					$this->ciqrcode->generate($params);
				}

				$data_update = [
					'member_qr'  				=> $qr_name,
				];
				$this->setting_model->update_member($data_update, $user_id);

				$my_member['my_member'] = $this->setting_model->my_member($user_id)->result_array();
				$qr_image['qr_image'] = $qr_name;
				$data['data'] = array_merge($my_member, $cookies, $qr_image);
				$this->load->view('Pages/absence', $data);
			}
		}
	}

}

?>