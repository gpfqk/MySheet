<? if (!isset($_SESSION)) { session_start(); }
	session_destroy();
	session_regenerate_id(TRUE);
	session_start();
	$_SESSION['flash']="성공적으로 로그아웃 되었습니다.";
	header("Location: main.html");
?>