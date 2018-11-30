<script src="<?php echo base_url('js/setTable/pembimbing.js') ?>"></script>
<section class="content-header">
 <h1>
   Pembimbing
 </h1>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Data Pembimbing</button>
            <table id="tablePembimbing" data-height="400" data-search="true">
              <!--<thead>
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
              </thead>-->
              <tbody>
                <?php
                  $no = 1;
                  foreach ($pembimbing as $pem):
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
                    <td> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
