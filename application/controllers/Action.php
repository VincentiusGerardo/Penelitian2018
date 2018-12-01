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

    public function doUpdateIdentitas(){
  		$res = $this->model_utama->updateIdentitas($this->session->userdata('username'));

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah Identitas diri!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah Identitas diri!');
      }

  		redirect('Module/identitasdiri');
    }

    public function doInsertPendidikan(){
      $this->form_validation->set_rules('selProgram','selectProgram','required|xss_clean|trim');
      $this->form_validation->set_rules('thn','tahun','required|xss_clean|trim|max_length[4]');
      $this->form_validation->set_rules('pt','perguruanTinggi','required|xss_clean|trim');
      $this->form_validation->set_rules('jur','jurusan','required|xss_clean|trim');
      if(empty($_FILES['ij']['name'])){
        $this->form_validation->set_rules('ij','ijazah','required|xss_clean|trim');
      }
      if(empty($_FILES['tr']['name'])){
        $this->form_validation->set_rules('tr','transkrip','required|xss_clean|trim');
      }

      if($this->form_validation->run() == TRUE){
        $pro = $this->input->post('selProgram');
        $tahun = $this->input->post('thn');
        $perT = $this->input->post('pt');
        $jurusan = $this->input->post('jur');

        //Upload Ijazah
        if(!empty($_FILES['ij']['name'])){
          $config['upload_path']          = './media/ijazah/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = 'TRUE';
          $config['overwrite']            = 'TRUE';
          $config['file_name']            = 'Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

          $this->upload->initialize($config);
          $ijazah = $this->upload->data('file_name');
          $RES = $this->upload->do_upload('ij');
        }
        echo $RES;
        //Upload Transkrip
        if(!empty($_FILES['tr']['name'])){
          $config['upload_path']          = './media/transkrip/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = 'TRUE';
          $config['overwrite']            = 'TRUE';
          $config['file_name']            = 'Transkrip_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

          $this->upload->initialize($config);
          $transkrip = $this->upload->data('file_name');
          $this->upload->do_upload('tr');
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'PROGRAM' => $pro,
          'TAHUN' => $tahun,
          'PERGURUAN_TINGGI' => $perT,
          'JURUSAN' => $jurusan,
          'IJASAH' => $ijazah,
          'TRANSKRIP' => $transkrip
        );

        $this->model_utama->insertPendidikan($data);
        //redirect(base_url('Module/Pendidikan'));
      }else{
        echo "Ada yang kurang nih";
      }
    }

    public function doInsertPengajaran(){

    }

    public function doUpdatePengajaran(){

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

    public function doInsertPembimbing(){
      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/pembimbing/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = 'TRUE';
        $config['file_name']            = $this->input->post('NIM') . $this->input->post('JUDUL') ."_". $this->input->post('PERANAN') ."_". $this->session->userdata('username');

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');
      }

      $res = $this->model_utama->insertPembimbing($SK);

      if($res==true && res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data pembimbing!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data pembimbing!');
      }

  		redirect('Module/pembimbing');
    }

    public function doUpdatePembimbing($id){
      $res = $this->model_utama->updatePembimbing($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data pembimbing!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data pembimbing!');
      }

      redirect('Module/pembimbing');
    }

    public function doInsertPenguji(){
      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/penguji/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = 'TRUE';
        $config['file_name']            = $this->input->post('NIM') . $this->input->post('JUDUL') ."_". $this->input->post('PERANAN') ."_". $this->session->userdata('username');

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');
      }

      $res = $this->model_utama->insertPenguji($SK);

      if($res==true && $res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data penguji!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data penguji!');
      }

  		redirect('Module/penguji');
    }

    public function doUpdatePenguji($id){
      $res = $this->model_utama->updatePenguji($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data penguji!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data penguji!');
      }

      redirect('Module/penguji');
    }
  }
