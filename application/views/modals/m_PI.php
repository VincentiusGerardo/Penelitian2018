<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Pengelolaan Institusi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doInsertPengelolaanInstitusi'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Mulai</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAI" name="TANGGAL_MULAI">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Akhir</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_AKHIR" name="TANGGAL_AKHIR">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peran / Jabatan</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="jabs">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Institusi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="institut">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">SK</label>
           <div class="col-sm-5">
             <input type="file" name="sk" class="inputFile" accept="application/pdf">
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


<?php foreach($pi as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?= $p->ID_PENGELOLAAN_INSTITUSI ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Pengelolaan Institusi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUpdatePengelolaanInstitusi'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENGELOLAAN_INSTITUSI ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Mulai</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAI<?= $p->ID_PENGELOLAAN_INSTITUSI ?>" name="TANGGAL_MULAI" value="<?= $p->TANGGAL_MULAI ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Akhir</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_AKHIR<?= $p->ID_PENGELOLAAN_INSTITUSI ?>" name="TANGGAL_AKHIR" value="<?= $p->TANGGAL_AKHIR ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peran / Jabatan</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="jabs" value="<?= $p->PERAN_JABATAN ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Institusi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="institut" value="<?= $p->INSTITUSI ?>">
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

<!-- Upload SK -->
<div id="ModalUploadSK<?= $p->ID_PENGELOLAAN_INSTITUSI ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload SK Pengelolaan Institusi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUploadSKPI'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENGELOLAAN_INSTITUSI ?>">
          <input type="hidden" name="TANGGAL_MULAI" value="<?= $p->TANGGAL_MULAI ?>">
          <input type="hidden" name="TANGGAL_AKHIR" value="<?= $p->TANGGAL_AKHIR ?>">
          <input type="hidden" name="jabs" value="<?= $p->PERAN_JABATAN ?>">
          <input type="hidden" name="institut" value="<?= $p->INSTITUSI ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">SK</label>
           <div class="col-sm-5">
             <input type="file" name="sk" class="inputFile" accept="application/pdf">
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

<!-- Delete PI -->
<div id="ModalDelete<?= $p->ID_PENGELOLAAN_INSTITUSI ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Pengelolaan Institusi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doDeletePengelolaanInstitusi'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENGELOLAAN_INSTITUSI ?>">
          <input type="hidden" name="sknya" value="<?= $p->SK ?>">
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
$('#TANGGAL_MULAI<?= $p->ID_PENGELOLAAN_INSTITUSI ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
$('#TANGGAL_AKHIR<?= $p->ID_PENGELOLAAN_INSTITUSI ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
<?php } ?>

<script>
$('#TANGGAL_MULAI').datetimepicker({
  format: 'YYYY-MM-DD'
});
$('#TANGGAL_AKHIR').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
