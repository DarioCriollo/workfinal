<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts xample</title>

		<style type="text/css">

		</style>
	</head>
	<body>
    <?php
		//print_r($themes);
          $vector= json_encode($themes);
          //echo $vector;
      ?>
<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/highcharts-3d.js"></script>
<script src="<?php echo base_url(); ?>code/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>code/modules/export-data.js"></script>


<div id="container" style="height: 550px"></div>


		<script type="text/javascript">
    var datos =<?php echo json_encode($vector);?>;
    console.log("este es json"+datos);
    var obj = JSON.parse(datos);
    console.log("este es json------"+obj);

    //alert(obj[0]['correctb1g']);
    var correcta1g=0;
    var correcta1r=0;
     correcta2g=0;
     correcta2r=0;
     correcta2l=0;
     correctb1g=0;
     correctb1r=0;
     correctb1l=0;

     correctb2g=0;
     correctb2r=0;
     correctb2l=0;

     correctc1g=0;
     correctc1l=0;
    counta1g=0;
    total=0;
		var a1g=0;
    for(i=0; i<obj.length; i++){
      //alert(obj[i]['correctb1g']);
			//if(parseInt(obj[i]['correcta1g'])<8){
				//a1g ++;
				  correcta1g += parseInt(obj[i]['correcta1g']);
			//}

      correcta1r += parseInt(obj[i]['correcta1r']);
      correcta2g += parseInt(obj[i]['correcta2g']);
      correcta2r += parseInt(obj[i]['correcta2r']);

      correcta2l += parseInt(obj[i]['correcta2l']);
      correctb1g += parseInt(obj[i]['correctb1g']);
      correctb1r += parseInt(obj[i]['correctb1r']);
      correctb1l += parseInt(obj[i]['correctb1l']);

      correctb2g += parseInt(obj[i]['correctb2g']);
      correctb2r += parseInt(obj[i]['correctb2r']);
      correctb2l += parseInt(obj[i]['correctb2l']);

      correctc1g += parseInt(obj[i]['correctc1g']);
      correctc1l += parseInt(obj[i]['correctc1l']);

      counta1g ++;
    }
    total=counta1g*10;
    //alert('suma'+correctb1g+'total'+counta1g);

    var processed_json = new Array();
             processed_json.push([
						 ["Level : A1 Grammar",Math.round((100*correcta1g)/total)],//sacar porcentaje los mayores al 80%
						 //de cada item
             ["Level : A1 Reading",Math.round((100*correcta1r)/total)],
             ["Level : A2 Grammar",Math.round((100*correcta2g)/(counta1g*15))],
             ["Level : A2 Reading",Math.round((100*correcta2r)/(counta1g*5))],
             ["Level : A2 Listening",Math.round((100*correcta2l)/(counta1g*9))],
             ["Level : B1 Reading",Math.round((100*correctb1r)/(counta1g*5))],
             ["Level : B1 Listening",Math.round((100*correctb1l)/(counta1g*8))],
             ["Level : B2 Grammar",Math.round((100*correctb2g)/(counta1g*5))],
             ["Level : B2 Reading",Math.round((100*correctb2r)/(counta1g*5))],
             ["Level : B2 Listening",Math.round((100*correctb2l)/(counta1g*2))],

             ["Level : C1 Grammar",Math.round((100*correctc1g)/(counta1g*5))],
             ["Level : C1 Listening",Math.round((100*correctc1l)/(counta1g*2))],
					 ]);

        console.log('dona : '+processed_json);

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: '<b>Graph by Item</b>'
    },
    subtitle: {
        text: 'Information for each Level'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Percent ',
        data: processed_json[0]

    }]
});
		</script>
	</body>
</html>
