<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_organisasi"){ ?>
			<h3>Organisasi</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_organisasi as $org) {
            if($no>1){
        ?>
          <tr><td colspan="5"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="7"><?=$no?>) &emsp;</td>
					<td>Tanggal Mulai</td>
					<td>:</td>
					<td><?=$org['TANGGAL_MULAIcon']?></td>
				</tr>
				<tr>
					<td>Tanggal Berakhir</td>
					<td>:</td>
					<td><?=$org['TANGGAL_AKHIRcon']?></td>
				</tr>
				<tr>
					<td>Nama Organisasi</td>
					<td>:</td>
					<td><?=$org['JENIS_NAMA']?></td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>:</td>
					<td><?=$org['JABATAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
