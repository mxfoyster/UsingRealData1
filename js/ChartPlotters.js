const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; 

function DrawBarChartMonthly(chartCanvasID, chartTitle, xArray, yArray)
{
//****************************first we must convert the data******************************************
	var theseMonths = [];
	const theseMonthsDat = [];
	let thisMonth = xArray[0].slice(5,7); //get first month from data
	let monthIndex=0;
	let thisNumber=0;
	
	for (i=0; i < xArray.length; i++)
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
	let barColours = BuildColorArray(theseMonths.length);	
//****************************now we can plot using our new arrays*************************************
	ChartPlotter(chartCanvasID, theseMonths, theseMonthsDat, barColours, "bar", chartTitle);
	
}


//PLEASE NOTE: I know this is not DRY.... I would normally ditch ALL the above in favour of this 
//average version. However, I wish to highlight the differences between these two hence I will 
//leave the above function in as is!
function DrawBarChartMonthlyAverage(chartCanvasID, chartTitle, xArray, yArray)
{
//****************************first we must convert the data******************************************
	var theseMonths = [];
	const theseMonthsDat = [];
	let thisMonth = xArray[0].slice(5,7); //get first month from data
	let monthIndex=1;
	let weeksPerMonth=0;
	let thisNumber=0;
	
	for (i=0; i < xArray.length; i++)
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
	let barColours = BuildColorArray(theseMonths.length);	

//****************************now we can plot using our new arrays*************************************
	ChartPlotter(chartCanvasID, theseMonths, theseMonthsDat, barColours, "bar", chartTitle);	
}


function BuildColorArray(arrayLength)
{
	let colours = ["red","orange","yellow","green","blue"];
	let colourArray = [];
	for (i=0; i < arrayLength; i++)
		colourArray.push(colours[(i % colours.length)]);
	return colourArray; 
}


//the Chart.js code extracted to separate function for DRY purposes
function ChartPlotter(chartCanvasID, xArray, yArray, colours, type, chartTitle)
{
		new Chart(chartCanvasID, {
		type: type,
		data: {
		labels: xArray,
		datasets:[{ backgroundColor: colours, data: yArray}]
		},
		options: {
		legend: {display: false},
		title: { display: true, text: chartTitle}
		}
	}); 
}