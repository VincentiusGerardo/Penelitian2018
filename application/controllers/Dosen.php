<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller{

  public function __construct(){
    parent::__construct();
    // check session user
    if(!$this->session->userdata('is_logged')){
      redirect(base_url());
    }
  }


  public function index(){

  }

}
