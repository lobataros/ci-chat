<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Model {

	public function daftar() {
		$vcek = array('user'=>$this->input->post('user'));
		$cek = $this->db->get_where('users', $vcek);

		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('fail', '<div class="alert alert-warning alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Username Tidak Tersedia!</strong>
													</div>');
			redirect(base_url('register'));
		} else {
			$form = array(
						'nama' => $this->input->post('nama'),
						'user' => $this->input->post('user'),
						'pass' => $this->input->post('pass'),
						'status' => FALSE,
						'akses' => 'USER'
					);
			$this->db->insert('users', $form);
			$this->session->set_flashdata('scc', '<div class="alert alert-success alert-dismissable">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Sukses, Tunggu admin mengaktifkan akun anda!</strong>
													</div>');
			redirect(base_url());
		}
	}

	public function orang() { return $this->db->get('users'); }

	public function aktif($user) {
		$this->db->where('user', $user);
		$this->db->update('users', array('status' => TRUE));
	}

	public function nonaktif($user) {
		$this->db->where('user', $user);
		$this->db->update('users', array('status' => FALSE));
	}

	public function hapus($user) {
		$this->db->where('user', $user);
		$this->db->delete('users');
	}

}