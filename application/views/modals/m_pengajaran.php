<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Pengajaran</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPengajaran'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-4">Mata Kuliah:</label>
           <div class="col-sm-5">
            <input type="text" name="matkul" class="form-control"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Program Pendidikan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="progPend">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Institusi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="insti">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Jurusan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="jur">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Program Studi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="prostud">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Semester:</label>
           <div class="col-sm-5">
             <select name="sem" class="form-control selectpicker" title="Select Semester">
              <option value="GANJIL">Ganjil</option>
              <option value="GENAP">Genap</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">Tahun Akademik:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="ta">
           </div>
         </div>
         <div class="form-group">
          <label class="control-label col-sm-4">Tanggal SK:</label>
            <div class="col-sm-5">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGAL_SK" name="tsk">
              </div>
            </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4">SK:</label>
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

<?php foreach($pengajaran as $p){ ?>
<!-- Edit -->
<div id="ModalEdit<?= $p->ID_PENGAJARAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Pengajaran</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUpdatePengajaran'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $p->ID_PENGAJARAN ?>"/>
        <div class="form-group">
           <label class="control-label col-sm-3">Mata Kuliah:</label>
           <div class="col-sm-5">
            <input type="text" name="matkul" class="form-control" value="<?= $p->MATA_KULIAH ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program Pendidikan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="progPend" value="<?= $p->PROGRAM_PENDIDIKAN ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Institusi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="insti" value="<?= $p->INSTITUSI ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jurusan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="jur" value="<?= $p->JURUSAN ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program Studi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="prostud" value="<?= $p->PROGRAM_STUDI ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester:</label>
           <div class="col-sm-5">
             <select name="sem" class="form-control selectpicker" title="Select Semester">
              <option value="GANJIL" <?php if($p->SEMESTER === "GANJIL") echo 'selected'; ?>>Ganjil</option>
              <option value="GENAP" <?php if($p->SEMESTER === "GENAP") echo 'selected'; ?>>Genap</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun Akademik:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="ta" value="<?= $p->TAHUN_AKADEMIK ?>"/>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal SK:</label>
           <div class="col-sm-5">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control" id="TANGGAL_SK<?= $p->ID_PENGAJARAN ?>" name="tsk" value="<?= $p->TanggalSK ?>"/>
             </div>
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

<!-- Dokument SK -->
<div id="ModalUploadSK<?= $p->ID_PENGAJARAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload SK</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUploadSK'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $p->ID_PENGAJARAN ?>">
        <input type="hidden" name="prog" value="<?= $p->PROGRAM_PENDIDIKAN ?>">
        <input type="hidden" name="prodi" value="<?= $p->PROGRAM_STUDI ?>">
        <input type="hidden" name="ta" value="<?= $p->TAHUN_AKADEMIK ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">SK:</label>
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

<!-- Delete -->
<div id="ModalDelete<?= $p->ID_PENGAJARAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Pengajaran</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doDeletePengajaran'); ?>" method="post">
          <input type="hidden" name="id" value="<?= $p->ID_PENGAJARAN ?>">
          <input type="hidden" name="sk" value="<?= $p->SK ?>">
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
  $('#TANGGAL_SK<?= $p->ID_PENGAJARAN ?>').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>
<?php } ?>

<script>
  $('#TANGGAL_SK').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>
