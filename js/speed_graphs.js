$(function() {
  $.ajax({
    url: "speed_graphs.php",
    type: "GET",
    success: function(data) {
      chartData = data;
      var chartProperties = {
        caption: "Speed Progress",
        xAxisName: "workouts",
        yAxisName: "Time",
        rotatevalues: "1",
        theme: "zune"
      };
      apiChart = new FusionCharts({
        type: "line",
        renderAt: "chart-container",
        width: "550",
        height: "350",
        dataFormat: "json",
	dataEmptyMessage: "NO SPEED DATA",
        dataSource: {
          chart: chartProperties,
          data: chartData
        }
      });
      apiChart.render();
    }
  });
});
