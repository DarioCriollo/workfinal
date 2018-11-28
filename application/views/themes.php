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
		//print_r($autos);
          $vector= json_encode($autos);
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
    var processed_json = new Array();
    for (i = 0; i < obj.length; i++){
             processed_json.push([
						 ["<b>Level : A1</b><br><b>Item : Grammar</b><br><b>Total 10</b>",(parseInt(obj[i].correcta1g))],["<b>Level : A1</b><br><b>Item : Reading</b><br><b>Total 10</b>",parseInt(obj[i].correcta1r)],
						 ["<b>Level : A2</b><br><b>Item : Grammar</b><br><b>Total 15</b>",parseInt(obj[i].correcta2g)],["<b>Level : A2</b><br><b>Item : Reading</b><br><b>Total 5</b>",parseInt(obj[i].correcta2r)],
						 ["<b>Level : A2</b><br><b>Item : Listening</b><br><b>Total 9</b>",parseInt(obj[i].correcta2l)],["<b>Level : B1</b><br><b>Item : Grammar</b><br><b>Total 10</b>",parseInt(obj[i].correctb1g)],
						 ["<b>Level : B1</b><br><b>Item : Reading</b><br><b>Total 5</b>",parseInt(obj[i].correctb1r)],["<b>Level : B1</b><br><b>Item : Listening</b><br><b>Total 8</b>",parseInt(obj[i].correctb1l)],
						 ["<b>Level : B2</b><br><b>Item : Grammar</b><br><b>Total 5</b>",parseInt(obj[i].correctb2g)],["<b>Level : B2</b><br><b>Item : Reading</b><br><b>Total 5</b>",parseInt(obj[i].correctb2r)],
						 ["<b>Level : B2</b><br><b>Item : Listening</b><br><b>Total 2</b>",parseInt(obj[i].correctb2g)],["<b>Level : C1</b><br><b>Item : Grammar</b><br><b>Total 5</b>",parseInt(obj[i].correctc1g)],
						 ["<b>Level : C1</b><br><b>Item : Listening</b><br><b>Total 2</b>",parseInt(obj[i].correctc1l)]
					 ]);
        }
        console.log('dona : '+processed_json);

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 50
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
            depth: 60
        }
    },
    series: [{
        name: '<b>Correct</b>',
        data: processed_json[0]


    }]
});
		</script>
	</body>
</html>
