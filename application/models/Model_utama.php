<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_utama extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    public function getUsername(){
      $q = $this->db->get_where('identitas_diri', array('NIP_NIK' => $this->session->userdata('username')));
      $row = $q->row();
      return $row->NAMA;
    }

    public function getIdentitas(){
      $q = $this->db->get_where('identitas_diri',  array('NIP_NIK' => $this->session->userdata('username')));
      return $q->result_array();
    }

    public function getPendidikan(){
      $query = $this->db->get_where('riwayat_pendidikan', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPengajaran(){

    }

    public function getPembimbing(){
      $query = $this->db->get_where('pembimbing', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
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
  }
