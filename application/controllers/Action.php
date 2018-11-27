<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Action extends CI_Controller{

    public function __construct(){
      parent::__construct();
      // check session user
      if(!$this->session->userdata('is_logged')){
        redirect(base_url());
      }
      $this->load->model('model_utama');
    }

    public function doInsertDosen(){

    }

    public function doUpdateDosen(){

    }

    public function doDeleteDosen(){

    }

    public function doInsertIdentitas(){

    }

    public function doUpdateIdentitas(){

    }

    public function doInsertPendidikan(){
      $this->form_validation->set_rules('selProgram','selectProgram','required|xss_clean|trim');
      $this->form_validation->set_rules('thn','tahun','required|xss_clean|trim|max_length[4]');
      $this->form_validation->set_rules('pt','perguruanTinggi','required|xss_clean|trim');
      $this->form_validation->set_rules('jur','jurusan','required|xss_clean|trim');
      // $this->form_validation->set_rules('ij','ijazah','required|xss_clean|trim');
      // $this->form_validation->set_rules('tr','transkrip','required|xss_clean|trim');

      if($this->form_validation->run() == TRUE){
        $pro = $this->input->post('selProgram');
        $tahun = $this->input->post('thn');
        $perT = $this->input->post('pt');
        $jurusan = $this->input->post('jur');

        //upload Ijazah
        $config['upload_path'] = './media/ijazah/'
      }else{
        echo "Ada yang kurang nih";
      }
    }

    public function doUpdatePendidikan(){
      echo "ini update";
    }

    public function doInsertPengajaran(){

    }

    public function doUpdatePengajaran(){

    }

    public function doInsertPenguji(){

    }

    public function doUpdatePenguji(){

    }

    public function doInsertOrganisasi(){

    }

    public function doUpdateOrganiasi(){

    }

    public function doInsertPenghargaan(){

    }

    public function doUpdatePenghargaan(){

    }

    public function doInsertPenelitian(){

    }

    public function doUpdatePenelitian(){

    }

    public function doInsertPublikasi(){

    }

    public function doUpdatePublikasi(){

    }

    public function doInsertBahanAjar(){

    }

    public function doUpdateBahanAjar(){

    }

    public function doInsertSeminar(){

    }

    public function doUpdateSeminar(){

    }

    public function doInsertPKM(){

    }

    public function doUpdatePKM(){

    }

    public function doInsertPengelolaanInstitusi(){

    }

    public function doUpdatePengelolaanInstitusi(){

    }
  }
