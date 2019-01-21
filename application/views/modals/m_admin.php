<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Dosen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertDosen'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-4">NIP NIK:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="nip" maxlength="6">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Nama Dosen:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="nd">
           </div>
         </div>
         <div class="form-group">
          <label class="control-label col-sm-4">Tanggal Lahir:</label>
            <div class="col-sm-5">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGAL_LAHIR" name="tlhr">
              </div>
            </div>
         </div>
         <div>
           <p style="color: red;">NIP NIK diisi seperti ini: LYYnum <br>
           Dengan YY adalah 2 angka Tahun berjalan dan num adalah nomor secara berurutan</p>
         </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>


<?php foreach($dosen as $d){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?= $d->NIP_NIK ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUpdateDosen'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $d->NIP_NIK ?>">
         <div class="form-group">
           <label class="control-label col-sm-4">NIP NIK:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="nip" value="<?= $d->NIP_NIK ?>" maxlength="6">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Nama Dosen:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="nd" value="<?= $d->NAMA ?>">
           </div>
         </div>
         <div class="form-group">
          <label class="control-label col-sm-4">Tanggal Lahir:</label>
            <div class="col-sm-5">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGAL_LAHIR<?= $d->NIP_NIK ?>" name="tlhr" value="<?=$d->TANGGAL_LAHIR ?>">
              </div>
            </div>
         </div>
         <div>
           <p style="color: red;">NIP NIK diisi seperti ini: LYYnum <br>
           Dengan YY adalah 2 angka Tahun berjalan dan num adalah nomor secara berurutan</p>
         </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Delete-->
<div id="ModalDelete<?= $d->NIP_NIK ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doDeleteDosen'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $d->NIP_NIK ?>">
         <h1 style="text-align: center;">Are You Sure?</h1>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  $('#TANGGAL_LAHIR<?= $d->NIP_NIK ?>').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>
<?php } ?>
<script>
  $('#TANGGAL_LAHIR').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>
