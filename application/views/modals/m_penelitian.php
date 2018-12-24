<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Penelitian</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPenelitian'); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3">Tahun:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control numberOnly" maxlength="4" name="TAHUN">
          </div>
        </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul</label>
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
            <label class="control-label col-sm-3">Sumber Dana</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="SUMBER_DANA">
            </div>
          </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Surat Tugas</label>
           <div class="col-sm-5">
             <input type="file" name="SURAT_TUGAS" class="inputFile" accept="application/pdf">
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

<?php foreach($penelitian as $pen){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $pen['ID_PENELITIAN']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Penelitian</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdatePenelitian/'.$pen['ID_PENELITIAN']); ?>" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3">Tahun:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control numberOnly" maxlength="4" name="TAHUN" value="<?php echo $pen['TAHUN']; ?>">
            </div>
          </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Judul</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="JUDUL" value="<?php echo $pen['JUDUL']; ?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Peranan:</label>
             <div class="col-sm-5">
               <select class="form-control selectpicker" title="Pilih Peranan" name="PERANAN">
                 <option value="Ketua" <?php
                   if($pen['PERANAN']=="Ketua")
                     echo "selected";
                   else
                     echo "";
                 ?>>
                   Ketua
                 </option>
                 <option value="Anggota" <?php
                   if($pen['PERANAN']=="Anggota")
                     echo "selected";
                   else
                     echo "";
                 ?>>
                   Anggota
                 </option>
               </select>
             </div>
           </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Sumber Dana</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="SUMBER_DANA" value="<?php echo $pen['SUMBER_DANA']; ?>">
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

<!--modal update document-->
<div id="ModalDokumen<?php echo $pen['ID_PENELITIAN']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Dokumen</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDokumenPenelitian/'.$pen['ID_PENELITIAN']); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3">Surat Tugas:</label>
          <div class="col-sm-5">
            <input type="file" name="SURAT_TUGAS" class="inputFile" accept="application/pdf">
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
</div>

<!--modal delete-->
<div id="ModalDelete<?php echo $pen['ID_PENELITIAN']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Penelitian</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDeletePenelitian/'.$pen['ID_PENELITIAN']); ?>" method="post">
        <h4 style="text-align:center">Anda yakin ingin menghapus data Penelitian?</h4>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
