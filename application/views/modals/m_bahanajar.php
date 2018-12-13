<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertBahanAjar'); ?>" method="post">
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
           <label class="control-label col-sm-3">Judul</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="jdl">
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
<div id="ModalEdit<?php echo $p['ID_ORGANISASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertBahanAjar'); ?>" method="post">
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
           <label class="control-label col-sm-3">Jabatan</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JABATAN">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Nomor</label>
           <div class="col-sm-5">
             <input type="file" name="NOMOR" class="inputFile" accept="application/pdf">
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
