<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Organisasi Profesi/Ilmiah</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertOrganisasi'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Mulai:</label>
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
            <label class="control-label col-sm-3">Tanggal Berakhir:</label>
            <div class="col-sm-9">
              <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="TANGGAL_AKHIR" name="TANGGAL_AKHIR">
              </div>
            </div>
          </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Nama Organisasi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JENIS_NAMA">
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


<?php foreach($Organisasi as $org){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $org['ID_ORGANISASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Organisasi Profesi/Ilmiah</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdateOrganisasi/'.$org['ID_ORGANISASI']); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal Mulai:</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAIupd<?= $org['ID_ORGANISASI'] ?>" name="TANGGAL_MULAI" value="<?=$org['TANGGAL_MULAI']?>">
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
              <input type="text" class="form-control pull-right" id="TANGGAL_AKHIRupd<?= $org['ID_ORGANISASI'] ?>" name="TANGGAL_AKHIR" value="<?=$org['TANGGAL_AKHIR']?>">
              </div>
            </div>
          </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Nama Organisasi</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JENIS_NAMA" value="<?=$org['JENIS_NAMA']?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jabatan</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JABATAN" value="<?=$org['JABATAN']?>">
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
<div id="ModalDokumen<?php echo $org['ID_ORGANISASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Dokumen</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDokumenOrganisasi/'.$org['ID_ORGANISASI']); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3">NOMOR:</label>
          <div class="col-sm-5">
            <input type="file" name="NOMOR" class="inputFile" accept="application/pdf">
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
<div id="ModalDelete<?php echo $org['ID_ORGANISASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Organisasi</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDeleteOrganisasi/'.$org['ID_ORGANISASI']); ?>" method="post">
        <h4 style="text-align:center">Anda yakin ingin menghapus data Organisasi?</h4>
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
$('#TANGGAL_AKHIRupd<?= $org['ID_ORGANISASI'] ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
$('#TANGGAL_MULAIupd<?= $org['ID_ORGANISASI'] ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
<?php } ?>


<script>
    //Date picker
    $('#TANGGAL_AKHIR').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#TANGGAL_MULAI').datetimepicker({
      format: 'YYYY-MM-DD'
    });
</script>
