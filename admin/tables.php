<?php
/*
if($_SERVER['REQUEST_METHOD'] == 'POST')*/
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
/*
if(!empty($_POST['email']))   //checking the 'email' which is from sign_in.html
{
	$query = mysql_query("SELECT firstname FROM users where email = '$_POST[email]'") or die(mysql_error());
	$row = mysql_fetch($query); 
}*/
?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring</title>

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
		<div class="md-modal md-effect-4" id="modal-4">
			<div class="md-content">
				<h3></h3>
				<div>
					<p>Contact Support</p>
                      <form role="form" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST" class="registration-form">
					<ul>
                        <li>
                        <div class="form-group">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="email form-control" id="email">
                                        <span class="error">* <?php echo $emailErr;?></span>
                        </div>
                        </li>
                        <div class="form-group">
                                        <label class="sr-only" for="email">Comments</label>
                                        <input type="text" name="comment" placeholder="Comment..." class="comment form-control" id="comment">
                                        <span class="error">* <?php echo $cmntErr;?></span>
                        </div>
                        </li>
					</ul>
					<!--<button type="submit" class="btn">Send!</button>-->
					<button class="md-close">Send!</button>
                      </form>
				</div>
			</div>
		</div>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-wrench"></i> Tools <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../tools/ping.html">Ping</a>
                        </li>
                        <li>
                            <a href="../tools/latency.html">Latency</a>
                        </li>
                        <li>
                            <a href="../tools/trace.html">Trace route</a>
                        </li>
                        <li>
                            <a href="../tools/http.html">Http</a>
                        </li>
                        <li>
                            <a href="../tools/dns.html">DNS</a>
                        </li>
                       <!-- <li>
                            <a href="../tools/snmp.html">SNMP</a>
                        </li>-->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o"></i> Reports <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-pencil-square"></i> Custom Report</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus"></i> Monitors <b class="caret"></b></a>
                      <ul class="dropdown-menu multi-level" role="menu">
                        <li class="dropdown-submenu">
                              <a tabindex="-1" href="#"><i class="fa fa-bar-chart"></i> Uptime Monitor</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                           <a href="mping.php">Ping</a>
                                        </li>
                                        <li>
                                            <a href="mlatency.php">Latency</a>
                                        </li>
                                        <li>
                                            <a href="mtrace.php">Trace route</a>
                                        </li>
                                        <li>
                                             <a href="mhttp.php">Http</a>
                                        </li>
                                        <li>
                                             <a href="mdns.php">DNS</a> 
                                        </li>
                                        <!--<li>
                                             <a href="#">SNMP</a>
                                        </li>   -->
                                    </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <a href="#"><i class="fa fa-navicon"></i> Existing Monitors</a>
                        </li>

                        </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#"><i class="fa fa-exclamation-triangle"></i> Last Alert</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-history"></i> Alert History</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Contact Details</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question"></i> Help <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="doc.html"><i class="fa fa-bar-chart"></i> Documentation</a>
                        </li>
                        <li>
                            <a class="md-trigger" data-modal="modal-4"><i class="fa fa-group"></i> Contact Support</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
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
                    <li class="active">
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="alert_history.php"><i class="fa fa-history"></i> Alert History</a>
                    </li>                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

  <!--      <div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                            </div>
                            <div class="panel-body">
                                
                        </div>
                    </div>
                </div>
                <!-- /.row -->
<div class="md-overlay"></div><!-- the overlay element -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
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
