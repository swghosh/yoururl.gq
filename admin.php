<?php if(isset($_GET['admin'])==false||$_GET['admin']!='on') header('Location: ./'); ?>
<html>
<head>
<title>ADMIN | &copy;SwG Ghosh!</title>
</head>
<body>
<pre>
<?php
include('db.php');
$result=mysqli_query($db,"SELECT * FROM `links`");
$num_rows=mysqli_num_rows($result);
$urlarray=Array();
for($i=1;$i<=$num_rows;$i++)
{
	$result=mysqli_query($db,"SELECT * FROM `links` WHERE `id`=".$i);
	$temp=mysqli_fetch_array($result);
	$urlarray[$i]=$temp['url'];
}
print_r($urlarray);
?>
</pre>
</body>
</html>
