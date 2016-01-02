<?php
	require_once ('temperature_class.php');
	
	$tempEntry = new temperature_entry();
	
	$data = array(
			'temperature' => $_POST['temperature'],
			'entry_date'  =>  $_POST['date'],
			'entry_time'  =>  $_POST['time'],
			);
	$tempEntry->addEntry($data);
	date_default_timezone_set('America/Phoenix');
	$time = date('h:i:s', time());
	echo $time;
	
	
