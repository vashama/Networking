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

    <style>
        .error {
            color: #FF0000;
        }
    </style>
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
                        <a href="sign_in.php"><h4><strong>Sign-In</strong></h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?php
/*define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// define variables and set to empty values
$FnameErr = $emailErr = $LnameErr = $pwdErr = "";
$firstname = $lastname = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $FnameErr = "First Name is required";
  } else {
    $name = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $FnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["lastname"])) {
    $LnameErr = "Last Name is required";
  } else {
    $name = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $LnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["password"])) {
    $pwdErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid
    if (!preg_match("/^[A-Za-z]*[0-9]*$/",$password)) {
      $pwdErr = "Invalid password";
    }    
  }
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function NewUser()
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password =  $_POST['password'];
	$query = "INSERT INTO users (firstname,lastname,email,password) VALUES ('$firstname','$lastname','$email','$password')";
	$data = mysql_query ($query)or die(mysql_error());
    echo "new user"; 
        if($data)
	{
        header("Location: sign_in.php");
        exit;
    }
}

function SignUp()
{
    echo "signup <br/>";
    
{
    echo "else <br/>";
if(!empty($_POST['email']))   //checking the 'email' which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'");
        if(!$row = mysql_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		header("Location: sign_in.php");
        exit;
	}
}
}
}

	SignUp();*/

?>


        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Sign-up Form</strong></h1>
                        </div>
                    </div>


                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Sign up now</h3>
                                    <p>Fill in the form below to get instant access:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST" class="registration-form">
                                    <p><span class="error">* required field.</span></p>
                                    <div class="form-group">
                                        <label class="sr-only" for="firstname">First name</label>
                                        <input type="text" name="firstname" placeholder="First name..." class="firstname form-control" id="firstname">
                                        <span class="error">* <?php echo $FnameErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="lastname">Last name</label>
                                        <input type="text" name="lastname" placeholder="Last name..." class="lastname form-control" id="lastname">
                                        <span class="error">* <?php echo $LnameErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="email form-control" id="email">
                                        <span class="error">* <?php echo $emailErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
                                        <span class="error">* <?php echo $pwdErr;?></span>
                                    </div>
                                    <button type="submit" class="btn">Sign me up!</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

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

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>