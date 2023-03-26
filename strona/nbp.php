<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


	<?php
	$kursy=simplexml_load_file("https://www.nbp.pl/kursy/xml/a071z220412.xml");

	echo "<h4>data" . $kursy->data_publikacji . "</h4>"
	?>
	<table class="table table-striped">
		<tr>
			<th>Nazwa Waluty</th>
			<th>Kurs średni</th>
		</tr>
	<?php
	foreach ($kursy->children() as $waluta) {
		if($waluta->$nazwa_waluty !=" "){
			echo '<tr><td>' . $waluta->nazwa_waluty . "</td>";
			echo '<td>' . $waluta->kurs_sredni . "</td></tr>";
		}

		}
	


?>
</table>
</body>
</html>