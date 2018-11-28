
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.css" rel="stylesheet">
  </head>
  <body><br><br><br>
    <div style="margin-left:80px; margin-right:80px;">
      <div align='center' style="font-size:24px; color:#009688;"><b>New User</b></div>
      <br>
      <form role="form" method="post" action="<?=base_url('administrador/register')?>">
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
          <input type="text" class="form-control" id="code" name="txtcode"
          placeholder="Enter Your Code">
        </div>
        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="text" class="form-control" id="semester" name="txtsemester"
          placeholder="Enter Your Semester">
        </div>
        <div class="form-group">
          <label for="carrer">Carrer</label>
          <input type="text" class="form-control" id="carrer" name="txtcarrer"
          placeholder="Enter Your Carrer">
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
        <hr>
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

</div>

  </body>
</html>
