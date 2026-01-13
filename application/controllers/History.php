<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class History extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('history_model');
        $this->load->model('global_model');
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
		$id = $this->input->get('id');
        if($check_auth == 0){
            redirect(base_url() . 'Login');
        }else{
            $check_cokies = $this->check_cookies();
            if($check_cokies == 0){
                redirect(base_url() . 'Login');
            }else{
                $user_id 	        = $_SESSION['user_id'];
                $cookies['cookies'] = 1;
                $limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 6;
                $offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;
                $get_history['get_history'] = $this->history_model->get_history($user_id, $limit, $offset)->result_array();
                $data['data'] = array_merge($get_history, $cookies);
                $this->load->view('Pages/history', $data);
            }
        }
	}

	public function load_more()
	{
		$check_auth = $this->check_auth();
		if($check_auth == 0){
			echo json_encode(['error' => 'Unauthorized']);
			return;
		}
		$check_cokies = $this->check_cookies();
		if($check_cokies == 0){
			echo json_encode(['error' => 'Unauthorized']);
			return;
		}
		$user_id = $_SESSION['user_id'];
		$limit = (int)$this->input->get('limit');
		$offset = (int)$this->input->get('offset');
		$history = $this->history_model->get_history($user_id, $limit, $offset)->result_array();
		echo json_encode($history);
	}

    public function transaction_detail()
    {
        $check_auth = $this->check_auth();
        $inv = $this->input->get('inv');
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
                $this->load->view('Pages/historydetail', $data);
            }
        }
    }

}