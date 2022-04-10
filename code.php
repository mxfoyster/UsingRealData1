<!DOCTYPE html>
<html lang="en">
<head>
	<title>Using Real Data</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" defer></script>
	<script type="text/javascript" src="js/menu.js" defer></script>
	
	<script type="text/javascript" src="js/ChartPlotters.js" defer></script>
	<script type="text/javascript" src="js/ConvertData.js" defer></script>
	<script type="text/javascript" src="js/SummaryCharts.js" defer></script>
</head>

<body>
<div class = "grid-container">

	<div class="header" id="">
	<?php include 'header.php';?>
	</div><!-- End of header -->
	
	<div class="left" id="">
	<?php $button="6"; include 'menu.php';?>
	</div><!-- End of Left box -->

	<div class="right" id="">
	<h3>The Code</h3>
	<p>Here I am going to explain some of the code I used to make this website. Where it's worth it, I will include some snippets. It's not exactly sophisticated but I had fun and learnt quite a bit on the way. Maybe some of this could be useful to someone else. Don't forget that this entire project is available on GitHub at <a href="https://github.com/mxfoyster/UsingRealData1">this repository</a></p>

	<h3>JavaScript</h3>
	<p>I've tried to keep to "Vanilla" JavaScript for this project. As far as I know, <i>Chart.js</i> is plain JavaScript too! </p>

	<p>Loading the <i>.csv</i> files asychronously was an education into getting a better understanding of <i>Asynchronous JavaScript</i>. I have worked with it before, mostly using <code>XmlHttpRequest()</code>, but I have to confess that whilst I understood what was going on, I still didn't get a REAL feel for the process. With having to load multiple charts, I had to get a better grasp of what was going on and learn about <i>Promises</i>. My first use of this was whilst using the <code>fetch()</code> API like so:</p>

<pre>
	function LoadDoc(fileName) 
	{
		myPromise = new Promise(function(myResolve, myReject) 
		{
			fetch(fileName) //fetch API is easier, cleaner and more reliable than XMLHttpRequest
				.then(response => response.text()) 
				.then(textString => 
				{
				dataStream = textString;	
				SplitTitle();
				ParseStreamData();
				myResolve("Success"); //Promise resolved.. 
				});
		});
	}		
</pre>

	<p>Luckily for me, <code>fetch()</code> utilises promises which made things a lot easier.</p>

	<p>Another asynchronous problem I had was that <i>Chart.js</i> is more complex than my code and therefore was not ready for me when I had to load different files and display their data. I would either corrupt the data or more often end up with multiple charts plotting on the same canvas. In the end, I was able to propogate the <code>Promise</code> further and wrap my plot around another one so that I could be sure the data was all loaded, sending it to the chart BEFORE moving on to the next one. The code on each plot where I was using different data looks like this: </p>

<pre>
	LoadDoc("data/CanoeingData1yr.csv");
	myPromise.then(function(value) 
	{	
		parsedCanoeingData =  [...parsedDataVal];
	});		
