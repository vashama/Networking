<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$to  = 'networking.raspberrypi@gmail.com';

// subject
$subject = 'Custom Report of Full Page Testing';

// message
$query = mysql_query("SELECT timestamp,output,size,ipaddr FROM mhttp ORDER BY timestamp DESC;") or die(mysql_error());
if ($query) 
{
$message = '
<html>
<head>
  <title>Report: </title>
</head>
<body>
 <p>FULL PAGE TESTING Report is:</p>
  <table border="1">
    <tr>
      <th>TIME STAMP</th><th>IP ADDRESS</th><th>RESPONSE TIME</th><th>LOADING SIZE</th>
    </tr>';
    
while($row = mysql_fetch_array($query)) 
$message .= '<tr><td>' . $row["timestamp"] . '</td><td>' . $row["ipaddr"] . '</td><td>' . $row["output"] . '</td><td>' . $row["size"] . '</td></tr>';
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