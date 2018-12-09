<? if (!isset($_SESSION)) { session_start(); } 
	include("db.php");
	ensure_logged_in();
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
     <link href="https://cdn.jsdelivr.net/gh/YJSoft/Webfonts@0.1/BM_HANNA.css"  rel="stylesheet" type="text/css" />
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
					<div style="color:white; text-shadow: 1px 1px gray; font-size:20px;">
						<i class="fa fa-user"></i> <?=$_SESSION['name']?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> 
		</div>
<!-- banner -->
<div style="margin:0 auto; font-size:35px; text-align:center; color:white; background-color:#043d67;"> 시간표 등록 </div>
				<div class="createscheduleform" style="width:90%; margin:50px auto;">
					<form method="post" action="edit.php">
						<table style="font-size:17px; margin:0 auto;">
						<tr style="height:80px; line-height: 80px;">
							<td style="width:20px;">일정 </td>
							<td colspan="2"><input type="text" name="sd_name" class="form-control" placeholder="일정 이름"/></td>
						</tr>
						<tr style="height:80px; line-height: 60px;">
							<td>요일</td>
							<td colspan=2>
								<select name="dayoftheweek" style="width:100%; height:40px; margin-top:10px;line-height:18px;">	
									<option value="mon">월요일</option>
									<option value="tue">화요일</option>
									<option value="wed">수요일</option>
									<option value="thu">목요일</option>
									<option value="fri">금요일</option>
									<option value="sat">토요일</option>
									<option value="sun">일요일</option>	
								</select>
							</td>
						</tr>
						<tr>
							<td>시간</td>
							<td style="height:80px; width:60px;">
								<select name="starttime" style="width:100px; height:40px; margin-top:10px; line-height:18px;">	
								<!-- style="width:88px;height:35px;" -->
									<?
										$k=1;
										for($i=10;$i<21;$i++){
											for($j=0; $j<=30;$j+=30){
												if(strlen($j)==1){
													$j="0".$j;
												}
											?><option value="<?=$k?>"><? echo $i.":".$j;
											$k++; ?></option>
											<?
											}
										}
									?>
								</select> <div style="line-height: 60px">&nbsp;~ </div>
							</td>
							<td style="height:80px; line-height: 60px;">
								<select name="endtime" style="width:100px; height:40px; margin-top:10px;line-height:18px;">	
									<?
										$k=1;
										for($i=10;$i<21;$i++){
											for($j=0; $j<=30;$j+=30){
												if(strlen($j)==1){
													$j="0".$j;
												}
											?><option value="<?=$k?>"><? echo $i.":".$j;
											$k++; ?></option>
											<?
											}
										}
									?>
								</select>
								</td>
								</tr>
								<tr><td colspan=3></td></tr>
								<tr><td colspan=3></td></tr>
								<tr>
								<td colspan=3><button type="submit" style="background-color: #2ad2c9; border-radius: 10px; width:320px; height:50px; color:white; font-size:30px;" class="btn btn-default">등록</button>
								</td>
								</tr>
							</table>
							
					</form>
				</div>
			</div>
			<br><br>
		<!--/footer-->
  
		<div class="w3agile agileinfo_copy_right">
			<div class="agileinfo_copy_right_right" style="color:white;">
				ⓒ 2017. 내자리야 all rights reserved.
			</div>
		</div>
</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>