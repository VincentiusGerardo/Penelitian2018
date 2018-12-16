<!DOCTYPE html>
<html>
<head>
	<title>Print CV</title>
	<link href="<?=base_url();?>css/a4style.css" rel="stylesheet">
    <style type="text/css">
    	@page {
			size: 210mm 297mm; /* LANDSCAPE */
			margin: 0;
			/*width: 3508px;
  			height: 2480px;*/
  		}
    </style>
</head>
<body>
	<page size="a4">
		<?php foreach ($pilihan as $plh) { ?>
		<div class="row">
			<div class="col-md-12" style="padding:10px;">
				<?php if($plh=="getIdentitas"){ ?>
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
						<?php } ?>
					</table>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</page>
</body>
</html>
