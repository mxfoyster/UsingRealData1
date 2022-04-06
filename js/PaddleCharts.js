var currentFileName;
var thisPageChart;
var chart1Loaded = false;
var chart2Loaded = false;


//we can now load sychronously the charts thanks to our Promise within the LoadDoc func.
LoadDoc("data/PaddleData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartA", chartTitle, parsedDataDate, parsedDataVal);
});
LoadDoc("data/CanoeingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartB", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/KayakingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartC", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/PaddleboardingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartD", chartTitle, parsedDataDate, parsedDataVal);
});
 
function DoPageSpecificStuff()
{
	//not needed here
}

