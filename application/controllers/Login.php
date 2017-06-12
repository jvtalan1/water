<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {   

		parent::__construct();
	}

	public function index() {

		$this->load->helper(array('form'));
		$this->load->view('login_form');
	}

	public function signup() {
		$this->load->helper(array('form'));
		$this->load->view('registration_form');
	}

	public function invalid() {
		$this->load->view('modals/invalid_credentials');
	}

}
