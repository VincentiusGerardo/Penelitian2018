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
          <div id="info" class="">
              <div class="form-group col-md-6">
                <label for="nipnik">NIP /NIK</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="nidn">NIDN</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="tempatlahir">Tempat Lahir</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggallahir">Tanggal Lahir</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="statusperkawinan">Status Perkawinan</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="agama">Agama</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="golonganpangkat">Golongan / Pangkat</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="jabatanakademik">Jabatan Akademik</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="perguruantinggi">Perguruan Tinggi</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <p>-</p>
              </div>
              <div class="form-group col-md-12">
                <label for="alamatrumah">Alamat Rumah</label>
                <p>-</p>
              </div>
          </div>
          <!-- .</info> -->
          <!-- .<edit> -->
          <div id="edit" class="hidden">
              <form role="form">
                <div class="form-group col-md-6">
                  <label for="nipnik">NIP /NIK</label>
                  <input type="text" class="form-control" id="nipnik" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="nidn">NIDN</label>
                  <input type="text" class="form-control" id="nidn" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <select class="form-control">
                    <option value="P">Pria</option>
                    <option value="W">Wanita</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="tempatlahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempatlahir" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="tanggallahir">Tanggal Lahir</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="tanggallahir">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="statusperkawinan">Status Perkawinan</label>
                  <select class="form-control" id="statusperkawinan">
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Duda">Duda</option>
                    <option value="Janda">Janda</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="agama">Agama</label>
                  <select class="form-control" id="agama">
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Khatolik">Khatolik</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="golonganpangkat">Golongan / Pangkat</label>
                  <input type="text" class="form-control" id="golonganpangkat" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="jabatanakademik">Jabatan Akademik</label>
                  <select class="form-control" id="jabatanakademik">
                    <option value="TP">TP</option>
                    <option value="AA">AA</option>
                    <option value="L">L</option>
                    <option value="LK">LK</option>
                    <option value="GB">GB</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="perguruantinggi">Perguruan Tinggi</label>
                  <input type="text" class="form-control" id="perguruantinggi" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="perguruantinggi" placeholder="">
                </div>
                <div class="form-group col-md-12">
                  <label for="alamatrumah">Alamat Rumah</label>
                  <textarea class="form-control" rows="2" placeholder="" id="alamatrumah"></textarea>
                </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-md-12" id="save">Simpan</button>
                </div>
              </form>
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
