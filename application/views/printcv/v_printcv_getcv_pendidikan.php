<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_pendidikan"){ ?>
			<h3>Pendidikan</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_pendidikan as $pend) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="4"><?=$no?>) &emsp;</td>
					<td>Program</td>
					<td>:</td>
					<td><?=$pend['PROGRAM']?></td>
				</tr>
				<tr>
					<td>Tahun</td>
					<td>:</td>
					<td><?=$pend['TAHUN']?></td>
				</tr>
				<tr>
					<td>Perguruan Tinggi</td>
					<td>:</td>
					<td><?=$pend['PERGURUAN_TINGGI']?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>:</td>
					<td><?=$pend['JURUSAN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
