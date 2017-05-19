<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('chats');
	}
 
	function index(){
		if ($this->session->userdata('sesi') == TRUE) {
			$this->session->set_flashdata('done', '<div class="alert alert-warning alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Tidak perlu, Anda Sudah Login!</strong>
													</div>');
			redirect(base_url('selamat'));
		} else {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
 
	function login() {
		$where    = array(
						'user' => $this->input->post('user'),
						'pass' => $this->input->post('pass')
					);
		$cek      = $this->auth->cek_login('users',$where);

		if($cek->num_rows() > 0) {
 
			foreach($cek->result() as $row) {
				$id    = $row->id;
				$nama  = $row->nama;
				$user  = $row->user;
			}

			$sesi = array(
						'id'    => $id,
						'nama'  => $nama,
						'user'  => $user,
						'sesi'  => TRUE
					);
			
			$this->session->set_userdata($sesi);

			redirect(base_url('chat'));
 
		} else {
			$this->session->set_flashdata('gagal', '<div class="alert alert-danger alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Username/Password Salah!</strong>
													</div>');
			redirect(base_url());
		}
	}
 
	public function chat() {
		if ($this->session->userdata('sesi') == FALSE) {
			$this->session->set_flashdata('login', '<div class="alert alert-warning alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Anda Harus Login!</strong>
													</div>');
			redirect(base_url());
		} else {
			$data['chat'] = $this->chats->isi_chat()->result();
			$this->load->view('header');
			$this->load->view('chat', $data);
			$this->load->view('footer');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}