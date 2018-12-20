<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_penghargaan"){ ?>
			<h3>Penghargaan</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_penghargaan as $phg) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="3"><?=$no?>) &emsp;</td>
					<td>Tanggal</td>
					<td width="30px" align="center">:</td>
					<td><?=$phg['TANGGALcon']?></td>
				</tr>
				<tr>
					<td>Bentuk</td>
					<td width="30px" align="center">:</td>
					<td><?=$phg['BENTUK']?></td>
				</tr>
				<tr>
					<td>Pemberi</td>
					<td width="30px" align="center">:</td>
					<td><?=$phg['PEMBERI']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
