<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubAlternatif extends CI_Controller
{
    private $title = 'Sub Kiteria';
    private $link = 'sub_alternatif';
    private $view = 'sub_alternatif';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('SubAlternatifModel', 'model');
        $this->load->model('AlternatifModel', 'alternatif');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $this->model->getAll();
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['alternatif'] = $this->alternatif->findAll();
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required');
        $this->form_validation->set_rules('id_alternatif', 'id_alternatif', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan', true),
                'nilai' => $this->input->post('nilai', true),
                'id_alternatif' => $this->input->post('id_alternatif', true),
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
        $data['alternatif'] = $this->alternatif->findAll();
        $this->template->load('template/index', $this->view . '/edit', $data);
    }

    public function update($id)
    {


        $data = [
            'keterangan' => $this->input->post('keterangan', true),
            'nilai' => $this->input->post('nilai', true),
            'id_alternatif' => $this->input->post('id_alternatif', true),
        ];


        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required');
        $this->form_validation->set_rules('id_alternatif', 'id_alternatif', 'required');


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
