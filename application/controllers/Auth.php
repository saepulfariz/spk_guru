<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user');
	}

	public function index()
	{
		if ($this->session->userdata('id_role')) {
			redirect('dashboard', 'refresh');
		}
		$data['title'] = "Login";
		$this->template->load('template/auth', 'login/index', $data);
	}


	public function proses_login()
	{

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'You must provide a %s.')
		);


		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			$data = $this->user->getUserLogin($username);

			$row = $data->num_rows();

			if ($row > 0) {
				$data_user = $data->row_array();

				if (password_verify($password, $data_user['password'])) {
					// echo "Login";
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('id_role', $data_user['id_role']);
					$this->session->set_userdata('id_user', $data_user['id']);
					$this->session->set_userdata('nama_role', $data_user['nama_role']);


					$this->alert->set('success', 'Success', 'Anda Berhasil Login');

					if ($data_user['id_role'] == 3) {
						redirect('formulir', 'refresh');
					} else {
						redirect('dashboard', 'refresh');
					}
				} else {
					$this->alert->set('warning', 'Warning', 'Password Salah');
					redirect('auth', 'refresh');
				}
			} else {
				$this->alert->set('warning', 'Warning', 'User Tidak Ada');
				redirect('auth', 'refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_tempdata('username');
		$this->session->unset_tempdata('id_role');
		$this->session->unset_tempdata('nama_role');
		$this->session->sess_destroy();
		redirect('auth', 'refresh');
	}
}
