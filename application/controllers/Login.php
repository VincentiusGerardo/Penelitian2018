<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('model_login');
  }

  public function index(){
    if(!$this->session->userdata('is_logged')){
        $this->load->view('login');
    }else{

    }
  }

  public function doLogin(){

  }

  public function doLogout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
