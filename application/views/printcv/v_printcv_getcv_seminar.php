<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_seminar"){ ?>
			<h3>Seminar</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_seminar as $sem) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="5"><?=$no?>) &emsp;</td>
					<td>Tanggal</td>
					<td>:</td>
					<td><?=$sem['TANGGAL']?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td>:</td>
					<td><?=$sem['JENIS']?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?=$sem['JUDUL']?></td>
				</tr>
				<tr>
					<td>Penyelenggara</td>
					<td>:</td>
					<td><?=$sem['PENYELENGGARA']?></td>
				</tr>
				<tr>
					<td>Peranan</td>
					<td>:</td>
					<td><?=$sem['PERANAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
