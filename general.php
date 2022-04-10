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
	<script type="text/javascript" src="js/GeneralCharts.js" defer></script>
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
	<?php $button="3"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>All Watersports</h3>
	<p>What about the search trends across different watersports? We can use our charts to compare them. First, let's look at the general Paddlesports search again:</p>

	<p>Don't forget you can <b>Double click on any graph</b> too zoom in and see it full screen.</p>

	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartA"></canvas>
	<br/><br/>
	<p>What shall we compare to? It's quite a long list and this is an exercise. Therefore, as I have no intention of an exhaustive list, I will stick to non powered / naturally powered watersports. First we'll have Surfing:</p>

	<h4>Search keyword "Surfing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartB"></canvas>
	<p>Notice how different July is to the rest of the year in this chart. The seasonal effect is very pronounced or maybe there was another reason why in July everybody became interested in the sport?</p> 
	<p>Additionally, I downloaded this csv and the ones that follow on this page today. We have made it into the next week and now have some values for April 2022.</p>
	<br/><br/>
	
	<p>Next is another one I have always fancied trying, Sailing:</p>

	<h4>Search keyword "Sailing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartC">Chart D</canvas>
	<p>A definitive lull in the Winter months but strong through Autumn and Spring.</p>
	<br/><br/>
	
	<p>Another popular one, in particular near to where I paddle is Rowing:</p>

	<h4>Search keyword "Rowing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartD"></canvas>
	<p>This is a distinct change from the regualr pattern. The overall rate seems relatively consistent. A little stronger peak in the middle of summer but relatively consistent till this week it seems to have gone crazy! I wonder what that's about?</p>
	<br/><br/>
	
	<p>How about a watersport that has been VERY popular in recent years, Kitesurfing:</p>

	<h4>Search keyword "Kitesurfing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartE"></canvas>
	<p>A big dip in November. Maybe wind was a factor? Sailing is a little down then too but not quite as bad.</p>
	<br/><br/>
	
	<p>Another classic watersport is Windsurfing:</p>

	<h4>Search keyword "Windsurfing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartF"></canvas>
	<p>November AND December are weak here. Could be wind related. I wonder if it was too little or too much? I'd imagine either to be problematic.</p>
	<br/><br/>
	
	<p>Of course, nolist would be complete without the most established watersport of them all, Swimming:</p>

	<h4>Search keyword "Swimming" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartG"></canvas>
	<p>Again, we see a dip in Bovember and December. Perhaps it's just the proximity to Christmas. Funny how paddlesports seemed less effected. However, we must remember that we did see evidence to suggest the generalised term 'Paddlesports' did not return results that matched the individual discipline. That means we can't stake too much on it being different!</p>
	<br/><br/>
	
	<p></p>
	
		
	</div><!-- End of Right box -->

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>
