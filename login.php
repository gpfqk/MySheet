<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	ensure_logged_in();
	$id=$_POST["id"];
	$password=$_POST["password"];
	$name=NULL;
	$major=NULL;
	$number=NULL;
	$phone=NULL;
	$_SESSION['login']=0;
	if (is_passwd_correct($id,$password,$name,$major,$number,$phone))
	{
		$_SESSION['id']=$id;
		$_SESSION['name']=$name;
		$_SESSION['major']=$major;
		$_SESSION['number']=$number;
		$_SESSION['phone']=$phone;
		$_SESSION['login']=2;
		$_SESSION['flash']="$name 님이 접속하셨습니다.";
?>
	<script language="javascript"> 
		alert("Welcome!!");
		location.href="main.html";
	</script>
<?
	}
	else
	{
		$_SESSION['flash']="로그인에 실패하였습니다. 다시 입력하세요.";
		$_SESSION['login']=1;
?>
		<script language="javascript"> 
			location.href="main.html";
		</script>
<?
	}
?>