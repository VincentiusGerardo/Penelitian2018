<section class="content-header">
 <h1>
   Seminar / Workshop
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Seminar / Workshop</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tableSeminar" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Judul</th>
                  <th>Penyelenggara</th>
                  <th>Peranan</th>
                  <th>Penugasan</th>
                  <th>Bukti Kinerja</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($seminar as $s):
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?= $s->TANGGAL ?></td>
                    <td><?= $s->JENIS ?></td>
                    <td><?= $s->JUDUL ?></td>
                    <td><?= $s->PENYELENGGARA ?></td>
                    <td><?= $s->PERANAN ?></td>
                    <td><a href="<?= base_url('media/seminar/penugasan/' . $s->PENUGASAN . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td><a href="<?= base_url('media/seminar/bukti_kinerja/' . $s->BUKTI_KINERJA . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $s->ID_SEMINAR ?>"><span class="fa fa-edit"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#ModalDokumenP<?= $s->ID_SEMINAR ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Ijazah"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalDokumenBA<?= $s->ID_SEMINAR ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Transkrip"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $s->ID_SEMINAR ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
                    </td>
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
    $('#tableSeminar').DataTable({
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
