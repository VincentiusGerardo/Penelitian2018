<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Module extends CI_Controller{

    public function __construct(){
      parent::__construct();
      // check session user
      if(!$this->session->userdata('is_logged')){
        redirect(base_url());
      }
      $this->load->model('model_utama');
    }

    public function getHeader(){
      $data['nama'] = $this->model_utama->getUsername();
      $this->load->view('header',$data);
    }

    public function index(){
      $this->getHeader();
      $this->load->view('v_home');
      $this->load->view('footer');
    }

    public function identitasdiri(){
      $this->getHeader();
      $this->load->view('v_identitas_diri');
      $this->load->view('footer');
    }

    public function pendidikan(){
      $data['pendidikan'] = $this->model_utama->getPendidikan();
      $this->getHeader();
      $this->load->view('v_pendidikan',$data);
      $this->load->view('modals/m_pendidikan',$data);
      $this->load->view('footer');
    }

    public function pengajaran(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pembimbing(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penguji(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function organisasiprofesi(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penghargaan(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penelitian(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function publikasi(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function bahanajar(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function seminar(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pkm(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pengelolaaninstitusi(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function cv(){
      $this->getHeader();
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function users(){
      $this->getHeader();
      // $this->load->view('', $data);
      $this->load->view('footer');
    }
  }
