<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penghargaan"){ ?>
			<h3>Penghargaan</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tanggal</th>
						<th align="center">Bentuk</th>
						<th align="center">Pemberi</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_penghargaan as $phg) {
			        ?>
						<tr>
							<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$phg['TANGGALcon']?></td>
							<td><?=$phg['BENTUK']?></td>
							<td><?=$phg['PEMBERI']?></td>
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
