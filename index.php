<!DOCTYPE html>

<html>
	<head>
		<title>Home Temperture Monitor</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	<?php
		require_once ('temperature_class.php');
		
		$tempEntry = new temperature_entry();
		// $date = $_GET['date'];
		// $temperature = $_GET['temperature'];
		
		// echo 'Today is '.$date;
		// echo '<h1>It is '.$temperature.' </h1>';
		$lastUpdated = $tempEntry->getLastUpdated();	
		// $results = $tempEntry->getTemperatureEntry();
		
		// foreach ($results as $result) { 
		// 	// var_dump($result);
		// 	echo $result['temperature'].',';
		// 	echo '<br>';
		// }
		
		// echo date('m-d-y-H:i:s');
		function debug($data) {
			echo '<pre>';
			var_dump($data);
			echo '</pre>';
		}


	?>
	<header>
		<h1>Nicco Horvath's Super Cool (But Kind of Lame) Temperature Monitoring System</h1>
		<h2>Built By: Ryan Morton &amp; Nicco Horvath</h2>
	</header>
	
	<main>
		<div class="last-updated">
			<h4 class="last-updated__title">Last updated</h4>
			<h3 class="last-update__data"><?php echo $lastUpdated['temperature']; ?></h3>
		</div>
	
	</main>


</html>
