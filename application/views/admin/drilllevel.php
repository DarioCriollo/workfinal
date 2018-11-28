
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
      //print_r($datos);
            $vector= json_encode($datos);
           //echo $vector;
    ?>

<script src="<?php echo base_url(); ?>code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>code/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 550px; margin: 0 auto"></div>



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

       console.log("a qui tenemos el vector que dibija los datos"+processed_json);





			 Highcharts.chart('container', {
			     chart: {
			         type: 'column'
			     },
			     title: {
			         text: '<p><b>Graph by Quantity</b></p><br>'
			     },
			     subtitle: {
			         text: '<br><p><b></b></p>'
			     },
			     xAxis: {
			         type: 'category'
			     },
			     yAxis: {
			         title: {
			             text: 'Number of Students'
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
			                 format: '{point.y:.1f}'
			             }
			         }
			     },

			     tooltip: {
			         //headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			         pointFormat: '<span style="color:{point.color}"><b>{point.name}</b></span>: <b>{point.y:.0f} Students</b><b> of '+obj.length+'</b><br/>'
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
