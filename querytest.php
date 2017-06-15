<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();

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
<link rel="stylesheet" href="css/font-awesome.min.css"> 
     <link href="https://cdn.rawgit.com/YJSoft/Webfonts/0.1/BM_HANNA.css"  rel="stylesheet" type="text/css" />
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
								<li><a class=" link link--yaku active" href="main.html">Home</a></li>
								<li>----------------</li>
								<li><a class=" link link--yaku" href="timemark.php">내 시간표 관리</a></li>
								<li><a class=" link link--yaku" href="destination.html">내 정보 관리</a></li>
								<li><a class=" link link--yaku" href="mystudy.html">내 스터디 관리</a></li>
								<li>----------------</li>
								<li><a class=" link link--yaku" href="studysearch.html">스터디 가입</a></li>
								<li><a class=" link link--yaku" href="invitation.html">스터디 가입 관리</a></li>
								<li><a class=" link link--yaku" href="contact.html">도움말 및 사용법</a></li>
								<li>----------------</li>

<?
								if($_SESSION['name']){
?>
								<li><a class=" link link--yaku" href="logout.php">LOGOUT</a></li>
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
		<div style="margin:0 auto; font-size:35px; text-align:center; color:white; background-color:#043d67; margin-bottom: 10px;"> 추천 예약 </div>
<style>
	.hotel-left p {font-size:15px; color:black;}
	.hotel-right a {font-size:30px;}
</style>
	  	<div class="recommendform">
	  	<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'mon'));
					if(query_test($title, $time, 'mon'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "월요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'mon'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
	}
?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'tue'));
					if(query_test($title, $time, 'tue'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "화요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'tue'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
}
?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'wed'));
					if(query_test($title, $time, 'wed'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "수요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'wed'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
	}
?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'thu'));
					if(query_test($title, $time, 'thu'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "목요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'thu'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
}
?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'fri'));
					if(query_test($title, $time, 'fri'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "금요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'fri'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
	}

?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'sat'));
					if(query_test($title, $time, 'sat'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "토요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'sat'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
	}

?>	
			</div>
		</div>
		<div class="hotel-rooms">
			<div class="hotel-left">
				<p>
<? 
					$result_array = explode(',', query_test($title, $time, 'sun'));
					if(query_test($title, $time, 'sun'))
					{
					echo conversion_day($result_array[0])."요일 : ".conversion_time($result_array[1])."~".conversion_time($result_array[1]+$time)."<br>";
					}
					else
						echo "일요일에는 가능한 예약 시간이 없습니다.";
?>
				</p> 
			</div>
			<div class="hotel-right text-right">
<?
	if(!query_test($title, $time, 'sun'))
		echo "";
	else{
		$end = $result_array[1]+$time;
		echo "<a href=result.php?title=$_GET[title]&day=$result_array[0]&start=$result_array[1]&end=$end>예약하기</a>";
	}

?>	
			</div>
		</div>
<? 
			// echo query_test($title, $time, 'mon');
			// echo query_test($title, $time, 'tue');
			// echo query_test($title, $time, 'wed');
			// echo query_test($title, $time, 'thu');
			// echo query_test($title, $time, 'fri');
			// echo query_test($title, $time, 'sat');
			// echo query_test($title, $time, 'sun');
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
