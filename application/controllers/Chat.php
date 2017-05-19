<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	Public function __construct() {
		parent::__construct();
		$this->load->model('chats');
	}

	public function index() {
		
	}

	public function kirim() {
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$pesan = array(
					'pengirim' => $this->session->userdata('user'),
					'waktu' => $date,
					'teks' => $this->input->post('pesan')
				 );
		 
		$this->db->insert('chat', $pesan);
		redirect (base_url('chat'));
	}

	public function open() { return $this->chats->main(array('status'=>TRUE)); }

	public function maintenance() { return $this->chats->main(array('status'=>FALSE)); }

}

