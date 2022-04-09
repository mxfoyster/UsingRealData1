<!DOCTYPE html>
<html lang="en">
<head>
	<title>Using Real Data</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/zoom.css" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" defer></script>
	<script type="text/javascript" src="js/menu.js" defer></script>
	
	<script type="text/javascript" src="js/ChartPlotters.js" defer></script>
	<script type="text/javascript" src="js/ConvertData.js" defer></script>
	<script type="text/javascript" src="js/ComparisonCharts.js" defer></script>
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
	<?php $button="4"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>Comparison</h3>
	<p>Now it's time for some different charts where we compare the different watersports to each other. First, let's compare the three paddlesports of Kayaking, Canoeing and Paddleboarding to each other on a line chart week by week.</p>

	<p>Don't forget you can <b>Double click on any graph</b> too zoom in and see it full screen.</p>

	<h4>Search keyword "Individual Paddlesports Comparison" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartA"></canvas>
	<p>I find this one quite interesting. The similarities between the popularity of the keyword for each sport is very similar. Yet again, we have to ignore the blip in April 2022 because the CSV contains a week with no data. I consider that a weakness on the part of the <i>"Google Trends"</i> Algorithm. I won't mess with the values of the data in the 'csv' file as that would defeat the object of this data handling exercise.</p>
	<p>I found the peak in paddleboarding at the end October / early November interesting. Unfortunately, I remembered the tragic accident in Haverfordwest in South Wales and a quick search confirmed the date as th 30th of October and the grim reality is that this would be responsible for the increase in searches for that keyword at that time.  </p>
	<br/><br/>
	<p>So, what next? We can compare them all on the same chart just like above. <b>WARNING</b> this will be very busy but it should still be interesting.</p>

	<h4>Search keyword "All watersports we have data for" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartB"></canvas>
	<p></p> 
	<br/><br/>
	
	<p>Very similar pattern to all the watersports apart from <i>Kitesurfing</i> which appears to stand alone.</p>
	<p><b>NOTE</b> you can turn each line on and off by clicking the appropriate colour on the legend at the top. This feature makes it easy to isolate a specific sport / just compare chosen sports etc.</p>

		<!-- <h4>Search keyword "Sailing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
			<canvas id="ChartC">Chart D</canvas>
			<p></p>
			<br/><br/>
			
			<p></p>
			
			<h4>Search keyword "Rowing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
			<canvas id="ChartD"></canvas>
			<p></p>
			<br/><br/>
			
			<p></p>
			
			<h4>Search keyword "Kitesurfing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
			<canvas id="ChartE"></canvas>
			<p></p>
			<br/><br/>
			
			<p></p>
			
			<h4>Search keyword "Windsurfing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
			<canvas id="ChartF"></canvas>
			<p></p>
			<br/><br/>
			
			<p></p>
			
			<h4>Search keyword "Swimming" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
			<canvas id="ChartG"></canvas>
		<p></p> -->
	<br/><br/>
	<h4>CONCLUSION</h4>
	<p>It's been very interestig playing with Chart.js and seeing some real data. I have learnt quite a bit on the journey and I can go abck and improve the code as time goes on.</p>
	
		
	</div><!-- End of Right box -->

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>
