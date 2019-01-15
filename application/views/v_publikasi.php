<section class="content-header">
 <h1>
   Publikasi
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
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <th>Jenis</th>
                  <th>Jurnal</th>
                  <th>Penerbit</th>
                  <th>Nomor</th>
                  <th>Volume</th>
                  <th>ISSN</th>
                  <th>ISBN</th>
                  <th>Konferensi</th>
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
                  foreach ($publikasi as $pub) {
                ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$pub['TANGGAL']?></td>
                  <td><?=$pub['JUDUL']?></td>
                  <td><?=$pub['JENIS']?></td>
                  <td><?=$pub['JURNAL']==null?"-":$pub['JURNAL']?></td>
                  <td><?=$pub['PENERBIT']==null?"-":$pub['PENERBIT']?></td>
                  <td><?=$pub['NOMOR']==null?"-":$pub['NOMOR']?></td>
                  <td><?=$pub['VOLUME']==null?"-":$pub['VOLUME']?></td>
                  <td><?=$pub['ISSN']==null?"-":$pub['ISSN']?></td>
                  <td><?=$pub['ISBN']==null?"-":$pub['ISBN']?></td>
                  <td><?=$pub['KONFERENSI']==null?"-":$pub['KONFERENSI']?></td>
                  <td><?=$pub['TEMPAT']==null?"-":$pub['TEMPAT']?></td>
                  <td><?=$pub['PERANAN']?></td>
                  <td><a href="<?= base_url('media/publikasi/' . $pub['PENUGASAN'] . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-success">View</a></td>
                  <td><a href="<?= base_url('media/publikasi/' . $pub['BUKTI_KINERJA'] . '.pdf'); ?>" target="_blank" class="btn btn-xs btn-primary">View</a></td>
                  <td>
                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#ModalDokumenPenugasan<?=$pub['ID_PUBLIKASI']?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Penugasan"><span class="fa fa-file"></span></button> &nbsp;
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalDokumenBuktiKinerja<?=$pub['ID_PUBLIKASI']?>" data-toggle="tooltip" data-placement="bottom" title="Ubah dokumen Bukti Kinerja"><span class="fa fa-file"></span></button> &nbsp;
                    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?=$pub['ID_PUBLIKASI']?>"><span class="fa fa-edit"></span></button>&nbsp;
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalDelete<?=$pub['ID_PUBLIKASI']?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><span class="fa fa-trash"></span></button>
                  </td>
                </tr>
                <?php
                  $no++;}
                ?>
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
