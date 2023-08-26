<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    private $title = 'Alternatif';
    private $link = 'alternatif';
    private $view = 'alternatif';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('AlternatifModel', 'model');
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
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama_alternatif', 'nama_alternatif', 'required');
        $this->form_validation->set_rules('attribute', 'attribute', 'required');
        $this->form_validation->set_rules('bobot', 'bobot', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'kode' => $this->input->post('kode', true),
                'nama_alternatif' => $this->input->post('nama_alternatif', true),
                'attribute' => $this->input->post('attribute', true),
                'bobot' => $this->input->post('bobot', true),
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
        $this->template->load('template/index', $this->view . '/edit', $data);
    }

    public function update($id)
    {


        $data = [
            'kode' => $this->input->post('kode', true),
            'nama_alternatif' => $this->input->post('nama_alternatif', true),
            'attribute' => $this->input->post('attribute', true),
            'bobot' => $this->input->post('bobot', true),
        ];



        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama_alternatif', 'nama_alternatif', 'required');
        $this->form_validation->set_rules('attribute', 'attribute', 'required');
        $this->form_validation->set_rules('bobot', 'bobot', 'required');


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
