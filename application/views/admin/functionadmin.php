<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link href="<?php echo base_url ();?>assets/dist/css/estiloprueba.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<br><br><br>

<div align="center" style="font-size:36px; color:black;">Admin Menu</div>

	<div style="width: 800px; margin-left: 230px; color=red;">

		<div class="contenedor" id="ocho">
			<a href="<?php echo base_url ();?>administrador/registeradmin" ><img class="icon" src="<?php echo base_url();?>assets/dist/img/add.png"></a>
			<p class="texto">Add</p>
		</div>


		<div class="contenedor" id="siete">
			<a href="<?php echo base_url ();?>administrador/deleteadmin" ><img class="icon" src="<?php echo base_url();?>assets/dist/img/delete.png"></a>
			<p class="texto">Delete</p>
		</div>

		<div class="contenedor" id="nueve">
			<a href="<?php echo base_url ();?>administrador/registerUser" ><img class="icon" src="<?php echo base_url();?>assets/dist/img/update.png"></a>
			<p class="texto">Update</p>
		</div>

	</div>


</body>
</html>
