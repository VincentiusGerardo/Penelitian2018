<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_bahanajar"){ ?>
			<h3>Bahan Ajar</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_bahanajar as $pend) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="5"><?=$no?>) &emsp;</td>
					<td>Mata Kuliah</td>
					<td>:</td>
					<td><?=$pend['MATA_KULIAH']?></td>
				</tr>
				<tr>
					<td>Program</td>
					<td>:</td>
					<td><?=$pend['PROGRAM']?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td>:</td>
					<td><?=$pend['JENIS']?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td>:</td>
					<td><?=$pend['SEMESTER']?></td>
				</tr>
				<tr>
					<td>Tahun</td>
					<td>:</td>
					<td><?=$pend['TAHUN']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
