//NOTE To prevent overlapping charts, we create the canvas at the last minute and then 
//delete it when we zoom out. Otherwise, on mouseOver events, we get any previously
//loaded charts in our zoom box trying to peak through which results in a mess.

//handles in case I want to do more with them later
const HandleChartA = document.getElementById("ChartA");
const HandleChartB =document.getElementById("ChartB");
const HandleChartC =document.getElementById("ChartC");
const HandleChartD =document.getElementById("ChartD");
const HandleChartE =document.getElementById("ChartE");
const HandleChartF =document.getElementById("ChartF");
const HandleChartG =document.getElementById("ChartG");
const zoomBoxHandle = document.getElementById("zoomBox");

//listener to close box
document.getElementById("zoomBox").ondblclick= function(){CloseZoomWindow();};

//set listeners for open zoom box
HandleChartA.ondblclick= function(){OpenZoomWindow(1);};
HandleChartB.ondblclick= function(){OpenZoomWindow(2);};
if (HandleChartC) HandleChartC.ondblclick= function(){OpenZoomWindow(3);};
if (HandleChartD) HandleChartD.ondblclick= function(){OpenZoomWindow(4);};
if (HandleChartE) HandleChartE.ondblclick= function(){OpenZoomWindow(5);};
if (HandleChartF) HandleChartF.ondblclick= function(){OpenZoomWindow(6);};
if (HandleChartG) HandleChartG.ondblclick= function(){OpenZoomWindow(7);};

//window.event.cancelBubble = "true";

function OpenZoomWindow(chartToZoom)
{
	zoomBoxHandle.innerHTML="<b id=\"zoomOutMsg\">Double Click to exit fullscreen</b><canvas id=\"ZoomCanvas\"></canvas>"; //create the canvas
	zoomBoxHandle.style.visibility = "visible";
	console.log ("In");
	switch (chartToZoom)
	{
		case 1:
			ZoomA();
		break;
		case 2:
			ZoomB();
		break;
		case 3:
			ZoomC();
		break;
		case 4:
			ZoomD();
		break;
		case 5:
			ZoomE();
		break;
		case 6:
			ZoomF();
		break;
		case 7:
			ZoomG();
		break;
	}
	
}

function CloseZoomWindow()
{
	zoomBoxHandle.style.visibility = "hidden";
	zoomBoxHandle.innerHTML=""; //Clear the canvas 
}

