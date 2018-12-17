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
      $data['dosen'] = $this->model_utama->getIdentitas();
      $this->getHeader();
      $this->load->view('v_identitas_diri', $data);
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
      $data['pengajaran'] = $this->model_utama->getPengajaran();
      $this->getHeader();
      $this->load->view('v_pengajaran',$data);
      $this->load->view('modals/m_pengajaran',$data);
      $this->load->view('footer');
    }

    public function pembimbing(){
      $data['pembimbing'] = $this->model_utama->getPembimbing();
      $this->getHeader();
      $this->load->view('v_pembimbing', $data);
      $this->load->view('modals/m_pembimbing', $data);
      $this->load->view('footer');
    }

    public function penguji(){
      $data['penguji'] = $this->model_utama->getPenguji();
      $this->getHeader();
      $this->load->view('v_penguji', $data);
      $this->load->view('modals/m_penguji', $data);
      $this->load->view('footer');
    }

    public function organisasiprofesi(){
      $data['Organisasi'] = $this->model_utama->getOrganisasi();
      $this->getHeader();
      $this->load->view('v_organisasi', $data);
      $this->load->view('modals/m_organisasi', $data);
      $this->load->view('footer');
    }

    public function penghargaan(){
      $data['penghargaan'] = $this->model_utama->getPenghargaan();
      $this->getHeader();
      $this->load->view('v_penghargaan', $data);
      $this->load->view('modals/m_penghargaan', $data);
      $this->load->view('footer');
    }

    public function penelitian(){
      $data['penelitian'] = $this->model_utama->getPenelitian();
      $this->getHeader();
      $this->load->view('v_penelitian', $data);
      $this->load->view('modals/m_penelitian', $data);
      $this->load->view('footer');
    }

    public function publikasi(){
      $data['publikasi'] = $this->model_utama->getPublikasi();
      $this->getHeader();
      $this->load->view('v_publikasi', $data);
      $this->load->view('modals/m_publikasi', $data);
      $this->load->view('footer');
    }

    public function bahanajar(){
      $data['pengajaran'] = $this->model_utama->getBahanAjar();
      $this->getHeader();
      $this->load->view('v_bahanajar',$data);
      $this->load->view('modals/m_bahanajar',$data);
      $this->load->view('footer');
    }

    public function seminar(){
      $data['seminar'] = $this->model_utama->getSeminar();
      $this->getHeader();
      $this->load->view('v_seminar',$data);
      $this->load->view('modals/m_seminar',$data);
      $this->load->view('footer');
    }

    public function pkm(){
      $data['pkm'] = $this->model_utama->getPKM();
      $this->getHeader();
      $this->load->view('v_pkm',$data);
      $this->load->view('modals/m_pkm',$data);
      $this->load->view('footer');
    }

    public function pengelolaaninstitusi(){
      $data['pi'] = $this->model_utama->getPI();
      $this->getHeader();
      $this->load->view('v_PI',$data);
      $this->load->view('modals/m_PI',$data);
      $this->load->view('footer');
    }

    public function cv(){
      $this->getHeader();
      $this->load->view('v_cv');
      $this->load->view('footer');
    }

    public function print_cv(){
      $mulai = $this->input->post('tgl_mulai');
      $selesai = $this->input->post('tgl_selesai');

      foreach ($_POST['pilih'] as $pilih){
          $data[$pilih] = $this->model_utama->$pilih();
      }

      $this->load->view('v_printcv',$data, $_POST['pilih']);
    }

    public function users(){
      $this->getHeader();
      // $this->load->view('', $data);
      $this->load->view('footer');
    }

    public function changePassword(){
      $this->getHeader();
      $this->load->view('v_changePassword');
      $this->load->view('footer');
    }
  }
