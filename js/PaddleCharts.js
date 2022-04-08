//we can now load sychronously the charts thanks to our Promise within the LoadDoc func.
LoadDoc("data/PaddleData1yr.csv"); //load  and parse the data
myPromise.then(function(value) //wait till data loaded and processed
{
  DrawBarChartMonthlyAverage("ChartA", chartTitle, parsedDataDate, parsedDataVal); //plot chart
});

LoadDoc("data/CanoeingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartB", chartTitle, parsedDataDate, parsedDataVal, 1);
});

LoadDoc("data/KayakingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartC", chartTitle, parsedDataDate, parsedDataVal, 2);
});

LoadDoc("data/PaddleboardingData1yr.csv");
myPromise.then(function(value) 
{
  DrawBarChartMonthlyAverage("ChartD", chartTitle, parsedDataDate, parsedDataVal, 3);
});


// Functions for plotting to zoom window. I thought about moving the plots into parameterised functions 
// but we're getting so deeply nested, I'll keep it simple and sacrifice a little DRY
function ZoomA()
{
	LoadDoc("data/PaddleData1yr.csv"); //load  and parse the data
	myPromise.then(function(value) //wait till data loaded and processed
	{
		DrawBarChartMonthlyAverage("ZoomCanvas", chartTitle, parsedDataDate, parsedDataVal); //plot chart
	});
}

function ZoomB()
{
	LoadDoc("data/CanoeingData1yr.csv");
	myPromise.then(function(value) 
	{
		DrawBarChartMonthlyAverage("ZoomCanvas", chartTitle, parsedDataDate, parsedDataVal, 1);
	});
}

function ZoomC()
{
	LoadDoc("data/KayakingData1yr.csv");
	myPromise.then(function(value) 
	{
		DrawBarChartMonthlyAverage("ZoomCanvas", chartTitle, parsedDataDate, parsedDataVal, 2);
	});
}

function ZoomD()
{
	LoadDoc("data/PaddleboardingData1yr.csv");
	myPromise.then(function(value) 
	{
		DrawBarChartMonthlyAverage("ZoomCanvas", chartTitle, parsedDataDate, parsedDataVal, 3);
	});
}
 
