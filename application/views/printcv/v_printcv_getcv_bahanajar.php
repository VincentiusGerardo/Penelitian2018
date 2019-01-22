<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_bahanajar"){ ?>
			<h3>Bahan Ajar</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Mata Kuliah</th>
						<th align="center">Program</th>
						<th align="center">Jenis</th>
						<th align="center">Semester</th>
						<th align="center">Tahun</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_bahanajar as $pend) {
			        ?>
						<tr>
		          			<td align="center"><?=$no?> &nbsp;</td>
							<td align="center"><?=$pend['MATA_KULIAH']?></td>
							<td align="center"><?=$pend['PROGRAM']?></td>
							<td align="center"><?=$pend['JENIS']?></td>
							<td align="center"><?=$pend['SEMESTER']?></td>
							<td align="center"><?=$pend['TAHUN']?></td>
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
