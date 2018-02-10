<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 

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

	SignUp();


// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
if($_POST) 
{
 
        header('Location: monitoring.php');
}
?>