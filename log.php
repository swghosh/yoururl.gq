<?php
include('db.php');
function logger()
{
date_default_timezone_set('Asia/Kolkata');

// ip address of the visitor
$ipadress = $_SERVER['REMOTE_ADDR'];

// date of the visit that will be formated this way: 29/May/2011 12:20:03
$date = date('d/F/Y h:i:s');

// name of the page that was visited
$webpage = $_SERVER['REQUEST_URI'];
$script = $_SERVER['SCRIPT_NAME'];
// visitor's browser information
$browser = $_SERVER['HTTP_USER_AGENT'];

include('db.php');
$sql="INSERT INTO `sitelog` (`ip`,`uri`,`script`,`browser`,`time`) VALUES ('".$ipadress."','".$webpage."','".$script."','".$browser."','".$date."');";
mysqli_query($db,$sql);
}
logger();
$sql="INSERT INTO `visitor` (`script`) VALUES ('".$_SERVER['SCRIPT_NAME']."');";
mysqli_query($db,$sql);
$sql="SELECT * FROM `visitor` WHERE `script`='".$_SERVER['SCRIPT_NAME']."';";
$res=mysqli_query($db,$sql);
global $visitor;
$visitor=mysqli_num_rows($res);
?>
