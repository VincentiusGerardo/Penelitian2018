<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doInsertBahanAjar'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Mata Kuliah</label>
           <div class="col-sm-9">
             <input type="text" class="form-control pull-right" name="MatKul">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program</label>
           <div class="col-sm-9">
             <input type="text" class="form-control pull-right" name="Prog">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jenis</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Jenis Bahan Ajar" name="jenisnya">
               <option value="Cetak">Cetak</option>
               <option value="Non Cetak">Non Cetak</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Semester" name="semesternya">
               <option value="Ganjil">Ganjil</option>
               <option value="Genap">Genap</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="tahunnya" maxlength="4">
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


<?php foreach($pengajaran as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?= $p->ID_BAHAN_AJAR ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUpdateBahanAjar'); ?>" method="post">
          <input type="hidden" name="id" value="<?= $p-> ID_BAHAN_AJAR ?>">
         <div class="form-group">
           <label class="control-label col-sm-3">Mata Kuliah</label>
           <div class="col-sm-9">
             <input type="text" class="form-control pull-right" name="MatKul" value="<?= $p->MATA_KULIAH ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program</label>
           <div class="col-sm-9">
             <input type="text" class="form-control pull-right" name="Prog" value="<?= $p->PROGRAM ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jenis</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Jenis Bahan Ajar" name="jenisnya">
               <option value="CETAK" <?php if($p->JENIS === "CETAK") echo "selected"; ?>>Cetak</option>
               <option value="NON CETAK" <?php if($p->JENIS === "NON CETAK") echo "selected"; ?>>Non Cetak</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Semester" name="semesternya">
               <option value="GANJIL" <?php if($p->SEMESTER === "GANJIL") echo "selected"; ?>>Ganjil</option>
               <option value="GENAP" <?php if($p->SEMESTER === "GENAP") echo "selected"; ?>>Genap</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="tahunnya" maxlength="4" value="<?= $p->TAHUN ?>">
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
<!-- Dokumenn Penugasan -->
<div id="ModalDokumenP<?= $p->ID_BAHAN_AJAR ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Dokumen Penugasan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUploadPenugasan'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_BAHAN_AJAR ?>">
          <input type="hidden" name="mkya" value="<?= $p->MATA_KULIAH ?>">
          <input type="hidden" name="sem" value="<?= $p->SEMESTER ?>">
          <input type="hidden" name="thn" value="<?= $p->TAHUN ?>">
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
<!-- Dokumen Bukti Kinerja -->
<div id="ModalDokumenBA<?= $p->ID_BAHAN_AJAR ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Bukti Kinerja</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doUploadBuktiKinerja'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_BAHAN_AJAR ?>">
          <input type="hidden" name="mkya" value="<?= $p->MATA_KULIAH ?>">
          <input type="hidden" name="sem" value="<?= $p->SEMESTER ?>">
          <input type="hidden" name="thn" value="<?= $p->TAHUN ?>">
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
<!-- Delete -->
<div id="ModalDelete<?= $p->ID_BAHAN_AJAR ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Source/do/doDeleteBahanAjar'); ?>" method="post">
          <input type="hidden" name="idnya" value="<?= $p->ID_BAHAN_AJAR ?>">
          <input type="hidden" name="penugasannya" value="<?= $p->PENUGASAN ?>">
          <input type="hidden" name="buktinya" value="<?= $p->BUKTI_KINERJA ?>">
         <div class="form-group">
          <h1 style="text-align: center;">Are You Sure?</h1>
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
