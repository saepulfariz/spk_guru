<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $title = 'User';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['user'] = $this->user->getUser();
        $this->template->load('template/index', 'user/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['role'] = $this->user->getRole();
        $this->template->load('template/index', 'user/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'You must provide a %s.')
        );


        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'nama_lengkap' => $this->input->post('nama_lengkap', true),
                'id_role' => $this->input->post('id_role', true),
            ];

            $res = $this->user->save($data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Add Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Add Failed');
            }
            redirect('user', 'refresh');
        }
    }

    public function edit($id)
    {
        $result = $this->user->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect('user', 'refresh');
        }

        $data['title'] = $this->title;
        $data['user'] = $result;
        $data['role'] = $this->user->getRole();
        $this->template->load('template/index', 'user/edit', $data);
    }

    public function update($id)
    {

        $dataOld = $this->user->find($id);

        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap', true),
            'id_role' => $this->input->post('id_role', true),
        ];

        if ($this->input->post('password') != '') {
            $data['password'] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        }



        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {

            $res = $this->user->update($id, $data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect('user', 'refresh');
        }
    }





    public function delete($id)
    {
        $result = $this->user->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect('user', 'refresh');
        }

        $res = $this->user->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        redirect('user', 'refresh');
    }

    public function gantipass()
    {
        $data['title'] = 'Ganti Pass';
        $this->template->load('template/index', 'user/gantipass', $data);
    }


    public function prosesGantipass()
    {
        $dataOld = $this->user->find($this->session->userdata('id_user'));


        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        $password_retype = $this->input->post('password_retype', true);
        if (password_verify($password_lama, $dataOld['password'])) {

            if ($password_baru == $password_retype) {
                $data = [
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];

                $this->user->update($this->session->userdata('id_role'), $data);
                $this->alert->set('success', 'Success', 'Password Change');
            } else {
                $this->alert->set('warning', 'Warning', 'Password Baru Beda');
            }
        } else {
            $this->alert->set('warning', 'Warning', 'Password Lama Salah');
        }

        redirect('gantipass', 'refresh');
    }


    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->user->getProfile($this->session->userdata('id_user'));
        $this->template->load('template/index', 'user/profile', $data);
    }


    public function editProfile()
    {
        $data['title'] = 'Profile Edit';
        $data['user'] = $this->user->getProfile($this->session->userdata('id_user'));
        $this->template->load('template/index', 'user/profile_edit', $data);
    }

    public function prosesProfile()
    {
        $dataOld = $this->user->find($this->session->userdata('id_user'));

        $data = [
            'email' => $this->input->post('email'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
        ];

        if ($data['email'] == $dataOld['email']) {
            $this->form_validation->set_rules('email', 'Email', 'required');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email]');
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->editProfile();
        } else {


            $res = $this->user->update($this->session->userdata('id_user'), $data);

            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect('profile', 'refresh');
        }
    }
}
