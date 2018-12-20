<div class="row">
	<div class="col-md-12" style="padding:10px;">
		<?php if($plh=="getcv_publikasi"){ ?>
			<h3>Publikasi</h3>
			<hr>
			<table>
				<?php
          $no = 1;
          foreach ($getcv_publikasi as $pub) {
            if($no>1){
        ?>
          <tr><td colspan="4"><hr></td></tr>
        <?php
            }
        ?>
				<tr>
          <td rowspan="3"><?=$no?>) &emsp;</td>
					<td>TANGGAL</td>
					<td width="30px" align="center">:</td>
					<td><?=$pub['TANGGALcon']?></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td width="30px" align="center">:</td>
					<td><?=$pub['JUDUL']?></td>
				</tr>
				<tr>
					<td>Jenis Publikasi</td>
					<td width="30px" align="center">:</td>
					<td><?=$pub['JENIS']?></td>
				</tr>
        <?php
          if($pub['JENIS']=='Jurnal'){
        ?>
  				<tr>
            <td>&nbsp;</td>
  					<td>Nama Jurnal</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['JURNAL']?></td>
  				</tr>
  				<tr>
            <td>&nbsp;</td>
  					<td>Penerbit</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['PENERBIT']?></td>
  				</tr>
  				<tr>
            <td>&nbsp;</td>
  					<td>Nomor</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['NOMOR']?></td>
  				</tr>
  				<tr>
            <td>&nbsp;</td>
  					<td>Volume</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['VOLUME']?></td>
  				</tr>
  				<tr>
            <td>&nbsp;</td>
  					<td>ISSN</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['ISSN']?></td>
  				</tr>
  				<tr>
            <td>&nbsp;</td>
  					<td>ISBN</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['ISBN']?></td>
  				</tr>
        <?php
        }else if($pub['JENIS']=='Prosiding'){
        ?>
          <tr>
            <td>&nbsp;</td>
            <td>Seminar / Konferensi</td>
            <td width="30px" align="center">:</td>
            <td><?=$pub['KONFERENSI']?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
  					<td>Tempat</td>
  					<td width="30px" align="center">:</td>
  					<td><?=$pub['TEMPAT']?></td>
  				</tr>
        <?php
        }
        ?>
        <tr>
          <td>&nbsp;</td>
          <td>Peranan</td>
          <td width="30px" align="center">:</td>
          <td><?=$pub['PERANAN']?></td>
        </tr>
				<?php
          $no++;}
        ?>
			</table>
			<br>
		<?php } ?>
	</div>
</div>
