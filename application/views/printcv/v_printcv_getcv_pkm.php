<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pkm"){ ?>
			<h3>Pengabdian Kepada Masyarakat</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tangal</th>
						<th align="center">Nama</th>
						<th align="center">Mitra</th>
						<th align="center">Tempat</th>
						<th align="center">Peranan</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_pkm as $pkm) {
			        ?>
						<tr>
							<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$pkm['TANGGAL']?></td>
							<td><?=$pkm['NAMA']?></td>
							<td><?=$pkm['MITRA']?></td>
							<td><?=$pkm['TEMPAT']?></td>
							<td><?=$pkm['PERANAN']?></td>
						</tr>
					<?php
			          $no++;}
			        ?>
	        	</tbody>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
