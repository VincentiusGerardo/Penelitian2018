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
      return $q->result();
    }

    public function getPendidikan(){
      $query = $this->db->get_where('riwayat_pendidikan', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPengajaran(){

    }
  }
