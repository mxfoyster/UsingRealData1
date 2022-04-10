<!DOCTYPE html>
<html lang="en">
<head>
	<title>Using Real Data</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/zoom.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" defer></script>
	<script type="text/javascript" src="js/menu.js" defer></script>
	
	<script type="text/javascript" src="js/ChartPlotters.js" defer></script>
	<script type="text/javascript" src="js/ConvertData.js" defer></script>
	<script type="text/javascript" src="js/IndexCharts.js" defer></script>
	<script type="text/javascript" src="js/Zoom.js" defer></script>
</head>

<body>
<div id="zoomBox">
<!-- Canvas will be dynamically added here-->
</div>
<div class = "grid-container">

	<div class="header" id="">
	<?php include 'header.php';?>
	</div><!-- End of header -->
	
	<div class="left" id="">
	<?php $button="1"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>Introduction</h3>
	<p>This exercise is to demonstrating the handling of real data presented through HTML on a website. The Google Trends data I am using has been downloaded as .csv file. This is the long way around. Google Trends offers the capability to embed graphs etc directly into a web page but that would defeat the object of the exercise. I intend to use Chart.js to display some of the information.</p>

	<p>The information itself will simply compare the interest of various watersports in comparison to paddlesports at given times of the year. The data is based on the popularity of the search keyword relative to the time of year, it is not quantative data.</p>
	
	<p>You can <b>Double click on any graph</b> too zoom in and see it full screen.</p>
	
	<p>Here's the results for the keyword "paddlesports" between April 20201 and April 2022:</p>
	
	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Bar Chart</h4>
	<canvas id="ChartA"></canvas>
	
	<br/><br/>
	<p>This isn't terribly clear, let's try a line chart:</p>
	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Line Chart</h4>
	<canvas id="ChartB"></canvas>
	<br/><br/>
	<p>Because the data is a little hit and miss some weeks, let's look at a bar chart with the total per month:</p>
	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Bar Chart Monthly (Total)</h4>
	<canvas id="ChartC"></canvas>
	<br/><br/>
	<p>This is a lot clearer. However, there is an issue. Different months have different amounts of weeks in. Therefore lets re-do this with the average per month and see how much difference there is:</p>
	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartD"></canvas>
	<br/><br/>
	<p>You can see clear differences in the distribution. This is a MUCH more accurate representation of the data.</p>
	
	</div><!-- End of Right box -->

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>

</body>
</html>
