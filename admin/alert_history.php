<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alert History</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="import" href="contact_support.html">
    <link rel="import" href="custom_report.html">
	<script src="js/modernizr.custom.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">HOME</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>varuni<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="monitoring.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                     </li>
                     <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                     </li>
                     <li  class="active">
                        <a href="alert_history.php"><i class="fa fa-history"></i> Alert History</a>
                     </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                        </h1>
                            </div>
                        </div>

            <div class="content">
                <h3>ALERT HISTORY</h3>
                <div>
                 <ul>
                  <p>
                   <?php
                    $query = mysql_query("SELECT timestamp,tool,output,ipaddr FROM malert ORDER BY timestamp DESC;") or die(mysql_error());
                    if ($query) 
                        {
                          echo "<table border='1'><tr><th>TIME STAMP</th><th>TOOL</th><th>IP ADDRESS</th><th>ALERT MESSAGE</th></tr>";
                            // output data of each row
                          while($row = mysql_fetch_array($query)) 
                              echo "<tr><td>".$row["timestamp"]."</td><td>".$row["tool"]."</td><td>".$row["ipaddr"]."</td><td>".$row["output"]."</td></tr>";
                          echo "</table>";
                        }
                    else 
                       echo "HISTORY NIL";
                    ?>
                 </p>
               </ul>
                </div>
            </div>
            
            </div>
            <!-- /.container-fluid -->

    <!-- /#wrapper -->
		
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>


		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script src="js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
	</body>

</body>

</html>
