<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Bahan Ajar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertOrganisasi'); ?>" method="post">
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
             <div class="col-sm-4">
               <input type="checkbox" name="jenisnya" value="Cetak"/> Cetak
             </div>
             <div class="col-sm-1">&nbsp;</div>
             <div class="col-sm-4">
               <input type="checkbox" name="jenisnya" value="Non Cetak"/> Non Cetak
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Semester</label>
           <div class="col-sm-9">
             <div class="col-sm-4">
               <input type="checkbox" name="jenisnya" value="Ganjil"/> Ganjil
             </div>
             <div class="col-sm-1">&nbsp;</div>
             <div class="col-sm-4">
               <input type="checkbox" name="jenisnya" value="Genap"/> Genap
             </div>
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


<?php foreach($pengajaran as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $p['ID_ORGANISASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Penguji</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdateOrganisasi/'.$p['ID_ORGANISASI']); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Mulai:</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAIupd" name="TANGGAL_MULAI" value="<?=$p['TANGGAL_MULAI']?>">
             </div>
           </div>
         </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Tanggal Berakhir:</label>
            <div class="col-sm-9">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGAL_AKHIRupd" name="TANGGAL_AKHIR" value="<?=$p['TANGGAL_AKHIR']?>">
              </div>
            </div>
          </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Nama Organisasi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JENIS_NAMA" value="<?=$p['JENIS_NAMA']?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jabatan</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JABATAN" value="<?=$p['JABATAN']?>">
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
