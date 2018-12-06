<script src="<?php echo base_url('js/setTable/pengajaran.js') ?>"></script>
<section class="content-header">
 <h1>
   Pengajaran Dosen
 </h1>
</section>
<section class="content">
  <div class="row">
    <button type="button" class="btn btn-sm btn-primary butAdd" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</button>
    <table id="tablePengajaran" data-height="400" data-search="true">
      <tbody>
        <?php
          $no = 1;
          foreach($pengajaran as $p){
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $p->MATA_KULIAH; ?></td>
          <td><?php echo $p->PROGRAM_PENDIDIKAN; ?></td>
          <td><?php echo $p->INSTITUSI; ?></td>
          <td><?php echo $p->JURUSAN; ?></td>
          <td><?php echo $p->PROGRAM_STUDI; ?></td>
          <td><?php echo ucfirst(strtolower($p->SEMESTER)); ?></td>
          <td><?php echo $p->TAHUN_AKADEMIK; ?></td>
          <td><?php echo $p->SK; ?></td>
          <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?php echo $p->ID_PENGAJARAN; ?> "><span class="fa fa-edit"></span></button></td>
        </tr>
        <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
