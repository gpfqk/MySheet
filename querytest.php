<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");

	$title=$_GET["title"];
	$time=$_GET["time"]*2;

	echo query_test($title, $time, 'mon');
	echo query_test($title, $time, 'tue');
	echo query_test($title, $time, 'wed');
	echo query_test($title, $time, 'thu');
	echo query_test($title, $time, 'fri');
	echo query_test($title, $time, 'sat');
	echo query_test($title, $time, 'sun');
?>