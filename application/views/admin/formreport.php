<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url ();?>assets/dist/css/estiloregister.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" action="<?=base_url('Welcome/graph')?>">



        <div class="col-md-4"></div>
        <div class="col-md-4">
          <br><br><br><br><br><br><br>
          <p style="font-size:20px;"><b>Carrer</b></p>
          <select name="txtcarrer" placeholder="carrer">
            <option>Ing Electronica</option>
            <option>Ing Civil</option>
            <option>Ing Sistemas</option>
          </select>
          <br><br>
          <p style="font-size:20px;"><b>Semester</b></p>
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

        </div>
        <div class="col-md-4">
          <br><br><br><br><br><br><br><br><br><br>
          	<input class="btn btn-warning" style="background:#ffc107; width:150px; height:50px;" type="submit" name="" id="boton" value="Graph">
        </div>


  </form>
  </body>
</html>
