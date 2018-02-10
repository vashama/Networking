<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$query = mysql_query("SELECT name FROM durl") or die(mysql_error());
if($query)
while($row = mysql_fetch_array($query))
{               
$ipaddr = $row["name"];

$cmd = 'nslookup ' . $ipaddr;
$output = shell_exec($cmd);
preg_match_all('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $output, $ip_matches);

$k = count($ip_matches[0]);

if(($k-2)==0)
{
    $output = " IP address lookup unsuccssful.";
    $ipaddr = $row["name"];
 mail("networking.raspberrypi@gmail.com","alert","check your $ipaddr. IP address lookup unsuccssful.");
        $query = "INSERT INTO malert (tool,output,ipaddr) VALUES ('dns','$output','$ipaddr')";
    	$data = mysql_query ($query)or die(mysql_error()); 
        $qury = "INSERT INTO mdns (output,ipaddr) VALUES ('$output','$ipaddr')";
    	$dat = mysql_query ($qury)or die(mysql_error());

}
else if((($k-2)<3) && (($k-2)!=0))
{
    $output = "Not enough nameserver information was found to test the zone, but an IP address lookup succeeded in spite of that.";
    $ipaddr = $row["name"];
    mail("networking.raspberrypi@gmail.com","alert","check your $ipaddr. IP address lookup unsuccssful.");
        $qury = "INSERT INTO mdns (output,ipaddr) VALUES ('$output','$ipaddr')";
    	$dat = mysql_query ($qury)or die(mysql_error());

}
else
{
    $output = "Enough nameserver information was found to test the zone, and IP address lookup has succeeded.";    
        $ipaddr = $row["name"];
        echo $output;
         $qury = "INSERT INTO mdns (output,ipaddr) VALUES ('$output','$ipaddr')";
    	$dat = mysql_query ($qury)or die(mysql_error());

}
}

header('Location: ../monitoring.php');
?>