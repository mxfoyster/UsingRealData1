const longMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
const dataTable = document.getElementById("csvDataTable");
const chartContainer = document.getElementById("SelectedChartBox");

function GetFileToDisplay()
{
	let fName = document.forms["fileForm"]["fileSelect"].value;

	ClearEverything();
	LoadDoc("data/" + fName);
	dataTable.innerHTML+="<tr><th class=\"headRow\">DATE</th><th class=\"headRow\">HIT RATIO</th></tr>";
	myPromise.then(function(value) 
	{
		document.getElementById("tableTitle").innerHTML = chartTitle;
		var arrayLength = parsedDataDate.length;
		var rowClassString = "";
		for (i=0; i < arrayLength; i++)
		{
			if (i%2 != 0) rowClassString = "class=\"oddRow\"";
			var tableString = "<tr " + rowClassString +"><td class=\"leftcol\">" + ConvertDate(parsedDataDate[i]);
			tableString += "</td><td  class=\"rightcol\">" + parsedDataVal[i] + "</td></tr>";
			dataTable.innerHTML += tableString;
			rowClassString="";
		}
	});
}


function ConvertDate(dateString)
{
	var dateYear = dateString.slice(0,4);
	var dateMonth = Number(dateString.slice(5,7));
	var dateDay = Number(dateString.substring(8));
	var dayFollower;
	switch (dateDay % 10)
	{
		case 1:
		dayFollower = "<span class=\"subScript\">st</span> ";
		break;
		case 2:
		dayFollower = "<span class=\"subScript\">nd</span> ";
		break;
		case 3:
		dayFollower = "<span class=\"subScript\">rd</span> ";
		break;
		default:
		dayFollower = "<span class=\"subScript\">th</span> ";
		break;
	}
	if (dateDay > 10 && dateDay < 14) dayFollower = "<span class=\"subScript\">th</span> ";
	var builtDate = dateDay + dayFollower + longMonths[dateMonth-1] + " " + dateYear;
	return builtDate;	
}

function ClearEverything()
{
	dataTable.innerHTML="";
	document.getElementById("tableTitle").innerHTML = "";
	chartContainer.innerHTML=""
}

function PlotBCM()
{
	ClearEverything();
	chartContainer.innerHTML="<canvas id=\"SelectedChart\"></canvas>"
	let fName = document.forms["fileForm"]["fileSelect"].value;
	LoadDoc("data/" + fName);
	myPromise.then(function(value) 
	{
		document.getElementById("tableTitle").innerHTML = chartTitle;
		DrawBarChartMonthlyAverage("SelectedChart", chartTitle, parsedDataDate, parsedDataVal,0);
	});
}

function PlotLC()
{
	ClearEverything();
	chartContainer.innerHTML="<canvas id=\"SelectedChart\"></canvas>"
	let fName = document.forms["fileForm"]["fileSelect"].value;
	LoadDoc("data/" + fName);
	myPromise.then(function(value) 
	{
		document.getElementById("tableTitle").innerHTML = chartTitle;
		ChartPlotter("SelectedChart", parsedDataDate, parsedDataVal, "blue", "line", chartTitle)
	});
}

function PlotPCM()
{
	ClearEverything();
	chartContainer.innerHTML="<canvas id=\"SelectedChart\"></canvas>"
	let fName = document.forms["fileForm"]["fileSelect"].value;
	LoadDoc("data/" + fName);
	myPromise.then(function(value) 
	{
		document.getElementById("tableTitle").innerHTML = chartTitle;
		ConvertDataToMonthly(parsedDataDate, parsedDataVal);
		var pieColours = ["red", "blue", "yellow", "green", "darkgray", "purple", "black", "lightblue", "pink", "orange", "darkblue", "darkmagenta", "deeppink"];
		ChartPlotter("SelectedChart", parsedDataDateMonthly, parsedDataValMonthly, pieColours, "pie", chartTitle, true)
	});
}

