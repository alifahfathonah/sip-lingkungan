<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisusaha extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('jenisusaha_m');
    }
    
    public function index()
    {
        
    }
    
    public function add()
    {
        $data = [
            'jenis_usaha'=>$this->input->post('jenis_usaha',true)
        ];
        $this->jenisusaha_m->tambahBaru($data);
        $this->session->set_flashdata('success','Anda berhasil menambahkan data Jenis Usaha');
        redirect('menu/jenis_usaha');
    }

    public function hapus($id){
        $del = $this->jenisusaha_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Jenis Usaha');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/jenis_usaha');
    }
}

/* End of file Jenisusaha.php */