<?php include ('views/adminHeader.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {


var options = {
	title: {
		text: "Employee count by Section"              
	},
        subtitles: [{
                text: "Total Count as of <?php echo date("Y/m/d");  ?> = <?php echo $totalCount; ?> "
		
	}],
	data: [              
	{
		
		type: "column",
		dataPoints: [
			
			{ label: "Sales", y: <?php echo $salesCount; ?>  },
                        { label: "IT",  y: <?php echo $itCount; ?>  },
			{ label: "HR", y: <?php echo $hrCount; ?>   }
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>