<section class="content-header">
 <h1>
   Daftar Dosen
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Dosen</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tableDosen" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Dosen</th>
                  <th>Nama Dosen</th>
                  <th>Tanggal Lahir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach($dosen as $d):
                ?>
                  <tr>

                    <td><?= $no ?></td>
                    <td><?= $d->NIP_NIK ?></td>
                    <td><?= $d->NAMA ?></td>
                    <td><?= $d->TANGGAL_LAHIR; ?></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $d->NIP_NIK ?>"><span class="fa fa-edit"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $d->NIP_NIK ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
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
    $('#tableDosen').DataTable({
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
      text: "<?= $this->session->flashdata('msg'); ?>",
      icon: "<?= $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
  <?php } ?>
</script>
