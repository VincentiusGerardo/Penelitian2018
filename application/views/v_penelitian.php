<section class="content-header">
 <h1>
   Penelitian
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Penelitian</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tablePenelitian" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun</th>
                  <th>Judul</th>
                  <th>Peranan</th>
                  <th>Sumber Dana</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($penelitian as $pen):
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$pen['TAHUN']?></td>
                    <td><?=$pen['JUDUL']?></td>
                    <td><?=$pen['PERANAN']?></td>
                    <td><?=$pen['SUMBER_DANA']?></td>
                    <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?=$pen['ID_PENELITIAN']?>"><span class="fa fa-edit"></span></button></td>
                  </tr>
                <?php $no++;endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
    $('#tablePenelitian').DataTable({
        responsive: true
    });
});
</script>
<!--swal-->
<script src="<?=base_url('js/sweetalert.min.js');?>"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('alert') != null){ ?>
    swal({
      //title: "Berhasil!",
      text: "<?php echo $this->session->flashdata('msg'); ?>",
      icon: "<?php echo $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
  <?php } ?>
</script>
