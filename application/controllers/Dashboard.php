<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
		$this->load->model('Calon_siswa_model');
		$this->load->model('Pendaftaran_model');
	}

	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Dashboard' => '',
		];
		$id = $this->ion_auth->user()->row();
        $id= $id->id;
		$siswa= $this->Calon_siswa_model->get_by_id($id);
		// var_dump($siswa);exit;
		if($this->ion_auth->in_group(2) && $siswa !=null) {
			$data['pendaftaran']=$this->db->query("select status_validasi_berkas, status_pembayaran, bukti_pembayaran from pendaftaran where id_siswabaru = $siswa->id_siswabaru")->row();
		} else {
			$data['pendaftaran']=null;
		}
        
		// var_dump($);exit;
		//$this->layout->set_privilege(1);
		$data['page'] = 'Dashboard/Index';
		$this->load->view('template/backend', $data);
	}
}
