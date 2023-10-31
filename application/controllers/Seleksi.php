<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seleksi extends CI_Controller
{
	private $title = 'Seleksi';
	private $link = 'seleksi';
	private $view = 'seleksi';
	private $status = [
		'PROGRESS',
		'VERIFIKASI',
		'LULUS',
		'TIDAK LULUS',
	];
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

	public function edit($id = null)
	{
		$result = $this->model->getAll($id);

		if (!$result) {
			$this->alert->set('warning', 'Warning', 'Not Valid');
			redirect($this->link, 'refresh');
		}

		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['status'] = $this->status;
		$data['data'] = $result;
		$data['alternatif'] = $this->alternatif->findAll();
		$this->template->load('template/index', $this->view . '/edit', $data);
	}

	public function update($id)
	{
		$data = [
			'status' => $this->input->post('status', true),
		];

		$this->form_validation->set_rules('status', 'status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {

			$res = $this->guru->update($id, $data);
			if ($res) {
				$this->alert->set('success', 'Success', 'Update Success');
			} else {
				$this->alert->set('warning', 'Warning', 'Update Failed');
			}
			redirect($this->link, 'refresh');
		}
	}

	public function show($id = null)
	{
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['data'] = $this->model->getAll($id);
		$data['alternatif'] = $this->alternatif->findAll();
		$this->template->load('template/index', $this->view . '/show', $data);
	}
}
