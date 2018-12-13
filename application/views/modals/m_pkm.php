<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data PKM</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertBahanAjar'); ?>" method="post">
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
           <label class="control-label col-sm-3">Nama</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="namaS">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Tempat</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="tempat">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Mitra</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="mitra">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Select Peranan PKM" name="peranannya">
               <option value="Ketua">Ketua</option>
               <option value="Anggota">Anggota</option>
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


<?php foreach($pkm as $p){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $p['ID_PKM']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Seminar / Workshop</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertBahanAjar'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL_MULAIUpd" name="TANGGAL_MULAIUpd">
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
           <label class="control-label col-sm-3">Nama</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="namaS">
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
             <select class="selectpicker form-control" title="Select Peranan Seminar / Workshop" name="peranannya" multiple>
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
<?php } ?>

<script>

$('#TANGGAL_MULAI').datetimepicker({
  format: 'YYYY-MM-DD'
});
$('#TANGGAL_MULAIUpd').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
