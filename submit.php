<?php include('log.php');?>
<?php include('db.php');
if(isset($_POST['url'])==false || empty($_POST['url']))
header('Location: ./');
if(substr($_POST['url'],0,7)!="http://" && substr($_POST['url'],0,8)!="https://")
$_POST['url']='http://'.$_POST['url'];
$q="INSERT INTO `links` (`url`) VALUES ('".$_POST['url']."');";
mysqli_query($db,$q);
$sql="SELECT * FROM `links` WHERE `url`='".$_POST['url']."'";
$result=mysqli_query($db,$sql);
$aar=mysqli_fetch_array($result);
$id=$aar['id'];
$fullurl="http://".$_SERVER['HTTP_HOST']."/?url=".$id;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=yes" />
<title>www.yoururl.gq | url shortener</title>
<link href="tools/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tools/jquery.min.js"></script> 
</head>
<body>
<div id="wrapper">
	<div class="main">
		<div class="header">
			<div class="logo">
				<h1>url<strong>shortener</strong></h1>
				<h2><strong>shortening URL</strong> has a new address</h2>
				<h2>www.yoururl.gq</h2>
			</div>
			<div class="form">
				<p>your shortened URL - </p><input type="text" id="test" name="url" value="<?php echo $fullurl; ?>"/>
			</div>
			<ul class="social">
				<li><a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false">Follow @SwG_Ghosh</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
			</ul>
		</div>
		
		<ul class="boxes">
			<li>
				<h3>#php #sql #eclipse #apache #unix</h3>
				&copy;SwG Ghosh!
				<span class="divider"></span>
			</li>
			<li>
				<h3>a part of</h3>
				<a href="http://www.swghosh.tk">www.swghosh.tk</a>
				<span class="divider"></span>
			</li>
			<li class="last">
				<h3>you're</h3>
				<?php echo $_SERVER['REMOTE_ADDR']; ?><h3><br/>visitor#<?php echo $visitor; ?></h3><br/>
			</li>
		</ul>
	</div>
</div>

<script type="text/javascript">
var placeholder = $("#test").val();

$("#test").keydown(function() {
    if (this.value == placeholder) {
        this.value = placeholder;
    }
}).blur(function() {
	this.value = placeholder;
    if (this.value == '') {
        this.value = placeholder;
    }
});
</script>
</body>
</html>
