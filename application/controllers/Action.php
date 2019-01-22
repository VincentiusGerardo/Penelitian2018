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

    public function doChangePassword(){
      $this->form_validation->set_rules('oldPass','Old Password','required|trim|xss_clean');
      $this->form_validation->set_rules('newPass','New Password','required|trim|xss_clean');
      $this->form_validation->set_rules('repPass','Repeat New Password','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $old = $this->input->post('oldPass');
        $new = $this->input->post('newPass');
        $rep = $this->input->post('repPass');

        $b = $this->model_utama->verifyPass($old,$this->session->userdata('username'));

        if($b == true){
          if($old === $new){
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal Merubah Password! Password Lama Tidak Boleh Sama Dengan Password Lama!');
            redirect('Module/ChangePassword');
          }else if($new === $rep){
            $this->model_utama->updatePassword($this->session->userdata('username'),$new);
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil Merubah Password!');
            redirect('Module/ChangePassword');
          }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal Merubah Password! Password Baru Tidak Sama!');
            redirect('Module/ChangePassword');
          }
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Merubah Password! Password Salah!');
          redirect('Module/ChangePassword');
        }

      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Merubah Password! Silahkan Check Kembali Inputan!');
        redirect('Module/ChangePassword');
      }
    }

    public function doInsertDosen(){
      $this->form_validation->set_rules('nip','NIP NIK','required|trim|xss_clean');
      $this->form_validation->set_rules('nd','Nama Dosen','required|trim|xss_clean');
      $this->form_validation->set_rules('tlhr','','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $nik = $this->input->post('nip');
        $nama = $this->input->post('nd');
        $tgl = $this->input->post('tlhr');
        $pass = "Kalbis" . date("dmy",strtotime($tgl));

        $data = array(
          'NIP_NIK' => $nik,
          'NAMA' => $nama,
          'PASSWORD' => password_hash($pass,PASSWORD_DEFAULT),
          'TANGGAL_LAHIR' => $tgl
        );

        $res = $this->model_utama->insertDosen($data);

        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menambahkan Dosen!');
          redirect('Module/Users');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menambahkan Dosen!');
          redirect('Module/Users');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Dosen! Silahkan Check Kembali Inputan!');
        redirect('Module/Users');
      }
    }

    public function doUpdateDosen(){
      $this->form_validation->set_rules('nip','NIP NIK','required|trim|xss_clean');
      $this->form_validation->set_rules('nd','Nama Dosen','required|trim|xss_clean');
      $this->form_validation->set_rules('tlhr','','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $nik = $this->input->post('nip');
        $nama = $this->input->post('nd');
        $tgl = $this->input->post('tlhr');
        $pass = "Kalbis" . date("dmy",strtotime($tgl));

        $data = array(
          'NAMA' => $nama,
          'PASSWORD' => password_hash($pass,PASSWORD_DEFAULT),
          'TANGGAL_LAHIR' => $tgl
        );

        $res = $this->model_utama->updateDosen($nik,$data);

        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah Dosen!');
          redirect('Module/Users');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah Dosen!');
          redirect('Module/Users');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Dosen! Silahkan Check Kembali Inputan!');
        redirect('Module/Users');
      }
    }

    public function doDeleteDosen(){
      $this->form_validation->set_rules('idnya','NIP NIK','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $nik = $this->input->post('idnya');
        $res = $this->model_utama->deleteDosen($nik);

        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menghapus Dosen!');
          redirect('Module/Users');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menghapus Dosen!');
          redirect('Module/Users');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menghapus Dosen! Silahkan Check Kembali Inputan!');
        redirect('Module/Users');
      }
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
      // if(empty($_FILES['ij']['name'])){
      //   $this->form_validation->set_rules('ij','ijazah','required|xss_clean|trim');
      // }
      // if(empty($_FILES['tr']['name'])){
      //   $this->form_validation->set_rules('tr','transkrip','required|xss_clean|trim');
      // }

      if($this->form_validation->run() == TRUE){
        $pro = $this->input->post('selProgram');
        $tahun = $this->input->post('thn');
        $perT = $this->input->post('pt');
        $jurusan = $this->input->post('jur');

        // //Upload Ijazah
        if(!empty($_FILES['ij']['name'])){
          $config['upload_path']          = './media/pendidikan/ijazah/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

          $this->upload->initialize($config);
          $ijazah = $this->upload->data('file_name');
          $RES = $this->upload->do_upload('ij');
        }else{
          $ijazah = null;
        }

        //Upload Transkrip
        if(!empty($_FILES['tr']['name'])){
          $config['upload_path']          = './media/pendidikan/transkrip/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Transkrip_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

          $this->upload->initialize($config);
          $transkrip = $this->upload->data('file_name');
          $this->upload->do_upload('tr');
        }else{
          $transkrip = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'PROGRAM' => $pro,
          'TAHUN' => $tahun,
          'PERGURUAN_TINGGI' => $perT,
          'JURUSAN' => $jurusan,
          'IJASAH' => str_replace(" ", "_",$ijazah),
          'TRANSKRIP' => str_replace(" ", "_",$transkrip)
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

        $config['upload_path']          = './media/pendidikan/ijazah/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Ijazah_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

        $this->upload->initialize($config);
        $data = array(
          'IJASAH' => str_replace(" ", "_",$this->upload->data('file_name'))
        );
        $res = $this->model_utama->updateIjasah($kode,$data);
        if($res == true){
          $this->upload->do_upload('ij');
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

        $config['upload_path']          = './media/pendidikan/transkrip/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Transkrip_' . ucfirst(strtolower($pro)) . "_" . $this->session->userdata('username');

        $this->upload->initialize($config);
        $data = array(
          'TRANSKRIP' =>str_replace(" ", "_",$this->upload->data('file_name'))
        );
        $res = $this->model_utama->updateTranskrip($kode,$data);
        if($res == true){
          $this->upload->do_upload('tr');
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
      $this->form_validation->set_rules('ijasahnya','ijasah','required|xss_clean|trim');
      $this->form_validation->set_rules('transkripnya','transkrip','required|xss_clean|trim');
      if($this->form_validation->run() == TRUE){
        $kode = $this->input->post('idnya');
        $prog = $this->input->post('programnya');
        $ij = $this->input->post('ijasahnya');
        $tr = $this->input->post('transkripnya');
        $r = $this->model_utama->deletePendidikan($kode);
        if($r){
          unlink('./media/pendidikan/ijazah/' . $ij . ".pdf");
          unlink('./media/pendidikan/transkrip/' . $tr . ".pdf");
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

    //Pengajaran

    public function doInsertPengajaran(){
      $this->form_validation->set_rules('matkul','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('progPend','ProgramPendidikan','required|trim|xss_clean');
      $this->form_validation->set_rules('insti','Institusi','required|trim|xss_clean');
      $this->form_validation->set_rules('jur','jurusan','required|trim|xss_clean');
      $this->form_validation->set_rules('prostud','ProgramStudi','required|trim|xss_clean');
      $this->form_validation->set_rules('sem','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('ta','TahunAjaran','required|trim|xss_clean');
      $this->form_validation->set_rules('tsk','TanggalSuratKeputusan','required|trim|xss_clean');
      // if(empty($_FILES['sk']['name'])){
      //     $this->form_validation->set_rules('sk','SuratKeputusan','required|trim|xss_clean');
      // }

      if($this->form_validation->run() == TRUE){
        $m = $this->input->post('matkul');
        $p = $this->input->post('progPend');
        $i = $this->input->post('insti');
        $j = $this->input->post('jur');
        $ps = $this->input->post('prostud');
        $s = $this->input->post('sem');
        $t = $this->input->post('ta');
        $tgl = $this->input->post('tsk');

        if(empty($_FILES['sk']['name'])){
        $config['upload_path']          = './media/pengajaran/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'sk_' . ucfirst(strtolower($p)) . "_" . $this->session->userdata('username') . "_" . $ps . "_" . $t;

        $this->upload->initialize($config);
        $sk = $this->upload->data('file_name');
        $this->upload->do_upload('sk');
        }else{
          $sk = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'MATA_KULIAH' => $m,
          'PROGRAM_PENDIDIKAN' => $p,
          'INSTITUSI' => $i,
          'JURUSAN' => $j,
          'PROGRAM_STUDI' => $ps,
          'SEMESTER' => $s,
          'TAHUN_AKADEMIK' => $t,
          'TanggalSK' => $tgl,
          'SK' => str_replace(" ", "_",$sk)
        );
        $res = $this->model_utama->insertPengajaran($data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menambahkan Pengajaran!');
          redirect('Module/Pengajaran');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menambahkan Pengajaran!');
          redirect('Module/Pengajaran');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Pengajaran! Silahkan Check Kembali Inputan!');
        redirect('Module/Pengajaran');
      }

    }

    public function doUpdatePengajaran(){
      $this->form_validation->set_rules('id','IDPengajaran','required|trim|xss_clean');
      $this->form_validation->set_rules('matkul','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('progPend','ProgramPendidikan','required|trim|xss_clean');
      $this->form_validation->set_rules('insti','Institusi','required|trim|xss_clean');
      $this->form_validation->set_rules('jur','Jurusan','required|trim|xss_clean');
      $this->form_validation->set_rules('prostud','ProgramStudi','required|trim|xss_clean');
      $this->form_validation->set_rules('sem','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('ta','TahunAkademik','required|trim|xss_clean');
      $this->form_validation->set_rules('tsk','TanggalSK','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('id');
        $mk = $this->input->post('matkul');
        $program = $this->input->post('progPend');
        $institusi = $this->input->post('insti');
        $jurusan = $this->input->post('jur');
        $programS = $this->input->post('prostud');
        $semster = $this->input->post('sem');
        $tahunA = $this->input->post('ta');
        $tahunSK = $this->input->post('tsk');

        $data = array(
          'MATA_KULIAH' => $mk,
          'PROGRAM_PENDIDIKAN' => $program,
          'INSTITUSI' => $institusi,
          'JURUSAN' => $jurusan,
          'PROGRAM_STUDI' => $programS,
          'SEMESTER' => $semster,
          'TAHUN_AKADEMIK' => $tahunA,
          'TanggalSK' => $tahunSK
        );

        $res = $this->model_utama->updatePengajaran($id,$data);

        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah Pengajaran!');
          redirect('Module/Pengajaran');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah Pengajaran!');
          redirect('Module/Pengajaran');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Pengajaran! Silahkan Check Kembali Inputan!');
        redirect('Module/Pengajaran');
      }
    }

    public function doUploadSK(){
      $this->form_validation->set_rules('id','IDPengajran','required|trim|xss_clean');
      $this->form_validation->set_rules('prog','ProgramPendidikan','required|trim|xss_clean');
      $this->form_validation->set_rules('prodi','ProgramStudi','required|trim|xss_clean');
      $this->form_validation->set_rules('ta','TahunAkademik','required|trim|xss_clean');
      if(empty($_FILES['sk']['name'])){
        $this->form_validation->set_rules('sk','SuratKeterangan','required|trim|xss_clean');
      }

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('id');
        $p = $this->input->post('prog');
        $ps = $this->input->post('prodi');
        $t = $this->input->post('ta');

        $config['upload_path']          = './media/pengajaran/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'sk_' . ucfirst(strtolower($p)) . "_" . $this->session->userdata('username') . "_" . $ps . "_" . $t;

        $this->upload->initialize($config);
        $data = array(
          'SK' => str_replace(" ", "_",$this->upload->data('file_name'))
        );
        $res = $this->model_utama->updateDokumPengajaran($id,$data);

        if($res == true){
          $this->upload->do_upload('sk');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','File Uploaded!');
          redirect('Module/Pengajaran');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','File Not Uploaded!');
          redirect('Module/Pengajaran');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Pengajaran! Silahkan Check Kembali Inputan!');
        redirect('Module/Pengajaran');
      }
    }

    public function doDeletePengajaran(){
      $this->form_validation->set_rules('id','IDPengajran','required|trim|xss_clean');
      $this->form_validation->set_rules('prog','ProgramPendidikan','required|trim|xss_clean');
      $this->form_validation->set_rules('prodi','ProgramStudi','required|trim|xss_clean');
      $this->form_validation->set_rules('ta','TahunAkademik','required|trim|xss_clean');
      $this->form_validation->set_rules('sk','SuratKeputusan','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('id');
        $p = $this->input->post('prog');
        $ps = $this->input->post('prodi');
        $t = $this->input->post('ta');
        $sk = $this->input->post('sk');

        $res = $this->model_utama->deletePengajaran($id);
        if($res == true){
          unlink('./media/pengajaran/' . $sk . ".pdf");
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Meghapus Pengajaran!');
          redirect('Module/Pengajaran');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Meghapus Pengajaran!');
          redirect('Module/Pengajaran');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Meghapus Pengajaran! Silahkan Check Kembali Inputan!');
        redirect('Module/Pengajaran');
      }
    }

    //Penelitian

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

      $namafile = $id."_penelitian_".$this->session->userdata('username');
      unlink('./media/penelitian/' . $namafile . ".pdf");
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

    //Bahan Ajar

    public function doInsertBahanAjar(){
      $this->form_validation->set_rules('MatKul','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('Prog','Program','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','JenisBahanAjar','required|trim|xss_clean');
      $this->form_validation->set_rules('semesternya','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('tahunnya','Tahun','required|trim|xss_clean');
      // if(empty($_FILES['penug']['name'])){
      //   $this->form_validation->set_rules('penug','Penugasan','required|trim|xss_clean');
      // }

      // if(empty($_FILES['buktiKin']['name'])){
      //   $this->form_validation->set_rules('buktiKin','BuktiKinerja','required|trim|xss_clean');
      // }

      if($this->form_validation->run() == TRUE){
        $mk = $this->input->post('MatKul');
        $p = $this->input->post('Prog');
        $j = $this->input->post('jenisnya');
        $s = $this->input->post('semesternya');
        $t = $this->input->post('tahunnya');

        if(!empty($_FILES['penug']['name'])){
          $config['upload_path']          = './media/bahan_ajar/penugasan/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Peugasan_' . $mk . "_" . $this->session->userdata('username') . "_" . $s . "_" . $t;

          $this->upload->initialize($config);
          $penugasan = $this->upload->data('file_name');
          $this->upload->do_upload('penug');
        }else{
          $penugasan = null;
        }

        if(!empty($_FILES['buktiKin']['name'])){
          $config['upload_path']          = './media/bahan_ajar/bukti_kinerja/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Bukti_Kinerja_' . $mk . "_" . $this->session->userdata('username') . "_" . $s . "_" . $t;

          $this->upload->initialize($config);
          $buktikinerja = $this->upload->data('file_name');
          $this->upload->do_upload('buktiKin');
        }else{
          $buktikinerja = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'MATA_KULIAH' => $mk,
          'PROGRAM' => $p,
          'JENIS' => $j,
          'SEMESTER' => $s,
          'TAHUN' => $t,
          'PENUGASAN' => str_replace(" ", "_",$penugasan),
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
        );

        // print_r($data);

        $res = $this->model_utama->insertBahanAjar($data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menambahkan Bahan Ajar!');
          redirect('Module/BahanAjar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menambahkan Bahan Ajar!');
          redirect('Module/BahanAjar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Bahan Ajar! Silahkan Check Kembali Inputan!');
        redirect('Module/BahanAjar');
      }
    }

    public function doUpdateBahanAjar(){
      $this->form_validation->set_rules('id','IDBA','required|trim|xss_clean');
      $this->form_validation->set_rules('MatKul','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('Prog','Program','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','JenisBahanAjar','required|trim|xss_clean');
      $this->form_validation->set_rules('semesternya','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('tahunnya','Tahun','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('id');
        $mk = $this->input->post('MatKul');
        $p = $this->input->post('Prog');
        $j = $this->input->post('jenisnya');
        $s = $this->input->post('semesternya');
        $t = $this->input->post('tahunnya');

        $data = array(
          'MATA_KULIAH' => $mk,
          'PROGRAM' => $p,
          'JENIS' => $j,
          'SEMESTER' => $s,
          'TAHUN' => $t
        );

        $res = $this->model_utama->updateBahanAjar($id,$data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah Bahan Ajar!');
          redirect('Module/BahanAjar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah Bahan Ajar!');
          redirect('Module/BahanAjar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Bahan Ajar! Silahkan Check Kembali Inputan!');
        redirect('Module/BahanAjar');
      }
    }

    public function doUploadPenugasan(){
      $this->form_validation->set_rules('idnya','id','required|trim|xss_clean');
      $this->form_validation->set_rules('mkya','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('sem','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('thn','Tahun','required|trim|xss_clean');
      if(empty($_FILES['penug']['name'])){
        $this->form_validation->set_rules('penug','Penugasan','required|trim|xss_clean');
      }
      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $mk = $this->input->post('mkya');
        $s = $this->input->post('sem');
        $t = $this->input->post('thn');
        $config['upload_path']          = './media/bahan_ajar/penugasan/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Peugasan_' . $mk . "_" . $this->session->userdata('username') . "_" . $s . "_" . $t;

        $this->upload->initialize($config);
        $data = array(
          'PENUGASAN' => str_replace(" ", "_",$penugasan)
        );
        $res = $this->model_utama->updatePenugasanBA($id,$data);
        if($res == true){
          $this->upload->do_upload('penug');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Upload Penugasan!');
          redirect('Module/BahanAjar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Upload Penugasan!');
          redirect('Module/BahanAjar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Penugasan! Silahkan Check Kembali Inputan!');
        redirect('Module/BahanAjar');
      }
    }

    public function doUploadBuktiKinerja(){
      $this->form_validation->set_rules('idnya','id','required|trim|xss_clean');
      $this->form_validation->set_rules('mkya','MataKuliah','required|trim|xss_clean');
      $this->form_validation->set_rules('sem','Semester','required|trim|xss_clean');
      $this->form_validation->set_rules('thn','Tahun','required|trim|xss_clean');
      if(empty($_FILES['buktiKin']['name'])){
        $this->form_validation->set_rules('buktiKin','Bukti Kinerja','required|trim|xss_clean');
      }
      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $mk = $this->input->post('mkya');
        $s = $this->input->post('sem');
        $t = $this->input->post('thn');
        $config['upload_path']          = './media/bahan_ajar/bukti_kinerja/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Bukti_Kinerja_' . $mk . "_" . $this->session->userdata('username') . "_" . $s . "_" . $t;

        $this->upload->initialize($config);
        $data = array(
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
        );
        $res = $this->model_utama->updateBuktiBA($id,$data);
        if($res == true){
          $this->upload->do_upload('buktiKin');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Upload Penugasan!');
          redirect('Module/BahanAjar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Upload Penugasan!');
          redirect('Module/BahanAjar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Penugasan! Silahkan Check Kembali Inputan!');
        redirect('Module/BahanAjar');
      }
    }

    public function doDeleteBahanAjar(){
      $this->form_validation->set_rules('idnya','id','required|trim|xss_clean');
      $this->form_validation->set_rules('penugasannya','Penugasan','required|trim|xss_clean');
      $this->form_validation->set_rules('buktinya','Bukti Kinerja','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $p = $this->input->post('penugasannya');
        $b = $this->input->post('buktinya');

        $res = $this->model_utama->deleteBahanAjar($id);

        if($res == true){
          unlink('./media/bahan_ajar/penugasan/'. $p . ".pdf");
          unlink('./media/bahan_ajar/bukti_kinerja/'. $b . ".pdf");
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menghapus Bahan Ajar!');
          redirect('Module/BahanAjar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menghapus Bahan Ajar!');
          redirect('Module/BahanAjar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menghapus Bahan Ajar! Silahkan Check Kembali Inputan!');
        redirect('Module/BahanAjar');
      }
    }

    //Seminar

    public function doInsertSeminar(){
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','Jenis Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('judulS','Judul Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('penyeleng','Penyelenggara','required|trim|xss_clean');
      $this->form_validation->set_rules('peranannya','Peran','required|trim|xss_clean');
      // if(empty($_FILES['penug']['name'])){
      //   $this->form_validation->set_rules('penug','Penugasan','required|trim|xss_clean');
      // }

      // if(empty($_FILES['buktiKin']['name'])){
      //   $this->form_validation->set_rules('buktiKin','BuktiKinerja','required|trim|xss_clean');
      // }

      if($this->form_validation->run() == TRUE){
        $mulai = $this->input->post('TANGGAL_MULAI');
        $jenis = $this->input->post('jenisnya');
        $nama = $this->input->post('judulS');
        $p = $this->input->post('penyeleng');
        $peran = $this->input->post('peranannya');

        if(!empty($_FILES['penug']['name'])){
          $config['upload_path']          = './media/seminar/penugasan/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Peugasan_' . $jenis . "_" . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $mulai;

          $this->upload->initialize($config);
          $penugasan = $this->upload->data('file_name');
          $this->upload->do_upload('penug');
        }else{
          $penugasan = null;
        }

        if(!empty($_FILES['buktiKin']['name'])){
          $config['upload_path']          = './media/seminar/bukti_kinerja/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Bukti_Kinerja_' . $jenis . "_" . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $mulai;

          $this->upload->initialize($config);
          $buktikinerja = $this->upload->data('file_name');
          $this->upload->do_upload('buktiKin');
        }else{
          $buktikinerja = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'TANGGAL' => $mulai,
          'JENIS' => $jenis,
          'JUDUL' => $nama,
          'PENYELENGGARA' => $p,
          'PERANAN' => $peran,
          'PENUGASAN' => str_replace(" ", "_",$penugasan),
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
        );

        $res = $this->model_utama->insertWorkshop($data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menambahkan Seminar!');
          redirect('Module/Seminar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menambahkan Seminar!');
          redirect('Module/Seminar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Seminar! Silahkan Check Kembali Inputan!');
        redirect('Module/Seminar');
      }
    }

    public function doUpdateSeminar(){
      $this->form_validation->set_rules('idnya','IDSeminar','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAIUpd','','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','Jenis Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('judulS','Judul Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('penyeleng','Penyelenggara','required|trim|xss_clean');
      $this->form_validation->set_rules('peranannya','Peran','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tgl = $this->input->post('TANGGAL_MULAIUpd');
        $jenis = $this->input->post('jenisnya');
        $nama = $this->input->post('judulS');
        $p = $this->input->post('penyeleng');
        $peran = $this->input->post('peranannya');

        // echo $id . "<br>" . $tgl . "<br/>" . $jenis . "<br/>" . $nama . "<br/>" . $p . "<br/>" . $peran;
        $data = array(
          'TANGGAL' => $tgl,
          'JENIS' => $jenis,
          'JUDUL' => $nama,
          'PENYELENGGARA' => $p,
          'PERANAN' => $peran
        );

        $res = $this->model_utama->updateWorkship($id,$data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah Seminar!');
          redirect('Module/Seminar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah Seminar!');
          redirect('Module/Seminar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Seminar! Silahkan Check Kembali Inputan!');
        redirect('Module/Seminar');
      }
    }

    public function doUploadPenugasanSeminar(){
      $this->form_validation->set_rules('idnya','IDSeminar','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','Jenis Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('judulS','Judul Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('peranannya','Peran','required|trim|xss_clean');
      if(empty($_FILES['penug']['name'])){
        $this->form_validation->set_rules('penug','Penugasan','required|trim|xss_clean');
      }

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $jenis = $this->input->post('jenisnya');
        $nama = $this->input->post('judulS');
        $peran = $this->input->post('peranannya');

        // echo $id . "<br>" . $jenis . "<br>" . $nama . "<br>" . $peran;

        $config['upload_path']          = './media/seminar/penugasan/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Peugasan_' . $jenis . "_" . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $mulai;

        $this->upload->initialize($config);
        $penugasan = $this->upload->data('file_name');
        $this->upload->do_upload('penug');

        $data = array(
          'PENUGASAN' => str_replace(" ", "_",$penugasan)
        );

        $res = $this->model_utama->updateDokumPenugasan($id,$data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Upload Penugasan!');
          redirect('Module/Seminar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Upload Penugasan!');
          redirect('Module/Seminar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Penugasan! Silahkan Check Kembali Inputan!');
        redirect('Module/Seminar');
      }
    }

    public function doUploadBuktiKinerjaSeminar(){
      $this->form_validation->set_rules('idnya','IDSeminar','required|trim|xss_clean');
      $this->form_validation->set_rules('jenisnya','Jenis Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('judulS','Judul Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('peranannya','Peran','required|trim|xss_clean');
      if(empty($_FILES['buktiKin']['name'])){
        $this->form_validation->set_rules('buktiKin','BuktiKinerja','required|trim|xss_clean');
      }

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $jenis = $this->input->post('jenisnya');
        $nama = $this->input->post('judulS');
        $peran = $this->input->post('peranannya');

        $config['upload_path']          = './media/seminar/bukti_kinerja/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Bukti_Kinerja_' . $jenis . "_" . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $mulai;

        $this->upload->initialize($config);
        $buktikinerja = $this->upload->data('file_name');
        $this->upload->do_upload('buktiKin');

        $data = array(
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
        );

        $res = $this->model_utama->updateDokumBukti($id,$data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Upload Bukti Kinerja!');
          redirect('Module/Seminar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Upload Bukti Kinerja!');
          redirect('Module/Seminar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Bukti Kinerja! Silahkan Check Kembali Inputan!');
        redirect('Module/Seminar');
      }
    }

    public function doDeleteSeminar(){
      $this->form_validation->set_rules('idnya','id Seminar','required|trim|xss_clean');
      $this->form_validation->set_rules('pnya','penugasan','required|trim|xss_clean');
      $this->form_validation->set_rules('bknya','bukti kinerja','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $p = $this->input->post('pnya');
        $b = $this->input->post('bknya');

        $res = $this->model_utama->deleteSeminar($id);
        if($res == true){
          unlink('./media/seminar/penugasan/' . $p . '.pdf');
          unlink('./media/seminar/bukti_kinerja/' . $b . '.pdf');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menghapus Seminar!');
          redirect('Module/Seminar');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menghapus Seminar!');
          redirect('Module/Seminar');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menghapus Seminar! Silahkan Check Kembali Inputan!');
        redirect('Module/Seminar');
      }
    }

    //PKM

    public function doInsertPKM(){
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('namaPKM','Nama PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('tempat','Lokasi','required|trim|xss_clean');
      $this->form_validation->set_rules('mitra','Mitra','required|trim|xss_clean');
      $this->form_validation->set_rules('peranan','Peranan','required|trim|xss_clean');
      // if(empty($_FILES['penug']['name'])){
      //   $this->form_validation->set_rules('penug','Penugasan','required|trim|xss_clean');
      // }

      // if(empty($_FILES['buktiKin']['name'])){
      //   $this->form_validation->set_rules('buktiKin','BuktiKinerja','required|trim|xss_clean');
      // }


      if($this->form_validation->run() == TRUE){
        $tgl = $this->input->post('TANGGAL_MULAI');
        $nama = $this->input->post('namaPKM');
        $tmpt = $this->input->post('tempat');
        $mitra = $this->input->post('mitra');
        $peran = $this->input->post('peranan');

        if(!empty($_FILES['penug']['name'])){
          $config['upload_path']          = './media/pkm/penugasan/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Penugasan_' . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $tgl;

          $this->upload->initialize($config);
          $penugasan = $this->upload->data('file_name');
          $this->upload->do_upload('penug');
        }else{
          $penugasan = null;
        }

        if(!empty($_FILES['buktiKin']['name'])){
          $config['upload_path']          = './media/pkm/bukti_kinerja/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'Bukti_Kinerja_' . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $tgl;

          $this->upload->initialize($config);
          $buktikinerja = $this->upload->data('file_name');
          $this->upload->do_upload('buktiKin');
        }else{
          $buktikinerja = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'TANGGAL' => $tgl,
          'NAMA' => $nama,
          'MITRA' => $mitra,
          'TEMPAT' => $tmpt,
          'PERANAN' => $peran,
          'PENUGASAN' => str_replace(" ", "_",$penugasan),
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
         );

         $res = $this->model_utama->insertPKM($data);

         if($res == true){
           $this->session->set_flashdata('alert','success');
           $this->session->set_flashdata('msg','Berhasil Menambahkan PKM!');
           redirect('Module/PKM');
         }else{
           $this->session->set_flashdata('alert','error');
           $this->session->set_flashdata('msg','Gagal Menambahkan PKM!');
           redirect('Module/PKM');
         }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan PKM! Silahkan Check Kembali Inputan!');
        redirect('Module/PKM');
      }
    }

    public function doUpdatePKM(){
      $this->form_validation->set_rules('idnya','ID PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('namaPKM','Nama PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('tempat','Lokasi','required|trim|xss_clean');
      $this->form_validation->set_rules('mitra','Mitra','required|trim|xss_clean');
      $this->form_validation->set_rules('peranan','Peranan','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tgl = $this->input->post('TANGGAL_MULAI');
        $nama = $this->input->post('namaPKM');
        $tmpt = $this->input->post('tempat');
        $mitra = $this->input->post('mitra');
        $peran = $this->input->post('peranan');

        $data = array(
          'TANGGAL' => $tgl,
          'NAMA' => $nama,
          'MITRA' => $mitra,
          'TEMPAT' => $tmpt,
          'PERANAN' => $peran
         );

         $res = $this->model_utama->updatePKM($id,$data);

         if($res == true){
           $this->session->set_flashdata('alert','success');
           $this->session->set_flashdata('msg','Berhasil Mengubah PKM!');
           redirect('Module/PKM');
         }else{
           $this->session->set_flashdata('alert','error');
           $this->session->set_flashdata('msg','Gagal Mengubah PKM!');
           redirect('Module/PKM');
         }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah PKM! Silahkan Check Kembali Inputan!');
        redirect('Module/PKM');
      }
    }

    public function doUploadPenugasanPKM(){
      $this->form_validation->set_rules('idnya','ID PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('namaPKM','Nama PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('peranan','Peranan','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tgl = $this->input->post('TANGGAL_MULAI');
        $nama = $this->input->post('namaPKM');
        $peran = $this->input->post('peranan');

        $config['upload_path']          = './media/pkm/penugasan/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Penugasan_' . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $tgl;

        $this->upload->initialize($config);
        $penugasan = $this->upload->data('file_name');

        $data = array(
          'PENUGASAN' => str_replace(" ", "_",$penugasan)
        );

        $res = $this->model_utama->updateDokumPenugasanPKM($id,$data);

        if($res == true){
          $this->upload->do_upload('penug');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah PKM!');
          redirect('Module/PKM');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah PKM!');
          redirect('Module/PKM');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Penugasan! Silahkan Check Kembali Inputan!');
        redirect('Module/PKM');
      }
    }

    public function doUploadBuktiKinerjaPKM(){
      $this->form_validation->set_rules('idnya','ID PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('namaPKM','Nama PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('peranan','Peranan','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tgl = $this->input->post('TANGGAL_MULAI');
        $nama = $this->input->post('namaPKM');
        $peran = $this->input->post('peranan');

        $config['upload_path']          = './media/pkm/bukti_kinerja/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'Bukti_Kinerja_' . $this->session->userdata('username') . "_" . $nama . "_" . $peran . "_" . $tgl;

        $this->upload->initialize($config);
        $buktikinerja = $this->upload->data('file_name');

        $data = array(
          'BUKTI_KINERJA' => str_replace(" ", "_",$buktikinerja)
        );

        $res = $this->model_utama->updateDokumBuktiPKM($id,$data);

        if($res == true){
          $this->upload->do_upload('buktiKin');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah PKM!');
          redirect('Module/PKM');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah PKM!');
          redirect('Module/PKM');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload Bukti Kinerja! Silahkan Check Kembali Inputan!');
        redirect('Module/PKM');
      }
    }

    public function doDeletePKM(){
      $this->form_validation->set_rules('idnya','ID PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('penugnya','Penugasan PKM','required|trim|xss_clean');
      $this->form_validation->set_rules('banya','Bukti Kinerja PKM','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $p = $this->input->post('penugnya');
        $b = $this->input->post('banya');

        $res = $this->model_utama->deletePKM($id);

        if($res == true){
          unlink('./media/pkm/penugasan/' . $p . '.pdf');
          unlink('./media/pkm/bukti_kinerja/' . $b . '.pdf');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menghapus PKM!');
          redirect('Module/PKM');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menghapus PKM!');
          redirect('Module/PKM');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menghapus PKM! Silahkan Check Kembali Inputan!');
        redirect('Module/PKM');
      }
    }

    //Pengelolaan Institusi

    public function doInsertPengelolaanInstitusi(){
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_AKHIR','Tanggal Akhir','required|trim|xss_clean');
      $this->form_validation->set_rules('jabs','jabatan','required|trim|xss_clean');
      $this->form_validation->set_rules('institut','Institusi','required|trim|xss_clean');
      // if(empty($_FILES['sk']['name'])){
      //   $this->form_validation->set_rules('sk','Surat Keputusan','required|trim|xss_clean');
      // }

      if($this->form_validation->run() == TRUE){
        $tglM = $this->input->post('TANGGAL_MULAI');
        $tglA = $this->input->post('TANGGAL_AKHIR');
        $peran = $this->input->post('jabs');
        $institusi = $this->input->post('institut');

        if(!empty($_FILES['sk']['name'])){
          $config['upload_path']          = './media/pengelolaan_institusi/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'SK_' . $peran . "_" . $this->session->userdata('username') . "_" . $tglM . "-" . $tglA  . "_" .  $institusi;

          $this->upload->initialize($config);
          $sk = $this->upload->data('file_name');
          $this->upload->do_upload('sk');
        }else{
          $sk = null;
        }

        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'PERAN_JABATAN' => $peran,
          'TANGGAL_MULAI' => $tglM,
          'TANGGAL_AKHIR' => $tglA,
          'INSTITUSI' => $institusi,
          'SK' => str_replace(" ", "_",$sk)
        );

        $res = $this->model_utama->insertPI($data);

        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menambahkan Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menambahkan Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menambahkan Pengelolaan Institusi! Silahkan Check Kembali Inputan!');
        redirect('Module/PengelolaanInstitusi');
      }
    }

    public function doUpdatePengelolaanInstitusi(){
      $this->form_validation->set_rules('idnya','id PI','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_AKHIR','Tanggal Akhir','required|trim|xss_clean');
      $this->form_validation->set_rules('jabs','jabatan','required|trim|xss_clean');
      $this->form_validation->set_rules('institut','Institusi','required|trim|xss_clean');

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tglM = $this->input->post('TANGGAL_MULAI');
        $tglA = $this->input->post('TANGGAL_AKHIR');
        $peran = $this->input->post('jabs');
        $institusi = $this->input->post('institut');

        $data = array(
          'PERAN_JABATAN' => $peran,
          'TANGGAL_MULAI' => $tglM,
          'TANGGAL_AKHIR' => $tglA,
          'INSTITUSI' => $institusi
        );

        $res = $this->model_utama->updatePI($id,$data);
        if($res == true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Mengubah Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Mengubah Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Mengubah Pengelolaan Institusi! Silahkan Check Kembali Inputan!');
        redirect('Module/PengelolaanInstitusi');
      }
    }

    public function doUploadSKPI(){
      $this->form_validation->set_rules('idnya','id PI','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_MULAI','Tanggal Mulai','required|trim|xss_clean');
      $this->form_validation->set_rules('TANGGAL_AKHIR','Tanggal Akhir','required|trim|xss_clean');
      $this->form_validation->set_rules('jabs','jabatan','required|trim|xss_clean');
      $this->form_validation->set_rules('institut','Institusi','required|trim|xss_clean');
      if(empty($_FILES['sk']['name'])){
        $this->form_validation->set_rules('sk','Surat Keputusan','required|trim|xss_clean');
      }

      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $tglM = $this->input->post('TANGGAL_MULAI');
        $tglA = $this->input->post('TANGGAL_AKHIR');
        $peran = $this->input->post('jabs');
        $institusi = $this->input->post('institut');

        if(!empty($_FILES['sk']['name'])){
          $config['upload_path']          = './media/pengelolaan_institusi/';
          $config['allowed_types']        = 'pdf';
          $config['file_ext_tolower']     = TRUE;
          $config['overwrite']            = TRUE;
          $config['file_name']            = 'SK_' . $peran . "_" . $this->session->userdata('username') . "_" . $tglM . "-" . $tglA  . "_" .  $institusi;

          $this->upload->initialize($config);
          $sk = $this->upload->data('file_name');
        }

        $data = array(
          'SK' => str_replace(" ", "_",$sk)
        );

        $res = $this->model_utama->updateSK($id,$data);

        if($res == true){
          $this->upload->do_upload('sk');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Upload SK Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Upload SK Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Upload SK Pengelolaan Institusi! Silahkan Check Kembali Inputan!');
        redirect('Module/PengelolaanInstitusi');
      }
    }

    public function doDeletePengelolaanInstitusi(){
      $this->form_validation->set_rules('idnya','id PI','required|trim|xss_clean');
      $this->form_validation->set_rules('sknya','SK','required|trim|xss_clean');
      if($this->form_validation->run() == TRUE){
        $id = $this->input->post('idnya');
        $s = $this->input->post('sknya');

        $res = $this->model_utama->deletePI($id);

        if($res == true){
          unlink('./media/pengelolaan_institusi/' . $s . '.pdf');
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg','Berhasil Menghapus Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal Menghapus Pengelolaan Institusi!');
          redirect('Module/PengelolaanInstitusi');
        }
      }else{
        $this->session->set_flashdata('alert','error');
        $this->session->set_flashdata('msg','Gagal Menghapus Pengelolaan Institusi! Silahkan Check Kembali Inputan!');
        redirect('Module/PengelolaanInstitusi');
      }
    }

    //Pembimbing

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

      $namafile = $id."_pembimbing_".$this->session->userdata('username');
      unlink('./media/pembimbing/' . $namafile . ".pdf");

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

    //Penguji

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

      $namafile = $id."_penguji_".$this->session->userdata('username');
      unlink('./media/penguji/' . $namafile . ".pdf");

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

    //Organisasi

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

      $namafile = $id."_organisasi_".$this->session->userdata('username');
      unlink('./media/organisasi/' . $namafile . ".pdf");

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

    // Penghargaan

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

     $namafile = $id."_penghargaan_".$this->session->userdata('username');
     unlink('./media/penghargaan/' . $namafile . ".pdf");
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

   //-------------------------------------------------------DO PUBLIKASI

   public function doInsertPublikasi(){
      $res = $this->model_utama->insertPublikasi();

      $dat = $this->model_utama->getwhere_Publikasi();
      foreach ($dat as $pem) {
        $namafile_1 = $pem['ID_PUBLIKASI']."_publikasi_penugasan_".$this->session->userdata('username');
        $namafile_2 = $pem['ID_PUBLIKASI']."_publikasi_buktiKinerja_".$this->session->userdata('username');
        $id = $pem['ID_PUBLIKASI'];
      }

      if(!empty($_FILES['PENUGASAN']['name'])){
        $config['upload_path']          = './media/publikasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile_1;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u1 = $this->upload->do_upload('PENUGASAN');

      }else{
        $namafile_1 = "";
      }

      if(!empty($_FILES['BUKTI_KINERJA']['name'])){
        $config['upload_path']          = './media/publikasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile_2;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u2 = $this->upload->do_upload('BUKTI_KINERJA');

        $this->model_utama->updateDokumenPublikasi($id, $namafile_1, $namafile_2);
      }else{
        $namafile_2 = "";
      }

      if($res==true && $res_u1 == "1" && $res_u2 == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menambahkan data Publikasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menambahkan data Publikasi!');
      }

      redirect('Module/Publikasi');
    }

    public function doDeletePublikasi($id){

      $namafile_1 = $id."_publikasi_penugasan_".$this->session->userdata('username');
      $namafile_2 = $id."_publikasi_buktiKinerja_".$this->session->userdata('username');
      unlink('./media/publikasi/' . $namafile_1 . ".pdf");
      unlink('./media/publikasi/' . $namafile_2 . ".pdf");
      $res = $this->model_utama->deletePublikasi($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil menghapus data publikasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal menghapus data publikasi!');
      }

      redirect('Module/publikasi');
    }

    public function doUpdatePublikasi($id){
      $res = $this->model_utama->updatePublikasi($id);

      if($res==true){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah data publikasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah data publikasi!');
      }

      redirect('Module/publikasi');
    }

    public function doDokumenPublikasiPenugasan($id){
      $namafile = $id."_publikasi_penugasan_".$this->session->userdata('username');

      if(!empty($_FILES['PENUGASAN']['name'])){
        $config['upload_path']          = './media/publikasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('PENUGASAN');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen publikasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen publikasi!');
      }

      redirect('Module/publikasi');
    }

    public function doDokumenPublikasiBuktiKinerja($id){
      $namafile = $id."_publikasi_buktiKinerja_".$this->session->userdata('username');

      if(!empty($_FILES['BUKTI_KINERJA']['name'])){
        $config['upload_path']          = './media/publikasi/';
        $config['allowed_types']        = 'pdf';
        $config['file_ext_tolower']     = 'TRUE';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafile;

        $this->upload->initialize($config);
        $SK = $this->upload->data('file_name');
        $res_u = $this->upload->do_upload('BUKTI_KINERJA');
      }

      if($res_u == "1"){
          $this->session->set_flashdata('alert','success');
          $this->session->set_flashdata('msg', 'Berhasil mengubah dokumen publikasi!');
      }else{
          $this->session->set_flashdata('alert','error');
          $this->session->set_flashdata('msg','Gagal mengubah dokumen publikasi!');
      }

      redirect('Module/publikasi');
    }
   //-------------------------------------------------------DO PUBLIKASI
}
