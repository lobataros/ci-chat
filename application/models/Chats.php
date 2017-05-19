<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chats extends CI_Model {

	public function __construct() { $this->load->database(); }

	public function isi_chat(){ return $this->db->select('*')->order_by('waktu','ASC')->get('chat'); }

	public function main($status) {
		$this->db->update('status', $status);
		redirect(base_url('chat'));
	}

	public function get_stats() { return $this->db->get('status'); }

}
