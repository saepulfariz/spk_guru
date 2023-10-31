<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    private $title = 'Formulir';
    private $link = 'formulir';
    private $view = 'formulir';
    private $jk = [
        'LAKI-LAKI',
        'PEREMPUAN'
    ];
    private $agama = [
        'ISLAM',
        'KRISTEN',
        'BUDHA',
        'HINDU',
        'KHONGHUCU'
    ];
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('GuruModel', 'model');
        $this->load->model('UserModel', 'user');
    }


    public function index()
    {
        $result = $this->model->whereUser($this->session->userdata('id_user'));

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $result;
        $data['jk'] = $this->jk;
        $data['agama'] = $this->agama;
        $this->template->load('template/index', $this->view . '/edit', $data);
    }

    public function update($id)
    {

        $id_user = $this->session->userdata('id_user');

        $data = [
            'nik' => $this->input->post('nik', true),
            'jk' => $this->input->post('jk', true),
            'nama' => $this->input->post('nama', true),
            'agama' => $this->input->post('agama', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'ttl' => $this->input->post('tempat', true) . ', ' . date('d M Y', strtotime($this->input->post('ttl', true))),
            'alamat' => $this->input->post('alamat', true),
            // 'id_user' => 1
        ];




        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('ttl', 'ttl', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data_user = [
                'nama_lengkap' => $data['nama']
            ];

            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['upload_path'] = 'assets/uploads/lampiran/';

            $key_name = 'lampiran_ijazah';

            $config['file_name'] = $_FILES[$key_name]['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($key_name)) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data[$key_name] = $filename;
            } else {
                $this->alert->set('warning', 'Warning', 'Ijazah Failed');
                redirect($this->link, 'refresh');
            }

            $key_name = 'lampiran_sertifikat';

            $config['file_name'] = $_FILES[$key_name]['name'];

            $this->load->library('upload', $config);

            if (!empty($_FILES[$key_name]['name'])) {
                if ($this->upload->do_upload($key_name)) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[$key_name] = $filename;
                } else {
                    $this->alert->set('warning', 'Warning', 'Sertifikat Failed');
                    redirect($this->link, 'refresh');
                }
            }


            $key_name = 'lampiran_ktp';

            $config['file_name'] = $_FILES[$key_name]['name'];

            $this->load->library('upload', $config);

            if (!empty($_FILES[$key_name]['name'])) {
                if ($this->upload->do_upload($key_name)) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[$key_name] = $filename;
                } else {
                    $this->alert->set('warning', 'Warning', 'Ktp Failed');
                    redirect($this->link, 'refresh');
                }
            }

            $key_name = 'lampiran_pengalaman';

            $config['file_name'] = $_FILES[$key_name]['name'];

            $this->load->library('upload', $config);

            if (!empty($_FILES[$key_name]['name'])) {
                if ($this->upload->do_upload($key_name)) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[$key_name] = $filename;
                } else {
                    $this->alert->set('warning', 'Warning', 'Pengalaman Kerja Failed');
                    redirect($this->link, 'refresh');
                }
            }

            $this->user->update($id_user, $data_user);

            $res = $this->model->update($id, $data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect($this->link, 'refresh');
        }
    }
}
