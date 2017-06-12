<?php defined('BASEPATH') OR exit('No direct script access allowed');

//session_start();

class Water extends CI_Controller {

	public function __construct() {   

		parent::__construct();
		$this->load->database();
		$this->load->model('product_model');
		$this->load->model('user_model');
		$this->load->model('cart_model');
	}

	public function index()	{

		if($this->session->userdata('logged_in')) {
			
			$user_data = $this->session->userdata('logged_in');
			//$cart_data = $this->cart_model->retrieveData($user_data);
			//$summary = $user_data + $cart_data;
			//$this->retrieveData($cart_data);
			$this->products($user_data);
		}
		else {
			redirect('login', 'refresh');
		}
	}

	public function products($user_data) {

		$this->load->helper('url');
		$list = $this->product_model->list_type();
		$data = array('list'=>$list->result());
		$all = $data + $user_data;
		$this->load->view('products', $all);
	}

	public function brands() {
		
		$tid = $this->input->post('tid');
		//$this->load->model('product_model');
		$query = $this->product_model->brands($tid);
		echo json_encode($query->result());
	}

	public function addToCart() {

		$uid = $this->input->post('uid');
		$pid = $this->input->post('pid');
		$item = $this->input->post('item');
		$data = array(
			'uid'=>$uid,
			'pid'=>$pid,
			'item'=>$item);
		$this->cart_model->addToCart($data);

	}

	public function retrieveData() {
		
		$user_data = $this->session->userdata('logged_in');
		$cart_data = $this->cart_model->retrieveData($user_data);
		echo json_encode($cart_data);
		//echo $cart_data;
	}
	
}
