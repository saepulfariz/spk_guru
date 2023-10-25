<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('UserModel', 'user');
		$this->load->model('GuruModel', 'guru');
	}
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['total'] = $this->guru->countGuru();
		$data['progress'] = $this->guru->countGuru('PROGRESS');
		$data['lulus'] = $this->guru->countGuru('LULUS');
		$data['tidak_lulus'] = $this->guru->countGuru('TIDAK LULUS');
		$this->template->load('template/index', 'dashboard/index', $data);
	}
}
