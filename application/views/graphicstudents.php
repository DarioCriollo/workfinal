<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
    <?php
     // print_r($autos);
            $vector= json_encode($datos);
           //echo $vector;
    ?>

<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/highcharts-3d.js"></script>
<script src="<?php echo base_url(); ?>code/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>code/modules/export-data.js"></script>

<div id="container" style="height: 580px"></div>


		<script type="text/javascript">
		var a1=0; var a1mas=0; var a2=0; var a2mas=0;
		var b1=0; var b1mas=0; var b2=0; var b2mas=0;
		var c1=0;

    var datos =<?php echo json_encode($vector);?>;
    console.log("este es json"+datos);
    var obj = JSON.parse(datos);
    console.log("dario criollo"+obj);

		  var processed_json = new Array();

    for(i=0; i<obj.length; i++){
        // alert(obj[i]['final_level']);
      if(obj[i]['final_level']=='A1        '){
        a1=a1+1;
      }
			if(obj[i]['final_level']=='A1+       '){
        var a1mas=a1mas+1;
      }
			if(obj[i]['final_level']=='A2        '){
        a2=a2+1;
      }
			if(obj[i]['final_level']=='A2+       '){
        a2mas+=1;
      }
			if(obj[i]['final_level']=='B1        '){
        b1+=1;
      }
			if(obj[i]['final_level']=='B1+       '){
        b1mas+=1;
      }
			if(obj[i]['final_level']=='B2        '){
        b2+=1;
      }
			if(obj[i]['final_level']=='B2+       '){
        b2mas+=1;
      }
			if(obj[i]['final_level']=='C1        '){
        c1+=1;
      }

    }

		processed_json.push([
		["Level : A1 ",parseInt(a1)],["Level : A2 ",parseInt(a2)],["Level : A2 + ",parseInt(a2mas)],
		["Level : B1 ",parseInt(b1)],["Level : B1 + ",parseInt(b1mas)],["Level : B2 ",parseInt(b2)],["Level : B2 + ",parseInt(b2mas)],
		["Level : C1 ",parseInt(c1)]
		]);




Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: '<strong>Graphics by Level</strong>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}% of '+obj.length+'</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Percent ',
        data: processed_json[0]
    }]
});
		</script>
	</body>
</html>
