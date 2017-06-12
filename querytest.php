<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$title=$_POST["title"];
	$time=$_POST["time"];
	$day=$_POST["day"];
	
	query_test($title, $time, $day);
?>