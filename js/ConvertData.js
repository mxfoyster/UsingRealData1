//Globals.. Our data from the file and anything we need to access
//throughout ALL the scripts (eg the promise) are declared here!!
var chartTitle;
var dataStream;
var parsedDataDate = [0];
var parsedDataVal = [0];
var myPromise;


//This is the main function. Not only does it open the file, it calls the
//necessary functions to process the data from csv into appropriate fields
function LoadDoc(fileName) 
{
	//This is important!! it's how we stop the rest of the code from
	//crashing by maing it wait till the data is all processed
	myPromise = new Promise(function(myResolve, myReject) 
	{
		fetch(fileName) //fetch API is easier, cleaner and more reliable than XMLHttpRequest
			.then(response => response.text()) 
			.then(textString => 
			{
			dataStream = textString;	
			SplitTitle();
			ParseStreamData();
			myResolve("Success"); //Promise resolved.. 
			});
	});
}

//Removes and returns the title from the dataStream string
function SplitTitle()
{
	let d_S_Length = dataStream.length;
	for(i=0; i<d_S_Length; i++)
	{
		if (dataStream.charAt(i)== '2') 
		{
			chartTitle = dataStream.substring(0,i-1);
			dataStream = dataStream.substring(i,dataStream.length -1);
			i = dataStream.length;
		}
	}
	return chartTitle;
}

//separate dataStream by comma's and cr's into two arrays (Title must be stripped first)
function ParseStreamData()
{
	var pDCol=0; //array column
	var pDIndex=0;//array index
	var currentString = "";
	
	//now break it down one character at a time into the arrays
	let d_S_Length = dataStream.length;
	for(i=0; i<d_S_Length; i++)
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