<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_utama extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    public function verifyPass($kdk){

    }

    public function getUsername(){
      $q = $this->db->get_where('identitas_diri', array('NIP_NIK' => $this->session->userdata('username')));
      $row = $q->row();
      return $row->NAMA;
    }

    public function getIdentitas(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL_LAHIR, '%e %M %Y') as TANGGAL_LAHIRcon FROM `identitas_diri` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
      // $q = $this->db->get_where('identitas_diri',  array('NIP_NIK' => $this->session->userdata('username')));
      // return $q->result_array();
    }

    public function getPendidikan(){
      $query = $this->db->get_where('riwayat_pendidikan', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPengajaran(){
      $query = $this->db->get_where('pengajaran', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPembimbing(){
      $query = $this->db->get_where('pembimbing', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getPenguji(){
      $query = $this->db->get_where('penguji', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getOrganisasi(){
      $q = "SELECT ID_ORGANISASI, DATE_FORMAT(TANGGAL_MULAI, '%e %M %Y') as TANGGAL_MULAIcon, DATE_FORMAT(TANGGAL_AKHIR, '%e %M %Y') as TANGGAL_AKHIRcon, TANGGAL_MULAI, TANGGAL_AKHIR, JENIS_NAMA, JABATAN FROM `organisasi_profesi` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getPenelitian(){
      $query = $this->db->get_where('penelitian', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getPublikasi(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `publikasi` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getPenghargaan(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `penghargaan` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getBahanAjar(){
      $q = $this->db->get_where('bahan_ajar',array('NIP_NIK' => $this->session->userdata('username')));
      return $q->result();
    }

    public function getPI(){
      $q = $this->db->get_where('pengelolaan_institusi',array('NIP_NIK' => $this->session->userdata('username')));
      return $q->result();
    }

    public function getSeminar(){
      $query = $this->db->get_where('seminar_workshop',array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPKM(){
      $query = $this->db->get_where('pkm',array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }


    public function insertPendidikan($data){
      $q = $this->db->insert('riwayat_pendidikan',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updatePendidikan(){

    }

    public function updateIdentitas($NIP_NIK){
      $data = array(
  			'NIDN' => $this->input->post('NIDN'),
  			'NAMA' => $this->input->post('NAMA'),
  			'JENIS_KELAMIN' =>	$this->input->post('JENIS_KELAMIN'),
        'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR'),
        'TANGGAL_LAHIR'=> $this->input->post('TANGGAL_LAHIR'),
        'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN'),
        'STATUS_PERKAWINAN' => $this->input->post('STATUS_PERKAWINAN'),
        'AGAMA' => $this->input->post('AGAMA'),
        'GOLONGAN' => $this->input->post('GOLONGAN'),
        'JABATAN_AKADEMIK' => $this->input->post('JABATAN_AKADEMIK'),
        'PERGURUAN_TINGGI' => $this->input->post('PERGURUAN_TINGGI'),
        'ALAMAT' => $this->input->post('ALAMAT'),
        'EMAIL' => $this->input->post('EMAIL')
  		);

  		$this->db->where('NIP_NIK', $NIP_NIK);
  		return $this->db->update('identitas_diri', $data);
    }

    public function insertPembimbing($SK){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SK' => $SK
  		);

  		return $this->db->insert('pembimbing', $data);
    }

    public function updatePembimbing($id){
      $data = array(
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
  		);

  		$this->db->where('ID_PEMBIMBING', $id);
  		return $this->db->update('pembimbing', $data);
    }

    public function insertPenguji($SK){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SK' => $SK
  		);

  		return $this->db->insert('penguji', $data);
    }

    public function updatePenguji($id){
      $data = array(
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
  		);

  		$this->db->where('ID_PENGUJI', $id);
  		return $this->db->update('penguji', $data);
    }

    public function insertOrganisasi($NOMOR){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL_MULAI' => $this->input->post('TANGGAL_MULAI'),
  			'TANGGAL_AKHIR' =>	$this->input->post('TANGGAL_AKHIR'),
        'JENIS_NAMA' => $this->input->post('JENIS_NAMA'),
        'JABATAN'=> $this->input->post('JABATAN'),
        'NOMOR' => $NOMOR
  		);

  		return $this->db->insert('organisasi_profesi', $data);
    }

    public function updateOrganisasi($id){
      $data = array(
      'TANGGAL_MULAI' => $this->input->post('TANGGAL_MULAI'),
      'TANGGAL_AKHIR' =>	$this->input->post('TANGGAL_AKHIR'),
      'JENIS_NAMA' => $this->input->post('JENIS_NAMA'),
      'JABATAN'=> $this->input->post('JABATAN'),
  		);

  		$this->db->where('ID_ORGANISASI', $id);
  		return $this->db->update('organisasi_profesi', $data);
    }

    public function insertPenelitian($SURAT_TUGAS){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TAHUN' => $this->input->post('TAHUN'),
  			'JUDUL' =>	$this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SUMBER_DANA'=> $this->input->post('SUMBER_DANA'),
        'SURAT_TUGAS' => $SURAT_TUGAS
  		);

  		return $this->db->insert('penelitian', $data);
    }

    public function updatePenelitian($id){
      $data = array(
        'TAHUN' => $this->input->post('TAHUN'),
        'JUDUL' =>	$this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SUMBER_DANA'=> $this->input->post('SUMBER_DANA'),
  		);

  		$this->db->where('ID_PENELITIAN', $id);
  		return $this->db->update('penelitian', $data);
    }

    public function insertPenghargaan($SERTIFIKAT){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL' => $this->input->post('TANGGAL'),
  			'BENTUK' =>	$this->input->post('BENTUK'),
        'PEMBERI' => $this->input->post('PEMBERI'),
        'SERTIFIKAT'=> $SERTIFIKAT
  		);

  		return $this->db->insert('penghargaan', $data);
    }

    public function updatePenghargaan($id){
      $data = array(
        'TANGGAL' => $this->input->post('TANGGAL'),
        'BENTUK' =>	$this->input->post('BENTUK'),
        'PEMBERI' => $this->input->post('PEMBERI'),
  		);

  		$this->db->where('ID_PENGHARGAAN', $id);
  		return $this->db->update('penghargaan', $data);
    }

    public function getcv_penelitian($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `penelitian` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_publikasi($mulai, $selesai){
      $query = "SELECT * FROM `publikasi` WHERE TANGGAL BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_pendidikan($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `riwayat_pendidikan` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_pengajaran($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `pengajaran` WHERE TAHUN_AKADEMIK BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_bahanajar($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `bahan_ajar` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_seminar($mulai, $selesai){
      $query = "SELECT * FROM `seminar_workshop` WHERE TANGGAL BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_pembimbing($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `pembimbing` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_penguji($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `penguji` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_pkm($mulai, $selesai){
      $query = "SELECT * FROM `pkm` WHERE TANGGAL BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_institusi($mulai, $selesai){
      $query = "SELECT * FROM `pengelolaan_institusi` WHERE TANGGAL_MULAI BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_organisasi($mulai, $selesai){
      $query = "SELECT * FROM `organisasi_profesi` WHERE TANGGAL_MULAI BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_penghargaan($mulai, $selesai){
      $query = "SELECT * FROM `penghargaan` WHERE TANGGAL BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }

    public function getcv_kemahasiswaan($mulai, $selesai){
      $query = "SELECT * FROM `kegiatan_kemahasiswaan` WHERE TANGGAL_MULAI BETWEEN ".$mulai." AND ".$selesai." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $query->result_array();
    }
  }
