<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_kemahasiswaan"){ ?>
			<h3>Kegiatan Kemahasiswaan</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Peran Jabatan</th>
						<th align="center">Tanggal Mulai</th>
						<th align="center">Tanggal Akhir</th>
						<th align="center">Institusi</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_kemahasiswaan as $kmh) {
			        ?>
						<tr>
				          	<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$kmh['PERAN_JABATAN']?></td>
							<td><?=$kmh['TANGGAL_MULAIcon']?></td>
							<td><?=$kmh['TANGGAL_AKHIRcon']?></td>
							<td><?=$kmh['INSTITUSI']?></td>
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
