<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$id = $_SESSION["id"];
	$study=$_POST["study"];
	$day=$_POST["day"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$whiteboard=$_POST["white"];
	$projector=$_POST["pro"];
	$size=$_POST["size"];
	$repeat=$_POST["repeat"];
	if(!$whiteboard)
		$whiteboard ="0";
	if(!$projector)
		$projector = "0";
	if($repeat=="norepeat"){
		$repeat = "0";
	}else if($repeat=="week"){
		$repeat = "1";
	}else if($repeat=="month"){
		$repeat = "2";
	}

	/////////////////////요일구하기
	$date = date("w",strtotime($day));
	if($date=="0")
		$yoil="일";
	else if($date=="1")
		$yoil="월";
	else if($date=="2")
		$yoil="화";
	else if($date=="3")
		$yoil="수";
	else if($date=="4")
		$yoil="목";
	else if($date=="5")
		$yoil="금";
	else if($date=="6")
		$yoil="토";
	//////////////////////
	// echo $id;
	// echo $study;
	// echo $starttime;
	// echo $endtime;
	// echo $size;
	// echo $projecter;
	// echo $whiteboard;
	// echo $repeat;
	// echo $yoil;  
	// echo $day;
	study_reservation($id,$study,$starttime,$endtime,$size,$projector,$whiteboard,$repeat,$yoil,$day);

?>

<script>
      alert("등록 되었습니다.");
      document.location.href="studyReservation.php";
</script>