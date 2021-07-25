<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Datamaster_m extends CI_Model {

    private $table = 'data_usaha';

    private $id = 'iddata_usaha';

    public function getAll(){ 
        return $this->db->select('x.*,x1.*')
                        ->join('jenis_usaha x1','x1.idjenis_usaha=x.jenis_usaha_id')
                        ->get($this->table.' x')->result_array();
    }

    public function getById($id){
        return $this->db->select('x.*,x1.*')
                        ->join('jenis_usaha x1','x1.idjenis_usaha=x.jenis_usaha_id')
                        ->where($this->id,$id)
                        ->get($this->table.' x')->row_array();
    }

    public function getDataByJenisUsaha($id){
        return $this->db->select('x.*,x1.*')
                        ->join('jenis_usaha x1','x1.idjenis_usaha=x.jenis_usaha_id')
                        ->where('x.jenis_usaha_id',$id)
                        ->get($this->table.' x')->result_array();
    }

    public function tambahData($data){
        $this->db->insert($this->table,$data);
    }

    public function editData($data,$id){
        $this->db->update($this->table,$data,[$this->id=>$id]);
    }

    public function hapusData($id){
        $this->db->delete($this->table,[$this->id=>$id]);
    }

}

/* End of file Datamaster_m.php */