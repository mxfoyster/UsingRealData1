var parsedKayakingData = [0];
var parsedCanoeingData = [0];
var parsedPaddleboardingData =[0];
var parsedSurfingData =[0];
var parsedSailingData =[0];
var parsedRowingData =[0];
var parsedKitesurfingData =[0];
var parsedWindsurfingData =[0];
var parsedSwimmingData = [0];
//We might use this later for aligned dates
const parsedAlignedDateData = [0];

//First, we'll load the data and store it. Each sport will have it's own y axis data but share the date data
LoadDoc("data/KayakingData1yr.csv");
myPromise.then(function(value) 
{
	parsedKayakingData =  [...parsedDataVal]; //This is the ES6 way to copy array by value
});

LoadDoc("data/CanoeingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedCanoeingData =  [...parsedDataVal];
});

LoadDoc("data/PaddleboardingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedPaddleboardingData =  [...parsedDataVal];
});

LoadDoc("data/SurfingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedSurfingData =  [...parsedDataVal];
});

LoadDoc("data/SailingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedSailingData =  [...parsedDataVal];
});

LoadDoc("data/RowingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedRowingData =  [...parsedDataVal];
});

LoadDoc("data/KitesurfingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedKitesurfingData =  [...parsedDataVal];
});

LoadDoc("data/WindsurfingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedWindsurfingData =  [...parsedDataVal];
});

LoadDoc("data/SwimmingData1yr.csv");
myPromise.then(function(value) 
{	
	parsedSwimmingData =  [...parsedDataVal];
	PlotComparisonCharts();
});


//we call all our charts for this page here
function PlotComparisonCharts()
{
	ComparisonChartA("ChartA");
	ComparisonChartB("ChartB");
}

//the three Paddlesports
function ComparisonChartA(canvID)
{
		var xValues = parsedDataDate;

	new Chart(canvID, 
	{
		type: "line",
		data: 
		{
			labels: xValues,
			datasets: [
			{
				label: "Kayaking",
				data: parsedKayakingData,
				borderColor: "red",
				fill: false
			},
			{
				label: "Canoeing",
				data: parsedCanoeingData,
				borderColor: "green",
				fill: false
			},
			{
				label: "Paddleboard",
				data: parsedPaddleboardingData,
				borderColor: "blue",
				fill: false
			}]
		},
		options: 
			{
				legend: {display: true}
			}
		});
}

//All the watersports together. This one will be a bit busy!
function ComparisonChartB(canvID)
{
		var xValues = parsedDataDate;

	new Chart(canvID, 
	{
		type: "line",
		data: 
		{
			labels: xValues,
			datasets: [
			{
				label: "Kayaking",
				data: parsedKayakingData,
				borderColor: "red",
				fill: false
			},
			{
				label: "Canoeing",
				data: parsedCanoeingData,
				borderColor: "orange",
				fill: false
			},
			{
				label: "Paddleboard",
				data: parsedPaddleboardingData,
				borderColor: "yellow",
				fill: false
			},
			{
				label: "Surfing",
				data: parsedSurfingData,
				borderColor: "green",
				fill: false
			},
			{
				label: "Sailing",
				data: parsedSailingData,
				borderColor: "blue",
				fill: false
			},
			{
				label: "Rowing",
				data: parsedRowingData,
				borderColor: "purple",
				fill: false
			},
			{
				label: "Kitesurfing",
				data: parsedKitesurfingData,
				borderColor: "black",
				fill: false
			},
			{
				label: "Windsurfing",
				data: parsedWindsurfingData,
				borderColor: "lightblue",
				fill: false
			},
			{
				label: "Swimming",
				data: parsedSwimmingData,
				borderColor: "pink",
				fill: false
			},]
		},
		options: 
			{
				legend: {display: true}
			}
		});
}

function ZoomA()
{
	ComparisonChartA("ZoomCanvas");
	
}

function ZoomB()
{
	ComparisonChartB("ZoomCanvas");
}