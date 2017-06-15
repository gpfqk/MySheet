<? 
	if (!isset($_SESSION)) { session_start(); } 
	include("db.php");
   	$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>스터디 예약 시스템 [내자리야]</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Travel Hunt App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset utf="8">
<!--font-awsome-css-->
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
td{height: 21px; width:51px;}
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
<?
					if($_SESSION['name']){
?>

						<div style="color:white; text-shadow: 1px 1px gray; font-size:20px;">
							<i class="fa fa-user"></i> <?=$_SESSION['name']?>
						</div>

<?
					}
					else{
?>
						<a href="#small-dialog" class="sign-in popup-top-anim"> <i class="fa fa-user"></i></a>
<?
					}
?>
				</div>
				<div class="clearfix"></div>
			</div> 
		</div>
<!-- banner -->
<div style="margin:0 auto; font-size:35px; text-align:center; color:white; background-color:#043d67;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;내 시간표 
		<button onClick="location.href='./edittimetable.php'" style="background-color: #2ad2c9; border-radius: 10px; width:50px; height:30px; color:white; font-size:15px;" class="btn btn-default">추가</button>
</div>
				<div class="view_schedule">
						<div class="details-right">
						<div>
						<table border="1" style="color:black; background-color: white; height: 100%; width: 100%;">
					        <tr style="background-color:#043d67; color:white;">
					           <td style="width:7%; font-size:8px !important"></td>
					           <td>일</td>
					           <td>월</td>
					           <td>화</td>
					           <td>수</td>
					           <td>목</td>
					           <td>금</td>
					           <td>토</td>
					        </tr>
					<?
					           $k=1;
					            for($i=10;$i<23;$i++){
					?>
					<style>
						td {font-size:12px;}
					</style>
					         <tr style="" >   
					            <td style="background-color:#043d67; color:white;" rowspan=2><?=$i."시";?></td>
					           <td ><?=timemark_new($id, "sun,".$k)?></td>
					           <td ><?=timemark_new($id, "mon,".$k)?></td>
					           <td ><?=timemark_new($id, "tue,".$k)?></td>
					           <td ><?=timemark_new($id, "wed,".$k)?></td>
					           <td ><?=timemark_new($id, "thu,".$k)?></td>
					           <td ><?=timemark_new($id, "fri,".$k)?></td>
					           <td ><?=timemark_new($id, "sat,".$k)?></td>   
					        </tr>
					        <?
					       		$k++;
					        ?>
					        <tr >   
					           <td ><?=timemark_new($id, "sun,".$k)?></td>
					           <td ><?=timemark_new($id, "mon,".$k)?></td>
					           <td ><?=timemark_new($id, "tue,".$k)?></td>
					           <td ><?=timemark_new($id, "wed,".$k)?></td>
					           <td ><?=timemark_new($id, "thu,".$k)?></td>
					           <td ><?=timemark_new($id, "fri,".$k)?></td>
					           <td ><?=timemark_new($id, "sat,".$k)?></td>   
					        </tr>
					        <?
					       		$k++;
					        }?>
					     </table>
						</div>
					</div>	
		<div class="w3agile agileinfo_copy_right">
			<div class="agileinfo_copy_right_right" style="color:white;">
				ⓒ 2017. 내자리야 all rights reserved.
			</div>
		</div>
	</div>
	<!--/footer-->
</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>