<section class="content-header">
 <h1>
   Pendidikan
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Pendidikan</button>
            <br><br>
            <table width="100%" class="table table-striped table-bordered" id="tablePendidikan" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Program</th>
                  <th>Tahun</th>
                  <th>Perguruan Tinggi</th>
                  <th>Jurusan</th>
                  <th>Ijazah</th>
                  <th>Transkrip</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach($pendidikan as $p):
                ?>
                  <tr>

                    <td><?= $no; ?></td>
                    <td><?= ucfirst(strtolower($p->PROGRAM)); ?></td>
                    <td><?= $p->TAHUN; ?></td>
                    <td><?= $p->PERGURUAN_TINGGI; ?></td>
                    <td><?= $p->JURUSAN; ?></td>
                    <td><a href="<?= base_url('media/ijazah/' . $p->IJASAH . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                    <td><a href="<?= base_url('media/transkrip/' . $p->TRANSKRIP . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-success">View</a></td>
                    <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?= $p->ID_PENDIDIKAN; ?> "><span class="fa fa-edit"></span></button></td>
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
    $('#tablePendidikan').DataTable({
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
