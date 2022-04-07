# UsingRealData1
Just exercises using real data, I will use Google Trends data downloaded as .csv for this purpose

The data is from [Google Trends](https://trends.google.com/trends/explore?geo=GB&q=paddlesports). 

***NOTE*** THIS IS AN EDUCATIONAL EXERCISE. Some functions are repeated almost identically. This is for demonstration purposes so I can show the impact of a subtle improvement on the data. 

I am currently using this in this readme in a similar fashion to a changelog. It's a very direct way to see my progress and provides more information that the *'commit messages'*. I may move this to a separate changelog later.

## First Chart

I have loaded the CSV, stripped and kept the title text for the chart. Next, I separated the values via `,` and `\n` into two arrays I can use for the chart.

Once I had the first chart up and running, the dates looked untidy, so I generated another array with week numbers without overwriting the dates (I may want them later).

The bar chart is up and working, so it's a start!

## More Charts added

I now have a line chart to show the data a bit clearer. This is an improvement but the week by week variations made it difficult to visualise the data. With that in mind, belwo this I have a bar chart by month. **NOTE** Improvement needed here as different months have a different number of weeks. Therefore, I will have to go back and average the data according to the number of weeks to get a more accurate picture.

There have been some improvements to the menu and other areas!

## Average Bar Chart

So, with consideration for the above, I now have an average per moth bar chart and you can clearly see 
the difference. This proves how inaccurate the data is if you do not average it. This is pretty basic 
stuff but I wanted to show how if you don't think things through, the data can misrepresent the data

## Paddlesports Page

I have made a page dedicated to paddlesports data which uses a slightly refactored version of the code that allows me to load more than one file and display a chart for each. 

Here I compare data for the paddlesports search phrase with the more direct phrases of *Canoeing*, *Kayaking* and *Paddleboarding*. I need to improve the way I handle asynchronous issues, I currently cheat with a delay. This might be an excellent opportunity to get to grips with `promises` and `Async Await` so watch this space.

## Asynchronous Mods

Substantial refactoring has enabled me to use a `Promise` to ensure the data is loaded BEFORE we plot the chart. Furthermore, when we move on to load another file, because we go through the same process, we know the last chart is ready which prevents them trying to load at the same time. Before this modification, without delays, several charts would try and load on the same canvas because the Chart.js could not yet see that we had switched to another one. Such is the nature of Asynchronous Javascript!

The file loading is now done with the `Fetch()` API as opposed to `XmlHttpRequest`. Because it uses `Promises`, this made moving over to them within my `LoadDoc()` function MUCH easier. I'll be doin things this way in the future!

Overall, the code is tidier now thanks to these changes.

## More Data

It is VERY easy now to generate our bar chart. I made another page comparing different watersports by month with their search hit ratio. It only took a few minutes. I've pretty much proved the point now. I will have to consider what direction if any to take this to next. Meanwhile, I have uploaded this version to some space I have so we can see a live version! It's here [http://mark-foyster.epizy.com/watersports/index.html](http://mark-foyster.epizy.com/watersports/index.html). It's nothing special, but I had funa nd learnt something in the process.

## Colour Offset

When we have several bar charts on the same page, it looks a little boring with the same colour scheme. To fix this I added an optional parameter that feeds all the way to my `BuildColorArray()` function to put a start value at the end of my `DrawBarChartMonthlyAverage()` function within *ChartPlotters.js*. This allows me to offset the colours differently if I choose to on each insance of that chart type.

## What's Next?

I really don't know. Open to ideas....


## Problem with Github Push

There is a potential problem. When pushing the data file, it decided to replace our `lf`'s with `crlf`'s. Therefore, if anyone clones this and uses the datafile as is, I am doubtful it will parse correctly! You can always download your own?  
