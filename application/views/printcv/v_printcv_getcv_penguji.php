<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penguji"){ ?>
			<h3>Penguji</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Nama</th>
						<th align="center">NIM</th>
						<th align="center">Semester</th>
						<th align="center">Tahun</th>
						<th align="center">Program</th>
						<th align="center">Judul</th>
						<th align="center">Peranan</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_penguji as $peng) {
			        ?>
						<tr>
							<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$peng['NAMA']?></td>
							<td><?=$peng['NIM']?></td>
							<td><?=$peng['SEMESTER']?></td>
							<td><?=$peng['TAHUN']?></td>
							<td><?=$peng['PROGRAM']?></td>
							<td><?=$peng['JUDUL']?></td>
							<td><?=$peng['PERANAN']?></td>
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
