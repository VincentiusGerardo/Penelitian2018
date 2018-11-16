<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_login extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    public function login($user,$pass){
      if($this->validatePass($pass)){
        $con = array('NIP_NIK' => $user);
        $query = $this->db->get_where('identitas_diri',$con);

        if($query->num_rows() > 0){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
    }

    public function validatePass($pass){
      if(password_verify($pass,$this->getStoredPass())){
        return $pass;
      }else{
        return false;
      }
    }

    public function getStoredPass(){
      $kode = $this->input->post('username');
      $cond = array('NIP_NIK' => $kode);
      $query = $this->db->get_where('identitas_diri',$cond);

      if($query->num_rows() > 0){
        $row = $query->row();
        return $row->Password;
      }else{
        return false;
      }
    }

  }
