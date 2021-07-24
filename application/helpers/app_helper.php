<?php 
function delMask( $str ) {
    return (int)implode('',explode('.',$str));
}
function kodeTrx(){
    
    $ci =& get_instance();
    $ci->db->select('RIGHT(kode,3) as maxKode', FALSE);
    $ci->db->where('tgl',date('Y-m-d')); 
    $ci->db->order_by('kode','DESC');    
    $ci->db->limit(1);    
    $query = $ci->db->get('transaksi'); 
    //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
        //cek kode jika telah tersedia    
        $data = $query->row();      
        $kode = intval($data->maxKode) + 1; 
    }
    else{      
        $kode = 1;  //cek jika kode belum terdapat pada table
    }
    $tgl=date('dmY'); 
    $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
    $kodetampil = "TRX".$tgl.$batas;  //format kode
    return $kodetampil;
}
function noAntrian(){
    
    $ci =& get_instance();
    // $ci->db->select_max('antrian');
    $ci->db->select('RIGHT(antrian,3) as maxAntrian', FALSE);
    $ci->db->where('tgl',date('Y-m-d')); 
    $ci->db->order_by('antrian','DESC');     
    $query = $ci->db->get('transaksi');  
    if($query->num_rows() <> 0){      
        //cek kode jika telah tersedia    
        $data = $query->row();  
        // var_dump($data);die;    
        $kode = intval($data->maxAntrian) + 1; 
    }
    else{      
        $kode = 1;  //cek jika kode belum terdapat pada table
    }
    $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
    $kodetampil = "A".$batas;  //format kode
    return $kodetampil;
}
function list_jenis_usaha(){
    
    $ci =& get_instance();
    return $ci->db->order_by('idjenis_usaha','DESC')
                ->get('jenis_usaha')->result_array();
    
}
function namaJenisUsaha($id){
    
    $ci =& get_instance();
    $data = $ci->db->get_where('jenis_usaha',['idjenis_usaha'=>$id])->row();
    return $data->jenis_usaha;
    
}
function idJenisUsaha($nama){
    
    $ci =& get_instance();
    $data = $ci->db->get_where('jenis_usaha',['jenis_usaha'=>$nama])->row();
    return $data->idjenis_usaha;
    
}
function totalJenisUsaha($id){
    
    $ci =& get_instance();
    return $ci->db->get_where('data_usaha',['jenis_usaha_id'=>$id])->num_rows();
    
    
}