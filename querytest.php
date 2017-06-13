<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");

	$title=$_GET["title"];
	$time=$_GET["time"];

	// $GLOBALS['querytest'] = query_test($title, $time, 'mon');
	$_SESSION['querytest'] = "안녕하시오fffffff";

?>
	<script language="javascript"> 
		location.href="querytest.html";
	</script>

	
