  <?php require('./config.php'); ?>
  <html>

  <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {
          'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              <?php
              $query= $conn->query("SELECT COUNT(id),year from `archive_list` GROUP BY  `year `") ;
              $res=mysqli_query($conn,$query);
              while($row = $query->fetch_assoc()){
                $archive=$row['COUNT(id)'];
                $annee=$row['year'];
            ?>['$archive', '$annee'],
              <?php
              }
                ?>
          ]);

          var options = {
              title: 'Les archives par année',
              curveType: 'function',
              legend: {
                  position: 'bottom'
              }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
      }
      </script>
  </head>

  <body>
      <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>

  </html>