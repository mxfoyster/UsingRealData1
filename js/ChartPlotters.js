const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; 

//we need these in global scope to separate out our date conversion function
var parsedDataDateMonthly = [0];
var parsedDataValMonthly = [0];

// NOTE... This version is only left in here for legacy reasons. in fact it's only used ONCE
function DrawBarChartMonthly(chartCanvasID, chartTitle, xArray, yArray,colourOffset = 0)
{
//****************************first we must convert the data******************************************
	var theseMonths = [];
	const theseMonthsDat = [];
	let thisMonth = xArray[0].slice(5,7); //get first month from data
	let monthIndex=0;
	let thisNumber=0;
	
	let xArr_Length = xArray.length;
	for (i=0; i < xArr_Length; i++)
	{
		if (xArray[i].slice(5,7) == thisMonth) //if still on same month
			thisNumber += Number(yArray[i]); //add data at this index to the month
		else
		{
			theseMonths.push(months[thisMonth-1]); //store the month
			theseMonthsDat.push(thisNumber); //and the data
			thisNumber = Number(yArray[i]);  //and store this index data for next iteration
			monthIndex++; //change month index 	
			if (thisMonth < 12) // if not end of year
				thisMonth++; 
			else 
				thisMonth = 1;		
		}
		// NOTE after trying things many different ways, I have learnt array.push is much cleaner 
		// and more reliable...
	}
	theseMonths.push(months[thisMonth-1]); //store the last month when we've finished
	theseMonthsDat.push(thisNumber); //and the data
	let barColours = BuildColorArray(theseMonths.length, colourOffset);	
//****************************now we can plot using our new arrays*************************************
	ChartPlotter(chartCanvasID, theseMonths, theseMonthsDat, barColours, "bar", chartTitle);
	
}


//THIS IS THE NEW VERSION THAT AVERAGES
function DrawBarChartMonthlyAverage(chartCanvasID, chartTitle, xArray, yArray, colourOffset = 0)
{
	ConvertDataToMonthly(parsedDataDate,parsedDataVal);		
	let barColours = BuildColorArray(parsedDataDate.length, colourOffset);
	ChartPlotter(chartCanvasID, parsedDataDateMonthly, parsedDataValMonthly, barColours, "bar", chartTitle);
}

//takes arguments of our arrays from file and converts them from weeks to months
function ConvertDataToMonthly(xArray,yArray)
{
	var theseMonths = [];
	const theseMonthsDat = [];
	let thisMonth = xArray[0].slice(5,7); //get first month from data
	let monthIndex=1;
	let weeksPerMonth=0;
	let thisNumber=0;
	
	let xArr_Length = xArray.length;
	for (i=0; i < xArr_Length; i++)
	{	
		if (xArray[i].slice(5,7) == thisMonth) //if still on same month
		{
			thisNumber += Number(yArray[i]); //add data at this index to the month
			weeksPerMonth++;
		}
		else
		{
			theseMonths.push(months[thisMonth-1]); //store the month 
			theseMonthsDat.push(thisNumber/weeksPerMonth); //and the data AVERAGE
			weeksPerMonth = 1; //reset month counter
			thisNumber = Number(yArray[i]);  //and store this index data for next iteration
			monthIndex++; //change month index 	
			if (thisMonth < 12) // if not end of year
				thisMonth++; 
			else 
				thisMonth = 1;		
		}	
	}

	theseMonths.push(months[thisMonth-1]); //store the last month when we've finished
	theseMonthsDat.push(thisNumber/weeksPerMonth); //and the data average
	
	if (theseMonths.length == 13) theseMonths[12] += " yr2";
	
	parsedDataDateMonthly = [...theseMonths];
	parsedDataValMonthly = [...theseMonthsDat];
	
}

function BuildColorArray(arrayLength, colourOffset)
{
	let colours = ["red","orange","yellow","green","blue"];
	let colourArray = [];
	for (i=0; i < arrayLength; i++)
		colourArray.push(colours[((i + colourOffset) % colours.length)]);
	return colourArray; 
}


//the Chart.js code extracted to separate function for DRY purposes
function ChartPlotter(chartCanvasID, xArray, yArray, colours, type, chartTitle, displayLegend = false)
{
		new Chart(chartCanvasID, {
		type: type,
		data: {
		labels: xArray,
		datasets:[{ backgroundColor: colours, data: yArray}]
		},
		options: {
		legend: {display: displayLegend},
		title: { display: true, text: chartTitle}
		}
	}); 
}