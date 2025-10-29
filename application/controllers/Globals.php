<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Globals extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('api_model');
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
		$id  = $this->input->post('id');
		$get_class_price['get_class_price'] = $this->global_model->get_class_price($id)->result_array();
		$response = [
			'code' 		=> '200',
			'result'  	=> $get_class_price,
			'csrfName' 	=> $this->security->get_csrf_token_name(),
			'csrfHash'	=> $this->security->get_csrf_hash()
		];
		echo json_encode($response);
	}


	public function save_transaction()
	{

		$name 				= $this->input->post('name');
		$phone 				= $this->input->post('phone');
		$gender 			= $this->input->post('gender');
		$class_id 			= $this->input->post('class_id');
		$schedule_class_id 	= $this->input->post('schedule_class_id');
		$register_dates 	= $this->input->post('datepicker');
		$payment 			= $this->input->post('payment');

		$register_date 		= date("Y-m-d", strtotime($register_dates));

		$checkregisterdaily = $this->api_model->checkregisterdaily($phone, $schedule_class_id, $register_date)->result_array();
		if($checkregisterdaily != null){
			$response = [
				'code' 		=> '0',
				'result'  	=> 'Anda Sudah Terdaftar Di Tanggal',
				'csrfName' 	=> $this->security->get_csrf_token_name(),
				'csrfHash'	=> $this->security->get_csrf_hash()
			];
			echo json_encode($response);die();
		}

		$check_phone = $this->api_model->check_phone($phone)->result_array();
		if($check_phone == null){
			$maxCode = $this->api_model->last_member_code()->result_array();
			if ($maxCode == NULL) {
				$last_code = '000001';
			} else {
				$maxCode = $maxCode[0]['member_code'];
				$last_code = substr($maxCode, -6);
				$last_code = substr('00000' . strval(floatval($last_code) + 1), -6);
			}
			$data_insert = array(
				'member_code'	       		=> $last_code,
				'member_name'	       		=> $name,
				'member_phone'	   			=> $phone,
				'member_gender'	    		=> $gender,
				'member_category'			=> 'Daily'
			);
			$save_member = $this->api_model->save_member($data_insert);
			$member_id = $save_member;
		}else{
			$member_id = $check_phone[0]['member_id'];
			if($check_phone[0]['member_category'] == 'Month'){
				$response = [
					'code' 		=> '0',
					'result'  	=> 'Anda Sudah Terdaftar Sebagai Member Bulanan',
					'csrfName' 	=> $this->security->get_csrf_token_name(),
					'csrfHash'	=> $this->security->get_csrf_hash()
				];
				echo json_encode($response);die();
			}
		}

		$maxCodeTrx  = $this->api_model->last_register()->result_array();
		$inv_code = 'TRX/'.date("d/m/Y").'/';
		if ($maxCodeTrx == NULL) {
			$last_code_trx = $inv_code.'000001';
		} else {
			$maxCodeTrx = $maxCodeTrx[0]['transaction_register_inv'];
			$last_code_trx 	= substr($maxCodeTrx, -6);
			$last_code_trx 	= $inv_code.substr('000000' . strval(floatval($last_code_trx) + 1), -6);
		}

		$check_price = $this->api_model->check_price($class_id)->result_array();


		$data_insert_trx = array(
			'transaction_register_inv'	       		=> $last_code_trx,
			'transaction_register_date'	       		=> $register_date,
			'member_id'	   							=> $member_id,
			'transaction_type_member'	    		=> 'Kelas Only',
			'transaction_class'						=> 'Y',
			'transaction_class_id'	   				=> $class_id,
			'transaction_payment_id'	   			=> $payment,
			'transaction_class_price'				=> $check_price[0]['class_price'],
			'transaction_class_total_price'			=> $check_price[0]['class_price'],
			'transaction_payment_total'				=> $check_price[0]['class_price'],
			'transaction_user_id'					=> 2
		);
		$save_transaction_register = $this->api_model->save_transaction_register($data_insert_trx);

		$data_insert_daily = array(
			'transaction_register_id'	=> $save_transaction_register,
			'schedule_class_id'	       	=> $schedule_class_id
		);
		$this->api_model->save_transaction_register_daily($data_insert_daily);

		$response = [
			'code' 		=> '200',
			'result'  	=> $last_code_trx,
			'csrfName' 	=> $this->security->get_csrf_token_name(),
			'csrfHash'	=> $this->security->get_csrf_hash()
		];
		echo json_encode($response);die();
	}

	public function get_days()
	{
		$id  = $this->input->post('id');
		$get_days['get_days'] = $this->global_model->get_days($id)->result_array();
		$response = [
			'code' 		=> '200',
			'result'  	=> $get_days,
			'csrfName' 	=> $this->security->get_csrf_token_name(),
			'csrfHash'	=> $this->security->get_csrf_hash()
		];
		echo json_encode($response);
	}

}

?>