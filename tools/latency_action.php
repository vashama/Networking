<?php
function deriving_lost_time($st)
{
    $ar = explode(' ', $st);
    $a = count($ar);

    for($i = 1;$i < $a;$i++)
    {
        echo "$ar[i] <br/>";
        $v = strcmp($ar[$i-1], "ok,");
        $v1 = strcmp($ar[$i+1], "failed,");  
       if(($v == 0) && ($v1 == 0) )
                  $l = $ar[$i];
}
    return $l;
}

/*function deriving_lost_time($st)
{
    $ar= explode(' ', $st);
    $a = count($ar);
    for($i = 1;$i < $a;$i++)
    {
        echo "$ar[i] <br/>";
       if(strcmp($ar[$i-1], "ok,") == 0)
        if(strcmp($ar[$i+1], "failed,") == 0)
            if(strcmp($ar[$i+2], "time") == 0)
              $l = $ar[$i]; 
              echo "l=$l<br/>";
    }
    return $l;
}*/

function deriving_latency_time($str)
{
    $arr = explode(' ', $str);
    $k = count($arr);
    $l = array();
    foreach($arr as $st)
     {
       if(strpos($st, "time=") !== false)
       {
           array_push($l, $st);
       }
     }
     $tme = implode('',$l);
     $ktme1 = explode("time=", $tme);
     return $ktme1;
}


function deriving_round_trip_time($st)
{
    $ar= explode(' ', $st);
    $a = count($ar);
    for($i = 0;$i < $a;$i++)
       if(strpos($ar[$i], "round-trip") !== false)
        if(strpos($ar[$i+1], "min/avg/max") !== false)
            if(strpos($ar[$i+2], "=") !== false)
              $l = $ar[$i+3]; 

    $kte1 = explode('/',$l);
    return $kte1;
}

//if(isset($_POST['submit']))
  // if(!empty($_POST['latency'])) 
    //     foreach($_POST['latency'] as $selected) 
      //     $cmd = $cmd . " " . $selected;
           
$ipaddr = $_POST['ipaddr'];
$cmd = 'httping -c 10 ' . $ipaddr;
$output = shell_exec($cmd);
echo "$output";
$lost = 'Failed Percent: ' . deriving_lost_time($output);
$t = deriving_latency_time($output);
$t1 = deriving_round_trip_time($output);
?>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LATENCY</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load the Visualization API and the piechart package.
      google.charts.load("current", {packages:["corechart"]});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Create our bar graph data table.
      var data = google.visualization.arrayToDataTable([
        ["SEQUENCE", "TIME (in ms)", { role: "style" } ],
        ["seq=0", <?php echo $t[1];?>, "#003B5A"],
        ["seq=1", <?php echo $t[2];?>, "#006CA5"],
        ["seq=2", <?php echo $t[3];?>, "#9BDDFF"],
        ["seq=3", <?php echo $t[4];?>, "#50C3FF"],
        ["seq=4", <?php echo $t[5];?>, "#00F2FF"],
        ["seq=5", <?php echo $t[6];?>, "#3D94B8"],
        ["seq=6", <?php echo $t[7];?>, "#50C3FF"],
        ["seq=7", <?php echo $t[8];?>, "#006CA5"],
        ["seq=8", <?php echo $t[9];?>, "#00FFFF"],
        ["seq=9", <?php echo $t[10];?>, "#003B5A"]
        ]);
        
       // Create our pie chart data table.
       var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'round-trip');
        data1.addColumn('number', 'time in ms');
        data1.addRows([
          ['MINIMUM TIME TAKEN', <?php echo $t1[0];?>],
          ['AVGERAGE TIME TAKEN', <?php echo $t1[1];?>],
          ['MAXIMUM TIME TAKEN', <?php echo $t1[2];?>]
        ]);
      

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
       // Set bar graph options.
      var options = {
        title: "Latency of the Webserver",
        width: 1000,
        height: 600,
        bar: {groupWidth: "95%"},
        legend: { position: "center" },
      };
      
      // Set pie-chart options.
        var options1 = {'title':'Latency ROUND-TRIP',
                       'width':1000,
                       'height':600,
                       'position': 'center'};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
      var chart1 = new google.visualization.PieChart(document.getElementById("chart_div"));
      chart1.draw(data1, options1);  
  }
        </script>
    </head>

    <body>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><h4><strong>Networking Tools</strong></h4></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="latency.html"><h4><strong>Latency Tool</strong></h4></a>
                        </li>
                        <li>
                            <a href="../index.html"><h4><strong>Home</strong></h4></a>
                        </li>
                    </ul>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </nav>
        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text">
                            <h1><strong>LATENCY & THROUGHPUT TESTING</strong></h1>
                            <h5>
                            <?php echo $lost;?>
                         </h5>
                            <h5>
                         <div id="barchart_values" style="width: 1000px; height: 600px;"></div>
                         <div id="chart_div" style="width: 1000px; height: 600px"></div>
                        <h5>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>