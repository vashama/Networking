<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function deriving_loss_route($str)
{
    $arr = split(' ', $str);
    $k = 0;
    foreach($arr as $st)
     {
       if(strpos($st, "*") !== false)
       {
          $k++; 
       }
     }
     
     return $k;
}

$query = mysql_query("SELECT * FROM durl") or die(mysql_error());
if($query)
while($row = mysql_fetch_array($query))
{
               
$ipaddr = $row["name"];

$cmd = 'traceroute ' . $ipaddr;
$output = shell_exec($cmd);
echo $output . "<br>";
$k = deriving_loss_route($output);
echo $k;

if($k >= '35')
{
    mail("networking.raspberrypi@gmail.com","alert","check your $result[0]. Its trace route is long");
        $qury = "INSERT INTO malert (tool,output,ipaddr) VALUES ('trace route','$output','$ipaddr')";
    	$dat = mysql_query ($qury)or die(mysql_error()); 

}
else{
$qury = "INSERT INTO trace (result,lostroute,ipaddr) VALUES ('$output','$k','$ipaddr')";
	$dat = mysql_query ($qury)or die(mysql_error()); 
}
}
    header('Location: ../monitoring.php');
?>