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

    // Pendidikan

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

        // //Upload Ijazah
        if(!empty($_FILES['ij']['name'])){
          $config['upload_path']          = './media/ijazah/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

          $this->upload->initialize($config);
          $ijazah = $this->upload->data('file_name');
          $RES = $this->upload->do_upload('ij');
        }

        //Upload Transkrip
        if(!empty($_FILES['tr']['name'])){
          $config['upload_path']          = './media/transkrip/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
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

        $res = $this->model_utama->insertPendidikan($data);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg', 'Berhasil Menambahkan Pendidikan!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal Menambahkan Pendidikan!');
        }
        redirect('Module/Pendidikan');
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Pendidikan! Silahkan Check Kembali Inputan!');
        redirect('Module/Pendidikan');
      }
    }

    public function doUpdatePendidikan(){
      $this->form_validation->set_rules('kode','Kode Pendidikan','required|trim|xss_clean');
      $this->form_validation->set_rules('selProgram','Select Program','required|trim|xss_clean');
      $this->form_validation->set_rules('thn','Tahun','required|trim|xss_clean');
      $this->form_validation->set_rules('pt','Perguruan Tinggi','required|trim|xss_clean');
      $this->form_validation->set_rules('jur','Jurusan','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $kdk = $this->input->post('kode');
        $prog = $this->input->post('selProgram');
        $tahun = $this->input->post('thn');
        $perT = $this->input->post('pt');
        $jurusan = $this->input->post('jur');

        $data = array(
          'PROGRAM' => $prog,
          'TAHUN' => $tahun,
          'PERGURUAN_TINGGI' => $perT,
          'JURUSAN' => $jurusan,
        );

        $res = $this->model_utama->updatePendidikan($data,$kdk);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg', 'Berhasil Update Pendidikan!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal Update Pendidikan!');
        }
        redirect('Module/Pendidikan');
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Pendidikan! Silahkan Check Kembali Inputan!');
        redirect('Module/Pendidikan');
      }
    }

    public function doUploadIjazah(){
      $this->form_validation->set_rules('idnya','id pendidikan','required|xss_clean|trim');
      $this->form_validation->set_rules('programnya','program pendidikan','required|xss_clean|trim');
      if(empty($_FILES['ij']['name'])){
        $this->form_validation->set_rules('ij','ijazah','required|xss_clean|trim');
      }

      if($this->form_validation->run() == TRUE){
        $kode = $this->input->post('idnya');
        $pro = $this->input->post('programnya');

        $config['upload_path']          = './media/ijazah/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

        $this->upload->initialize($config);
        $res = $this->upload->do_upload('ij');
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','File Uploaded!');
          redirect('Module/Pendidikan');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','File Not Uploaded!');
          redirect('Module/Pendidikan');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','File Not Supported!');
        redirect('Module/Pendidikan');
      }
    }

    public function doUploadTranskrip(){
      $this->form_validation->set_rules('idnya','id pendidikan','required|xss_clean|trim');
      $this->form_validation->set_rules('programnya','program pendidikan','required|xss_clean|trim');
      if(empty($_FILES['tr']['name'])){
        $this->form_validation->set_rules('tr','ijazah','required|xss_clean|trim');
      }

      if($this->form_validation->run() == TRUE){
        $kode = $this->input->post('idnya');
        $pro = $this->input->post('programnya');

        $config['upload_path']          = './media/transkrip/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Transkrip_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

        $this->upload->initialize($config);
        $res = $this->upload->do_upload('tr');
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','File Uploaded!');
          redirect('Module/Pendidikan');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','File Not Uploaded!');
          redirect('Module/Pendidikan');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','File Not Supported!');
        redirect('Module/Pendidikan');
      }
    }

    public function doDeletePendidikan(){
      $this->form_validation->set_rules('idnya','id_pendidikan','required|xss_clean|trim');
      $this->form_validation->set_rules('programnya','program_pendidikan','required|xss_clean|trim');
      if($this->form_validation->run() == TRUE){
        $kode = $this->input->post('idnya');
        $prog = $this->input->post('programnya');
        $r = $this->model_utama->deletePendidikan($kode);
        if($r){
          unlink(base_url('media/ijasah/Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username')));
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Sucessfuly Deleted!');
          redirect('Module/Pendidikan');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Selection Can Not Be Deleted!');
          redirect('Module/Pendidikan');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Error!');
        redirect('Module/Pendidikan');
      }
    }

    public function doInsertPengajaran(){

    }

    public function doUpdatePengajaran(){

    }

    //----------------------------------------------------DO PENELITIAN
    public function doInsertPenelitian(){
      $res = $this->model_utama->insertPenelitian();

      $dat = $this->model_utama->getwhere_penelitian();
      foreach ($dat as $pem) {
        $namafile = $pem['ID_PENELITIAN']."_penelitian_".$this->session->userdata('username');
        $id = $pem['ID_PENELITIAN'];
      }

      if(!empty($_FILES['SURAT_TUGAS']['name'])){
        $config['upload_path']          = './media/penelitian/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SURAT_TUGAS');

        $this->model_utama->updateDokumenPenelitian($id, $namafile);
      }

      if($res==true && $res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data penelitian!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data penelitian!');
      }

      redirect('Module/penelitian');
    }

    public function doUpdatePenelitian($id){
      $res = $this->model_utama->updatePenelitian($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data penelitian!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data penelitian!');
      }

      redirect('Module/penelitian');
    }

    public function doDeletePenelitian($id){
      $res = $this->model_utama->deletePenelitian($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menghapus data Penelitian!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menghapus data Penelitian!');
      }

      redirect('Module/penelitian');
    }

    public function doDokumenPenelitian($id){
      $namafile = $id."_penelitian_".$this->session->userdata('username');

      if(!empty($_FILES['SURAT_TUGAS']['name'])){
        $config['upload_path']          = './media/penelitian/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SURAT_TUGAS');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen penelitian!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen penelitian!');
      }

      redirect('Module/penelitian');
    }
    //----------------------------------------------------DO PENELITIAN

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

    //----------------------------------------------------DO PEMBIMBING
    public function doInsertPembimbing(){

      $res = $this->model_utama->insertPembimbing();

      $dat = $this->model_utama->getwhere_Pembimbing();
      foreach ($dat as $pem) {
        $namafile = $pem['ID_PEMBIMBING']."_pembimbing_".$this->session->userdata('username');
        $id = $pem['ID_PEMBIMBING'];
      }

      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/pembimbing/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = 'TRUE';
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');

        $this->model_utama->updateDokumenPembimbing($id, $namafile);
      }

      if($res==true && $res_u == "1"){
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

    public function doDeletePembimbing($id){
      $res = $this->model_utama->deletePembimbing($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menghapus data pembimbing!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menghapus data pembimbing!');
      }

      redirect('Module/pembimbing');
    }

    public function doDokumenPembimbing($id){
      $namafile = $id."_pembimbing_".$this->session->userdata('username');

      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/pembimbing/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen pembimbing!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen pembimbing!');
      }

      redirect('Module/pembimbing');
    }
    //-------------------------------------------------------DO PEMBIMBING

    //----------------------------------------------------DO PENGUJI
    public function doInsertPenguji(){

      $res = $this->model_utama->insertPenguji();

      $dat = $this->model_utama->getwhere_penguji();
      foreach ($dat as $pem) {
        $namafile = $pem['ID_PENGUJI']."_penguji_".$this->session->userdata('username');
        $id = $pem['ID_PENGUJI'];
      }

      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/penguji/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = 'TRUE';
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');

        $this->model_utama->updateDokumenPenguji($id, $namafile);
      }

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

    public function doDeletePenguji($id){
      $res = $this->model_utama->deletePenguji($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menghapus data penguji!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menghapus data penguji!');
      }

      redirect('Module/penguji');
    }

    public function doDokumenPenguji($id){
      $namafile = $id."_penguji_".$this->session->userdata('username');

      if(!empty($_FILES['SK']['name'])){
        $config['upload_path']          = './media/penguji/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SK');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen penguji!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen penguji!');
      }

      redirect('Module/penguji');
    }
    //-------------------------------------------------------DO PENGUJI

    //-------------------------------------------------------DO ORGANISASI
    public function doInsertOrganisasi(){

      $res = $this->model_utama->insertOrganisasi();

      $dat = $this->model_utama->getwhere_organisasi();
      foreach ($dat as $pem) {
        $namafile = $pem['ID_ORGANISASI']."_organisasi_".$this->session->userdata('username');
        $id = $pem['ID_ORGANISASI'];
      }

      if(!empty($_FILES['NOMOR']['name'])){
        $config['upload_path']          = './media/organisasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('NOMOR');

        $this->model_utama->updateDokumenOrganisasi($id, $namafile);
      }

      if($res==true && $res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data organisasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data organisasi!');
      }

      redirect('Module/organisasiprofesi');
    }

    public function doUpdateOrganisasi($id){
      $res = $this->model_utama->updateOrganisasi($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data organisasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data organisasi!');
      }

      redirect('Module/organisasiprofesi');
    }

    public function doDeleteOrganisasi($id){
      $res = $this->model_utama->deleteOrganisasi($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menghapus data organisasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menghapus data organisasi!');
      }

      redirect('Module/organisasiprofesi');
    }

    public function doDokumenOrganisasi($id){
      $namafile = $id."_organisasi_".$this->session->userdata('username');

      if(!empty($_FILES['NOMOR']['name'])){
        $config['upload_path']          = './media/organisasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('NOMOR');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen organisasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen organisasi!');
      }

      redirect('Module/organisasiprofesi  ');
    }
    //-------------------------------------------------------DO ORGANISASI

    //-------------------------------------------------------DO PENGHARGAAN
    public function doInsertPenghargaan(){
      $res = $this->model_utama->insertPenghargaan();

      $dat = $this->model_utama->getwhere_penghargaan();
      foreach ($dat as $pem) {
        $namafile = $pem['ID_PENGHARGAAN']."_penghargaan_".$this->session->userdata('username');
        $id = $pem['ID_PENGHARGAAN'];
      }

      if(!empty($_FILES['SERTIFIKAT']['name'])){
        $config['upload_path']          = './media/penghargaan/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SERTIFIKAT');

        $this->model_utama->updateDokumenPenghargaan($id, $namafile);
      }

      if($res==true && $res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data Penghargaan!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data Penghargaan!');
      }

      redirect('Module/penghargaan');
    }

    public function doUpdatePenghargaan($id){
      $res = $this->model_utama->updatePenghargaan($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data penghargaan!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data penghargaan!');
      }

      redirect('Module/penghargaan');
   }

   public function doDeletePenghargaan($id){
     $res = $this->model_utama->deletePenghargaan($id);

     if($res==true){
         $this->session->set_flashdata('alert','success');
         $this->session->set_flashdata('msg', 'Berhasil menghapus data Penghargaan!');
     }else{
         $this->session->set_flashdata('alert','error');
         $this->session->set_flashdata('msg','Gagal menghapus data Penghargaan!');
     }

     redirect('Module/penghargaan');
   }

   public function doDokumenPenghargaan($id){
     $namafile = $id."_penghargaan_".$this->session->userdata('username');

     if(!empty($_FILES['SERTIFIKAT']['name'])){
       $config['upload_path']          = './media/penghargaan/';
       $config['allowed_types']        = 'pdf';
       $config['file_ext_tolower']     = 'TRUE';
       $config['overwrite']            = TRUE;
       $config['file_name']            = $namafile;

       $this->upload->initialize($config);
       $SK = $this->upload->data('file_name');
       $res_u = $this->upload->do_upload('SERTIFIKAT');
     }

     if($res_u == "1"){
         $this->session->set_flashdata('alert','success');
         $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen Penghargaan!');
     }else{
         $this->session->set_flashdata('alert','error');
         $this->session->set_flashdata('msg','Gagal mengubah dokumen Penghargaan!');
     }

     redirect('Module/penghargaan');
   }
   //-------------------------------------------------------DO PENGHARGAAN
}
