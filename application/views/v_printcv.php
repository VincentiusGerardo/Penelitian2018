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
		<?php
			foreach ($_POST['pilih'] as $plh) {
				include 'printcv/v_printcv_'.$plh.'.php';
			}
		?>
	</page>
</body>
</html>
