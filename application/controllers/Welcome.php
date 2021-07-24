<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jayapura");
		$this->load->model('datamaster_m');
	}
	
	public function index()
	{
		$data['content'] = 'v_home';
		$this->load->view('website',$data);
	}

	public function view($id){
		$id = decrypt_url($id);
		$data['data_by_jenis_usaha'] = $this->datamaster_m->getDataByJenisUsaha($id);
		$data['content'] = 'v_data_by_jenis_usaha';
		$this->load->view('website',$data);
	}


}