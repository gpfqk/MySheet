<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();
	$_SESSION['join'] = 0;

	if (join_($_POST))
	{
		$_SESSION['join'] = 2;
?>
		<script language="javascript"> 
			location.href="main.html";
		</script>
<?
	}
	else
	{
		$_SESSION['join'] = 1
?>
		<script language="javascript"> 
			location.href="main.html";
		</script>
<?
	}
?>
