<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getIdentitas"){ ?>
			<h3>Identitas Diri</h3>
			<hr>
			<table>
				<?php foreach ($getIdentitas as $iden) { ?>
				<tr>
					<td>NIP/NIK</td>
					<td>:</td>
					<td><?=$iden['NIP_NIK']?></td>
				</tr>
				<tr>
					<td>NIDN</td>
					<td>:</td>
					<td><?=$iden['NIDN']?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?=$iden['NAMA']?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?=$iden['JENIS_KELAMIN']?></td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td><?=$iden['TEMPAT_LAHIR']?>, <?=$iden['TANGGAL_LAHIRcon']?></td>
				</tr>
				<tr>
					<td>Status Perkawinan</td>
					<td>:</td>
					<td><?=$iden['STATUS_PERKAWINAN']?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?=$iden['AGAMA']?></td>
				</tr>
				<tr>
					<td>Golongan / Pangkat</td>
					<td>:</td>
					<td><?=$iden['GOLONGAN']?></td>
				</tr>
				<tr>
					<td>Jabatan Akademik</td>
					<td>:</td>
					<td><?=$iden['JABATAN_AKADEMIK']?></td>
				</tr>
				<tr>
					<td>Perguruan Tinggi</td>
					<td>:</td>
					<td><?=$iden['PERGURUAN_TINGGI']?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?=$iden['ALAMAT']?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?=$iden['EMAIL']?></td>
				</tr>
				<?php } ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
