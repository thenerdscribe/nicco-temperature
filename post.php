<?php
	require_once ('temperature_class.php');
	
	$tempEntry = new temperature_entry();
	
	$data = array(
			'temperature' => $_GET['temperature'],
			'entry_date'  =>  $_GET['date'],
			'entry_time'  =>  $_GET['time'],
			);
	$tempEntry->addEntry($data);
	date_default_timezone_set('America/Phoenix');
	$time = date('h:i:s', time());
	echo $time;
	
	
