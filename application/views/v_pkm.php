<section class="content-header">
 <h1>
   Pengabdian Kepada Masyarakat (PKM)
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data PKM</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tablePKM" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Mitra</th>
                  <th>Tempat</th>
                  <th>Peranan</th>
                  <th>Penugasan</th>
                  <th>Bukti Kinerja</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($pkm as $p){
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?= $p->TANGGAL ?></td>
                    <td><?= $p->NAMA ?></td>
                    <td><?= $p->MITRA ?></td>
                    <td><?= $p->TEMPAT ?></td>
                    <td><?= $p->PERANAN ?></td>
                    <td><a href="<?= base_url('media/pkm/penugasan/' . $p->PENUGASAN . '.pdf') ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td><a href="<?= base_url('media/pkm/bukti_kinerja/' . $p ->BUKTI_KINERJA . '.pdf') ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $p->ID_PKM ?>"><span class="fa fa-edit"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#ModalDokumenP<?= $p->ID_PKM ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Penugasan"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalDokumenBA<?= $p->ID_PKM ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Bulti Kinerja"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $p->ID_PKM ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
                    </td>
                  </tr>
                <?php $no++;} ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
    $('#tablePKM').DataTable({
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
