<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_institusi"){ ?>
			<h3>Pengelolaan Institusi</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Tanggal Mulai</th>
						<th align="center">Tanggal Berakhir</th>
						<th align="center">Jabatan</th>
						<th align="center">Institusi</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_institusi as $ins) {
			        ?>
						<tr>
		          			<td align="center"><?=$no?> &nbsp;</td>
							<td><?=$ins['TANGGAL_MULAIcon']?></td>
							<td><?=$ins['TANGGAL_AKHIRcon']?></td>
							<td><?=$ins['PERAN_JABATAN']?></td>
							<td><?=$ins['INSTITUSI']?></td>
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
