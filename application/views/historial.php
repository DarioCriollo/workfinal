<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div align="center" style="padding-top: 50px; padding-bottom: 20px">
	<h2>Tabla de Resultados</h2>
</div>
<?php
// print_r($historiales);
// print_r('<br>'.$historiales[0]['estadoA1']);
?>
<div style="width: auto; padding-left: 40px; padding-right: 40px" align="center">
<table align="cente"  width="" class="table  table-hover">
	<tr class="success" align="justify">
		<th>id</th>
		<th>codigo</th>
		<th>Estado A1</th>
		<th>Estado A2</th>
		<th>Estado B1</th>
	</tr>
	<?php
	$contador=0;
	//print_r($historiales);
		foreach ($historiales as $historial) {
			$contador=$contador+1;
			?>
			<tr class="info" align="cent">
			<?php
			//echo "<tr class="danger">";
			echo "<td>$contador</td>";
			echo "<td>$historial[codigo]</td>";
			echo "<td>$historial[estadoA1]</td>";
			echo "<td>$historial[estadoA2]</td>";
			echo "<td>$historial[estadoB1]</td>";
		}
	?>
</table>
</div>
</body>
</html>