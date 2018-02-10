<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$to  = 'networking.raspberrypi@gmail.com';

// subject
$subject = 'Custom Report of Trace Route';

// message
$query = mysql_query("SELECT timestamp,lostpc,avgtme,ipaddr FROM trace ORDER BY timestamp DESC;") or die(mysql_error());
if ($query) 
{
$message = '
<html>
<head>
  <title>Report: </title>
</head>
<body>
 <p>Trace Route Report is:</p>
  <table border="1">
    <tr>
      <th>TIME STAMP</th><th>IP ADDRESS</th><th>LOST ROUTE</th>
    </tr>';
    
while($row = mysql_fetch_array($query)) 
$message .= '<tr><td>' . $row["timestamp"] . '</td><td>' . $row["ipaddr"] . '</td><td>' . $row["lostroute"] . '</td></tr>';
$message .= "</table></body></html>";   
}
else
$message = 'HISTORY NIL';   
   
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: <networking.raspberrypi@gmail.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
header('Location: ../monitoring.php');
?>