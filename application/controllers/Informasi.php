<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
	private $title = 'Informasi';
	private $link = 'informasi';
	private $view = 'informasi';
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


	public function show($id = null)
	{
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['data'] = $this->model->getAll($id);
		$data['alternatif'] = $this->alternatif->findAll();
		$this->template->load('template/index', $this->view . '/show', $data);
	}

	public function verifikasi($id)
	{
		$result = $this->guru->find($id);

		if (!$result) {
			$this->alert->set('warning', 'Warning', 'Not Valid');
			redirect($this->link, 'refresh');
		}

		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['data'] = $result;
		$data['status'] = $this->status;
		$this->template->load('template/index', $this->view . '/verifikasi', $data);
	}

	public function updateVerifikasi($id)
	{

		$data['catatan'] = $this->input->post('catatan', true);
		$data['status'] = $this->input->post('status', true);
		$res = $this->guru->update($id, $data);
		if ($res) {
			$this->alert->set('success', 'Success', 'Verifikasi Success');
		} else {
			$this->alert->set('warning', 'Warning', 'Verifikasi Failed');
		}
		redirect($this->link, 'refresh');
	}
}
