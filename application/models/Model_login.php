<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_login extends CI_Model{

    public function __construct(){
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function login($user,$pass){
      if($this->validatePass($pass)){
        $con = array('' => $user);
        $query = $this->db->get_where('',$cond);

        if($this->num_rows() == 1){
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
      $cond = array('' => $kode);
      $query = $this->db->get_where('',$cond);

      if($query->num_rows() == 1){
        $row = $query->row();
        return $row->Password;
      }else{
        return false;
      }
    }

  }
