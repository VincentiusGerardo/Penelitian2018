<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pengajaran"){ ?>
			<h3>Pengajaran</h3>
			<hr>
			<table border="1" width="100%" style="text-align: center">
				<thead>
					<tr>
						<th align="center">No</th>
						<th align="center">Mata Kuliah</th>
						<th align="center">Program Pendidikan</th>
						<th align="center">Institusi</th>
						<th align="center">Jurusan</th>
						<th align="center">Program Studi</th>
						<th align="center">Semester</th>
						<th align="center">Tahun Akademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
			          $no = 1;
			          foreach ($getcv_pengajaran as $peng) {
			        ?>
						<tr>
							<td align="center"><?=$no?> &nbsp;</td>
							<td align="center"><?=$peng['MATA_KULIAH']?></td>
							<td align="center"><?=$peng['PROGRAM_PENDIDIKAN']?></td>
							<td align="center"><?=$peng['INSTITUSI']?></td>
							<td align="center"><?=$peng['JURUSAN']?></td>
							<td align="center"><?=$peng['PROGRAM_STUDI']?></td>
							<td align="center"><?=$peng['SEMESTER']?></td>
							<td align="center"><?=$peng['TAHUN_AKADEMIK']?></td>
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
