$(function() {
    $.ajax({

        url: '../admin/chart_data.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Top 5 Barangay",
		        "subCaption": "Year 2022",
                "xAxisName": "Barangay",
                "yAxisName": "Total Complaints",
                "showValues": "1",
                "theme": "fusion",
                "baseFontSize": "11"
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '100%',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});