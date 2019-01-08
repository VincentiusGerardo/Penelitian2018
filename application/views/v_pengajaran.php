<section class="content-header">
 <h1>
   Pengajaran
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Pengajaran</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tablePengajaran" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Kuliah</th>
                  <th>Progam Pendidikan</th>
                  <th>Institusi</th>
                  <th>Jurusan</th>
                  <th>Program Studi</th>
                  <th>Semester</th>
                  <th>Tahun Akademik</th>
                  <th>SK</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach($pengajaran as $p):
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $p->MATA_KULIAH; ?></td>
                    <td><?= $p->PROGRAM_PENDIDIKAN ?></td>
                    <td><?= $p->INSTITUSI ?></td>
                    <td><?= $p->JURUSAN ?></td>
                    <td><?= $p->PROGRAM_STUDI ?></td>
                    <td><?= ucfirst(strtolower($p->SEMESTER)) ?></td>
                    <td><?= $p->TAHUN_AKADEMIK ?></td>
                    <td><?= $p->SK ?></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $p->ID_PENGAJARAN ?>"><span class="fa fa-edit"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalDokumenT<?= $p->ID_PENGAJARAN ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen"><span class="fa fa-file"></span></button> &nbsp;
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $p->ID_PENGAJARAN ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
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
    $('#tablePengajaran').DataTable({
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
