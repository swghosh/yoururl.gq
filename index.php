<?php include_once('visitor.php'); ?>
<?php 
include('db.php');
$query = mysqli_query($db, "SELECT * FROM `links`");
$num_rows = mysqli_num_rows($query);
if(isset($_GET['url'])) {
	$val = intval($_GET['url']);
	if($val <= 0 || $val > $num_rows) {
		die(header('Location: ./'));
	}
	else {
		$sql = "SELECT * FROM `links` WHERE `id`=" . $_GET['url'];
		$result = mysqli_query($db, $sql);
		$resultarray = mysqli_fetch_array($result);
		$url = $resultarray['url'];
		die(header('Location: ' . $url));
	}
}
else {
?>

<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<title>www.yoururl.gq | url shortener</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<meta name="description" content="A simple URL shortener.">
    	<meta name="author" content="http://swghosh.tk">
    	<meta name="theme-color" content="#1B1B4C">
	</head>
	<body>
		<h1><a href="http://www.yoururl.gq">www.yoururl.gq</a></h1>
		<h3>get your long URL shortened in seconds..</h3>
		<br/>
		<form method="POST" action="submit.php">
			<label for="url">long URL -></label> <input class="link" type="text" name="url" placeholder="place your long URL here" required="yes" />
			<input class="button" type="submit" value="shorten >>" />
		</form>
		<br/>
		<footer>
			you're visitor# <?php echo $visitor; ?><br/>
			<a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @SwG_Ghosh</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</footer>
		<h3>small is the next big thing! #sitbt</h3>
		<script>
  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  			ga('create', 'UA-72535536-1', 'auto');
  			ga('send', 'pageview');
		</script>
	</body>
</html>

<?php
}
?>