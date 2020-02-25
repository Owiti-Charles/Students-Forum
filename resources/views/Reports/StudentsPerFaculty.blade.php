@extends('admin.master')
<head>
  <title>Faculty Population</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:500px;
    margin:0 auto;
   }
  </style>
  <script type="text/javascript">
   var analytics = <?php echo $faculty; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Number of students per faculty'
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 @section('content')
 <div class="card">
            
     <div class="card-body card-padding">
       <table class="display" id="example" style="width:100%" cellspacing="0" >
         <tbody>
             <div class="container">
   
                <div class="panel panel-default">
                  <div class="panel-heading">
                   <h3 class="panel-title">Number of students in each faculty</h3>
                  </div>
                     <div class="panel-body" align="center">
                    <div id="column_chart" style="width:650px; height:550px;">
                  </div>
                </div>
              </div>
            </div>
          </tbody>
        </table>
      </div>
    </div>
    @endsection