<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    private $title = 'Guru';
    private $link = 'guru';
    private $view = 'guru';
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
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $this->model->findAll();
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['jk'] = $this->jk;
        $data['agama'] = $this->agama;
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('ttl', 'ttl', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'nik' => $this->input->post('nik', true),
                'jk' => $this->input->post('jk', true),
                'nama' => $this->input->post('nama', true),
                'agama' => $this->input->post('agama', true),
                'pendidikan' => $this->input->post('pendidikan', true),
                'ttl' => $this->input->post('tempat', true) . ', ' . date('d M Y', strtotime($this->input->post('ttl', true))),
                'alamat' => $this->input->post('alamat', true),
                'status' => 'PROGRESS',
                'id_user' => 1
            ];

            $res = $this->model->save($data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Add Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Add Failed');
            }
            redirect($this->link, 'refresh');
        }
    }

    public function edit($id)
    {
        $result = $this->model->find($id);

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


        $data = [
            'nik' => $this->input->post('nik', true),
            'jk' => $this->input->post('jk', true),
            'nama' => $this->input->post('nama', true),
            'agama' => $this->input->post('agama', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'ttl' => $this->input->post('tempat', true) . ', ' . date('d M Y', strtotime($this->input->post('ttl', true))),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'PROSESS',
            'id_user' => 1
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
            $this->edit($id);
        } else {

            $res = $this->model->update($id, $data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect($this->link, 'refresh');
        }
    }


    public function delete($id)
    {
        $result = $this->model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $res = $this->model->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        redirect($this->link, 'refresh');
    }
}
