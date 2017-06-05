<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();
	
	echo $_POST["phone"];
	if (join_($_POST))
	{
?>
		<script language="javascript">window.alert("회원가입 성공!");</script> 
<?
		header("Location: main.html");
	}
	else
	{
?>
		<script language="javascript">window.alert("아이디 혹은 학번이 이미 존재합니다.");</script> 
<?
	}
?>
