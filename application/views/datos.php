
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
      //print_r($autos);
            $vector= json_encode($autos);
           //echo $vector;
    ?>

<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 550px; margin: 0 auto"></div>



		<script type="text/javascript">

        var datos =<?php echo json_encode($vector);?>;
        console.log("este es json"+datos);
        var obj = JSON.parse(datos);
        console.log("dario criollo"+obj);
        var processed_json = new Array();
        for (i = 0; i < obj.length; i++){
                 processed_json.push([
								 ["Level A1",parseInt((obj[i].nivela1*100)/20),"Level A1"],
								 ["Level A2",(((parseInt(obj[i].nivela2)+parseInt(obj[i].nivela2a))*100)/29),"Level A2"],
								 ["Level B1",(((parseInt(obj[i].nivelb1)+parseInt(obj[i].nivelb1a))*100)/23),"Level B1"],
							 	 ["Level B2",(((parseInt(obj[i].nivelb2)+parseInt(obj[i].nivelb2a))*100)/12),"Level B2"],
							 	 ["Level C1",(((parseInt(obj[i].nivelc1)+parseInt(obj[i].nivelc1a))*100)/7),"Level C1"]],

							 );
            }

       console.log("a qui tenemos el vector que dibija los datos"+processed_json);





			 Highcharts.chart('container', {
			     chart: {
			         type: 'column'
			     },
			     title: {
			         text: '<p><b>Graph by Level 2018</b></p>'
			     },
			     subtitle: {
			         text: '<p><b>Bar by Level 2018</b></p>'
			     },
			     xAxis: {
			         type: 'category'
			     },
			     yAxis: {
			         title: {
			             text: 'Total percent'
			         }

			     },
			     legend: {
			         enabled: false
			     },
			     plotOptions: {
			         series: {
			             borderWidth: 0,
			             dataLabels: {
			                 enabled: true,
			                 format: '{point.y:.1f}%'
			             }
			         }
			     },

			     tooltip: {
			         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
			     },

			     "series": [
			         {
			             "name": "Level",
			             "colorByPoint": true,
			             "data": processed_json[0]
			         }
			     ],
			     "drilldown": {
			         "series": [

			         ]
			     }
			 });
		</script>
	</body>
</html>
