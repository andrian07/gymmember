<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Payment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->model('payment_model');
		$this->load->model('history_model');
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

    public function transferpage()
    {
        $check_auth = $this->check_auth();
		$id 		= $this->input->get('id');
		$category 	= $this->input->get('category');
        if($check_auth == 0){
            redirect(base_url() . 'Login');
        }else{
            $check_cokies = $this->check_cookies();
            if($check_cokies == 0){
                redirect(base_url() . 'Login');
            }else{
				$user_id 	 = $_SESSION['user_id'];
				$check_transaction_page = $this->payment_model->check_transaction_page($id, $user_id)->result_array();
				
				if($check_transaction_page == null){
					$this->load->view('Pages/404');
				}else{
					if($check_transaction_page[0]['member_id'] != $user_id){
						$this->load->view('Pages/404');
					}else{
						if($check_transaction_page[0]['transaction_payment_id'] != 0){
							redirect(base_url() . 'Payment/uploadpayment?id=' . $id, 'refresh');
						}else{
							$bank_info['bank_info'] = $this->payment_model->get_bank_info()->result_array();
							$transaction_detail['transaction_detail'] = $this->payment_model->transaction_detail($id, $category)->result_array();
							$data['data'] = array_merge($bank_info, $transaction_detail);
							if(empty($transaction_detail['transaction_detail'])){
								$this->load->view('Pages/404');
							}else{
								$this->load->view('Pages/paymentinfo', $data);
							}
						}
					}
				}
			}
        }
    }

	public function updatepaymenttype()
	{
		$check_auth = $this->check_auth();
        if($check_auth == 0){
            redirect(base_url() . 'Login');
        }else{
            $check_cokies = $this->check_cookies();
            if($check_cokies == 0){
                redirect(base_url() . 'Login');
            }else{
				$user_id = $_SESSION['user_id'];
				$transaction_id  = $this->input->post('id');
				$paymentType = $this->input->post('paymentType');
				if($paymentType == null || $transaction_id == null){
					$response = array(
						'code' => '0',
						'status' => 'error',
						'message' => 'Pilih Jenis Pembayaran',
						'csrf_name' => $this->csrf_name,
						'csrf_hash' => $this->csrf_hash
					);
					echo json_encode($response);
					die();
				}
				if($paymentType == 'cash'){
					$paymentType = '1';
				}else if($paymentType == 'transfer'){
					$paymentType = '2';
				}else{
					$response = array(
						'code' => '0',
						'status' => 'error',
						'message' => 'Credit card / E-Wallet belum tersedia',
						'csrf_name' => $this->csrf_name,
						'csrf_hash' => $this->csrf_hash
					);
					echo json_encode($response);
					die();
				}
				$data_update = array(
					'transaction_payment_id'	    => $paymentType
				);
				$updatepaymenttype = $this->payment_model->updatepaymenttype($data_update, $transaction_id);
				$response = array(
					'code' => '200',
					'status' => 'success',
					'message' => 'Successfully updated the payment type',
					'transaction_register_id' => $transaction_id,
					'csrf_name' => $this->csrf_name,
					'csrf_hash' => $this->csrf_hash
				);
				echo json_encode($response);
				die();
            }
		}
	}

	public function uploadpayment()
	{
		$check_auth = $this->check_auth();
        if($check_auth == 0){
            redirect(base_url() . 'Login');
        }else{
            $check_cokies = $this->check_cookies();
            if($check_cokies == 0){
                redirect(base_url() . 'Login');
            }else{
				$user_id = $_SESSION['user_id'];
				$id  = $this->input->get('id');
				$check_transaction_page = $this->payment_model->check_transaction_page($id, $user_id)->result_array();
				if($check_transaction_page[0]['member_id'] != $user_id){
					$this->load->view('Pages/404');
				}else{
					$transaction_detail['transaction_detail'] = $this->payment_model->transaction_detail($id)->result_array();
					$this->load->view('Pages/uploadpayment', $transaction_detail);
				}
			}
		}
	}

	public function uploadpaymentimage()
	{
		$check_auth = $this->check_auth();
		if($check_auth == 0){
			redirect(base_url() . 'Login');
		}else{
			$check_cokies = $this->check_cookies();
			if($check_cokies == 0){
				redirect(base_url() . 'Login');
			}else{
				$user_id = $_SESSION['user_id'];
				$transaction_id  = $this->input->post('transaction_id');
				$check_transaction_page = $this->payment_model->check_transaction_page($transaction_id, $user_id)->result_array();
				if($check_transaction_page[0]['member_id'] != $user_id){
						$response = array(
							'status' => 'error',
							'message' => 'Terjadi Kesalahan Silahkan Coba Lagi',
							'csrf_name' => $this->csrf_name,
							'csrf_hash' => $this->csrf_hash
						);
						echo json_encode($response);
						die();
				}else{
					$month = date('m');  // MM (01-12)
					$year = date('Y');   // YYYY
					$random = rand(100, 999);  // 3-digit random
					$new_image_name = $user_id . $month . $year . $random; 
					$config['upload_path']          = './assets/uploads/payment_proof/';
					$config['allowed_types']        = 'gif|jpg|jpeg|png';
					$config['max_size']             = 5120; // 5MB
					$config['file_name'] = $new_image_name;  // Set custom name (encrypt_name removed)
					$config['overwrite'] = FALSE;  // Prevent overwrite if file exists

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('image'))
					{
						$error = $this->upload->display_errors();
						$response = array(
							'status' => 'error',
							'message' => $error,
							'csrf_name' => $this->csrf_name,
							'csrf_hash' => $this->csrf_hash
						);
						echo json_encode($response);
						die();
					}
					else
					{
						$upload_data = $this->upload->data();
						$data_update = array(
							'transaction_image_proof'	    => $new_image_name . $upload_data['file_ext'],
						);
						$updatepaymenttype = $this->payment_model->updatepaymenttype($data_update, $transaction_id);

						$response = array(
							'status' => 'success',
							'message' => 'Image uploaded successfully',
							'file_name' => $upload_data['file_name'],
							'csrf_name' => $this->csrf_name,
							'csrf_hash' => $this->csrf_hash
						);
						echo json_encode($response);
						die();
					}
				}
			}
		}
	}

	public function success_upload_image()
	{
		$check_auth = $this->check_auth();
        $inv = $this->input->get('id');
        if($check_auth == 0){
            redirect(base_url() . 'Login');
        }else{
            $check_cokies = $this->check_cookies();
            if($check_cokies == 0){
                redirect(base_url() . 'Login');
            }else{
                $user_id 	        = $_SESSION['user_id'];
                $cookies['cookies'] = 1;
                $check_daily_transaction = $this->history_model->check_daily_transaction($user_id, $inv)->result_array();
                if($check_daily_transaction != null){
                    $get_history_by_id['get_history_by_id'] = $check_daily_transaction;
                }else{
                    $get_history_by_id['get_history_by_id'] = $this->history_model->get_history_by_id_and_user($user_id, $inv)->result_array();
                }
                $data['data'] = array_merge($get_history_by_id, $cookies);
                $this->load->view('Pages/successuploadimage', $data);
            }
        }
	}

}