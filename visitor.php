<?php
include_once("db.php");
$sql = "INSERT INTO `visitor` (`script`) VALUES ('" . $_SERVER['SCRIPT_NAME'] . "');";
mysqli_query($db, $sql);
$sql = "SELECT * FROM `visitor` WHERE `script`='".$_SERVER['SCRIPT_NAME'] . "';";
$res=mysqli_query($db, $sql);
global $visitor;
$visitor=mysqli_num_rows($res);