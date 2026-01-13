<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->model('dashboard_model');
		$this->load->model('membership_model');
		$this->load->model('setting_model');
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
				$check_cokies = $this->check_cookies();
				$cookies['cookies'] = $check_cokies;
				$user_id  = $_SESSION['user_id'];
				$my_member['my_member'] = $this->setting_model->my_member($user_id)->result_array();
				$data['data'] = array_merge($my_member, $cookies);
				$this->load->view('Pages/setting', $data);
			}
		}
	}

	public function update_data()
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
				$my_member['my_member'] = $this->setting_model->my_member($user_id)->result_array();
				$this->load->view('Pages/update_data', $my_member);
			}
		}
	}

	public function save_update()
	{

		$user_id 		= $_SESSION['user_id'];
		$name 			= $this->input->post('name');
		$phone 			= $this->input->post('phone');
		$email 			= $this->input->post('email');
		$address 		= $this->input->post('address');
		$gender 		= $this->input->post('gender');
		$nik 			= $this->input->post('nik');
		$dob 			= $this->input->post('dob');
		$urgent_name 	= $this->input->post('urgent_name');
		$urgent_phone 	= $this->input->post('urgent_phone');
		$relation 		= $this->input->post('relation');
		$desc 			= $this->input->post('desc');

		if(!$name){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Nama Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$phone){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi No HP Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$email){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Email Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$address){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Alamat Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$nik){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi NIK Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$nik){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi NIK Anda',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else{
			$data_update = [
				'member_name'  				=> $name,
				'member_phone'  			=> $phone,
				'member_email'				=> $email,
				'member_address'			=> $address,
				'member_gender'				=> $gender,
				'member_nik'				=> $nik,
				'member_dob'				=> $dob,
				'member_urgent_name'		=> $urgent_name,
				'member_urgent_phone'		=> $urgent_phone,
				'member_urgent_sibiling'	=> $relation,
				'member_desc'				=> $desc,

			];
			$this->setting_model->update_member($data_update, $user_id);

			$response = [
				'code' => '200',
				'result' => 'Succes Login',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}
	}

	public function parq()
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
				$my_member['my_member'] = $this->setting_model->my_member($user_id)->result_array();
				$this->load->view('Pages/updateparq', $my_member);
			}
		}
	}

	public function update_parq()
	{

		$user_id 		= $_SESSION['user_id'];
		$q1 			= $this->input->post('q1');
		$q2 			= $this->input->post('q2');
		$q3 			= $this->input->post('q3');
		$q4 			= $this->input->post('q4');
		$q5 			= $this->input->post('q5');
		$q6 			= $this->input->post('q6');

		if(!$q1){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 1',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$q2){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 2',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$q3){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 3',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$q4){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 4',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$q5){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 5',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if(!$q6){
			$response = [
				'code' => '0',
				'result' => 'Silahkan Isi Pertanyaan No 1',
				'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
			];
			echo json_encode($response);
			die();
		}else if($q1 == 'Y' || $q2 == 'Y' || $q3 == 'Y' || $q4 == 'Y' || $q5 == 'Y' || $q6 == 'Y'){
				$response = [
					'code' => '0',
					'result' => 'Jika Anda menjawab "ya" untuk satu atau lebih pertanyaan di atas, konsultasikan dengan dokter Anda sebelum melakukan aktivitas fisik. Beri tahu dokter Anda pertanyaan mana yang Anda jawab "Ya". Setelah evaluasi medis, mintalah saran dari dokter Anda tentang jenis aktivitas yang sesuai dengan kondisi Anda saat ini.',
					'csrf_name' => $this->csrf_name,
					'csrf_hash' => $this->csrf_hash
				];
				echo json_encode($response);
				die();
			}else{
				$data_update = [
					'member_id'  => $user_id,
					'parq_q1'  	 => $q1,
					'parq_q2'	 => $q2,
					'parq_q3'	 => $q3,
					'parq_q4'	 => $q4,
					'parq_q5'	 => $q5,
					'parq_q6'	 => $q6,

				];

				$check_parq = $this->setting_model->check_parq($user_id)->result_array();
				if($check_parq == null){
					$this->setting_model->insert_parq($data_update);
				}else{
					$this->setting_model->update_parq($data_update, $user_id);
				}
				
				$this->setting_model->update_process_input($user_id);
				
				$response = [
					'code' => '200',
					'result' => 'Succes',
					'csrf_name' => $this->csrf_name,
					'csrf_hash' => $this->csrf_hash
				];
				echo json_encode($response);
				die();
			}
		}


	}

	?>