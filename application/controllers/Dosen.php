<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Dosen extends CI_Controller{

    public function __construct(){
      parent::__construct();
      // check session user
      if($this->session->userdata('is_logged')){
        redirect(base_url());
      }
      $this->load->model('model_utama');
    }


    public function index(){
      $this->load->view('header');
      $this->load->view('home');
      $this->load->view('footer');
    }

    public function identitasdiri(){
      $this->load->view('header');
      $this->load->view('identitas_diri');
      $this->load->view('footer');
    }

    public function pendidikan(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pengajaran(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pembimbing(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penguji(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function organisasiprofesi(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penghargaan(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function penelitian(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function publikasi(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function bahanajar(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function seminar(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pkm(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function pengelolaaninstitusi(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }

    public function cv(){
      $this->load->view('header');
      //$this->load->view('');
      $this->load->view('footer');
    }
  }
