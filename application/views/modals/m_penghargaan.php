<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Penghargaan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPenghargaan'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal:</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL" name="TANGGAL">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Bentuk</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="BENTUK">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Pemberi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="PEMBERI">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Sertifikat</label>
           <div class="col-sm-5">
             <input type="file" name="SERTIFIKAT" class="inputFile" accept="application/pdf">
           </div>
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


<?php foreach($penghargaan as $pen){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $pen['ID_PENGHARGAAN']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Penghargaan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdatePenghargaan/'.$pen['ID_PENGHARGAAN']); ?>" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3">Tanggal:</label>
            <div class="col-sm-9">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGALupd" name="TANGGAL" value="<?=$pen['TANGGAL']?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Bentuk</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="BENTUK" value="<?=$pen['BENTUK']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Pemberi</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="PEMBERI" value="<?=$pen['PEMBERI']?>">
            </div>
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
<?php } ?>

<script>
    //Date picker
    $('#TANGGAL').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#TANGGALupd').datetimepicker({
      format: 'YYYY-MM-DD'
    });
</script>
