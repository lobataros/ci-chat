<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function cek_login(){
		$where    = array(
						'user' => $this->input->post('user'),
						'pass' => $this->input->post('pass')
					);
		return $this->db->get_where('users',$where);
	}

}