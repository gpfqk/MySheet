<? if (!isset($_SESSION)) { session_start(); } ?>
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
     <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
    <link href="https://cdn.rawgit.com/singihae/Webfonts/master/style.css" rel="stylesheet" type="text/css" />
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
				<div class="profile-left" style="margin-top:5px;">
					<a href="#menu" class="menu-link"><i class="fa fa-list-ul"></i></a>
				</div>
				<div class="Profile-mid">
					<h5 class="pro-link"><a href="main.html">내자리야</a></h5>
				</div>
				<div class="Profile-right">
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
						<!-- modal -->
					<div id="small-dialog" class="mfp-hide">
						<div class="login-modal"> 	
							<div class="booking-info">
							   <h1  style="margin-bottom:30px;"><img src="images/mysheet.png" width="40px" height="40px" alt=" "> 로그인 </h1>
							</div>
							<div class="login-form">
								<form action="login.php" method="post">
									<p>아이디</p>
									<input type="text" name="id" required=""/>
									<p>비밀번호</p>
									<input type="password" name="password" required=""/>
									<br><br><br>	 
<!-- 									<div class="wthree-text"> 
										<ul> 
											<li>
												<input type="checkbox" id="brand" value="">
												<label for="brand"><span></span> Remember me ?</label>  
											</li>
										</ul>
										<div class="clear"> </div>
									</div>  -->
									<input type="submit" value="LOGIN">
								</form>
								<br>
								<p style="text-align: center;" > 가입된 계정이 없으신가요? <a href="#small-dialog1" class="sign-in popup-top-anim"> JOIN </a></p>
							</div> 
						</div>
					</div>
					<!-- //modal --> 
					<!-- modal-two -->
					<div id="small-dialog1" class="mfp-hide">
						<div class="login-modal">  
							<div class="booking-info">
							   <h1  style="margin-bottom:30px;"><img src="images/mysheet.png" width="40px" height="40px" alt=" "> 회원가입 </h1>
							</div>
							<div class="login-form signup-form">
								<form action="join.php" method="post">
									<p>아이디 </p>
									<input type="text" name="id"  required="true"/>
									<p>비밀번호</p>
									<input type="password" name="password" placeholder="" required="true"/>	
									<p>이름 </p>
									<input type="text" name="name"  required="true"/>
									<p>소속학과 </p>
									<input type="text" name="major"  required="true"/>
									<p>학번 </p>
									<input type="text" name="number"  required="true"/>
									<p>연락처 </p>
									<input type="text" name="phone1"  required="true" value="010" style="width:30% !important;"/> - <input type="text" name="phone2"  required="true" length="5" style="width:30% !important;"/> - <input type="text" name="phone3"  required="true" length="5" style="width:30% !important;"/>
									<div class="wthree-text"> 
										<input type="checkbox" id="brand1" value="">
										<label for="brand1"><span></span>I accept the terms of use</label> 
									</div>
									<input type="submit" value="Sign Up">		
								</form> 
							</div> 
						</div>
					</div>
					<!-- //modal-two --> 
					
				</div>
				<div class="clearfix"></div>
			</div> 
<!-- banner -->
   <div class="details-grids">
				<div class="details-shade">
						<div class="details-right">
						<h1>선택 예약</h1>
							<form action="executeStudyReservation.php" method="post" >
								스터디:<input type="text" name="study" id="study"><br>
								날짜:<input type="text" name="day" list="dayofweek"><br>
								시간
								<select name="starttime" style="width:88px;height:35px;">	
									<?
										$k=1;
										for($i=10;$i<21;$i++){
											for($j=0; $j<=30;$j+=30){
												if(strlen($j)==1){
													$j="0".$j;
												}
											?><option value="<?=$k?>"><? echo $i.":".$j ?></option>
											<?
											$k++;
											}
										}
									?>
								</select>시~
								<select name="endtime" style="width:88px;height:35px;">	
									<?
										$k=1;
										for($i=10;$i<21;$i++){
											for($j=0; $j<=30;$j+=30){
												if(strlen($j)==1){
													$j="0".$j;
												}
											?><option value="<?=$k?>"><? echo $i.":".$j ?></option>
											<?
											$k++;
											}
										}
									?>
								</select>시
								</br>
								규모<input type="radio" name="size" value="small">소형<input type="radio" name="size"
								value ="medium">중형
								<input type="radio" name="size" value="large">대형</br>
								옵션<input type="checkbox" name="whiteboard">화이트보드</br>
								<input type="checkbox" name="projecter">프로젝터</br>
								반복주기<input type="radio" name="repeat" value="week">1주<input type="radio" name="repeat" value="month">1달<input type="radio" name="repeat" value="norepeat">반복X</br>

								<input type="submit" name="" value="예약하기" >
							</form>			
						
					</div>	
				</div>
			
		<!--/footer-->
  
		<div class="w3agile agileinfo_copy_right" >
			<div class="agileinfo_copy_right_right">
				<ul class="social">
					<li><a class="social-linkedin" href="#">
						<i></i>
						<div class="tooltip"><span>Facebook</span></div>
						</a></li>
					<li><a class="social-twitter" href="#">
						<i></i>
						<div class="tooltip"><span>Twitter</span></div>
						</a></li>
					<li><a class="social-google" href="#">
						<i></i>
						<div class="tooltip"><span>Google+</span></div>
						</a></li>
					<li><a class="social-facebook" href="#">
						<i></i>
						<div class="tooltip"><span>Pinterest</span></div>
						</a></li>
					<li><a class="social-instagram" href="#">
						<i></i>
						<div class="tooltip"><span>Instagram</span></div>
						</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
	</div>
	<!--/footer-->
</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>