var dataStream;
var parsedDataDate = [0];
var parsedDataVal = [0];
LoadDoc();

//load the file
function LoadDoc() 
{
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() 
	{
     dataStream = this.responseText;
	 DoDoneLoadingStuff();//do everything we have to do with this data WITHIN THIS FUNCTION 
    }
  xhttp.open("GET", "data/PaddleData1yr.csv", true);
  xhttp.send();
}

//everything we must to with data from the file must be done in here
//this is the easiest way to be sure it's loaded and we don't have sync issues.
function DoDoneLoadingStuff()
{
	var chartTitle = SplitTitle(); //remove and store title from dataStream
	ParseStreamData(); //split the rest into our arrays
	
	var weekData = [0];
	for (i = 0; i < parsedDataDate.length; i++)
			weekData[i]= "Week "+ (i + 1); //we use week number instead of date, it's neater!
	
	DrawBarChart(chartTitle, weekData, parsedDataVal); //Draw the bar chart
	DrawLineChart(chartTitle, weekData, parsedDataVal);
	DrawBarChartMonthly(chartTitle, parsedDataDate, parsedDataVal); //Draw the bar chart
}

//Removes and returns the title from the dataStream string
function SplitTitle()
{
	var chartTitle;
	for(i=0; i<dataStream.length; i++)
	{
		if (dataStream.charAt(i)== '2') 
		{
			chartTitle = dataStream.substring(0,i-1);
			dataStream = dataStream.substring(i,dataStream.length -1);
			i = dataStream.length;
		}
	}
	return chartTitle
}

//separate dataStream by comma's and cr's into two arrays (Title must be stripped first)
function ParseStreamData()
{
	var pDCol=0; //array column
	var pDIndex=0;//array index
	var currentString = "";
	
	//now break it down one character at a time into the arrays
	for(i=0; i<dataStream.length; i++)
	{
		if (dataStream.charAt(i) !="\n" && dataStream.charAt(i) !="\"")
			currentString += dataStream.charAt(i); 	//we have to put in a string to avoid 'undefined' at 
		else										//the beginning of each elementin the array		
		{
			var strSplitResult = currentString.split(",")
			parsedDataDate[pDIndex] = strSplitResult[0];
			parsedDataVal[pDIndex] = strSplitResult[1];
			currentString = "";
			pDIndex++;
		}
		//not very DRY, but we must repeat to get the last one out! Not worth it's own function
		var strSplitResult = currentString.split(",")
			parsedDataDate[pDIndex] = strSplitResult[0];
			parsedDataVal[pDIndex] = strSplitResult[1];
		
	}
}