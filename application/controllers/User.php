<?php

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user_model');
	}

	public function index() {
		$this->register();
	}

	public function register() {
		
		$this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		}
		else {
			$data = array(
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'email'=>$this->input->post('email'),
				'password'=>$this->hashpassword($this->input->post('password'))
			);

			if ($this->user_model->addUser($data)) {
				$this->session->set_flashdata('msg','<div class="success"><p>Success! You have been registered. Please login to continue.</p></div>');
				redirect('login');
			}
			else {
				$this->session->set_flashdata('msg','<div class="error"><p>Please try again later!</p></div>');
                redirect('login');
			}
		}
	}

	public function hashpassword($password) {
		return md5($password);
	}

}