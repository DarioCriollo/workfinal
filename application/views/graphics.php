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
            $vector= json_encode($autos);
           //echo $vector;
    ?>

<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>



		<script type="text/javascript">

        var datos =<?php echo json_encode($vector);?>;
        console.log("este es json"+datos);
        var obj = JSON.parse(datos);
        console.log("dario criollo"+obj);
        var processed_json = new Array();
        for (i = 0; i < obj.length; i++){
                 processed_json.push([parseInt((obj[i].nivela1*100)/20),(((parseInt(obj[i].nivela2)+parseInt(obj[i].nivela2a))*100)/29),(((parseInt(obj[i].nivelb1)+parseInt(obj[i].nivelb1a))*100)/23)]);
            }

       console.log("a qui tenemos el vector que dibija los datos"+processed_json);





Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<div style="padding-top:75px;"><span style="font-size:20px; padding-top:180px; color:"><b>Graficas Estadisticas Por Nivel</b></span></div>'
    },
    subtitle: {
        text: '<span style="font-size:20px; color:#009688"><b>Nivel Porcentual</b></span>'
    },
    xAxis: {
        categories: [
            '<span color:><b>Nivel A1</b><span>',
            '<b>Nivel A2</b>',
            '<b>Nivel B1</b>'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Porcentaje (%)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:15px" >{point.key}</span><table>',
        pointFormat: '<tr><td style="color:#009688;padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}%</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.3,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Porcentaje',
        data: processed_json[0]

    },]
});
		</script>
	</body>
</html>
