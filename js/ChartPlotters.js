function DrawBarChart(chartTitle, xArray, yArray)
{
	new Chart("ChartA", {
	type: "bar",
	data: {
    labels: xArray,
    datasets:[{ backgroundColor: "blue", data: yArray}]
	},
	options: {
				legend: {display: false},
				title: { display: true, text: chartTitle}
			 }
	});
}