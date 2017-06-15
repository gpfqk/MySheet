<?	if (!isset($_SESSION)) 	{ session_start(); }
	include("db.php");
	$study=$_POST["study"];
	$day=$_POST["day"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$whiteboard=$_POST["white"];
	$projecter=$_POST["pro"];
	$size=$_POST["size"];
	$repeat=$_POST["repeat"];
	echo $study;
	echo $day;
	echo $starttime;
	echo $endtime;
	echo $size;
	echo $whiteboard;
	echo $projecter;
	echo $repeat;
	echo $dayOfWeek;
	
?>

<script type="text/javascript">
	function week(){
		var week = ['일', '월', '화', '수', '목', '금', '토'];
		var dayOfWeek = week[new Date('<?=$day?>').getDay()];
		document.write(dayOfWeek);
	}
	week();
</script>