<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model', '', TRUE);
	}

	public function index() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_message('required', 'Please input your email address and/or password.');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('login_form');
		}
		else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
			if($this->form_validation->run() == FALSE) {
				$this->load->view('login_form');
				
			}
			else {
				redirect('water', 'refresh');
			}
		}
		
	}

	public function check_database($password) {
		
		$email = $this->input->post('email');
		$result = $this->user_model->login($email, $password);
		
		if ($result) {

			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'uid'=>$row->uid,
					'first_name'=>$row->first_name,
					'email'=>$row->email
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_database', 'Your password doesn\'t match with the email you provided.');
			return FALSE;
		}
	}

	public function logout() {

		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
}
?>