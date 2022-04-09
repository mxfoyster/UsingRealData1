const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
const dataTable = document.getElementById("csvDataTable");

function GetFileToDisplay()
{
	let fName = document.forms["fileForm"]["fileSelect"].value;

	dataTable.innerHTML="";//clear table in case this isn't the first time around
	LoadDoc("data/" + fName);
	dataTable.innerHTML+="<tr><th class=\"headRow\">DATE</th><th class=\"headRow\">HIT RATIO</th></tr>";
	myPromise.then(function(value) 
	{
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
	var builtDate = dateDay + dayFollower + months[dateMonth-1] + " " + dateYear;
	console.log (builtDate);
	return builtDate;	
}

function ClearTable()
{
	dataTable.innerHTML="";
}
