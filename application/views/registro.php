
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<link href="<?php echo base_url ();?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url ();?>assets/dist/css/bootstrap.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/dist/js/jquery-1.11.2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/dist/js/jquery-3.1.1.min.js"></script>
    <link href="<?php echo base_url ();?>assets/dist/css/estiloregister.css" rel="stylesheet">
	</head>

	<body>
		<div class="loginBox" id="box">
      <img src="<?php echo base_url();?>assets/dist/img/on.png" class="user" />
			<!-- <strong><h2><b>Sign up<b></h2><strong> -->
			<form method="post" action="<?=base_url('Welcome/register')?>">
        <p>Name</p>
				<input type="text" name="txtname" id="txtlog" placeholder="Name" required>
        <p>Lastname</p>
				<input type="text" name="txtnick" id="txtlog" placeholder="Lastname" required>
				<p>Code</p>
				<input type="text" name="txtcode" id="txtcla" placeholder="Code" required onkeypress="ValidaSoloNumeros();">
				<!-- <p>Semester</p>
				<input type="text" name="txtsemester" id="txtcla" placeholder="Semester" required onkeypress="ValidaSoloNumeros();"> -->
				<p>Semester</p>
				<select name="txtsemester" placeholder="carrer">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
				<!-- <p>Carrer</p>
				<input type="text" name="txtcarrer" id="txtcla" placeholder="Carrer" required> -->
				<p>Carrer</p>
				<select name="txtcarrer" placeholder="carrer">
					<option>Ing Electronica</option>
					<option>Ing Civil</option>
					<option>Ing Sistemas</option>
				</select>
				<p>Email</p>
				<input type="text" name="txtemail" id="txtlog" placeholder="Email" required onkeypress="validateMail();">
				<p>Password</p>
				<input type="password" name="txtcla" id="txtcla" placeholder="••••••" required>
				<br><br>
				<input class="btn btn-warning" style="background:#ffc107;" type="submit" name="" id="boton" value="Sign up">
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

		function ocultar(){
			alert('si funciona');
		}
		function ValidaSoloNumeros() {
			if ((event.keyCode < 48) || (event.keyCode > 57))
			event.returnValue = false;
		}

		function pruebaemail (valor){
	re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
	if(!re.exec(valor)){
		alert('email no valido');
	}
	else alert('email valido');
	}

		</script>
	</body>
</html>
