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
		$this->load->helper(array('url', 'html'));
	}

	public function index()
	{

		/*
		if(isset($_SESSION['user_name']) != null){
			$this->load->view('Pages/register');
			//redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/register');
		}*/
		$this->load->view('Pages/Register/registerdaily');
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