<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </head>
  <body><br><br><br>
    <div style="margin-left:80px; margin-right:80px;">
      <div align='center' style="font-size:24px; color:black;"><b>New Administrator</b></div>
      <br>
      <form role="form" method="post" action="<?=base_url('administrador/registera')?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="txtname"
          placeholder="Enter Your Name">
        </div>
        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" id="lastname" name="txtnick"
          placeholder="Enter Your LastName">
        </div>
        <div class="form-group">
          <label for="code">Code</label>
          <input type="number" class="form-control" id="code" name="txtcode"
          placeholder="Enter Your Code">
        </div>
        <div class="form-group">
          <label for="ejemplo_email_1">Email</label>
          <input type="email" class="form-control" id="ejemplo_email_1" name="txtemail"
          placeholder="Enter your email">
        </div>
        <div class="form-group">
          <label for="ejemplo_password_1">Password</label>
          <input type="password" class="form-control" id="ejemplo_password_1" name="txtcla"
          placeholder="Password">
        </div>

        <button type="submit" class="btn btn-success">Register</button>
        <br>
      </form>
      <div  style="font-family:roboto; font-size:24px; text-align:center">
        <?php
        if(!isset($mensaje)){
          //$mensaje=$mensaje;
        }else{
          echo $mensaje;
        }

        ?>


      </div>

      <!-- modol de aviso -->
      <div class="modal fade" id="modal-message" style="">
        <div class="modal-dialog">
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

</div>
<script>
</script>

  </body>
</html>
