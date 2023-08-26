<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
	private $title = 'Perhitungan';
	private $link = 'perhitungan';
	private $view = 'perhitungan';
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
}
