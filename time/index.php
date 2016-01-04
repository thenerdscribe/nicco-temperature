<?php
	date_default_timezone_set('America/Phoenix');
	
	$time = date('H:i:s', time());
	$date = date('m/d/Y', time());
	$td = array('date'=> $date, 'time'=> $time,);
	$atd = json_encode($td);

	echo $atd;
