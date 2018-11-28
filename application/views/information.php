<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link href="<?php echo base_url ();?>assets/dist/css/estiloprueba.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body bgcolor="#FF0000";>

	<div>
    <br><br>
		<p id="header">Information of the Level B1 Test</p>
		<!-- <p id="subheader">Tutoriales de diseño y programación web</p> -->
	</div>

	<div style="width: 900px; margin-left: 230px; color=red;">

		<div class="contenedor" id="tres">
			<a onclick="a1();"><img class="icon" src="<?php echo base_url();?>assets/dist/img/icon2.png"></a>
			<p class="texto">Level A1</p>
		</div>


		<div class="contenedor" id="seis">
			<a onclick="a2();" ><img class="icon" src="<?php echo base_url();?>assets/dist/img/icon2.png"></a>
			<p class="texto">Level A2</p>
		</div>

    <div class="contenedor" id="uno">
      <a onclick="b1();" ><img class="icon" src="<?php echo base_url();?>assets/dist/img/icon2.png"></a>
      <p class="texto">Level B1</p>
    </div>

	</div>
  <script>
    function a1(){
      contenido="This level consists of four sections two grammar and two reading,"+
      "you must complete at least 80% of the total questions to go to level A2";
      document.getElementById('mensaje1').innerHTML=contenido;
      $(document).ready(function()
      {
        $("#modal-message").modal("show");
      });
    }
    function a2(){
      contenido="This level consists of four sections one grammar, one reading and two listening"+
      "you must complete at least 80% of the total questions to move to level B1";
      document.getElementById('mensaje1').innerHTML=contenido;
      $(document).ready(function()
      {
        $("#modal-message").modal("show");
      });
    }
    function b1(){
      contenido="This level consists of five sections two grammar, one reading and two listening,"+
      "you must complete at least 80% of the total questions to get level B1";
      document.getElementById('mensaje1').innerHTML=contenido;
      $(document).ready(function()
      {
        $("#modal-message").modal("show");
      });
    }
  </script>

  <div class="modal fade" id="modal-message" style="">
    <div class="modal-dialog" style="box-shadow:1px 1px 2px 2px rgb(22,145,190)">
      <div class="modal-content">
        <div class="modal-header" style="align:center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <!-- <h4 class="modal-title" style="align:center">English level</h4> -->
  					<span class="im"><img class="" src="<?php echo base_url();?>assets/dist/img/parlan.png"/><b>&nbsp;PARL</b>ANA</span>
        </div style="Left:50px"><br>
  			<div class="encabezad" id="mensaje1" style="margin-left:20px; margin-right:20px; font-size:20px;">

  			</div>
  			<br>
        <div class="modal-footer">
          <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Continue</button>
  				<!-- <li><a type="button" href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic level</a><li>
  				<li><a href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic themes</a><li>
          <!-- <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


</body>
</html>
