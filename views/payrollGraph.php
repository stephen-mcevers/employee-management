<?php include ('views/adminHeader.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var options = {
	title: {
		text: "Payroll Graph by Department"
	},
	subtitles: [{
                text: "Total Payroll as of <?php echo date("Y/m/d");  ?> = $<?php echo $totalSalary; ?> "
		
	}],
	animationEnabled: true,
	data: [{
		type: "pie",
		startAngle: 40,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: <?php echo $itPercent; ?>, label: "IT" },
			{ y: <?php echo $hrPercent; ?>, label: "HR" },
			{ y: <?php echo $salesPercent; ?>, label: "Sales" }

		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 750px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
