<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	Public function __construct() {
		parent::__construct();
		$this->load->model('chats');
		$this->load->model('regis');
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

	public function pending() {
		if ($this->session->userdata('sesi') == FALSE) {
			$this->session->set_flashdata('login', '<div class="alert alert-warning alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Anda Harus Login!</strong>
													</div>');
			redirect(base_url());
		} else {
			$data['orang'] = $this->regis->orang();
			$data['status'] = $this->chats->get_stats()->result();
			$this->load->view('header');
			$this->load->view('pending', $data);
			$this->load->view('footer');
		}
	}

}

