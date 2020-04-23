$(function() {
  $.ajax({
    url: "duration_graphs.php",
    type: "GET",
    success: function(data) {
      chartData = data;
      var chartProperties = {
        caption: "Duraiton of Workouts over Time",
        xAxisName: "workouts",
        yAxisName: "Time",
        rotatevalues: "1",
        theme: "zune"
      };
      apiChart = new FusionCharts({
        type: "line",
        renderAt: "chart4",
        width: "550",
        height: "350",
        dataFormat: "json",
	dataEmptyMessage: "NO WORKOUT DATA",
        dataSource: {
          chart: chartProperties,
          data: chartData
        }
      });
      apiChart.render();
    }
  });
});


