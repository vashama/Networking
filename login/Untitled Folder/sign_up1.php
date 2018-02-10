<html>
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <body>
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


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
	echo "<b><center><h1>YOUR REGISTRATION IS COMPLETED...</h1></center></b>";
      //  echo '<center><br/><br/><a href="sign_in.html"><b><h2>SIGN IN</h2></center></b></a>';
	}
}

function SignUp()
{
    echo "signup <br/>";
    
if(empty($_POST['firstname']) or empty($_POST['lastname']) or empty($_POST['email']) or empty($_POST['password']))
{
    echo "<b><center><h1>ALL THE FIELDS ARE TO BE FILLED<h1></b></center>";
    //echo '<br/><br/><a href="sign_up.html"><b><center><h3>GO BACK</h3></b></a></center>';
}
/*elseif(!empty($_POST['email']))
{echo "elseif <br/>";
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
    {echo "elseif <br/> du if";
     echo "<b><center><h1>It is not a valid email address... Please enter a valid address...<h1></center></b>";
     //echo '<br/><br/><a href="sign_up.html"><b><center><h3>GO BACK</h3></center></b></a>';
    }
}*/
else
{echo "else <br/>";
if(!empty($_POST['email']))   //checking the 'email' which is from Sign-Up.html, is it empty or have some text
{
    echo "here";
	$query = mysql_query("SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'");
        if(!$row = mysql_fetch_array($query))
	{
		newuser();
	}
	else
	{
		echo "<b><center><h1>SORRY...YOU ARE ALREADY A REGISTERED USER...<h1></b></center>";
              //  echo '<br/><br/><a href="sign_up.html"><b><center><h2>GO BACK</h2></b></center></a>';
	}
}
}
}
//if(isset($_POST['submit']))
//{
	SignUp();
//}
?>

</body></html>