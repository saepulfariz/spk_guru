<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user');
		$this->load->model('GuruModel', 'guru');
	}

	public function index()
	{
		if ($this->session->userdata('id_role')) {
			redirect('dashboard', 'refresh');
		}
		$data['title'] = "Login";
		$this->template->load('template/auth', 'auth/login', $data);
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

	public function register()
	{
		if ($this->session->userdata('id_role')) {
			redirect('dashboard', 'refresh');
		}
		$data['title'] = "Register";
		$this->template->load('template/auth', 'auth/register', $data);
	}

	public function proses_register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'You must provide a %s.')
		);

		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$data = [
				'username' => $this->input->post('username', true),
				'nama_lengkap' => $this->input->post('nama_lengkap', true),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'id_role' => 3,
			];

			$res = $this->user->save($data);

			if ($data['id_role'] == 3) {
				$last_id = $this->user->lastId();

				$data_guru = [
					'nik' => '10001',
					'jk' => 'LAKI-LAKI',
					'nama' => $this->input->post('nama_lengkap', true),
					'agama' => 'ISLAM',
					'pendidikan' => '',
					'ttl' => 'Kota, ' . date('d M Y'),
					'alamat' => '',
					'status' => 'PROGRESS',
					'id_user' => $last_id
				];

				$res = $this->guru->save($data_guru);
			}


			if ($res) {
				$this->alert->set('success', 'Success', 'Register Success');
			} else {
				$this->alert->set('warning', 'Warning', 'Register Failed');
			}
			redirect('auth', 'refresh');
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
