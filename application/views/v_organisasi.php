<section class="content-header">
 <h1>
   Organisasi Profesi/Ilmiah
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Organisasi Profesi/Ilmiah</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tableOrganisasi" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Berakhir</th>
                  <th>Nama Organisasi</th>
                  <th>Jabatan</th>
                  <th>Nomor</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($Organisasi as $org):
                ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$org['TANGGAL_MULAIcon']?></td>
                    <td><?=$org['TANGGAL_AKHIRcon']?></td>
                    <td><?=$org['JENIS_NAMA']?></td>
                    <td><?=$org['JABATAN']?></td>
                    <td><a href="<?= base_url('media/organisasi/' . $org['NOMOR'] . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#ModalDokumen<?=$org['ID_ORGANISASI']?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?=$org['ID_ORGANISASI']?>"><span class="fa fa-edit"></span></button >&nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?=$org['ID_ORGANISASI']?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
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
    $('#tableOrganisasi').DataTable({
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
