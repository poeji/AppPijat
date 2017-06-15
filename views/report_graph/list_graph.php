<script src="../js/chart/app.js" type="text/javascript"></script>
<div class="box">
    <div class="box-header" style="cursor: move;">
        <h3 class="box-title"><strong>Report Graph Chart</strong></h3>
    </div>
   <?php
   
//   var_dump($query_chart2);
   while($row = mysql_fetch_assoc($query_chart2))
{
$jumlahs = $row;
//foreach ($jumlahs as $row) {
//	$jumlahs[] = $row;

echo "<pre>";
print json_encode($jumlahs);
echo "</pre>";
//}

}
   ?>
    <h2 class="box-title"><center>Report Penjualan</center></h2>
    <canvas id="myChart" width="auto" height="auto" style="width: auto; height: auto;"></canvas>    
    <script>
               window.onload = function() { 
                init();
            };

            function init() {
                var ctx = $("#myChart").get(0).getContext("2d");

                var data = {
                    labels: [""],
                    datasets: [
                        {
                            fillColor: "rgba(220,220,220,0.5)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            data: [65, 59, 90, 81, 56, 55, 40]
                        },
                        {
                            fillColor: "rgba(151,187,205,0.5)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            data: [28, 48, 40, 19, 96, 27, 100]
                        }
                    ]
                }

                var myNewChart = new Chart(ctx).Line(data);
            }
        </script>
        <h2 class="box-title"><center>Report Sales</center></h2>
        <canvas id="myChart2" width="auto" height="auto" style="width: auto; height: auto;"></canvas>
        <script>
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
              backgroundColor: [
                "#2ecc71",
                "#3498db",
                "#95a5a6",
                "#9b59b6",
                "#f1c40f",
                "#e74c3c",
                "#34495e"
              ],
              data: [12, 19, 3, 17, 28, 24, 7]
            }]
          }
        });
        </script>
</div>
