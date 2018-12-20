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

        if(empty($_FILES['ij']['name']) && empty($_FILES['tr']['name'])){
          echo "Ijasah dan Transkrip kosong";
        }else if(empty($_FILES['ij']['name']) && !empty($_FILES['tr']['name'])){
          echo "Ijasah kosong, Transkrip: " . $_FILES['tr']['name'];
        }else if(!empty($_FILES['ij']['name']) && empty($_FILES['tr']['name'])){
          echo "Ijasah: " . $_FILES['ij']['name'] . " Transkrip kosong";
        }else{
          echo $_FILES['ij']['name'] . " &nbsp; " . $_FILES['tr']['name'];
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Pendidikan! Silahkan Check Kembali Inputan!');
        redirect('Module/Pendidikan');
      }
    }

    public function doInsertPengajaran(){

    }

    public function doUpdatePengajaran(){

    }

    public function doInsertPenelitian(){
      if(!empty($_FILES['SURAT_TUGAS']['name'])){
        $config['upload_path']          = './media/penelitian/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = 'TRUE';
        $config['file_name']            = $this->session->userdata('username')."_". $this->input->post('TAHUN') ."_". $this->input->post('JUDUL');

        $this->upload->initialize($config);
        $SURAT_TUGAS = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SURAT_TUGAS');
      }

      $res = $this->model_utama->insertPenelitian($SURAT_TUGAS);

      if($res==true && $res_u=="1"){
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

    public function doInsertPenghargaan(){
      if(!empty($_FILES['SERTIFIKAT']['name'])){
        $config['upload_path']          = './media/penghargaan/';
        $config['allowed_types']        = 'pdf';
        //$config['file_ext_tolower']     = TRUE;
        //$config['overwrite']            = TRUE;
        $config['file_name']            = $this->session->userdata('username')."_".$this->input->post('BENTUK')."_".$this->input->post('PEMBERI');

        $this->upload->initialize($config);
        $SERTIFIKAT = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('SERTIFIKAT');
      }

      $res = $this->model_utama->insertPenghargaan($SERTIFIKAT);

      if($res==true && $res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data penghargaan!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data penghargaan!');
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
}
