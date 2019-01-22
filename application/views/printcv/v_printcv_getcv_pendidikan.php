<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pendidikan"){ ?>
			<h3>Pendidikan</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Program</th>
						<th align="center">Tahun</th>
						<th align="center">Perguruan Tinggi</th>
						<th align="center">Jurusan</th>
					</tr>
				</thead>
				<tbody>
				<?php
		          $no = 1;
		          foreach ($getcv_pendidikan as $pend) {
		        ?>
				<tr>
				    <td align="center"><?=$no?> &nbsp;</td>
					<td align="center"><?=$pend['PROGRAM']?></td>
					<td align="center"><?=$pend['TAHUN']?></td>
					<td align="center"><?=$pend['PERGURUAN_TINGGI']?></td>
					<td align="center"><?=$pend['JURUSAN']?></td>
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
