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
	
	<hr/>
	<h3>Playing with PHP</h3>
	<p>So, seeing as we now have PHP in our project, it would be rude not to use it's functionality to have a go at processing our raw data. We can load our CanoeingData1yr.csv data file and display a table just like the one with JavaScript above pretty easily.</p>
	
	<?php
		$dateData = array();
		$searchData = array();
		
		$csvFile = fopen("data/CanoeingData1yr.csv", "r") or die("Unable to open file!");
		//read out the title lines (1 to 3)
		$title = fgets($csvFile);
		$title .= fgets($csvFile);
		$title .= fgets($csvFile);
		
		//read out the rest into '$rawCsvData' array
		while(!feof($csvFile)) 
		{
			$lineArray = fgetcsv($csvFile);
			if ($lineArray != null)				//$lineArray = array (1,1); //in case array is empty.. We must or we get a warning
			{
				array_push($dateData,$lineArray[0]);
				array_push($searchData, $lineArray[1]);	
			}
		}
		fclose($csvFile);

		//display the data NOTE we could have just done this while loading it BUT this way,
		//we have the data stored in our arrays if we ant to do more with it later...
		$longMonths = array("January","February","March","April","May","June","July","August","September","October","November","December");
		echo '<h4>'.$title.'</h4><table id="csvDataTableB">';
		echo '<tr><th class="headRow">DATE</th><th class="headRow">HIT RATIO</th></tr>';
		for($i=0; $i<(count($dateData)); $i++)
		{
			$splitDate = explode('-',$dateData[$i]); //separate date into separate array via the dashes
			$dateDay = intval($splitDate[2]);
			//Remember this from our JavaScript?
			switch ($dateDay % 10)
			{
				case 1:
				$dayFollower = "<span class=\"subScript\">st</span> ";
				break;
				case 2:
				$dayFollower = "<span class=\"subScript\">nd</span> ";
				break;
				case 3:
				$dayFollower = "<span class=\"subScript\">rd</span> ";
				break;
				default:
				$dayFollower = "<span class=\"subScript\">th</span> ";
				break;
			}
			$dateDay.=$dayFollower;
			
			$thisMonthAsIndex = (intval($splitDate[1])-1);
			echo '<tr><td class="leftcol">'.$dateDay.' '.$longMonths[$thisMonthAsIndex].' '.$splitDate[0].'</td><td class="rightcol">'.$searchData[$i].'</td></tr>';
		}
		?>
	</table>
	</div><!-- End of Right box --> 

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>
