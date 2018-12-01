<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Penguji</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPenguji'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Nama:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="NAMA">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">NIM</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="NIM">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester:</label>
           <div class="col-sm-5">
             <select class="form-control selectpicker" title="Pilih Semester" name="SEMESTER">
               <option value="Ganjil" >
                 Ganjil
               </option>
               <option value="Genap" >
                 Genap
               </option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control numberOnly" maxlength="4" name="TAHUN">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program Pendidikan:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="PROGRAM">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JUDUL">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan:</label>
           <div class="col-sm-5">
             <select class="form-control selectpicker" title="Pilih Peranan" name="PERANAN">
               <option value="Ketua" >
                 Ketua
               </option>
               <option value="Anggota" >
                 Anggota
               </option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">SK:</label>
           <div class="col-sm-5">
             <input type="file" name="SK" class="inputFile" accept="application/pdf">
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

<?php foreach($penguji as $pem){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $pem['ID_PENGUJI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Penguji</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdatePenguji/'.$pem['ID_PENGUJI']); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Nama:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="NAMA" value="<?php echo $pem['NAMA']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">NIM</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="NIM" value="<?php echo $pem['NIM']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester:</label>
           <div class="col-sm-5">
             <select class="form-control selectpicker" title="Pilih Semester" name="SEMESTER">
               <option value="Ganjil" <?php
                 if($pem['SEMESTER']=="Ganjil")
                   echo "selected";
                 else
                   echo "";
               ?>>
                 Ganjil
               </option>
               <option value="Genap" <?php
                 if($pem['SEMESTER']=="Genap")
                   echo "selected";
                 else
                   echo "";
               ?>>
                 Genap
               </option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tahun:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control numberOnly" maxlength="4" name="TAHUN" value="<?php echo $pem['TAHUN']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Program Pendidikan:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="PROGRAM" value="<?php echo $pem['PROGRAM']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul:</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JUDUL" value="<?php echo $pem['JUDUL']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan:</label>
           <div class="col-sm-5">
             <select class="form-control selectpicker" title="Pilih Peranan" name="PERANAN">
               <option value="Ketua" <?php
                 if($pem['PERANAN']=="Ketua")
                   echo "selected";
                 else
                   echo "";
               ?>>
                 Ketua
               </option>
               <option value="Anggota" <?php
                 if($pem['PERANAN']=="Anggota")
                   echo "selected";
                 else
                   echo "";
               ?>>
                 Anggota
               </option>
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
<?php } ?>
