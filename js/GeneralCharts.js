const generalChartFileStrings = ["Paddle","Surfing","Sailing","Rowing","Kitesurfing","Windsurfing","Swimming"]; 
const generalChartColourOffsets = [0,2,4,3,5,1,0];

var numOfGeneralCharts = generalChartColourOffsets.length;
for (i=0; i < numOfGeneralCharts; i++)
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

function ZoomB()
{
	LoadGeneralCharts (1, true);
}

function ZoomC()
{
	LoadGeneralCharts (2, true);
}

function ZoomD()
{
	LoadGeneralCharts (3, true);
}

function ZoomE()
{
	LoadGeneralCharts (4, true);
}

function ZoomF()
{
	LoadGeneralCharts (5, true);
}

function ZoomG()
{
	LoadGeneralCharts (6, true);
}