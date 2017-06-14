<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");

	$title=$_GET["title"];
	$time=$_GET["time"]*2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Query Test</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Travel Hunt App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset utf="8">
<!--font-awsome-css-->
     <link rel="stylesheet" href="css/font-awesome.min.css"> 
<!--bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--custom css-->
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!--component-css-->
	<script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--script-->
	<script src="js/modernizr.custom.js"></script>
    <script src="js/bigSlide.js"></script>
           <script>
				$(document).ready(function() {
				$('.menu-link').bigSlide();
				});
     </script>
     <!-- metro ui 시작!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/metro-responsive.css" rel="stylesheet">
        <link href="css/metro-schemes.css" rel="stylesheet">

        <script src="https://pagead2.googlesyndication.com/pub-config/r20160913/ca-pub-1632668592742327.js"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/docs.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/google/code-prettify/master/loader/prettify.css">
        <script src="js/ga.js"></script>
        <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link href="https://cdn.rawgit.com/singihae/Webfonts/master/style.css" rel="stylesheet" type="text/css" /> -->
    <!-- metro ui 끝!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- web-fonts -->  
<!--   <link href='//fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
<!-- //web-fonts -->
<!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	    <script>
			$(document).ready(function() {
				$('.popup-top-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});																							
			}); 
		</script>
<!--//pop-up-box -->
<style type="text/css">
* {font-family:'BM HANNA','배달의민족 한나', sans-serif; }
</style>
    </head>
<body>

<div class="body-back">
	<div class="masthead pdng-stn1">
		<div id="menu" class="panel" role="navigation">
			<div class="wrap-content">
				<div class="profile-menu text-center">
					<img class="border-effect" src="images/mysheet.png" alt=" ">
						<h3>MENU</h3>
						<div class="pro-menu">
							<div class="logo">
								<li><a class=" link link--yaku  active" href="main.html"><span>H</span><span>o</span><span>m</span><span>e</span></a></li>
								<li><a class=" link link--yaku" href="about.html"><span>A</span><span>b</span><span>o</span><span>u</span><span>t</span></a></li>
								<li><a class=" link link--yaku" href="short-codes.html"><span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span></a></li>
								<li><a class=" link link--yaku" href="destination.html"><span>D</span><span>e</span><span>s</span><span>t</span><span>i</span><span>n</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span><span>s</span></a></li>
								<li><a class=" link link--yaku" href="contact.html"><span>C</span><span>o</span><span>n</span><span>t</span><span>a</span><span>c</span><span>t</span></a></li>
<?
								if($_SESSION['name']){
?>
								<li><a class=" link link--yaku" href="logout.php"><span>L</span><span>o</span><span>g</span><span>o</span><span>u</span><span>t</span></a></li>
<?
								}
?>
							</div>
				

						</div>
				</div>
			</div>
		</div>
		<div class="phone-box wrap push" id="home">
			<div class="menu-notify">
				<div class="profile-left" style="margin-top:15px;">
					<a href="#menu" class="menu-link"><i class="fa fa-list-ul"></i></a>
				</div>
				<div class="Profile-mid">
					<h5 class="pro-link"><a href="main.html">내자리야</a></h5>
				</div>
				<div class="Profile-right" style="margin-top:10px;">
					<div style="color:white; text-shadow: 1px 1px gray; font-size:20px;">
						<i class="fa fa-user"></i> <?=$_SESSION['name']?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> 
		</div>
		<div class="w3agile single-hotel">
		  	<div style="height:50px; line-height:45px; background:#ddd; margin:0 auto; margin-bottom:20px; border-style:double; border-color:gray; width:40%; font-size:30px; text-align:center;"> 추천예약 </div>
		  <!--/rooms-->
		  	<!--/room1-->

	  	<div class="recommendform">
			<? 
			echo query_test($title, $time, 'mon');
			echo query_test($title, $time, 'tue');
			echo query_test($title, $time, 'wed');
			echo query_test($title, $time, 'thu');
			echo query_test($title, $time, 'fri');
			echo query_test($title, $time, 'sat');
			echo query_test($title, $time, 'sun');
			?>
		</div>

		<div class="w3agile agileinfo_copy_right">
			<div class="agileinfo_copy_right_right" style="color:white;">
				ⓒ 2017. 내자리야 all rights reserved.
			</div>
		</div>
	<!--/footer-->
	
</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
