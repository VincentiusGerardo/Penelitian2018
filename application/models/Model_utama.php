<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_utama extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    public function getPass($id){
      $q = $this->db->get_where('identitas_diri',array('NIP_NIK' => $id));
      $rs = $q->row();
      return $rs->PASSWORD;
    }

    public function verifyPass($pass,$id){
      if(password_verify($pass,$this->getPass($id))){
        return true;
      }else{
        return false;
      }
    }

    public function updatePassword($id,$pass){
      $d = array('PASSWORD' => password_hash($pass, PASSWORD_DEFAULT));
      $this->db->set($d);
      $this->db->where('NIP_NIK',$id);
      $q = $this->db->update('identitas_diri');

      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function getDosen(){
      $this->db->where('NIP_NIK !=', '0000');
      $q = $this->db->get('identitas_diri');
      return $q->result();
    }

    public function insertDosen($data){
      $q = $this->db->insert('identitas_diri',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateDosen($id,$data){
      $q = $this->db->update('identitas_diri',$data,array('NIP_NIK' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function deleteDosen($id){
      $q = $this->db->delete('identitas_diri',array('NIP_NIK' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function getUsername(){
      $q = $this->db->get_where('identitas_diri', array('NIP_NIK' => $this->session->userdata('username')));
      $row = $q->row();
      return $row->NAMA;
    }

    public function getIdentitas(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL_LAHIR, '%e %M %Y') as TANGGAL_LAHIRcon FROM `identitas_diri` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
      // $q = $this->db->get_where('identitas_diri',  array('NIP_NIK' => $this->session->userdata('username')));
      // return $q->result_array();
    }

    public function getPendidikan(){
      $query = $this->db->get_where('riwayat_pendidikan', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPengajaran(){
      $query = $this->db->get_where('pengajaran', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPembimbing(){
      $query = $this->db->get_where('pembimbing', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getwhere_Pembimbing(){
      $query = $this->db->get_where('pembimbing', array(
        'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN')
      ));
      return $query->result_array();
    }

    public function getPenguji(){
      $query = $this->db->get_where('penguji', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getwhere_Penguji(){
      $query = $this->db->get_where('penguji', array(
        'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN')
      ));
      return $query->result_array();
    }

    public function getwhere_Publikasi(){
      $query = $this->db->get_where('publikasi', array(
        'NIP_NIK' => $this->session->userdata('username'),
        'TANGGAL' => $this->input->post('TANGGAL'),
        'JUDUL' =>  $this->input->post('JUDUL'),
        'JENIS' => $this->input->post('JENIS'),
        'JURNAL'=> $this->input->post('JURNAL'),
        'PENERBIT' => $this->input->post('PENERBIT'),
        'NOMOR' => $this->input->post('NOMOR'),
        'VOLUME' => $this->input->post('VOLUME'),
        'ISSN' => $this->input->post('ISSN'),
        'ISBN' => $this->input->post('ISBN'),
        'KONFERENSI' => $this->input->post('KONFERENSI'),
        'TEMPAT' => $this->input->post('TEMPAT'),
        'PERANAN' => $this->input->post('PERANAN')
      ));
      return $query->result_array();
    }

    public function getOrganisasi(){
      $q = "SELECT ID_ORGANISASI, DATE_FORMAT(TANGGAL_MULAI, '%e %M %Y') as TANGGAL_MULAIcon, DATE_FORMAT(TANGGAL_AKHIR, '%e %M %Y') as TANGGAL_AKHIRcon, TANGGAL_MULAI, TANGGAL_AKHIR, JENIS_NAMA, JABATAN, NOMOR FROM `organisasi_profesi` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getwhere_organisasi(){
      $query = $this->db->get_where('organisasi_profesi', array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL_MULAI' => $this->input->post('TANGGAL_MULAI'),
  			'TANGGAL_AKHIR' =>	$this->input->post('TANGGAL_AKHIR'),
        'JENIS_NAMA' => $this->input->post('JENIS_NAMA'),
        'JABATAN'=> $this->input->post('JABATAN')
      ));
      return $query->result_array();
    }

    public function getPenelitian(){
      $query = $this->db->get_where('penelitian', array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result_array();
    }

    public function getwhere_penelitian(){
      $query = $this->db->get_where('penelitian', array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TAHUN' => $this->input->post('TAHUN'),
  			'JUDUL' =>	$this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SUMBER_DANA'=> $this->input->post('SUMBER_DANA')
      ));
      return $query->result_array();
    }

    public function getPublikasi(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `publikasi` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getPenghargaan(){
      $q = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `penghargaan` WHERE NIP_NIK ='".$this->session->userdata('username')."'";
    	$query = $this->db->query($q);
    	return $query->result_array();
    }

    public function getwhere_penghargaan(){
      $query = $this->db->get_where('penghargaan', array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL' => $this->input->post('TANGGAL'),
  			'BENTUK' =>	$this->input->post('BENTUK'),
        'PEMBERI' => $this->input->post('PEMBERI')
      ));
      return $query->result_array();
    }

    public function getBahanAjar(){
      $q = $this->db->get_where('bahan_ajar',array('NIP_NIK' => $this->session->userdata('username')));
      return $q->result();
    }

    public function getPI(){
      $q = $this->db->get_where('pengelolaan_institusi',array('NIP_NIK' => $this->session->userdata('username')));
      return $q->result();
    }

    public function getSeminar(){
      $query = $this->db->get_where('seminar_workshop',array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }

    public function getPKM(){
      $query = $this->db->get_where('pkm',array('NIP_NIK' => $this->session->userdata('username')));
      return $query->result();
    }


    public function insertPendidikan($data){
      $q = $this->db->insert('riwayat_pendidikan',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updatePendidikan($data,$idPendidikan){
      $cond = array('ID_PENDIDIKAN' => $idPendidikan);
      $r = $this->db->update('riwayat_pendidikan',$data,$cond);

      if($r){
        return true;
      }else{
        return false;
      }
    }

    public function deletePendidikan($id){
      $cond = array('ID_PENDIDIKAN' => $id);
      $r = $this->db->delete('riwayat_pendidikan',$cond);

      if($r){
        return true;
      }else{
        return false;
      }
    }

    public function updateIjasah($id,$data){
      $s = $this->db->update('riwayat_pendidikan',$data,array('ID_PENDIDIKAN' => $id));
      if($s){
        return true;
      }else{
        return false;
      }
    }

    public function updateTranskrip($id,$data){
      $s = $this->db->update('riwayat_pendidikan',$data,array('ID_PENDIDIKAN' => $id));
      if($s){
        return true;
      }else{
        return false;
      }
    }

    public function updateIdentitas($NIP_NIK){
      $data = array(
  			'NIDN' => $this->input->post('NIDN'),
  			'NAMA' => $this->input->post('NAMA'),
  			'JENIS_KELAMIN' =>	$this->input->post('JENIS_KELAMIN'),
        'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR'),
        'TANGGAL_LAHIR'=> $this->input->post('TANGGAL_LAHIR'),
        'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN'),
        'STATUS_PERKAWINAN' => $this->input->post('STATUS_PERKAWINAN'),
        'AGAMA' => $this->input->post('AGAMA'),
        'GOLONGAN' => $this->input->post('GOLONGAN'),
        'JABATAN_AKADEMIK' => $this->input->post('JABATAN_AKADEMIK'),
        'PERGURUAN_TINGGI' => $this->input->post('PERGURUAN_TINGGI'),
        'ALAMAT' => $this->input->post('ALAMAT'),
        'EMAIL' => $this->input->post('EMAIL')
  		);

  		$this->db->where('NIP_NIK', $NIP_NIK);
  		return $this->db->update('identitas_diri', $data);
    }

    //Pengajaran
    public function insertPengajaran($data){
      $q = $this->db->insert('pengajaran',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updatePengajaran($id,$data){
      $cond = array('ID_PENGAJARAN' => $id);
      $q = $this->db->update('pengajaran',$data,$cond);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function deletePengajaran($id){
      $con = array('ID_PENGAJARAN' => $id);
      $q = $this->db->delete('pengajaran',$con);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateDokumPengajaran($id,$data){
      $q = $this->db->update('pengajaran',$data,array('ID_PENGAJARAN' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    //Bahan Ajar

    public function insertBahanAjar($data){
      $q = $this->db->insert('bahan_ajar',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateBahanAjar($id,$data){
      $u = $this->db->update('bahan_ajar',$data,array('ID_BAHAN_AJAR' => $id));
      if($u){
        return true;
      }else{
        return false;
      }
    }

    public function deleteBahanAjar($id){
      $d = $this->db->delete('bahan_ajar',array('ID_BAHAN_AJAR' => $id));
      if($d){
        return true;
      }else{
        return false;
      }
    }

    public function updatePenugasanBA($id,$data){
      $u = $this->db->update('bahan_ajar',$data,array('ID_BAHAN_AJAR' => $id));
      if($u){
        return true;
      }else{
        return false;
      }
    }

    public function updateBuktiBA($id,$data){
      $u = $this->db->update('bahan_ajar',$data,array('ID_BAHAN_AJAR' => $id));
      if($u){
        return true;
      }else{
        return false;
      }
    }

    //Seminar/Workshop

    public function insertWorkshop($data){
      $q = $this->db->insert('seminar_workshop',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateWorkship($id,$data){
      $q = $this->db->update('seminar_workshop',$data,array('ID_SEMINAR' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateDokumPenugasan($id,$data){
      $q = $this->db->update('seminar_workshop',$data,array('ID_SEMINAR' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateDokumBukti($id,$data){
      $q = $this->db->update('seminar_workshop',$data,array('ID_SEMINAR' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function deleteSeminar($id){
      $q = $this->db->delete('seminar_workshop',array('ID_SEMINAR' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    //PKM

    public function insertPKM($data){
      $t = $this->db->insert('pkm',$data);
      if($t){
        return true;
      }else{
        return false;
      }
    }

    public function updatePKM($id,$data){
      $t = $this->db->update('pkm',$data,array('ID_PKM' => $id));
      if($t){
        return true;
      }else{
        return false;
      }
    }

    public function updateDokumPenugasanPKM($id,$data){
      $q = $this->db->update('pkm',$data,array('ID_PKM' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateDokumBuktiPKM($id,$data){
      $q = $this->db->update('pkm',$data,array('ID_PKM' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function deletePKM($id){
      $t = $this->db->delete('pkm',array('ID_PKM' => $id));
      if($t){
        return true;
      }else{
        return false;
      }
    }

    // Pengelolaan Institusi
    public function insertPI($data){
      $q = $this->db->insert('pengelolaan_institusi',$data);
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updatePI($id,$data){
      $q = $this->db->update('pengelolaan_institusi',$data,array('ID_PENGELOLAAN_INSTITUSI' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function updateSK($id,$data){
      $q = $this->db->update('pengelolaan_institusi',$data,array('ID_PENGELOLAAN_INSTITUSI' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    public function deletePI($id){
      $q = $this->db->delete('pengelolaan_institusi',array('ID_PENGELOLAAN_INSTITUSI' => $id));
      if($q){
        return true;
      }else{
        return false;
      }
    }

    //------------------------------------------------------PEMBIMBING
    public function insertPembimbing(){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
  		);

  		return $this->db->insert('pembimbing', $data);
    }

    public function updatePembimbing($id){
      $data = array(
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
  		);

  		$this->db->where('ID_PEMBIMBING', $id);
  		return $this->db->update('pembimbing', $data);
    }

    public function updateDokumenPembimbing($id, $SK){
      $data = array(
  			'SK' => $SK
  		);

  		$this->db->where('ID_PEMBIMBING', $id);
  		return $this->db->update('pembimbing', $data);
    }

    public function deletePembimbing($id){
      $this->db->where('ID_PEMBIMBING', $id);
      return $this->db->delete('pembimbing');
    }
    //----------------------------------------------------PEMBIMBING

    //----------------------------------------------------PENGUJI
    public function insertPenguji(){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN')
  		);

  		return $this->db->insert('penguji', $data);
    }

    public function updatePenguji($id){
      $data = array(
  			'NAMA' => $this->input->post('NAMA'),
  			'NIM' =>	$this->input->post('NIM'),
        'SEMESTER' => $this->input->post('SEMESTER'),
        'TAHUN'=> $this->input->post('TAHUN'),
        'PROGRAM' => $this->input->post('PROGRAM'),
        'JUDUL' => $this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
  		);

  		$this->db->where('ID_PENGUJI', $id);
  		return $this->db->update('penguji', $data);
    }

    public function updateDokumenPenguji($id, $SK){
      $data = array(
        'SK' => $SK
      );

      $this->db->where('ID_PENGUJI', $id);
      return $this->db->update('penguji', $data);
    }

    public function deletePenguji($id){
      $this->db->where('ID_PENGUJI', $id);
      return $this->db->delete('penguji');
    }
    //----------------------------------------------------PENGUJI

    //----------------------------------------------------ORGANISASI
    public function insertOrganisasi(){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL_MULAI' => $this->input->post('TANGGAL_MULAI'),
  			'TANGGAL_AKHIR' =>	$this->input->post('TANGGAL_AKHIR'),
        'JENIS_NAMA' => $this->input->post('JENIS_NAMA'),
        'JABATAN'=> $this->input->post('JABATAN'),
  		);

  		return $this->db->insert('organisasi_profesi', $data);
    }

    public function updateOrganisasi($id){
      $data = array(
      'TANGGAL_MULAI' => $this->input->post('TANGGAL_MULAI'),
      'TANGGAL_AKHIR' =>	$this->input->post('TANGGAL_AKHIR'),
      'JENIS_NAMA' => $this->input->post('JENIS_NAMA'),
      'JABATAN'=> $this->input->post('JABATAN'),
  		);

  		$this->db->where('ID_ORGANISASI', $id);
  		return $this->db->update('organisasi_profesi', $data);
    }

    public function updateDokumenOrganisasi($id, $NOMOR){
      $data = array(
        'NOMOR' => $NOMOR
      );

      $this->db->where('ID_ORGANISASI', $id);
      return $this->db->update('organisasi_profesi', $data);
    }

    public function deleteOrganisasi($id){
      $this->db->where('ID_ORGANISASI', $id);
      return $this->db->delete('organisasi_profesi');
    }
    //----------------------------------------------------ORGANISASI

    //----------------------------------------------------PENELITIAN
    public function insertPenelitian(){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TAHUN' => $this->input->post('TAHUN'),
  			'JUDUL' =>	$this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SUMBER_DANA'=> $this->input->post('SUMBER_DANA')
  		);

  		return $this->db->insert('penelitian', $data);
    }

    public function updatePenelitian($id){
      $data = array(
        'TAHUN' => $this->input->post('TAHUN'),
        'JUDUL' =>	$this->input->post('JUDUL'),
        'PERANAN' => $this->input->post('PERANAN'),
        'SUMBER_DANA'=> $this->input->post('SUMBER_DANA'),
  		);

  		$this->db->where('ID_PENELITIAN', $id);
  		return $this->db->update('penelitian', $data);
    }

    public function updateDokumenPenelitian($id, $SURAT_TUGAS){
      $data = array(
        'SURAT_TUGAS' => $SURAT_TUGAS
      );

      $this->db->where('ID_PENELITIAN', $id);
      return $this->db->update('penelitian', $data);
    }

    public function deletePenelitian($id){
      $this->db->where('ID_PENELITIAN', $id);
      return $this->db->delete('penelitian');
    }
    //----------------------------------------------------PENELITIAN

    //----------------------------------------------------PENGHARGAAN
    public function insertPenghargaan(){
      $data = array(
  			'NIP_NIK' => $this->session->userdata('username'),
  			'TANGGAL' => $this->input->post('TANGGAL'),
  			'BENTUK' =>	$this->input->post('BENTUK'),
        'PEMBERI' => $this->input->post('PEMBERI')
  		);

  		return $this->db->insert('penghargaan', $data);
    }

    public function updatePenghargaan($id){
      $data = array(
        'TANGGAL' => $this->input->post('TANGGAL'),
        'BENTUK' =>	$this->input->post('BENTUK'),
        'PEMBERI' => $this->input->post('PEMBERI'),
  		);

  		$this->db->where('ID_PENGHARGAAN', $id);
  		return $this->db->update('penghargaan', $data);
    }

    public function updateDokumenPenghargaan($id, $SERTIFIKAT){
      $data = array(
        'SERTIFIKAT' => $SERTIFIKAT
      );

      $this->db->where('ID_PENGHARGAAN', $id);
      return $this->db->update('penghargaan', $data);
    }

    public function deletePenghargaan($id){
      $this->db->where('ID_PENGHARGAAN', $id);
      return $this->db->delete('penghargaan');
    }
    //----------------------------------------------------PENGHARGAAN

    public function getcv_penelitian($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `penelitian` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_publikasi($mulai, $selesai){
      $query = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `publikasi` WHERE TANGGAL BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_pendidikan($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `riwayat_pendidikan` WHERE NIP_NIK ='".$this->session->userdata('username')."'";//TAHUN BETWEEN ".$m." AND ".$s." AND
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_pengajaran($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `pengajaran` WHERE TAHUN_AKADEMIK BETWEEN '".$m."' AND '".$s."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_bahanajar($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `bahan_ajar` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_seminar($mulai, $selesai){
      $query = "SELECT * FROM `seminar_workshop` WHERE TANGGAL BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_pembimbing($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `pembimbing` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_penguji($mulai, $selesai){
      $m = substr($mulai,0,4);
      $s = substr($selesai,0,4);
      $query = "SELECT * FROM `penguji` WHERE TAHUN BETWEEN ".$m." AND ".$s." AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_pkm($mulai, $selesai){
      $query = "SELECT * FROM `pkm` WHERE TANGGAL BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_institusi($mulai, $selesai){
      $query = "SELECT *, DATE_FORMAT(TANGGAL_MULAI, '%e %M %Y') as TANGGAL_MULAIcon, DATE_FORMAT(TANGGAL_AKHIR, '%e %M %Y') as TANGGAL_AKHIRcon FROM `pengelolaan_institusi` WHERE TANGGAL_MULAI BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_organisasi($mulai, $selesai){
      $query = "SELECT *, DATE_FORMAT(TANGGAL_MULAI, '%e %M %Y') as TANGGAL_MULAIcon, DATE_FORMAT(TANGGAL_AKHIR, '%e %M %Y') as TANGGAL_AKHIRcon FROM `organisasi_profesi` WHERE TANGGAL_MULAI BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_penghargaan($mulai, $selesai){
      $query = "SELECT *, DATE_FORMAT(TANGGAL, '%e %M %Y') as TANGGALcon FROM `penghargaan` WHERE TANGGAL BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    public function getcv_kemahasiswaan($mulai, $selesai){
      $query = "SELECT *, DATE_FORMAT(TANGGAL_MULAI, '%e %M %Y') as TANGGAL_MULAIcon, DATE_FORMAT(TANGGAL_AKHIR, '%e %M %Y') as TANGGAL_AKHIRcon FROM `kegiatan_kemahasiswaan` WHERE TANGGAL_MULAI BETWEEN '".$mulai."' AND '".$selesai."' AND NIP_NIK ='".$this->session->userdata('username')."'";
      $q = $this->db->query($query);
    	return $q->result_array();
    }

    //----------------------------------------------------PUBLIKASI
    public function insertPublikasi(){
      $data = array(
        'NIP_NIK' => $this->session->userdata('username'),
        'TANGGAL' => $this->input->post('TANGGAL'),
        'JUDUL' =>  $this->input->post('JUDUL'),
        'JENIS' => $this->input->post('JENIS'),
        'JURNAL'=> $this->input->post('JURNAL'),
        'PENERBIT' => $this->input->post('PENERBIT'),
        'NOMOR' => $this->input->post('NOMOR'),
        'VOLUME' => $this->input->post('VOLUME'),
        'ISSN' => $this->input->post('ISSN'),
        'ISBN' => $this->input->post('ISBN'),
        'KONFERENSI' => $this->input->post('KONFERENSI'),
        'TEMPAT' => $this->input->post('TEMPAT'),
        'PERANAN' => $this->input->post('PERANAN')
      );

      return $this->db->insert('publikasi', $data);
    }

    public function updatePublikasi($id){
      if($this->input->post('JURNAL')!=null || $this->input->post('JURNAL')!=""){
        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'TANGGAL' => $this->input->post('TANGGAL'),
          'JUDUL' =>  $this->input->post('JUDUL'),
          'JENIS' => $this->input->post('JENIS'),
          'JURNAL'=> $this->input->post('JURNAL'),
          'PENERBIT' => $this->input->post('PENERBIT'),
          'NOMOR' => $this->input->post('NOMOR'),
          'VOLUME' => $this->input->post('VOLUME'),
          'ISSN' => $this->input->post('ISSN'),
          'ISBN' => $this->input->post('ISBN'),
          //'KONFERENSI' => $this->input->post('KONFERENSI'),
          //'TEMPAT' => $this->input->post('TEMPAT'),
          'PERANAN' => $this->input->post('PERANAN')
        );
      }else if($this->input->post('KONFERENSI')!=null || $this->input->post('KONFERENSI')!=""){
        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'TANGGAL' => $this->input->post('TANGGAL'),
          'JUDUL' =>  $this->input->post('JUDUL'),
          'JENIS' => $this->input->post('JENIS'),
          'KONFERENSI' => $this->input->post('KONFERENSI'),
          'TEMPAT' => $this->input->post('TEMPAT'),
          'PERANAN' => $this->input->post('PERANAN')
        );
      }else{
        $data = array(
          'NIP_NIK' => $this->session->userdata('username'),
          'TANGGAL' => $this->input->post('TANGGAL'),
          'JUDUL' =>  $this->input->post('JUDUL'),
          'JENIS' => $this->input->post('JENIS'),
          'PERANAN' => $this->input->post('PERANAN')
        );
      }

      $this->db->where('ID_PUBLIKASI', $id);
      return $this->db->update('Publikasi', $data);
    }

    public function updateDokumenPublikasi($id, $SERTIFIKAT, $BUKTI_KINERJA){
      $data = array(
        'PENUGASAN' => $SERTIFIKAT,
        'BUKTI_KINERJA' => $BUKTI_KINERJA
      );

      $this->db->where('ID_PUBLIKASI', $id);
      return $this->db->update('publikasi', $data);
    }

    public function deletePublikasi($id){
      $this->db->where('ID_PUBLIKASI', $id);
      return $this->db->delete('Publikasi');
    }
    //----------------------------------------------------PUBLIKASI
  }
