<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$study=$_POST["study"];
	$day=$_POST["day"];
	$starttime=$_POST["starttime"];
	$option=$_POST["size"];
	echo $study;
	echo $starttime;
	echo $option;
?>