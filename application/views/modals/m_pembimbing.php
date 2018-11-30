<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Pembimbing</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPembimbing'); ?>" method="post">
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
             <select class="form-control selectpicker" title="Pilih Peranan" name="SEMESTER">
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
