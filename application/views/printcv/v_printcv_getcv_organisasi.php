<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_organisasi"){ ?>
			<h3>Organisasi</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tanggal Mulai</th>
						<th align="center">Tanggal Akhir</th>
						<th align="center">Nama Organisasi</th>
						<th align="center">Jabatan</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_organisasi as $org) {
        			?>
						<tr>
				          	<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$org['TANGGAL_MULAIcon']?></td>
							<td><?=$org['TANGGAL_AKHIRcon']?></td>
							<td><?=$org['JENIS_NAMA']?></td>
							<td><?=$org['JABATAN']?></td>
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
