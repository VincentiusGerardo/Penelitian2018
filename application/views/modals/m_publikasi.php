<!-- Modal Add -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Publikasi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Source/do/doInsertPublikasi'); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal:</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL" name="TANGGAL">
             </div>
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
           <label class="control-label col-sm-3">Jenis Publikasi:</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Pilih Jenis Publikasi" id="JENIS" name="JENIS">
               <option value="Jurnal">Jurnal</option>
               <option value="Prosiding">Prosiding</option>
               <option value="HAKI">HAKI</option>
             </select>
           </div>
         </div>
         <div id="jurnal">
           <div class="form-group">
             <label class="control-label col-sm-3">Jurnal</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="JURNAL">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Penerbit</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="PENERBIT">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Nomor</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="NOMOR">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Volume</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="VOLUME">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">ISSN</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="ISSN">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Tahun</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="Tahun">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">URL</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="URL">
             </div>
           </div>
         </div>
         <div id="prosiding">
           <div class="form-group">
             <label class="control-label col-sm-3">Konferensi</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="KONFERENSI">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Tempat</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="TEMPAT">
             </div>
           </div>
         </div>
         <div id="haki"></div>
         <div class="form-group">
           <label class="control-label col-sm-3">Penugasan:</label>
           <div class="col-sm-5">
             <input type="file" name="PENUGASAN" class="inputFile" accept="application/pdf">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Bukti Kinerja:</label>
           <div class="col-sm-5">
             <input type="file" name="BUKTI_KINERJA" class="inputFile" accept="application/pdf">
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


<?php foreach($publikasi as $pub){ ?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $pub['ID_PUBLIKASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Publikasi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doUpdatePublikasi/'.$pub['ID_PUBLIKASI']); ?>" method="post">
         <div class="form-group">
           <label class="control-label col-sm-3">Tanggal:</label>
           <div class="col-sm-9">
             <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right" id="TANGGAL<?= $pub['ID_PUBLIKASI'] ?>" name="TANGGAL" value="<?=$pub['TANGGAL']?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Judul</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" name="JUDUL" value="<?=$pub['JUDUL']?>">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Peranan:</label>
           <div class="col-sm-5">
             <select class="form-control selectpicker" title="Pilih Peranan" name="PERANAN">
               <option value="Ketua"  <?php
                 if($pub['PERANAN']=="Ketua")
                   echo "selected";
                 else
                   echo "";
               ?>>
                 Ketua
               </option>
               <option value="Anggota" <?php
                 if($pub['PERANAN']=="Anggota")
                   echo "selected";
                 else
                   echo "";
               ?> >
                 Anggota
               </option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-3">Jenis Publikasi:</label>
           <div class="col-sm-9">
             <select class="selectpicker" title="Pilih Jenis Publikasi" id="JENIS" name="JENIS" disabled>
               <option value="Jurnal" <?php
                 if($pub['JENIS']=="Jurnal")
                   echo "selected";
                 else
                   echo "";
               ?> >Jurnal</option>
               <option value="Prosiding" <?php
                 if($pub['JENIS']=="Prosiding")
                   echo "selected";
                 else
                   echo "";
               ?> >Prosiding</option>
               <option value="HAKI" <?php
                 if($pub['JENIS']=="HAKI")
                   echo "selected";
                 else
                   echo "";
               ?> >HAKI</option>
             </select>
           </div>
         </div>
         <?php
          if($pub['JURNAL']!=null || $pub['JURNAL']!=""){
         ?>
         <div id="jurnal">
           <div class="form-group">
             <label class="control-label col-sm-3">Jurnal</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="JURNAL" value="<?=$pub['JURNAL']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Penerbit</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="PENERBIT" value="<?=$pub['PENERBIT']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Nomor</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="NOMOR" value="<?=$pub['NOMOR']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Volume</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="VOLUME" value="<?=$pub['VOLUME']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">ISSN</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="ISSN" value="<?=$pub['ISSN']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Tahun</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="ISBN" value="<?=$pub['Tahun']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">URL</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="ISBN" value="<?=$pub['URL']?>">
             </div>
           </div>
         </div>
         <?php
           }if($pub['KONFERENSI']!=null || $pub['KONFERENSI']!=""){
        ?>
         <div id="prosiding">
           <div class="form-group">
             <label class="control-label col-sm-3">Konferensi</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="KONFERENSI" value="<?=$pub['KONFERENSI']?>">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-3">Tempat</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" name="TEMPAT" value="<?=$pub['TEMPAT']?>">
             </div>
           </div>
         </div>
         <?php
            }
          ?>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>

<!--modal update document-->
<div id="ModalDokumenPenugasan<?php echo $pub['ID_PUBLIKASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Dokumen</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDokumenPublikasiPenugasan/'.$pub['ID_PUBLIKASI']); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3">Penugasan:</label>
          <div class="col-sm-5">
            <input type="file" name="PENUGASAN" class="inputFile" accept="application/pdf">
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

<div id="ModalDokumenBuktiKinerja<?php echo $pub['ID_PUBLIKASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Dokumen</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDokumenPublikasiBuktiKinerja/'.$pub['ID_PUBLIKASI']); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3">Bukti Kinerja:</label>
          <div class="col-sm-5">
            <input type="file" name="BUKTI_KINERJA" class="inputFile" accept="application/pdf">
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
<div id="ModalDelete<?php echo $pub['ID_PUBLIKASI']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Publikasi</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('Action/doDeletePublikasi/'.$pub['ID_PUBLIKASI']); ?>" method="post">
        <h4 style="text-align:center">Anda yakin ingin menghapus data Publikasi?</h4>
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
$('#TANGGAL<?= $pub['ID_PUBLIKASI'] ?>').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#jurnal").hide();
    $("#prosiding").hide();
    $("#haki").hide();
  });
</script>
<script type="text/javascript">
  $('#JENIS').change(function(){
    if($(this).val()=="Jurnal"){
      $("#jurnal").show();
      $("#prosiding").hide();
      $("#haki").hide();
    }else if($(this).val()=="Prosiding"){
      $("#jurnal").hide();
      $("#prosiding").show();
      $("#haki").hide();
    }else if($(this).val()=="HAKI"){
      $("#jurnal").hide();
      $("#prosiding").hide();
      $("#haki").show();
    }
  });
</script>
<script>
    //Date picker
    $('#TANGGAL').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#TANGGAL_MULAI').datetimepicker({
      format: 'YYYY-MM-DD'
    });
</script>
