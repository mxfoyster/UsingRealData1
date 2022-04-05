# UsingRealData1
Just exercises using real data, I will use Google Trends data downloaded as .csv for this purpose

The data is from [Google Trends](https://trends.google.com/trends/explore?geo=GB&q=paddlesports). 

## First Chart

I have loaded the CSV, stripped and kept the title text for the chart. Next, I separated the values via `,` and `\n` into two arrays I can use for the chart.

Once I had the first chart up and running, the dates looked untidy, so I generated another array with week numbers without overwriting the dates (I may want them later).

The bar chart is up and working, so it's a start!

## More Charts added

I now have a line chart to show the data a bit clearer. This is an improvement but the week by week variations made it difficult to visualise the data. With that in mind, belwo this I have a bar chart by month. **NOTE** Improvement needed here as different months have a different number of weeks. Therefore, I will have to go back and average the data according to the number of weeks to get a more accurate picture.

There have been some improvements to the menu and other areas!

## Problem with Github Push

There is a potential problem. When pushing the data file, it decided to replace our `lf`'s with `crlf`'s. Therefore, if anyone clones this and uses the datafile as is, I am doubtful it will parse correctly! You can always download your own?  
