<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function login($email, $password) {

		$this->db->SELECT('uid, first_name, email, password');
		$this->db->FROM('user');
		$this->db->WHERE('email', $email);
		$this->db->WHERE('password', MD5($password));
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	public function addUser($data) {

		return $this->db->INSERT('user', $data);
	}

}

?>