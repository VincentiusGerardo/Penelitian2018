<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">Tambah Data PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doInsertPKM') ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal</label>
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
           <label class="control-label col-sm-3">Nama</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="namaPKM">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tempat</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="tempat">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Mitra</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="mitra">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Peranan PKM" name="peranan">
               <option value="Ketua">Ketua</option>
               <option value="Anggota">Anggota</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Penugasan</label>
           <div class="col-sm-5">
             <input type="file" name="penug" class="inputFile" accept="application/pdf">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Bukti Kinerja</label>
           <div class="col-sm-5">
             <input type="file" name="buktiKin" class="inputFile" accept="application/pdf">
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


<?php foreach($pkm as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?= $p->ID_PKM ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">Ubah Data PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUpdatePKM') ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PKM ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAI<?= $p->ID_PKM ?>" name="TANGGAL_MULAI" value="<?= $p->TANGGAL ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Nama</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="namaPKM" value="<?= $p->NAMA ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tempat</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="tempat" value="<?= $p->TEMPAT ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Mitra</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="mitra" value="<?= $p->MITRA ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Peranan PKM" name="peranan">
               <option value="Ketua" <?php if($p->PERANAN === "Ketua") echo 'selected'; ?>>Ketua</option>
               <option value="Anggota" <?php if($p->PERANAN === "Anggota") echo 'selected'; ?>>Anggota</option>
             </select>
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
<!-- Upload Penugasan  -->
<div id="ModalDokumenP<?= $p->ID_PKM ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">Upload Penugasan PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUploadPenugasanPKM') ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PKM ?>">
          <input type="hidden" name="TANGGAL_MULAI" value="<?= $p->TANGGAL ?>">
          <input type="hidden" name="namaPKM" value="<?= $p->NAMA ?>">
          <input type="hidden" name="peranan" value="<?= $p->PERANAN ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Penugasan</label>
           <div class="col-sm-5">
             <input type="file" name="penug" class="inputFile" accept="application/pdf">
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

<!-- Upload Bukti Kinerja -->
<div id="ModalDokumenBA<?= $p->ID_PKM ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">Upload Bukti Kinerja PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUploadBuktiKinerjaPKM') ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PKM ?>">
          <input type="hidden" name="TANGGAL_MULAI" value="<?= $p->TANGGAL ?>">
          <input type="hidden" name="namaPKM" value="<?= $p->NAMA ?>">
          <input type="hidden" name="peranan" value="<?= $p->PERANAN ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Bukti Kinerja</label>
           <div class="col-sm-5">
             <input type="file" name="buktiKin" class="inputFile" accept="application/pdf">
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
<!-- Delete PKM -->
<div id="ModalDelete<?= $p->ID_PKM ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">Hapus Data PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doDeletePKM') ?>" method="post">
          <input type="hidden" name="idnya" value=<?= $p->ID_PKM ?>"">
          <input type="hidden" name="penugnya" value="<?= $p->PENUGASAN ?>">
          <input type="hidden" name="banya" value="<?= $p->BUKTI_KINERJA ?>">
         <h1 style="text-align:center;">Are You Sure?</h1>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<script>
$('#TANGGAL_MULAI<?= $p->ID_PKM ?>').datetimepicker({
  format: 'YYYY-MM-DD'
})
</script>
<?php } ?>

<script>

$('#TANGGAL_MULAI').datetimepicker({
  format: 'YYYY-MM-DD'
})

</script>
