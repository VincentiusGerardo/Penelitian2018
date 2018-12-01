<!--<script src="<?php echo base_url('js/setTable/Penguji.js') ?>"></script>-->
<section class="content-header">
 <h1>
   Penguji
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Penguji</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tablePenguji" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Semester</th>
                  <th>Tahun</th>
                  <th>Program Pendidikan</th>
                  <th>Judul</th>
                  <th>Peranan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($penguji as $pem):
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$pem['NAMA']?></td>
                    <td><?=$pem['NIM']?></td>
                    <td><?=$pem['SEMESTER']?></td>
                    <td><?=$pem['TAHUN']?></td>
                    <td><?=$pem['PROGRAM']?></td>
                    <td><?=$pem['JUDUL']?></td>
                    <td><?=$pem['PERANAN']?></td>
                    <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?=$pem['ID_PENGUJI']?>"><span class="fa fa-edit"></span></button></td>
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
    $('#tablePenguji').DataTable({
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
