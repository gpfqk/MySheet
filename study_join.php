<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();

	$_SESSION['join_member']=0;

	if (member_join($_GET))
	{
		$_SESSION['join_member']=2;
?>
		<script language="javascript"> 
			location.href="studysearch.html";
		</script>
<?
	}
	else
	{
		$_SESSION['join_member']=1;
?>
		<script language="javascript"> 
			location.href="studysearch.html";
		</script>
<?
	}
?>