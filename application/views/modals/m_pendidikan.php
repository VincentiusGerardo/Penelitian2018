<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Pendidikan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPendidikan'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Program:</label>
           <div class="col-sm-5">
             <select class="selectpicker form-control" title="Select Program" name="selProgram">
               <option value="DIPLOMA">Diploma</option>
               <option value="SARJANA">Sarjana</option>
               <option value="MAGISTER">Magister</option>
               <option value="SPESIALIS">Spesialis</option>
               <option value="DOKTOR">Doktor</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control numberOnly" maxlength="4" name="thn">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Perguruan Tinggi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="pt">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jurusan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="jur">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Ijazah:</label>
           <div class="col-sm-5">
             <input type="file" name="ij" class="inputFile" accept="application/pdf">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Transkrip:</label>
           <div class="col-sm-5">
             <input type="file" name="tr" class="inputFile" accept="application/pdf">
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


<?php foreach($pendidikan as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $p->ID_PENDIDIKAN; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Pendidikan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUpdatePendidikan'); ?>" method="post">
          <input type="hidden" value="<?php echo $p->ID_PENDIDIKAN; ?>" name="kode" >
         <div class="form-group">
           <label class="control-label col-sm-3">Program:</label>
           <div class="col-sm-5">
             <select class="selectpicker form-control" title="Select Program" name="selProgram">
               <option value="DIPLOMA" <?php if($p->PROGRAM === 'DIPLOMA') echo 'selected'; ?>>Diploma</option>
               <option value="SARJANA" <?php if($p->PROGRAM === 'SARJANA') echo 'selected'; ?>>Sarjana</option>
               <option value="MAGISTER" <?php if($p->PROGRAM === 'MAGISTER') echo 'selected'; ?>>Magister</option>
               <option value="SPESIALIS" <?php if($p->PROGRAM === 'SPESIALIS') echo 'selected'; ?>>Spesialis</option>
               <option value="DOKTOR" <?php if($p->PROGRAM === 'DOKTOR') echo 'selected'; ?>>Doktor</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control numberOnly" maxlength="4" name="thn" value="<?php echo $p->TAHUN; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Perguruan Tinggi:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="pt" value="<?php echo $p->PERGURUAN_TINGGI; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jurusan:</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" name="jur" value="<?php echo $p->JURUSAN; ?>">
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

<!-- Modal Dokumen Ijazah-->
<div id="ModalDokumenI<?= $p->ID_PENDIDIKAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Ijazah</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUploadIjazah'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENDIDIKAN ?>">
          <input type="hidden" name="programnya" value="<?= $p->PROGRAM ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Ijazah:</label>
           <div class="col-sm-5">
             <input type="file" name="ij" class="inputFile" accept="application/pdf">
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

<!-- Modal Dokumen Transkrip-->
<div id="ModalDokumenT<?= $p->ID_PENDIDIKAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Transkrip</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doUploadTranskrip'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENDIDIKAN ?>">
          <input type="hidden" name="programnya" value="<?= $p->PROGRAM ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Transkrip:</label>
           <div class="col-sm-5">
             <input type="file" name="tr" class="inputFile" accept="application/pdf">
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

<!-- Delete-->
<div id="ModalDelete<?= $p->ID_PENDIDIKAN ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Pendidikan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doDeletePendidikan'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_PENDIDIKAN ?>">
          <input type="hidden" name="programnya" value="<?= $p->PROGRAM ?>">
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
<?php } ?>
