//load file and process data using our promise then call our charts function 
LoadDoc("data/PaddleData1yr.csv");
myPromise.then(function(value) 
{
  DoPageSpecificStuff();
  //DrawBarChartMonthlyAverage("ChartA", chartTitle, parsedDataDate, parsedDataVal);
});
function DoPageSpecificStuff()
{	
	var weekData = [0];
	for (i = 0; i < parsedDataDate.length; i++)
			weekData[i]= "Week "+ (i + 1); //we use week number instead of date, it's neater!
	
	ChartPlotter("ChartA", weekData, parsedDataVal, "blue", "bar", chartTitle);
	ChartPlotter("ChartB", weekData, parsedDataVal, "blue", "line", chartTitle);
	DrawBarChartMonthly("ChartC", chartTitle, parsedDataDate, parsedDataVal); //Draw the monthly bar chart
	DrawBarChartMonthlyAverage("ChartD", chartTitle, parsedDataDate, parsedDataVal); //Draw month avg bar chart
}
