<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");

	$_SESSION['add_member']=0;

	if (member_delete($_POST))
	{
		$_SESSION['add_member']=2;
?>
		<script language="javascript"> 
			location.href="studymain.html?title=<?=$_POST['studyname']?>&host=<?=$_POST['host']?>";
		</script>
<?
	}
	else
	{
		$_SESSION['add_member']=1;
?>
		<script language="javascript"> 
			location.href="studymain.html?title=<?=$_POST['studyname']?>&host=<?=$_POST['host']?>";
		</script>
<?
	}
?>