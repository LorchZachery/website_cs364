$(function() {
  $.ajax({
    url: "sport_graphs.php",
    type: "GET",
    success: function(data) {
      chartData = data;
      var chartProperties = {
        caption: "Highest Sport Grade Climbed Per Workout",
        xAxisName: "workouts",
        yAxisName: "Grade",
        rotatevalues: "1",
        theme: "zune"
      };
      apiChart = new FusionCharts({
        type: "line",
        renderAt: "chart3",
        width: "550",
        height: "350",
        dataFormat: "json",
	dataEmptyMessage: "NO SPORT DATA",
        dataSource: {
          chart: chartProperties,
          data: chartData
        }
      });
      apiChart.render();
    }
  });
});


