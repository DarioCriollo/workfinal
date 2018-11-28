<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transparent Login Form</title>
		<link href="<?php echo base_url ();?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url ();?>assets/dist/css/bootstrap.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/dist/js/jquery-1.11.2.min.js"></script>
    <link href="<?php echo base_url ();?>assets/dist/css/estilo.css" rel="stylesheet">
	</head>

	<body style="background-image: url('<?php echo base_url();?>assets/dist/img/fond.jpg')">
		<div class="loginBox" id="box">
      <img src="<?php echo base_url();?>assets/dist/img/in.png" class="user" />
			<strong><h2><b>Log in<b></h2><strong>
			<form method="post" action="<?=base_url('Welcome/login')?>">
				<p>Code</p>
				<input type="text" name="txtlog" id="txtlog" placeholder="Code" required onkeypress="ValidaSoloNumeros();">
				<p>Password</p>
				<input type="password" name="txtcla" id="txtcla" placeholder="••••••" required>
				<br><br>
				<input class="btn btn-danger" type="submit" name="" id="boton" value="Log in">
			</form>
			<div class="alert alert-danger" style=" text-align:center" id="mensaje">
				<?php
				if(!isset($mensaje)){
					//echo 'hola';
				}else{
					//echo 'dario criollo';
					echo $mensaje;
				}
				  ?>
			</div>
		</div>
		<script>

		if(document.getElementById("mensaje").innerText)
		{
			//alert("Hay texto");
			text = document.getElementById('mensaje');
			text.style.display = 'block';
		}else{
			//alert('esta vacio');
			text = document.getElementById('mensaje');
			text.style.display = 'none';
		}

		function ValidaSoloNumeros() {
			if ((event.keyCode < 48) || (event.keyCode > 57))
			event.returnValue = false;
		}
		</script>
	</body>
</html>
