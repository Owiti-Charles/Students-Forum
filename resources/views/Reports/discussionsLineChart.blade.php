@extends('admin.master')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var visitor = <?php echo $discussions; ?>;
      console.log(visitor);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(visitor);
        var options = {
          title: 'Number of discussions created per day.',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  
  </body>
 @section('content')
 <div class="card">
            
     <div class="card-body card-padding">
       <table class="display" id="example" style="width:100%" cellspacing="0" >
         <tbody>
             <div class="container">
                <h3 align="center">All Discussions </h3><br />
                <div class="panel panel-default">
                  <div class="panel-heading">
                   <h3 class="panel-title">Discussions line graph</h3>
                  </div>
                     <div class="panel-body" align="center">  
                      <div id="linechart" style="width: 900px; height: 500px"></div>
                  </div>
                </div>
              </div>
            </div>
          </tbody>
        </table>
      </div>
    </div>
    @endsection

</html>