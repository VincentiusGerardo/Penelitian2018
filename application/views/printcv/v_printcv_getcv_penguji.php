<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penguji"){ ?>
			<h3>Penguji</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_penguji as $peng) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="7"><?=$no?>) &emsp;</td>
					<td>Nama</td>
					<td>:</td>
					<td><?=$peng['NAMA']?></td>
				</tr>
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><?=$peng['NIM']?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td>:</td>
					<td><?=$peng['SEMESTER']?></td>
				</tr>
				<tr>
					<td>Tahun</td>
					<td>:</td>
					<td><?=$peng['TAHUN']?></td>
				</tr>
				<tr>
					<td>Program</td>
					<td>:</td>
					<td><?=$peng['PROGRAM']?></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td>:</td>
					<td><?=$peng['JUDUL']?></td>
				</tr>
				<tr>
					<td>Peranan</td>
					<td>:</td>
					<td><?=$peng['PERANAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
