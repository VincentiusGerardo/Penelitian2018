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
      redirect();
    }
  }

  public function doLogin(){
    $this->form_validation->set_rules('username','username','trim|required|xss_clean');
    $this->form_validation->set_rules('password','password','trim|required|xss_clean');
    if($this->form_validation->run() == TRUE){
      $user = $this->input->post();
      $pass = $this->input->post();

      $res = $this->model_login->login($user,$pass);

      if($res){
        $data = array(
          'is_logged' => TRUE,
          'username' => $user
        );

        $this->session->set_userdata($data);
        redirect();
      }else{
        $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Invalid Username or Password!</div>");
        redirect(base_url());
      }
    }
  }

  public function doLogout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
