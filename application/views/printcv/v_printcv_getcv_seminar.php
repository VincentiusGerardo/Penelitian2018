<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_seminar"){ ?>
			<h3>Seminar</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tangal</th>
						<th align="center">Jenis</th>
						<th align="center">Judul</th>
						<th align="center">Penyelenggara</th>
						<th align="center">Peranan</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_seminar as $sem) {
			        ?>
						<tr>
							<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$sem['TANGGAL']?></td>
							<td><?=$sem['JENIS']?></td>
							<td><?=$sem['JUDUL']?></td>
							<td><?=$sem['PENYELENGGARA']?></td>
							<td><?=$sem['PERANAN']?></td>
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
