<!DOCTYPE html>

<html>
	<head>
		<title>Home Temperture Monitor</title>
		<?php include 'head_stuff.php'; ?>
	</head>
	<body>
		<?php
			require_once ('temperature_class.php');
			require_once ('helpers.php');
			$tempEntry = new temperature_entry();
			$helper = new Helpers();
			$lastUpdated = $tempEntry->getLastUpdated();	
			$helper->debug($lastUpdated);
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
