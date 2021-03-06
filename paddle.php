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
	<script type="text/javascript" src="js/PaddleCharts.js" defer></script>
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
	<?php $button="2"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>Paddlesports</h3>
	<p>So, now we know how to load some data and graph it in a way that is easy to visualise, let's compare some paddlesports. Let's start with the monthly average bar chart:</p>
	
	<p>Don't forget, you can <b>Double click on any graph</b> too zoom in and see it full screen.</p>

	<h4>Search keyword "Paddlesports" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartA"></canvas>
	<br/><br/>
	<p>What about Canoeing within a similar timeframe?:</p>

	<h4>Search keyword "Canoeing" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartB"></canvas>
	<br/><br/>
	<p>Note we have an extra bar for April 2022. If you look at the csv, you will see that there is indeed a week there with a value of 0. I downloaded the rest of the data a couple of days after the first one. It's good to see the algorighm handled it without a problem. Next, we'll have some Kayaking search data:</p>

	<h4>Search keyword "Kayaking" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartC">Chart D</canvas>
	<br/><br/>
	
	<p>Yet again, there is an empty week for April 2022. I think to complete the picture, we need some paddleboarding search data:</p>

	<h4>Search keyword "Paddleboarding" (April 2021 - April 2022) Bar Chart Monthly (Average)</h4>
	<canvas id="ChartD"></canvas>
	<br/><br/>
	<p>So, What have we learnt? There is a fairly consistent trend according to month for Canoeing, Kayaking and Paddleboarding. In all three cases, the peak is in July and there are much less searches from December through to January. This is fairly logical.</p>
	
	<p>The slight surprise is that there is a bit of variation with the more generalised term Paddlesports. I theorise that not so many people will me familiar with that phrase as the individual disciplines. Without quantitive data, that is hard to prove for certain but to me it's reasonable as a theory at least.</p>
	
	<p>If we could prove that is true, that woudl be useful information regarding what terminology to use when marketing products that cross all areas of the discipline. If you advertise a "Paddlesports" shop, it might be noticed less than a "Kayaking, Cannoeing and Paddlebord" shop. This proves there are potential benefits of having a clearer idea if this is true.</p> 
	
	<p>The most basic of data has the potential to provide useful information. It is not hard to see how data on search trends, purchase history etc holds value.</p>
	
		
	</div><!-- End of Right box -->

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>
