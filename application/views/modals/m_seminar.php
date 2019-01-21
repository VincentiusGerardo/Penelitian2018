<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertSeminar'); ?>" method="post">
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
           <label class="control-label col-sm-3">Jenis</label>
           <div class="col-sm-9">
             <select class="selectpicker form-control" title="Select Jenis Seminar / Workshop" name="jenisnya">
               <option value="Seminar">Seminar</option>
               <option value="Konferensi">Konferensi</option>
               <option value="Lokakarya">Lokakarya</option>
               <option value="Simposium">Simposium</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="judulS">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Penyelenggara</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="penyeleng">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan</label>
           <div class="col-sm-9">
             <select class="selectpicker form-control" title="Select Peranan Seminar / Workshop" name="peranannya">
               <option value="Panitia">Panitia</option>
               <option value="Peserta">Peserta</option>
               <option value="Pembicara">Pembicara</option>
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


<?php foreach($seminar as $s){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo  $s->ID_SEMINAR ; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUpdateSeminar'); ?>" method="post">
          <input type="hidden" value="<?= $s->ID_SEMINAR ?>" name="idnya">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right datetimepicker" id="TANGGAL_MULAIupd<?= $s->ID_SEMINAR ?>" name="TANGGAL_MULAIUpd" value="<?= $s->TANGGAL ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jenis</label>
           <div class="col-sm-9">
             <select class="selectpicker form-control" title="Select Jenis Seminar / Workshop" name="jenisnya">
               <option value="Seminar" <?php if($s->JENIS === "Seminar") echo "selected"; ?>>Seminar</option>
               <option value="Konferensi" <?php if($s->JENIS === "Konferensi") echo "selected"; ?>>Konferensi</option>
               <option value="Lokakarya" <?php if($s->JENIS === "Lokakarya") echo "selected"; ?>>Lokakarya</option>
               <option value="Simposium" <?php if($s->JENIS === "Simposium") echo "selected"; ?>>Simposium</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="judulS" value="<?= $s->JUDUL ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Penyelenggara</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="penyeleng" value="<?= $s->PENYELENGGARA ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan</label>
           <div class="col-sm-9">
             <select class="selectpicker form-control" title="Select Peranan Seminar / Workshop" name="peranannya">
               <option value="Panitia" <?php if($s->PERANAN === "Panitia") echo "selected"; ?>>Panitia</option>
               <option value="Peserta" <?php if($s->PERANAN === "Peserta") echo "selected"; ?>>Peserta</option>
               <option value="Pembicara" <?php if($s->PERANAN === "Pembicara") echo "selected"; ?>>Pembicara</option>
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

<!-- Upload Penugasan -->
<div id="ModalDokumenP<?php echo  $s->ID_SEMINAR ; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Penugasan Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUploadPenugasanSeminar'); ?>" method="post">
          <input type="hidden" value="<?= $s->ID_SEMINAR ?>" name="idnya">
          <input type="hidden" value="<?= $s->JENIS ?>" name="jenisnya"/>
          <input type="hidden" value="<?= $s->JUDUL ?>" name="judulS"/>
          <input type="hidden" value="<?= $s->PERANAN ?>" name="peranannya"/>
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
<div id="ModalDokumenBA<?php echo  $s->ID_SEMINAR ; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Bukti Kinerja Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUploadBuktiKinerjaSeminar'); ?>" method="post">
          <input type="hidden" value="<?= $s->ID_SEMINAR ?>" name="idnya">
          <input type="hidden" value="<?= $s->JENIS ?>" name="jenisnya"/>
          <input type="hidden" value="<?= $s->JUDUL ?>" name="judulS"/>
          <input type="hidden" value="<?= $s->PERANAN ?>" name="peranannya"/>
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

<!-- Delete Seminar -->
<div id="ModalDelete<?php echo  $s->ID_SEMINAR ; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doDeleteSeminar'); ?>" method="post">
          <input type="hidden" value="<?= $s->ID_SEMINAR ?>" name="idnya">
          <input type="hidden" value="<?= $s->PENUGASAN ?>" name="pnya">
          <input type="hidden" value="<?= $s->BUKTI_KINERJA ?>" name="bknya">
          <div class="form-group">
            <h1 style="text-align:center;">Are You Sure?</h1>
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
<script>
$('#TANGGAL_MULAIupd<?= $s->ID_SEMINAR ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
<?php } ?>

<script>
$('#TANGGAL_MULAI').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
