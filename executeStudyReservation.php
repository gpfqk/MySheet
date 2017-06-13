<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$study=$_POST["study"];
	$day=$_POST["day"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$whiteboard=$_POST["whiteboard"];
	$projecter=$_POST["projecter"];
	$size=$_POST["size"];
	$repeat=$_POST["repeat"];
	echo $study;
	echo $starttime;
	echo $size;
?>