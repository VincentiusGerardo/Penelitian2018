<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_kemahasiswaan"){ ?>
			<h3>Kegiatan Kemahasiswaan</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_kemahasiswaan as $kmh) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="4"><?=$no?>) &emsp;</td>
					<td>Peran Jabatan</td>
					<td width="30px" align="center">:</td>
					<td><?=$kmh['PERAN_JABATAN']?></td>
				</tr>
				<tr>
					<td>Tanggal Mulai</td>
					<td width="30px" align="center">:</td>
					<td><?=$kmh['TANGGAL_MULAIcon']?></td>
				</tr>
				<tr>
					<td>Tanggal Akhir</td>
					<td width="30px" align="center">:</td>
					<td><?=$kmh['TANGGAL_AKHIRcon']?></td>
				</tr>
				<tr>
					<td>Institusi</td>
					<td width="30px" align="center">:</td>
					<td><?=$kmh['INSTITUSI']?></td>
				</tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
