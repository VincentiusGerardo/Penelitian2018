<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pembimbing"){ ?>
			<h3>Pembimbing</h3>
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
			          foreach ($getcv_pembimbing as $pem) {
	        		?>
						<tr>
				          	<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$pem['NAMA']?></td>
							<td><?=$pem['NIM']?></td>
							<td><?=$pem['SEMESTER']?></td>
							<td><?=$pem['TAHUN']?></td>
							<td><?=$pem['PROGRAM']?></td>
							<td><?=$pem['JUDUL']?></td>
							<td><?=$pem['PERANAN']?></td>
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
