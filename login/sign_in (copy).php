<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
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
                <a class="navbar-brand page-scroll" href="#page-top"><h4><strong>Network Monitoring</strong></h4></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.html"><h4><strong>Home</strong></h4></a>
                    </li>
                    <li>
                        <a href="sign_up.php"><h4><strong>Sign-Up</strong></h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   
    <?php

// define variables and set to empty values
//$submitErr = "";
//$email = $password = "";
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
    
  if (empty($_POST["password"])) 
  {
    $pwdErr = "Password is required";
  }     
 }

function SignIn()
{
session_start(); 
*/
if($_SERVER['REQUEST_METHOD'] == 'POST')
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

if(!empty($_POST['email']))   //checking the 'email' which is from sign_in.html
{
	$query = mysql_query("SELECT *  FROM users where email = '$_POST[email]' AND password = '$_POST[password]'") or die(mysql_error());
	$row = mysql_fetch_array($query); 
	if(!empty($row['email']) AND !empty($row['password']))
	{
		$_SESSION['email'] = $row['password'];
		header('Location: ../admin/monitoring.php');
        exit; 
	}
	else
	{
	        $submitErr = "SORRY... YOU HAVE ENTERED WRONG EMAIL ADDRESS AND PASSWORD... PLEASE TRY AGAIN..";
	}
}
//}

//if(isset($_POST['submit']))
//{
	//SignIn();    
//}
?>
        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Login Form</strong></h1>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login</h3>
                                    <p>Enter your email and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="sign_in.php" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                            </div>
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