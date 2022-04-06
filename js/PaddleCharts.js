//we can now load sychronously the charts thanks to our Promise within the LoadDoc func.
LoadDoc("data/PaddleData1yr.csv"); //load  and parse the data
myPromise.then(function(value) //wait till data loaded and processed
{
  DrawBarChartMonthlyAverage("ChartA", chartTitle, parsedDataDate, parsedDataVal); //plot chart
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
 

