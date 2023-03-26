<style type="text/css">
	.form-control:hover{
		background-color: #1266F1;
	}
</style>
<form action="index.php" method="get">
	<br /><br />
	 <fieldset style="border: 2px solid blueviolet;">
		<legend class="float-none w-auto">Prognoza pogody</legend>
		<label>Wprowadż miasto:</label>
		<br />
    	<input type="text" name="miasto" id="miasto" class="form-control" />
    	<br />
    	<input type="submit" class="form-control" name="szukaj" value="Sprawdź pogodę"  />
</fieldset>
</form>
<br />


<?php
 $miejsce = $_GET['miasto'];
    if ($miejsce == "")
        $miejsce = "Przeworsk"; 

$pogoda=simplexml_Load_file("https://api.openweathermap.org/data/2.5/weather?q=".$miejsce."&appid=1f2dcc4589f0f720950e36af158e3ac1&mode=xml&lang=pl&units=metric");

echo "<h6> " . $pogoda->city['name'] . "</h6>";
echo 'temperatura: ' . $pogoda->temperature['value'] . 'C <br />';
echo 'ciśnienie: ' . $pogoda->pressure['value'] . 'hPa <br />';
echo $pogoda->weather['value'] . '<br />';
echo '<img src="http://openweathermap.org/img/wn/' . $pogoda->weather['icon'] . '@2x.png">';

?>

