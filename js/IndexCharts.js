//load file and process data using our promise then call our charts function 
LoadDoc("data/PaddleData1yr.csv");
myPromise.then(function(value) 
{
  PlotIndexCharts();
});

//Because we plot from the same file and the data is already processed, we don't need to use a Promise
function PlotIndexCharts()
{	
	var weekData = [0];
	let p_D_DateLength = parsedDataDate.length;
	for (i = 0; i < p_D_DateLength; i++)
			weekData[i]= "Week "+ (i + 1); //we use week number instead of date, it's neater!
	
	ChartPlotter("ChartA", weekData, parsedDataVal, "blue", "bar", chartTitle);
	ChartPlotter("ChartB", weekData, parsedDataVal, "blue", "line", chartTitle);
	DrawBarChartMonthly("ChartC", chartTitle, parsedDataDate, parsedDataVal); //Draw the monthly bar chart
	DrawBarChartMonthlyAverage("ChartD", chartTitle, parsedDataDate, parsedDataVal); //Draw month avg bar chart
}
