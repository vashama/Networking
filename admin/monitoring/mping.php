<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','root');
define('DB_PASSWORD','44441305');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$query = mysql_query("SELECT name FROM durl") or die(mysql_error());

function deriving_lost_time($st)
{
    $ar = split(' ', $st);
    $a = count($ar);
    for($i = 0;$i < $a;$i++)
       if(strpos($ar[$i-1], "received,") !== false)
        if(strpos($ar[$i+1], "packet") !== false)
            if(strpos($ar[$i+2], "loss,") !== false)
              $l = $ar[$i]; 
    return $l;
}

function deriving_round_trip_time($st)
{
    $ar= split(' ', $st);
    $a = count($ar);
    for($i = 0;$i < $a;$i++)
       if(strpos($ar[$i], "rtt") !== false)
        if(strpos($ar[$i+1], "min/avg/max/mdev") !== false)
            if(strpos($ar[$i+2], "=") !== false)
              $l = $ar[$i+3]; 

    $kte1 = split('/',$l);
    return $kte1;
}

//if($query)
while($row = mysql_fetch_array($query))
{          
$ipaddr = $row["name"];

$cmd = 'ping -c 5 ' . $ipaddr;
$output = shell_exec($cmd);

//echo $output . "<br><br>";
$lost = deriving_lost_time($output);
$t1 = deriving_round_trip_time($output);

//echo $lost;
if($lost != "0%")
{
    mail("networking.raspberrypi@gmail.com","alert","check your $ipaddr. Its is not responding to ping");
    $qury = "INSERT INTO malert (tool,output,ipaddr) VALUES ('ping','$output','$ipaddr')";
	$dat = mysql_query ($qury)or die(mysql_error());    
}
else
{
$qury = "INSERT INTO ping (result,lostpc,avgtme,ipaddr) VALUES ('$output','$lost','$t1[1]','$ipaddr')";
	$dat = mysql_query ($qury)or die(mysql_error());
}
}
header('Location: ../monitoring.php');
?>