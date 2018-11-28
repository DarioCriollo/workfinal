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
      print_r($autos);
			$vector= json_encode($autos);
			echo $vector;
     ?>

<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/modules/data.js"></script>
<script src="<?php echo base_url(); ?>code/modules/drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


		<script type="text/javascript">


		var datos =<?php echo json_encode($vector);?>;
		console.log("este es json"+datos);
		var obj = JSON.parse(datos);
		console.log("dario criollo"+obj);
		var processed_json = new Array();
		for (i = 0; i < obj.length; i++){
				 processed_json.push([obj[i].codigo,parseInt(obj[i].nivela1),parseInt(obj[i].nivela2),parseInt(obj[i].nivelb1)]);
			}

		console.log("a qui tenemos el vector que dibija los datos"+processed_json);

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Level Clasification'
    },
    subtitle: {
        text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 5,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<strong><span style="font-size:48px">{}</span></strong><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [{
    data: processed_json
		//tenemos el vector convertido el dato cantidad a numerico
    }],
    drilldown: {
        series: [{
           // data: processed_json
        }]
    }
});


		</script>
	</body>
</html>
