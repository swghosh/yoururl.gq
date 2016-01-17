<?php 
include_once('visitor.php'); 
require_once('recaptchalib.php');
$privatekey = "your_private_key";
$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

include('db.php');

if(!$resp -> is_valid || isset($_POST['url']) == false || empty($_POST['url'])) die(header('Location: ./'));
if(substr($_POST['url'], 0, 7) != "http://" && substr($_POST['url'], 0, 8) != "https://") $_POST['url']='http://' . $_POST['url'];
$q = "INSERT INTO `links` (`url`) VALUES ('" . $_POST['url']."');";
mysqli_query($db,$q);
$sql = "SELECT * FROM `links` WHERE `url`='" . $_POST['url'] . "'";
$result = mysqli_query($db,$sql);
$aar = mysqli_fetch_array($result);
$id = $aar['id'];
$fullurl = "http://".$_SERVER['HTTP_HOST']."/?url=" . $id;
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
		<p><label for="url"> short url -></label> <a href="<?php echo $fullurl; ?>"><?php echo $fullurl; ?></p>
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
