<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pengajaran"){ ?>
			<h3>Pengajaran</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_pengajaran as $peng) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="7"><?=$no?>) &emsp;</td>
					<td>Mata Kuliah</td>
					<td>:</td>
					<td><?=$peng['MATA_KULIAH']?></td>
				</tr>
				<tr>
					<td>Program Pendidikan</td>
					<td>:</td>
					<td><?=$peng['PROGRAM_PENDIDIKAN']?></td>
				</tr>
				<tr>
					<td>Institusi</td>
					<td>:</td>
					<td><?=$peng['INSTITUSI']?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>:</td>
					<td><?=$peng['JURUSAN']?></td>
				</tr>
				<tr>
					<td>Program Studi</td>
					<td>:</td>
					<td><?=$peng['PROGRAM_STUDI']?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td>:</td>
					<td><?=$peng['SEMESTER']?></td>
				</tr>
				<tr>
					<td>Tahun Akademik</td>
					<td>:</td>
					<td><?=$peng['TAHUN_AKADEMIK']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
