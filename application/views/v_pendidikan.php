<script src="<?php echo base_url('js/setTable/pendidikan.js') ?>"></script>
<section class="content-header">
 <h1>
   Pendidikan Dosen
 </h1>
</section>
<section class="content">
  <div class="row">
    <button type="button" class="btn btn-sm btn-primary butAdd" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</button>
    <table id="tablePendidikan" data-height="400" data-search="true">
      <tbody>
        <?php
          $no = 1;
          foreach($pendidikan as $p){
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo ucfirst(strtolower($p->PROGRAM)); ?></td>
          <td><?php echo $p->TAHUN; ?></td>
          <td><?php echo $p->PERGURUAN_TINGGI; ?></td>
          <td><?php echo $p->JURUSAN; ?></td>
          <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?php echo $p->ID_PENDIDIKAN; ?> "><span class="fa fa-edit"></span></button></td>
        </tr>
        <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
