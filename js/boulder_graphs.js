$(function() {
  $.ajax({
    url:"boulder_graphs.php",
    type: "GET",
    success: function(data) {
      chartData = data;
      var chartProperties = {
        caption: " Boulder Progress",
        xAxisName: "workouts",
        yAxisName: "grade",
        rotatevalues: "1",
        theme: "zune"
      };
      apiChart = new FusionCharts({
        type: "line",
        renderAt: "chart2",
        width: "550",
        height: "350",
        dataFormat: "json",
	dataEmptyMessage: "NO Boulder DATA",
        dataSource: {
          chart: chartProperties,
          data: chartData
        }
      });
      apiChart.render();
    }
  });
});
