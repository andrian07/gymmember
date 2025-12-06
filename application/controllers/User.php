<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper(array('url', 'html'));
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
		/*if(isset($_SESSION['user_name'] ) != null || isset($_SESSION['user_branch'] ) != null){
			redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/dashboard');
			//$this->load->view('Pages/login');
		}*/

		$this->load->view('Pages/User/absence');
	}


}

?>