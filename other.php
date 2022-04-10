<!DOCTYPE html>
<html lang="en">
<head>
	<title>Using Real Data</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/other.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" defer></script>
	<script type="text/javascript" src="js/menu.js" defer></script>
	<script type="text/javascript" src="js/DisplayData.js" defer></script>
	<script type="text/javascript" src="js/ConvertData.js" defer></script>
	<script type="text/javascript" src="js/ChartPlotters.js" defer></script>
	
</head>

<body>
<div class = "grid-container">

	<div class="header" id="">
	<?php include 'header.php';?>
	</div><!-- End of header -->
	
	<div class="left" id="">
	<?php $button="5"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>Other Examples</h3>
	<p>Now that we have a kind of simple framework that handles CSV's from Google Trends, let's see what else we can do with that data.</p>
	<p>Choose a file from the list box below and press a button to choose how you see the data:</p>
	<h4>Load and display a file</h4>
	<form name="fileForm">
	<label for="fileSelect">Choose a file to view </label>&nbsp;
	<?php
	$csvFiles = array_slice(scandir('data/'), 2); //dir minus . & ..
	echo'<select name="fileSelect" id=""><optgroup label="">';	
	foreach($csvFiles as $csvFile) 
		echo '<option value="' . $csvFile . '">' . $csvFile . '</option><br/>';
	echo '</optgroup></select>';
	?>
	&nbsp;
	<input type="button" name="" id="" value="TABLE" onClick="GetFileToDisplay()"/>
	&nbsp;
	<input type="button" name="" id="" value="LINE CHART" onClick="PlotLC()"/>
	&nbsp;
	<input type="button" name="" id="" value="BAR CHART MONTHLY" onClick="PlotBCM()"/>
	&nbsp;
	<input type="button" name="" id="" value="PIE CHART MONTHLY" onClick="PlotPCM()"/>
	&nbsp;
	<input type="button" name="" id="" value="CLEAR ALL" onClick="ClearEverything()"/>
	</form>
	<br/>
	<h4 id="tableTitle"></h4>
	<div id="SelectedChartBox">
<!-- Canvas will be dynamically added here<canvas id="SelectedChart"></canvas>-->
	</div>
	
	<table id="csvDataTable" class="csvDatTabClass">
	<!-- Table contents will go here dynamically -->
	</table>
	</div><!-- End of Right box --> 

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>