</pre>

	<p>I may go back to this in the future because I have not really addressed the handling of errors as thoroughly as i should. However, I am learning. I'm very glad I didn't try and use <i>Callbacks</i>, that would have been a messy solution!. Note the use of the <i>ES6</i> <code>[...]</code><i>Spread</i> operator. this is a neat way to copy an array by value and not reference.</p>

	<p>My favourite bit of Javascript in the project was when I refactored <i>GeneralData.js</i> to be more <b>DRY</b> (Don't repeat Yourself). Here's some of the code:</p>

<pre>
const generalChartFileStrings = ["Paddle","Surfing","Sailing","Rowing","Kitesurfing","Windsurfing","Swimming"]; 
const generalChartColourOffsets = [0,2,4,3,5,1,0];

var numOfGeneralCharts = generalChartColourOffsets.length;
for (i=0; i &lt; numOfGeneralCharts; i++)
	LoadGeneralCharts (i);

//the DRY friendly way we draw our charts.. Set true to plot to zoom box
function LoadGeneralCharts (chartNumber, chartCanvasID = false)
{
  var filename = "data/" + generalChartFileStrings[chartNumber] + "Data1yr.csv";
	
  var thisCanvasName = "ZoomCanvas"; //doing it like this we avoid an 'else'
	
  if (chartCanvasID == false) thisCanvasName= "Chart" + String.fromCharCode((65 + chartNumber));
  console.log (filename + " " + thisCanvasName);
  LoadDoc(filename);
  myPromise.then(function(value) 
  {
    DrawBarChartMonthlyAverage(thisCanvasName, chartTitle, parsedDataDate, parsedDataVal, generalChartColourOffsets[chartNumber]);
  });
}

function ZoomA()
{
	LoadGeneralCharts (0, true);
}		
</pre>

<p>Where you see <code>function ZoomA()</code>there were functions A to G, all plotting a chart. This code made the job considerable cleaner. The only downside it that it makes the other code look a bit bad. I could end up refactoring more to get closer to this elsewhere.</p>

	<h3>CSS</h3>
	<p>The CSS is not very sophisticated much like the rest of this project. I am using a <code>grid</code> layout for the main layout. These come in handy for the media queries, eg <code>@media (max-width: 800px)</code> where I can move my menu from beside the page to below it in order to make the best use of space. I've still some fine tuning to do here!</p>

	<p>I'll admit that I have fallen in love with the <code>:hover</code> pseudo class. It is so usefu to be able to get a style to change without having to write the JavaScript behind it. I use it in my menu in two ways:</p>

<pre>
	.menuBtn:hover
	{
	  background-color: lightblue;
	  cursor: pointer;
	}	
</pre>

	<p>Because I don't have real anchor tags in my menu options, it is handy to be able to override the cursor from the 'text' to 'pointer'. Furthermore, by having the background colour change on hover, it makes it more obvious that it's a menu and can be interacted with.</p>

	<p>Genuinely though, I think my favourite bit of <i>CSS</i> looks wise is the <code>pre</code> blocks the code is wrapped in on this page. It's ver simple but I like it. here it is:</p>

<pre>
	pre
	{
	  padding-top: 0.5rem;
	  padding-bottom: 0.5rem;
	  padding-left: 0.5rem;
	  font-size:calc(6px + 0.5vw);
	  background-color: #222222;
	  color:  lightblue;
	  border-style: inset;
	  border-radius: 10px;
	  max-width: 95%;
	}
</pre>

	<h3>PHP</h3>
	<p>To be honest, for the amout I have used it, PHP is barely warranted here. That might change later on though, it gives me some options further down the line.</p>

	<p>Asides from my <i>includes</i> that I have on each page for the header an the footer inside the grid <code>&lt;div&gt;</code> blocks, I do make a bit more use of the left grid menu include which looks like this:</p>
<pre>
		&lt;php $button="1"; include 'menu.php';?&gt;
</pre>

	<p>Before the include, I have set $button to the corresponding number of the menu button for the current page. Then in the <i>menu.php</i> script, because the variable will still be in scope I can do this:</p>

<pre>
&lt;?php 
	echo '&lt;table id="sideMenu"&gt;';
	echo '&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn1"'.Highlight($button,1).'&gt;HOME&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuGap"&gt;&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn2"'.Highlight($button,2).'&gt;PADDLESPORTS&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuGap"&gt;&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn3"'.Highlight($button,3).'&gt;ALL WATERSPORTS&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuGap"&gt;&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn4"'.Highlight($button,4).'&gt;COMPARISON&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuGap"&gt;&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn5"'.Highlight($button,5).'&gt;CODE&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuGap"&gt;&lt;/td&gt;';
	echo '&lt;/tr&gt;&lt;tr&gt;';
	echo '&lt;td class="menuBtn" id="menuBtn6"'.Highlight($button,6).'&gt;LINKS&lt;/td&gt;';
	echo '&lt;/tr&gt;';
	echo '&lt;/table&gt;';

function Highlight($button, $thisButton)
{
	if ($button==$thisButton)
		return 'style="color: red;"';
}

?&gt;		
</pre>
		
	<p>I simply can add an inline style tag into the appropriate button to change the font button colour of that page. It's easy to update as I add pages. Whilst it's nothing super fancy, I quite liked it. All in all, the PHP does make it easier for me to add pages etc.</p>
	
	<p><b>UPDATE</b> So, since writing the above, I did get a bit more PHP into the project. I decided that on the <b>OTHER</b> page, I wanted to load a <i>.csv</i> using PHP and store it into two arrays just like I did with JavaScript. After that, I simply displayed it into a table utilising the styling I had already applied to the JavaScript table.</p>
	<p>I remembered why I am quite fond of PHP doing this. While it can take some searching to work out the most efficient way to do things, there are so many built in functions available that they can save a LOT of code. Here's the code I used to load the file:</p>
<pre>
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
		if ($lineArray != null)	//in case array is empty.. We must or we get a warning
		{
			array_push($dateData,$lineArray[0]);
			array_push($searchData, $lineArray[1]);	
		}
	}
	fclose($csvFile);	
</pre>
	<p>Now I have my data in two neat arrays just like I did with JavaScript. This means I could still do domething with it later which would not be an option if I just printed it out inline. So, next I wanted to display it as a table just like I did with JavaScript on the same page. I used the same styling tags which saved code. Then I just iterated through the array and formatted the date in the same way as before:</p>
<pre>
$longMonths = array("January","February","March","April","May","June","July","August","September","October","November","December");
echo '&lt;h4&gt;'.$title.'&lt;/h4&gt;&lt;table id="csvDataTableB"&gt;';
echo '&lt;tr&gt;&lt;th class="headRow"&gt;DATE&lt;/th&gt;&lt;th class="headRow"&gt;HIT RATIO&lt;/th&gt;&lt;/tr&gt;';
for($i=0; $i&lt;(count($dateData)); $i++)
{
  $splitDate = explode('-',$dateData[$i]); //separate date into separate array via the dashes
  $dateDay = intval($splitDate[2]);
  //Remember this from our JavaScript?
  switch ($dateDay % 10)
  {
	case 1:
	$dayFollower = "&lt;span class=\"subScript\"&gt;st&lt;/span&gt; ";
	break;
	case 2:
	$dayFollower = "&lt;span class=\"subScript\"&gt;nd&lt;/span&gt; ";
	break;
	case 3:
	$dayFollower = "&lt;span class=\"subScript\"&gt;rd&lt;/span&gt; ";
	break;
	default:
	$dayFollower = "&lt;span class=\"subScript\"&gt;th&lt;/span&gt; ";
	break;
  }
  $dateDay.=$dayFollower;
	
  $thisMonthAsIndex = (intval($splitDate[1])-1);
  echo '&lt;tr&gt;&lt;td class="leftcol"&gt;'.$dateDay.' '.$longMonths[$thisMonthAsIndex].' '.$splitDate[0];
  echo '&lt;/td&gt;&lt;td class="rightcol"&gt;'.$searchData[$i].'&lt;/td&gt;&lt;/tr&gt;';
}
</pre>

	<p>One of  the line's I have borken down into two lines just on here so it fits better. This isn't perfect code, some of it should probably be extracted to functions but it works exactly the way I wanted it to. I don't know if I'll do any more with this as I need to start a new project but I've really enjoyed this one.</p>
	</div><!-- End of Right box -->

	<div class="footer" id="">
	<?php include 'footer.php';?>
	</div><!-- End of Footer -->
</div>
</body>
</html>
