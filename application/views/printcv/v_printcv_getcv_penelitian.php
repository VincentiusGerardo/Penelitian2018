<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penelitian"){ ?>
			<h3>Penelitian</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tahun</th>
						<th align="center">Judul</th>
						<th align="center">Peranan</th>
						<th align="center">Sumber Dana</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_penelitian as $pen) {
			        ?>
						<tr>
						    <td align="center"><?=$no?> &nbsp;</td>
							<td><?=$pen['TAHUN']?></td>
							<td><?=$pen['JUDUL']?></td>
							<td><?=$pen['PERANAN']?></td>
							<td><?=$pen['SUMBER_DANA']?></td>
						</tr>
					<?php $no++;} ?>
				</tbody>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
