<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Datamaster extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('datamaster_m');
    }

    public function add()
    {
        $data['content'] = 'add_data_master';
        $this->load->view('index',$data);
    }
    
    public function save()
    {
        $id = $this->input->post('iddata_usaha',true);
        if($id==''){
            $data = [
                'jenis_usaha_id'=>$this->input->post('jenis_usaha_id',true),
                'nama_tempat'=>$this->input->post('nama_tempat',true),
                'nama_pemilik'=>$this->input->post('nama_pemilik',true),
                'alamat'=>$this->input->post('alamat',true),
                'longitude'=>$this->input->post('longitude',true),
                'latitude'=>$this->input->post('latitude',true),
                'luas_lahan'=>$this->input->post('luas_lahan',true),
                'jml_kamar'=>$this->input->post('jml_kamar',true),
                'jml_karyawan'=>$this->input->post('jml_karyawan',true),
                'jenis_kegiatan'=>$this->input->post('jenis_kegiatan',true),
                'tahun_operasi'=>$this->input->post('tahun_operasi',true),
                'jenis_izin_dimiliki'=>$this->input->post('jenis_izin_dimiliki',true),
                'nomor_izin'=>$this->input->post('nomor_izin',true),
                'tgl_izin'=>$this->input->post('tgl_izin',true),
                'instansi_penerbit_izin'=>$this->input->post('instansi_penerbit_izin',true),
                'status_izin'=>$this->input->post('status_izin',true),
                'status_kewajiban'=>$this->input->post('status_kewajiban',true)
            ];
            $this->datamaster_m->tambahData($data);
            $this->session->set_flashdata('success','Anda berhasil menambahkan data Data Master');
        }else{
            $data = [
                'jenis_usaha_id'=>$this->input->post('jenis_usaha_id',true),
                'nama_tempat'=>$this->input->post('nama_tempat',true),
                'nama_pemilik'=>$this->input->post('nama_pemilik',true),
                'alamat'=>$this->input->post('alamat',true),
                'longitude'=>$this->input->post('longitude',true),
                'latitude'=>$this->input->post('latitude',true),
                'luas_lahan'=>$this->input->post('luas_lahan',true),
                'jml_kamar'=>$this->input->post('jml_kamar',true),
                'jml_karyawan'=>$this->input->post('jml_karyawan',true),
                'jenis_kegiatan'=>$this->input->post('jenis_kegiatan',true),
                'tahun_operasi'=>$this->input->post('tahun_operasi',true),
                'jenis_izin_dimiliki'=>$this->input->post('jenis_izin_dimiliki',true),
                'nomor_izin'=>$this->input->post('nomor_izin',true),
                'tgl_izin'=>$this->input->post('tgl_izin',true),
                'instansi_penerbit_izin'=>$this->input->post('instansi_penerbit_izin',true),
                'status_izin'=>$this->input->post('status_izin',true),
                'status_kewajiban'=>$this->input->post('status_kewajiban',true)
            ];
            $this->datamaster_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Data Master');

        }
        redirect('menu/data_master');
    }

    public function up_file_izin(){
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_izin'))
        {
            $file = $this->upload->data();
            $data = [
                'file_izin'=>$file['file_name'],
            ];
            $edit = $this->datamaster_m->editData($data,$this->input->post('iddata_usaha',true));
            if($edit){
                unlink('./uploads/'.$this->input->post('file_lama',true));
            }
            $this->session->set_flashdata('success','Anda berhasil menambahkan File Izin');
        }else{
            $this->session->set_flashdata('error',$this->upload->display_errors());
        }
        redirect('menu/data_master');
    }

    public function up_file_lokasi(){
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_lokasi'))
        {
            $file = $this->upload->data();
            $data = [
                'file_lokasi'=>$file['file_name'],
            ];
            $edit = $this->datamaster_m->editData($data,$this->input->post('iddata_usaha',true));
            if($edit){
                unlink('./uploads/'.$this->input->post('file_lama',true));
            }
            $this->session->set_flashdata('success','Anda berhasil menambahkan File Lokasi');
        }else{
            $this->session->set_flashdata('error',$this->upload->display_errors());
        }
        redirect('menu/data_master');
    }

    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->datamaster_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $this->datamaster_m->hapusData($id);
        $this->session->set_flashdata('success','Anda berhasil menghapus data Datamaster');
        redirect('menu/data_master');
    }

}

/* End of file Datamaster.php */