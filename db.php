<?php
//Set database settings
$host = $_ENV["OPENSHIFT_MYSQL_DB_HOST"];
$username = "admin";
$password = "minimum18";
$database = "shortener";
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database) or die();
