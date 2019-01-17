<section class="content-header">
 <h1>
   Bahan Ajar
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Bahan Ajar</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tableBahanAjar" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Kuliah</th>
                  <th>Program</th>
                  <th>Jenis</th>
                  <th>Semester</th>
                  <th>Tahun</th>
                  <th>Penugasan</th>
                  <th>Bukti Kinerja</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($pengajaran as $p){
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?= $p->MATA_KULIAH?></td>
                    <td><?= $p->PROGRAM ?></td>
                    <td><?= $p->JENIS ?></td>
                    <td><?= $p->SEMESTER ?></td>
                    <td><?= $p->TAHUN ?></td>
                    <td><a href="<?= base_url('media/bahan_ajar/penugasan/' . $p->PENUGASAN . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td><a href="<?= base_url('media/bahan_ajar/bukti_kinerja/' . $p->BUKTI_KINERJA . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $p->ID_BAHAN_AJAR ?>"><span class="fa fa-edit"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#ModalDokumenP<?= $p->ID_BAHAN_AJAR ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Ijazah"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalDokumenBA<?= $p->ID_BAHAN_AJAR ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Transkrip"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $p->ID_BAHAN_AJAR ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
                    </td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
    $('#tableBahanAjar').DataTable({
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
