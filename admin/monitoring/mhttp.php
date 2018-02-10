<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function pingDomain($domain)
{
    $starttime = microtime(true);
    $file = file_get_contents("http://$domain/");
    $stoptime = microtime(true);
    $status = 0;

    if (!$file){
        $status = -1;  // Site is down
    }
    else{
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}

function sizeDomain($domain)
{
    $mem1 = memory_get_usage();
    $kfile = file_get_contents("http://$domain/");
    $filesize = memory_get_usage() - $mem1;
    return $filesize;
}


$query = mysql_query("SELECT * FROM durl") or die(mysql_error());
if($query)
while($row = mysql_fetch_array($query))
{
               
$ipaddr = $row["name"];

 $output = pingDomain($ipaddr);
  $size = sizeDomain($ipaddr);

if($size >= '500000')
{
    mail("networking.raspberrypi@gmail.com","alert","check your $result[0]. Its is too large");
        $qury = "INSERT INTO malert (tool,output,ipaddr) VALUES ('http','$output','$ipaddr')";
    	$data = mysql_query ($qury)or die(mysql_error()); 

}
else {
$qury = "INSERT INTO mhttp (output,size,ipaddr) VALUES ('$output','$size','$ipaddr')";
	$dat = mysql_query ($qury)or die(mysql_error()); 
}
}
header('Location: ../monitoring.php');
?>
