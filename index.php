<!DOCTYPE html>

<html>
	<head>
		<title>Home Temperture Monitor</title>
		<link rel="stylesheet" type="text/css" href="reset.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	<body>
		<?php
			require_once ('temperature_class.php');
			
			$tempEntry = new temperature_entry();
			// $date = $_GET['date'];
			// $temperature = $_GET['temperature'];
			
			// echo 'Today is '.$date;
			// echo '<h1>It is '.$temperature.' </h1>';
			$lastUpdated = $tempEntry->getLastUpdated();	
			
			// echo date('m-d-y-H:i:s');
			function debug($data) {
				echo '<pre>';
				var_dump($data);
				echo '</pre>';
			}


		?>
		<header class="main-header">
			<h1>Temperature Monitoring System</h1>
		</header>
		
		<main>
			<div class="last-updated">
				<div class="last-updated__meta">
					<h4 class="last-updated__title">Last updated</h4>
					<h4 class="last-updated__date"><?php echo $lastUpdated['entry_date']; ?></h4>
					<h4 class="last-updated__time"><?php echo $lastUpdated['entry_time']; ?></h4>
				</div>
				<h3 class="last-updated__data"><?php echo $lastUpdated['temperature']; ?>&deg;</h3>
			</div>
		
		</main>
	</body>

</html>
