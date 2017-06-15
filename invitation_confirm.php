<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();
	if (invitation_confirm($_GET))
	{
?>
		<script language="javascript"> 
			location.href="invitation.html";
		</script>
<?
	}
	else
	{
?>
		<script language="javascript"> 
			location.href="invitation.html";
		</script>
<?
	}
?>