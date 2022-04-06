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
LoadDoc("data/SurfingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartB", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/SailingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartC", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/RowingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartD", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/KitesurfingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartE", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/WindsurfingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartF", chartTitle, parsedDataDate, parsedDataVal);
});

LoadDoc("data/SwimmingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartG", chartTitle, parsedDataDate, parsedDataVal);
});
 
function DoPageSpecificStuff()
{
	//not needed here
}

