<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();
	
	if (comment_write($_POST))
	{
		$_SESSION['coment_write'] = 0;
?>
		<script language="javascript"> 
			location.href="studymain.html?title=<?=$_POST['studyname']?>&host=<?=$_POST['host']?>";
		</script>
<?
	}
	else
	{
		$_SESSION['coment_write'] = 1
?>
		<script language="javascript"> 
			location.href="studymain.html?title=<?=$_POST['studyname']?>&host=<?=$_POST['host']?>";
		</script>
<?
	}

?>
