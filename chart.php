<!DOCTYPE html>

<html>
	<head>
		<title>Home Temperture Monitor</title>
		<!-- <link rel="stylesheet" type="text/css" href="reset.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			#chartdiv {
				width	: 100%;
				height	: 500px;
			}			
		</style>
		
		<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="https://www.amcharts.com/lib/3/serial.js"></script>
	</head>
	<body>
		<?php
			require_once ('temperature_class.php');
			// require_once ('/helpers.php');
			// $helpers = new Helpers();
			$tempEntry = new temperature_entry();
			$results = $tempEntry->getTemperatureEntry();
			$chartData = array();
			foreach($results as $result => $data) {
				$package = array();
				$package['temperature'] = $data['temperature'];
				$newDate = $data['entry_date'].'-'.$data['entry_time'];
				$package['new_date'] = str_replace(':', '-', $newDate);
				$chartData[] = $package;
			}
			$arrayVal = array_values($chartData);
			$en_out = json_encode($arrayVal);
			
			// $helpers->debug($en_out);
		?>
		<div id="chartdiv"></div>
		<script>
			var chart = AmCharts.makeChart("chartdiv", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 40,
			    "marginLeft": 40,
			    "autoMarginOffset": 20,
			    "dataDateFormat": "MM/DD/YYYY JJ-NN-SS",
			    "valueAxes": [{
			        "id": "v1",
			        "axisAlpha": 0,
			        "position": "left",
			        "ignoreAxisWidth":true
			    }],
			    "balloon": {
			        "borderThickness": 1,
			        "shadowAlpha": 0
			    },
			    "graphs": [{
			        "id": "g1",
			        "balloon":{
			          "drop":true,
			          "adjustBorderColor":false,
			          "color":"#ffffff"
			        },
			        "bullet": "round",
			        "bulletBorderAlpha": 1,
			        "bulletColor": "#FFFFFF",
			        "bulletSize": 5,
			        "hideBulletsCount": 50,
			        "lineThickness": 2,
			        "title": "red line",
			        "useLineColorForBulletBorder": true,
			        "valueField": "temperature",
			        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
			    }],
			    "chartScrollbar": {
			        "graph": "g1",
			        "oppositeAxis":false,
			        "offset":30,
			        "scrollbarHeight": 80,
			        "backgroundAlpha": 0,
			        "selectedBackgroundAlpha": 0.1,
			        "selectedBackgroundColor": "#888888",
			        "graphFillAlpha": 0,
			        "graphLineAlpha": 0.5,
			        "selectedGraphFillAlpha": 0,
			        "selectedGraphLineAlpha": 1,
			        "autoGridCount":true,
			        "color":"#AAAAAA"
			    },
			    "chartCursor": {
			        "pan": true,
			        "valueLineEnabled": true,
			        "valueLineBalloonEnabled": true,
			        "cursorAlpha":1,
			        "cursorColor":"#258cbb",
			        "limitToGraph":"g1",
			        "valueLineAlpha":0.2
			    },
			    "valueScrollbar":{
			      "oppositeAxis":false,
			      "offset":50,
			      "scrollbarHeight":10
			    },
			    "categoryField": "new_date",
			    "categoryAxis": {
			        "parseDates": true,
			        "dashLength": 1,
			        "minPeriod": "mm",
			        "minorGridEnabled": true
			    },
			    "export": {
			        "enabled": true
			    },
			    "dataProvider": <?php echo $en_out; ?>
			});

			var categoryAxis = chart.categoryAxis;
			categoryAxis.parseDates = true;
			categoryAxis.minPeriod = "ss";

			chart.addListener("rendered", zoomChart);

			zoomChart();

			function zoomChart() {
			    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
			}
		</script>
		
	</body>
</html>
