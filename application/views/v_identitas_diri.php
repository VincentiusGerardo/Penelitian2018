<section class="content-header">
 <h1>
   Identitas Diri
   <small data-toggle='tooltip' data-placement='bottom' title='Ubah Identitas Diri'><a href="#" style="font-weight:bold;" id="change">Edit <i class="fa fa-pencil"></i></a></small>
 </h1>
</section>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
        <!-- form start -->
          <!-- .<info> -->
          <?php foreach ($dosen as $dosen_s) { ?>
            <div id="info" class="">
                <div class="form-group col-md-6">
                  <label for="nipnik">NIP /NIK</label>
                  <p><?=$dosen_s['NIP_NIK']?></p>
                </div>
                <div class="form-group col-md-6">
                  <label for="nidn">NIDN</label>
                  <p>
                    <?php
                      if($dosen_s['NIDN']==null)
                        echo "-";
                      else
                        echo $dosen_s['NIDN'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <p>
                    <?php
                      if($dosen_s['NAMA']==null)
                        echo "-";
                      else
                        echo $dosen_s['NAMA'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <p>
                    <?php
                      if($dosen_s['JENIS_KELAMIN']==null)
                        echo "-";
                      else if ($dosen_s['JENIS_KELAMIN']=="L")
                        echo "Laki-laki";
                      else if ($dosen_s['JENIS_KELAMIN']=="P")
                        echo "Perempuan";
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="tempatlahir">Tempat Lahir</label>
                  <p>
                    <?php
                      if($dosen_s['TEMPAT_LAHIR']==null)
                        echo "-";
                      else
                        echo $dosen_s['TEMPAT_LAHIR'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="tanggallahir">Tanggal Lahir</label>
                  <p>
                    <?php
                      if($dosen_s['TANGGAL_LAHIR']==null)
                        echo "-";
                      else
                        echo $dosen_s['TANGGAL_LAHIR'];
                    ?></p>
                </div>
                <div class="form-group col-md-6">
                  <label for="statusperkawinan">Status Perkawinan</label>
                  <p>
                    <?php
                      if($dosen_s['STATUS_PERKAWINAN']==null)
                        echo "-";
                      else
                        echo $dosen_s['STATUS_PERKAWINAN'];
                    ?></p>
                </div>
                <div class="form-group col-md-6">
                  <label for="agama">Agama</label>
                  <p>
                    <?php
                      if($dosen_s['AGAMA']==null)
                        echo "-";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="golonganpangkat">Golongan / Pangkat</label>
                  <p>
                    <?php
                      if($dosen_s['GOLONGAN']==null)
                        echo "-";
                      else
                        echo $dosen_s['GOLONGAN'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="jabatanakademik">Jabatan Akademik</label>
                  <p>
                    <?php
                      if($dosen_s['JABATAN_AKADEMIK']==null)
                        echo "-";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="perguruantinggi">Perguruan Tinggi</label>
                  <p>
                    <?php
                      if($dosen_s['PERGURUAN_TINGGI']==null)
                        echo "-";
                      else
                        echo $dosen_s['PERGURUAN_TINGGI'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <p>
                    <?php
                      if($dosen_s['EMAIL']==null)
                        echo "-";
                      else
                        echo $dosen_s['EMAIL'];
                    ?>
                  </p>
                </div>
                <div class="form-group col-md-12">
                  <label for="alamatrumah">Alamat Rumah</label>
                  <p>
                    <?php
                      if($dosen_s['ALAMAT']==null)
                        echo "-";
                      else
                        echo $dosen_s['ALAMAT'];
                    ?>
                  </p>
                </div>
            </div>
          <?php } ?>
          <!-- .</info> -->
          <!-- .<edit> -->
          <div id="edit" class="hidden">
            <?php foreach ($dosen as $dosen_s) { ?>
              <form role="form" action="<?=base_url('Source/do/doUpdateIdentitas')?>" method="POST">
                <div class="form-group col-md-6">
                  <label for="nipnik">NIP /NIK</label>
                  <input type="text" class="form-control" id="nipnik" name="NIP_NIK" placeholder="" value="<?=$dosen_s['NIP_NIK']?>" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="nidn">NIDN</label>
                  <input type="text" class="form-control" id="nidn" name="NIDN" placeholder="" value="<?php echo $dosen_s['NIDN'];?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="NAMA" placeholder="" value="<?php echo $dosen_s['NAMA'];?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <select class="form-control selectpicker" title="Pilih Jenis Kelamin" name="JENIS_KELAMIN">
                    <option value="L" <?php
                      if($dosen_s['JENIS_KELAMIN']=="L")
                        echo "";
                      else
                        echo $dosen_s['NAMA'];
                    ?>>
                      Laki-Laki
                    </option>
                    <option value="P" <?php
                      if($dosen_s['JENIS_KELAMIN']=="P")
                        echo "";
                      else
                        echo $dosen_s['JENIS_KELAMIN'];
                    ?>>
                      Perempuan
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="tempatlahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempatlahir" name="TEMPAT_LAHIR" placeholder="" value="<?=$dosen_s['TEMPAT_LAHIR']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="tanggallahir">Tanggal Lahir</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="tanggallahir" name="TANGGAL_LAHIR" value="<?=$dosen_s['TANGGAL_LAHIR']?>">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="statusperkawinan">Status Perkawinan</label>
                  <select class="form-control selectpicker" id="statusperkawinan" name="STATUS_PERKAWINAN" title="Pilih Status Perkawinan">
                    <option value="Kawin" <?php
                      if($dosen_s['STATUS_PERKAWINAN']=="Kawin")
                        echo "";
                      else
                        echo $dosen_s['STATUS_PERKAWINAN'];
                    ?>>Kawin</option>
                    <option value="Belum Kawin" <?php
                      if($dosen_s['STATUS_PERKAWINAN']=="Belum Kawin")
                        echo "";
                      else
                        echo $dosen_s['STATUS_PERKAWINAN'];
                    ?>>Belum Kawin</option>
                    <option value="Duda" <?php
                      if($dosen_s['STATUS_PERKAWINAN']=="Duda")
                        echo "";
                      else
                        echo $dosen_s['STATUS_PERKAWINAN'];
                    ?>>Duda</option>
                    <option value="Janda" <?php
                      if($dosen_s['STATUS_PERKAWINAN']=="Janda")
                        echo "";
                      else
                        echo $dosen_s['STATUS_PERKAWINAN'];
                    ?>>Janda</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="agama">Agama</label>
                  <select class="form-control selectpicker" id="agama" name="AGAMA" title="Pilih Agama">
                    <option value="Budha" <?php
                      if($dosen_s['AGAMA']=="Budha")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Budha</option>
                    <option value="Hindu" <?php
                      if($dosen_s['AGAMA']=="Hindu")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Hindu</option>
                    <option value="Islam" <?php
                      if($dosen_s['AGAMA']=="Islam")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Islam</option>
                    <option value="Khatolik" <?php
                      if($dosen_s['AGAMA']=="Khatolik")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Khatolik</option>
                    <option value="Kristen" <?php
                      if($dosen_s['AGAMA']=="Kristen")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Kristen</option>
                    <option value="Konghucu" <?php
                      if($dosen_s['AGAMA']=="Konghucu")
                        echo "";
                      else
                        echo $dosen_s['AGAMA'];
                    ?>>Konghucu</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="golonganpangkat">Golongan / Pangkat</label>
                  <input type="text" class="form-control" id="golonganpangkat" placeholder="" name="GOLONGAN" value="<?=$dosen_s['GOLONGAN']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="jabatanakademik">Jabatan Akademik</label>
                  <select class="form-control selectpicker" id="jabatanakademik" title="Pilih Jabatan Akademik" name="JABATAN_AKADEMIK">
                    <option value="TP" <?php
                      if($dosen_s['JABATAN_AKADEMIK']=="TP")
                        echo "";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>>TP</option>
                    <option value="AA" <?php
                      if($dosen_s['JABATAN_AKADEMIK']=="AA")
                        echo "";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>>AA</option>
                    <option value="L" <?php
                      if($dosen_s['JABATAN_AKADEMIK']=="L")
                        echo "";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>>L</option>
                    <option value="LK" <?php
                      if($dosen_s['JABATAN_AKADEMIK']=="LK")
                        echo "";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>>LK</option>
                    <option value="GB" <?php
                      if($dosen_s['JABATAN_AKADEMIK']=="GB")
                        echo "";
                      else
                        echo $dosen_s['JABATAN_AKADEMIK'];
                    ?>>GB</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="perguruantinggi">Perguruan Tinggi</label>
                  <input type="text" class="form-control" id="perguruantinggi" placeholder="" name="PERGURUAN_TINGGI" value="<?=$dosen_s['PERGURUAN_TINGGI']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="perguruantinggi" placeholder="" name="EMAIL" value="<?=$dosen_s['EMAIL']?>">
                </div>
                <div class="form-group col-md-12">
                  <label for="alamatrumah">Alamat Rumah</label>
                  <textarea class="form-control" rows="2" placeholder="" name="ALAMAT" id="alamatrumah"><?=$dosen_s['ALAMAT']?></textarea>
                </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <input type="submit" class="btn btn-primary col-md-12" name="submit "id="save" value="Simpan"/>
                </div>
              </form>
            <?php } ?>
          </div>
          <!-- .</edit> -->
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    //Date picker
    $('#tanggallahir').datepicker({
      autoclose: true
    });
    $('#change').click(function(){
      $('#edit').removeClass('hidden');
      $('#info').addClass('hidden');
      $('#change').addClass('hidden');
    });
    $('#save').click(function(){
      $('#edit').addClass('hidden');
      $('#info').removeClass('hidden');
      $('#change').removeClass('hidden');
    });
</script>

<!--swal-->
<script src="<?=base_url('js/sweetalert.min.js');?>"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('alert') != null){ ?>
    swal({
      title: "Berhasil!",
      text: "<?php echo $this->session->flashdata('msg'); ?>",
      icon: "<?php echo $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
  <?php } ?>
</script>
