<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pkm"){ ?>
			<h3>Pengabdian Kepada Masyarakat</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_pkm as $pkm) {
            if($no>1){
        ?>
          <tr><td colspan="5"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="7"><?=$no?>) &emsp;</td>
					<td>Tanggal</td>
					<td>:</td>
					<td><?=$pkm['TANGGAL']?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?=$pkm['NAMA']?></td>
				</tr>
				<tr>
					<td>Mitra</td>
					<td>:</td>
					<td><?=$pkm['MITRA']?></td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>:</td>
					<td><?=$pkm['TEMPAT']?></td>
				</tr>
				<tr>
					<td>Peranan</td>
					<td>:</td>
					<td><?=$pkm['PERANAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
