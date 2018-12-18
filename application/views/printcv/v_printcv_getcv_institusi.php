<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_institusi"){ ?>
			<h3>Pengelolaan Institusi</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_institusi as $ins) {
            if($no>1){
        ?>
          <tr><td colspan="5"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="4"><?=$no?>) &emsp;</td>
					<td>Tanggal Mulai</td>
					<td>:</td>
					<td><?=$ins['TANGGAL_MULAIcon']?></td>
				</tr>
				<tr>
					<td>Tanggal Berakhir</td>
					<td>:</td>
					<td><?=$ins['TANGGAL_AKHIRcon']?></td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>:</td>
					<td><?=$ins['PERAN_JABATAN']?></td>
				</tr>
				<tr>
					<td>Institusi</td>
					<td>:</td>
					<td><?=$ins['INSTITUSI']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
