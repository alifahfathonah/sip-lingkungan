<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jayapura");
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('user_m');
        $this->load->model('jenisusaha_m');
        $this->load->model('datamaster_m');
    }
    
    public function index()
    {
        $data['mDashboard'] = true;
        $data['content'] = 'dashboard';
        $this->load->view('index',$data);
    }

    public function jenis_usaha()
    {
        $data['mJenisUsaha'] = true;
        $data['jenis_usaha'] = $this->jenisusaha_m->getAll();
        $data['content'] = 'v_jenis_usaha';
        $this->load->view('index',$data);
    }

    public function data_master()
    {
        $data['mDataMaster'] = true;
        $data['all_data'] = $this->datamaster_m->getAll();
        $data['content'] = 'v_data_master';
        $this->load->view('index',$data);
    }

    public function pengguna()
    {
        $data['mPengguna'] = true;
        $data['pengguna'] = $this->user_m->getAll();
        $data['content'] = 'v_pengguna';
        $this->load->view('index',$data);
    }

    public function ubah_password(){
        
        $table = 'pengguna';
        $id = 'idpengguna';

        $data = [ 
            'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT)
        ];
        $this->db->update($table,$data,[$id=>$this->input->post('id',true)]);
        $this->session->set_flashdata('success','Anda berhasil mengubah password');
        echo '<script>javascript:history.back()</script>';
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file Menu.php */