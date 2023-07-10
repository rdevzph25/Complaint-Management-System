FusionCharts.ready(function() {
  var visitChart1 = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container1',
    width: '328',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "theme": "fusion",
        "caption": "Complaints Report",
        "subCaption": "Year 2022",
        "xAxisName": "Complaints",
        "yAxisName": "Complaint Numbers",
        "decimals":"0",
        "showValues": "1",
      },

      "data": [{
          "label": "Not Processed",
          "value": "100"
        },
        {
          "label": "In Process",
          "value": "25"
        },
        {
          "label": "Closed",
          "value": "200"
        }
      ]
    }
  }).render();



  var visitChart2 = new FusionCharts({
    type: 'line',
    renderAt: 'chart-container2',
    creditLabel: false, //<------ this is the supposed magic word
    width: '328',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "theme": "fusion",
        "chartRightMargin": "40",
        "caption": "Visitors to website",
        "subCaption": "Last week",
        "xAxisName": "Day",
        "yAxisName": "Visits",
        "showValues": "0"
      },
      "data": [{
          "label": "Mon",
          "value": "5123"
        },
        {
          "label": "Tue",
          "value": "4233"
        },
        {
          "label": "Wed",
          "value": "5507"
        },
        {
          "label": "Thu",
          "value": "4110"
        },
        {
          "label": "Fri",
          "value": "5529"
        },
        {
          //Adding vline data
          "vline": "true",
          //Defining vline position to match with Saturday
          "linePosition": "1",
          //Setting vline label text
          "label": "Weekend",
          "labelPosition": "0.95",
          "color": "#6da81e",
          "thickness": "1",
          "alpha": "50",
          //vline label vertically aligned to middle
          "labelVAlign": "middle",
          //vline label horizontally aligned to left
          "labelHAlign": "left"
        },
        {
          "label": "Sat",
          "value": "5803"
        },
        {
          "label": "Sun",
          "value": "6202"
        }
      ]
    }
  }).render();

});
