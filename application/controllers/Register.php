<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('auth_model');
		$this->load->model('global_model');
		$this->load->model('register_model');
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
		$check_auth = $this->check_auth();
		if($check_auth == 0){
			$this->load->view('Pages/register');
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				$this->load->view('Pages/register');
			}else{
				redirect('Dashboard', 'refresh');
			}
		}
	}

	public function register_member()
	{

		$name 			= $this->input->post('name');
		$phone 			= $this->input->post('phone');
		$email 			= $this->input->post('email');
		$dob 			= $this->input->post('dob');
		$gender 		= $this->input->post('gender');
		$pass 			= $this->input->post('pass');
		$cfpass 		= $this->input->post('cfpass');
		$referal_code 	= $this->input->post('referal_code');
		$signature 		= $this->input->post('signature');
		$csrf_name    	= $this->security->get_csrf_token_name();
		$csrf_hash    	= $this->security->get_csrf_hash();
		$token_name 	= $this->security->get_csrf_token_name();

		if($pass != $cfpass){
			$response = [
				'code' => '0',
				'result' => 'Password Tidak Sama',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}
		if($name == null){
			$response = [
				'code' => '0',
				'result' => 'Nama Harus Di Isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}
		if($phone == null){
			$response = [
				'code' => '0',
				'result' => 'No HP Harus Di Isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}
		if($email == null){
			$response = [
				'code' => '200',
				'result' => 'Email Harus Di Isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}
		if($gender == null){
			$response = [
				'code' => '0',
				'result' => 'Jenis Kelamin Harus Di Isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}
		if($pass == null){
			$response = [
				'code' => '0',
				'result' => 'Password Harus Di Isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}

		$check_phone_number = $this->register_model->check_phone_number($phone)->result_array();
		if($check_phone_number != null){
			$response = [
				'code' => '0',
				'result' => 'No HP Sudah Terdaftar',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}

		$check_email = $this->register_model->check_email($email)->result_array();
		if($check_phone_number != null){
			$response = [
				'code' => '0',
				'result' => 'Alamat Email Sudah Terdaftar',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}

		if (!$signature) {
			$response = [
				'code' => '0',
				'result' => 'Tanda Tangan Harus Di isi',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>0, 'result'=>$response]);die();
		}else{
			$signature = str_replace('data:image/png;base64,', '', $signature);
			$signature = str_replace(' ', '+', $signature);

			$image = base64_decode($signature);
			$new_image_name = 'ttd_'.$name.'.png';

			$path = FCPATH . 'assets/img/ttd/' . $new_image_name;
			if (file_put_contents($path, $image)) {
				echo json_encode([
					'status' => true,
					'file' => $new_image_name
				]);
			}

			$maxCode = $this->register_model->last_member_code()->result_array();
			if ($maxCode == NULL) {
				$last_code = '000001';
			} else {
				$maxCode = $maxCode[0]['member_code'];
				$last_code = substr($maxCode, -6);
				$last_code = substr('00000' . strval(floatval($last_code) + 1), -6);
			}

			$insert = array(
				'member_code'	       => $last_code,
				'member_name'	       => $name,
				'member_phone'	       => $phone,
				'member_email'	       => $email,
				'member_gender'	       => $gender,
				'member_dob'	       => $dob,
				'member_referal'	   => $referal_code,
				'member_pass'	       => md5($pass),
				'member_signature'	   => $new_image_name,
			);
			$this->register_model->save_member($insert);
			$response = [
				'code' => '200',
				'result' => 'Pendaftaran Berhasil',
				'csrf_name' => $csrf_name,
				'csrf_hash' => $csrf_hash
			];
			echo json_encode(['code'=>200, 'result'=>$response]);die();
		}	
	}

	public function forgetpass()
	{
		if(isset($_SESSION['user_name']) != null){
			$this->load->view('Pages/forgetpass');
			//redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/forgetpass');
		}
	}

	public function successregister()
	{
		$id = $this->input->get('id');
		$get_transaction['get_transaction'] = $this->global_model->get_transaction($id)->result_array();
		$this->load->view('Pages/Register/succesregister', $get_transaction);
	}

}

?>