<!DOCTYPE html>
<html>
<head>
	<title>Print CV</title>
	<!--<link href="<?=base_url();?>css/a4style.css" rel="stylesheet">
    <style type="text/css">
    	@page {
			size: 210mm 297mm; /* LANDSCAPE */
			margin: 0;
			/*width: 3508px;
  			height: 2480px;*/
  		}
    </style>-->

		<!--jQuery 3-->
		<script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>

		<!--Bootstrap 3.3.7-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>"/>
		<script src="<?php echo base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>
</head>
<body style="overflow-x:hidden">
	<!--<page size="a4">-->
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="background-color: white;">
			<?php
				foreach ($_POST['pilih'] as $plh) {
					include 'printcv/v_printcv_'.$plh.'.php';
				}
			?>
		</div>
	</div>
	<!--</page>-->
</body>
</html>
