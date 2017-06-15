<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$study=$_POST["study"];
	$day=$_POST["day"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$whiteboard=$_POST["white"];
	$projecter=$_POST["pro"];
	$size=$_POST["size"];
	$repeat=$_POST["repeat"];
	echo $study;
	echo $day;
	echo $starttime;
	echo $endtime;
	echo $size;
	echo $whiteboard;
	echo $projecter;
	echo $repeat;
	echo $dayOfWeek;

	if(date("w",strtotime($day))=="0"){
		$yoil="일";
	} 
	else
		$yoil="일말고";
	echo $yoil;  
	
	
?>
