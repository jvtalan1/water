<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Cart_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function addToCart($data) {

		$param = array(
			'uid'=>$data['uid'],
			'pid'=>$data['pid']);

		$this->db->SELECT('*');
		$this->db->FROM('cart');
		$this->db->WHERE($param);
		
		$query = $this->db->GET();

		if ($query->num_rows()==0) {
			$this->db->INSERT('cart', $data);
		}
		else {
			$update = array('item'=>$data['item']);
			$this->db->WHERE($param);
			$this->db->UPDATE('cart', $update);
		}
	}

	public function retrieveData($user_data) {

		$uid = array('uid'=>$user_data['uid']);

		$this->db->SELECT('*');
		$this->db->FROM('cart');
		$this->db->WHERE($uid);

		$query = $this->db->GET();
		return $query->result();
	}

}

?>