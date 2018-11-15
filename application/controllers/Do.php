<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Do extends CI_Controller{

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

    }

    public function doUpdatePendidikan(){

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
