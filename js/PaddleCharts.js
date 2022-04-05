currentFileName = "data/PaddleData1yr.csv";
var thisPageChart = "ChartA";
var chart1Loaded = false;
var chart2Loaded = false;

//This is not good practice, I need to learn async/await and promises! that's next :-)
LoadDoc(currentFileName);
setTimeout(function() { AnotherChart("data/CanoeingData1yr.csv","ChartB"); }, 500);
setTimeout(function() { AnotherChart("data/KayakingData1yr.csv","ChartC"); }, 1000);
setTimeout(function() { AnotherChart("data/PaddleboardingData1yr.csv","ChartD"); }, 1500);
function DoPageSpecificStuff()
{
	var chartTitle = SplitTitle(); //remove and store title from dataStream
	ParseStreamData(); //split the rest into our arrays
	
	var weekData = [0];
	for (i = 0; i < parsedDataDate.length; i++)
			weekData[i]= "Week "+ (i + 1); //we use week number instead of date, it's neater!
	
	DrawBarChartMonthlyAverage(thisPageChart, chartTitle, parsedDataDate, parsedDataVal); //Draw the month avg bar chart
}

function AnotherChart(thisFN, thisChart)
{
	currentFileName = thisFN;
	thisPageChart = thisChart;
	LoadDoc(currentFileName);
}