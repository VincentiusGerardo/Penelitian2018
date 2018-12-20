<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pembimbing"){ ?>
			<h3>Pembimbing</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_pembimbing as $pem) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="7"><?=$no?>) &emsp;</td>
					<td>Nama</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['NAMA']?></td>
				</tr>
				<tr>
					<td>NIM</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['NIM']?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['SEMESTER']?></td>
				</tr>
				<tr>
					<td>Tahun</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['TAHUN']?></td>
				</tr>
				<tr>
					<td>Program</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['PROGRAM']?></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['JUDUL']?></td>
				</tr>
				<tr>
					<td>Peranan</td>
					<td width="30px" align="center">:</td>
					<td><?=$pem['PERANAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
