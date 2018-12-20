<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penelitian"){ ?>
			<h3>Penelitian</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_penelitian as $pen) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="4"><?=$no?>) &emsp;</td>
					<td>Tahun</td>
					<td width="30px" align="center">:</td>
					<td><?=$pen['TAHUN']?></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td width="30px" align="center">:</td>
					<td><?=$pen['JUDUL']?></td>
				</tr>
				<tr>
					<td>Peranan</td>
					<td width="30px" align="center">:</td>
					<td><?=$pen['PERANAN']?></td>
				</tr>
				<tr>
					<td>Sumber Dana</td>
					<td width="30px" align="center">:</td>
					<td><?=$pen['SUMBER_DANA']?></td>
				</tr>
				<?php $no++;} ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
