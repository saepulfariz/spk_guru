<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BobotAlternatif extends CI_Controller
{
    private $title = 'Bobot Alternatif';
    private $link = 'bobot_alternatif';
    private $view = 'bobot_alternatif';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('BobotAlternatifModel', 'model');
        $this->load->model('SubAlternatifModel', 'sub_alternatif');
        $this->load->model('AlternatifModel', 'alternatif');
        $this->load->model('GuruModel', 'guru');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $this->model->getAll();
        $data['alternatif'] = $this->alternatif->findAll();
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['alternatif'] = $this->alternatif->findAll();
        $data['guru'] = $this->guru->findAll();
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('id_guru', 'id_guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $alternatif = $this->input->post('alternatif', true);
            $sub_alternatif = $this->input->post('sub_alternatif', true);
            $a = 0;
            foreach ($alternatif as $d) {
                $data = [
                    'id_guru' => $this->input->post('id_guru', true),
                    'id_alternatif' => $d,
                    'id_sub_alternatif' => $sub_alternatif[$a],
                ];

                $res = $this->model->save($data);
                $a++;
            }

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
        $data['guru'] = $this->guru->findAll();
        $this->template->load('template/index', $this->view . '/edit', $data);
    }

    public function update($id)
    {



        $this->form_validation->set_rules('id_guru', 'id_guru', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {

            $alternatif = $this->input->post('alternatif', true);
            $sub_alternatif = $this->input->post('sub_alternatif', true);
            $a = 0;
            foreach ($alternatif as $d) {
                $data = [
                    'id_guru' => $this->input->post('id_guru', true),
                    'id_alternatif' => $d,
                    'id_sub_alternatif' => $sub_alternatif[$a],
                ];

                $res = $this->model->updateBobot($data['id_guru'], $data['id_alternatif'], $data);
                $a++;
            }

            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect($this->link, 'refresh');
        }
    }


    public function delete($id_guru)
    {
        $result = $this->model->find($id_guru);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $res = $this->model->deleteBobot($id_guru);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        redirect($this->link, 'refresh');
    }
}
