<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Book extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('book_model');
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
		echo "Access Denied";die();
	}

	public function bookdailyclass()
	{
		$check_auth = $this->check_auth();
        if($check_auth == 0){
            $response = array(
                'code' => '0',
                'status' => 'error',
                'message' => 'Silahkan Register / login terlebih dahulu',
                'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
            );
            echo json_encode($response);
            die();
	    }else{
			$user_id = $_SESSION['user_id'];
            $class_id = $this->input->post('class_id');
			$schedule_class_id = $this->input->post('schedule_class_id');

			$check_register_today = $this->book_model->check_register_today($user_id, $class_id)->result_array();
			if($check_register_today != null){
				$response = array(
					'code' => '0',
					'status' => 'error',
					'message' => 'Anda sudah terdaftar pada kelas ini hari ini',
					'transaction_register_id' => $check_register_today[0]['transaction_register_id'],
					'csrf_name' => $this->csrf_name,
					'csrf_hash' => $this->csrf_hash
				);
				echo json_encode($response);
				die();
			}else{
				$get_price_by_class_id 	= $this->book_model->get_price_by_class_id($class_id)->result_array();
			$price = $get_price_by_class_id[0]['class_price_day'];
			$maxCode  = $this->book_model->last_book()->result_array();
			$inv_code = 'TRX/'.date("d/m/Y").'/';
			if ($maxCode == NULL) {
				$last_code_trx = $inv_code.'000001';
			} else {
				$maxCode   = $maxCode[0]['transaction_register_inv'];
				$last_code = substr($maxCode, -6);
				$last_code_trx = $inv_code.substr('000000' . strval(floatval($last_code) + 1), -6);
			}
			$data = array(
				'transaction_register_inv'	    => $last_code_trx,
				'transaction_register_date'		=> date('Y/m/d'),
				'member_id'	       				=> $user_id,
				'transaction_type_member'	   	=> 'Kelas Only',
				'transaction_class'	    		=> 'Y',
				'transaction_class_id'			=> $class_id,
				'transaction_class_price'		=> $price,
				'transaction_class_total_price'	=> $price,
				'transaction_payment_total'		=> $price,
				'transaction_payment_status'	=> 'Belum Lunas',
				'transaction_type'				=> 'Daily',
				'transaction_user_id'			=> 2
			);
            $book_class = $this->book_model->book_class($data);


			$data_daily = array(
				'transaction_register_id'	    => $book_class,
				'schedule_class_id'				=> $schedule_class_id
			);
            $book_daily_class = $this->book_model->book_daily_class($data_daily);
			
            if($book_class && $book_daily_class){
                $response = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Suksess Booking Kelas',
					'transaction_register_id' => $book_class,
                    'csrf_name' => $this->csrf_name,
                    'csrf_hash' => $this->csrf_hash
                );
            }else{
                $response = array(
                    'code' => '0',
                    'status' => 'error',
                    'message' => 'Gagal Booking Kelas',
                    'csrf_name' => $this->csrf_name,
                    'csrf_hash' => $this->csrf_hash
                );
            }
            echo json_encode($response);
            die();
			}
        }
    }


	public function bookmonthlyclass()
	{
		$check_auth = $this->check_auth();
        if($check_auth == 0){
            $response = array(
                'code' => '0',
                'status' => 'error',
                'message' => 'Silahkan Register / login terlebih dahulu',
                'csrf_name' => $this->csrf_name,
				'csrf_hash' => $this->csrf_hash
            );
            echo json_encode($response);
            die();
	    }else{
			$user_id = $_SESSION['user_id'];
            $class_package_id = $this->input->post('class_package_id');
			$class_start_date = $this->input->post('class_start_date');

			$check_register_today = $this->book_model->check_register_today($user_id, $class_package_id, $class_start_date)->result_array();
			$check_active_class = $this->book_model->check_active_class($user_id, $class_package_id, $class_start_date)->result_array();
			if($check_active_class != null){
				$response = array(
					'code' => '0',
					'status' => 'error',
					'message' => 'Paket Kelas ini masih aktif, silahkan pilih tanggal lain',
					'csrf_name' => $this->csrf_name,
					'csrf_hash' => $this->csrf_hash
				);
				echo json_encode($response);
				die();
			}else{
				$get_package_price 	= $this->discovery_model->get_package_price($class_package_id)->result_array();
				$price = $get_package_price[0]['package_price'];
				$maxCode  = $this->book_model->last_book()->result_array();
				$inv_code = 'TRX/'.date("d/m/Y").'/';
				if ($maxCode == NULL) {
					$last_code_trx = $inv_code.'000001';
				} else {
					$maxCode   = $maxCode[0]['transaction_register_inv'];
					$last_code = substr($maxCode, -6);
					$last_code_trx = $inv_code.substr('000000' . strval(floatval($last_code) + 1), -6);
				}
				$data = array(
					'transaction_register_inv'	    => $last_code_trx,
					'transaction_register_date'		=> date('Y/m/d'),
					'member_id'	       				=> $user_id,
					'transaction_type_member'	   	=> 'Member',
					'transaction_class'	    		=> 'Y',
					'transaction_class_month'		=> $class_package_id,
					'transaction_class_price'		=> $price,
					'transaction_class_total_price'	=> $price,
					'transaction_payment_total'		=> $price,
					'transaction_payment_status'	=> 'Belum Lunas',
					'transaction_type'				=> 'Member',
					'transaction_user_id'			=> 2
				);
				$book_class = $this->book_model->book_class($data);
				
				if($book_class){
					$response = array(
						'code' => '200',
						'status' => 'success',
						'message' => 'Berhasil Beli Paket Kelas',
						'transaction_register_id' => $book_class,
						'csrf_name' => $this->csrf_name,
						'csrf_hash' => $this->csrf_hash
					);
				}else{
					$response = array(
						'code' => '0',
						'status' => 'error',
						'message' => 'Gagal Booking Kelas',
						'csrf_name' => $this->csrf_name,
						'csrf_hash' => $this->csrf_hash
					);
				}
				echo json_encode($response);
				die();
			}
        }
    }
}