<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PARLANA</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url ();?>assets/dist/css/bootstrap.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
        <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
        <link href="<?php echo base_url ();?>assets/dist/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
        <!--<link rel="stylesheet" href="css/main.css">-->
        <link href="<?php echo base_url ();?>assets/dist/css/main.css" rel="stylesheet">
          <link href="<?php echo base_url ();?>assets/dist/css/estilo.css" rel="stylesheet">

    </head>
    <body>
      <div id="top" class="navbar navbar-dark navbar-fixed-top" role="navigation">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <i class="fa fa-bars fa-2x"></i>
                  </button>

                  <a class="navbar-brand" href="#"><i class=""><strong></strong></i><strong>&nbsp;PAR</strong>LANA</a>
              </div>
              <div class="collapse navbar-collapse" style="height:60px">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="<?php echo base_url ();?>Welcome/home">Home</a><li>
                      <li><a href="<?php echo base_url ();?>Welcome/parlanateam">Team</a><li>
                      <li><a href="<?php echo base_url ();?>Welcome/Collaborators">Collaborators</a><li>
                      <li><a href="<?php echo base_url ();?>Welcome/about">About</a><li>
                      <li><a href="<?php echo base_url ();?>Welcome/register">Sign up</a><li>
                      <li><a href="<?php echo base_url ();?>Welcome/login">Log In</a><li>
                  </ul>
              </div><!--/.navbar-collapse -->
          </div>
      </div>
      <br>
      <br>
<div id="projects" class="content-block content-block-gray">
  <div class="container" >
    <header class="block-heading cleafix">
      <!-- <a href="#" class="btn btn-o btn-lg pull-right">View All</a> -->
      <br>
      <p></p>
    </header>
    <section class="block-body">
      <div class="row">
        <div class="col-sm-6 blog-post">

          <div class="card card-cascade wider">

            <!--Card image-->
            <div class="view overlay">
              <img src="<?php echo base_url();?>assets/dist/img/joaquinf.jpg" class="userfinal" /><br><br><br><br><br><br>
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--/Card image-->

            <!--Card content-->
            <div style="margin-left:50px;" class="card-body text-center">
              <!--Title-->
              <h4 class="card-title"><strong>Joaquin Patiño</strong></h4>
              <h5 class="indigo-text"><strong>Investigador</strong></h5>

              <p style="text-align:justify;" class="card-text">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totam rem aperiam. </p>

            </div>
            <!--/.Card content-->

          </div>
          <!--/.Card Wider-->

        </div>
        <div class="col-sm-6 blog-post">
          <div class="card card-cascade wider">

            <!--Card image-->
            <div class="view overlay">
               <img src="<?php echo base_url();?>assets/dist/img/dario.png" class="userfinal" /><br><br><br><br><br><br>
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--/Card image-->

            <!--Card content-->
            <div style="margin-left:50px;" class="card-body text-center">
              <!--Title-->
              <h4 class="card-title"><strong>Dario Criollo</strong></h4>
              <h5 class="indigo-text"><strong>Investigador</strong></h5>

              <p style="text-align:justify;" class="card-text">Sed ut perspiciatis unde omnis iste natus
                sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
              </p>

            </div>
            <!--/.Card content-->

          </div>
          <!--/.Card Wider-->

        </div>

      </div>
    </section>
  </div><!--/container-->
</div><!-- /.content-block content-blog-gray -->


<footer class="content-block content-block-dark">

       <!-- <img src="<?php echo base_url();?>assets/dist/img/logoacreditacion.png" /> -->
       <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <p>&copy; 2018 ParlanaTeam <a target="_blank"></a></p>
        </div>
        <div class="col-md-4" style="left: 5px; bottom:40px">
            <!-- <img src="<?php echo base_url();?>assets/dist/img/logoacreditacion.png" class="us" />
            <img src="<?php echo base_url();?>assets/dist/img/logoudenar.jpg" class="us" /> -->
        </div>
      </div>
</footer>
