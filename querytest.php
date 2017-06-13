<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");

	$title=$_GET["title"];
	$time=$_GET["time"];

	$GLOBALS['querytest'] = echo query_test($title, $time, 'mon');
?>
	
