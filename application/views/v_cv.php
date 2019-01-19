<section class="content-header">
 <h1>
   Buat Portofolio
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <b>Pilih data yang akan di eksport ke portofolio</b>
          <br><br>
          <form action="<?=base_url()?>Module/print_cv" method="post" target="_blank">
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getIdentitas" id="identitas_diri"> &nbsp;
                <label class="control-labeL" for="identitas_diri">Identitas Diri</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_penelitian" id="penelitian"> &nbsp;
                <label class="control-labeL" for="penelitian">Penelitian</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_pendidikan" id="pendidikan"> &nbsp;
                <label class="control-labeL" for="pendidikan">Pendidikan</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_publikasi" id="publikasi"> &nbsp;
                <label class="control-labeL" for="publikasi">Publikasi</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_pengajaran" id="pengajaran"> &nbsp;
                <label class="control-labeL" for="pengajaran">Pengajaran</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_bahanajar" id="bahan_ajar"> &nbsp;
                <label class="control-labeL" for="bahan_ajar">Bahan Ajar</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_pembimbing" id="pembimbing"> &nbsp;
                <label class="control-labeL" for="pembimbing">Pembimbing</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_seminar" id="seminar"> &nbsp;
                <label class="control-labeL" for="seminar">Seminar</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_penguji" id="penguji"> &nbsp;
                <label class="control-labeL" for="penguji">Penguji</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_pkm" id="PKM"> &nbsp;
                <label class="control-labeL" for="PKM">PKM</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_organisasi" id="organisasi"> &nbsp;
                <label class="control-labeL" for="organisasi">Organisasi</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_institusi" id="intitusi"> &nbsp;
                <label class="control-labeL" for="intitusi">Intitusi</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_penghargaan" id="penghargaan"> &nbsp;
                <label class="control-labeL" for="penghargaan">Penghargaan</label>
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="minimal" name="pilih[]" value="getcv_kemahasiswaan" id="kemahasiswaan"> &nbsp;
                <label class="control-labeL" for="kemahasiswaan">Kemahasiswaan</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-md-3">
                <label class="control-labeL" for="tgl_mulai">Tanggal Mulai</label>
                <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="tgl_mulai" name="tgl_mulai">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="tgl_selesai" name="tgl_selesai">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">
                <input type="submit" value="Submit" name="submit" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
  });

  //Date picker
  $('#tgl_mulai').datetimepicker({
    format: 'YYYY-MM-DD',
  });

  //Date picker
  $('#tgl_selesai').datetimepicker({
    format: 'YYYY-MM-DD',
  });
</script>
