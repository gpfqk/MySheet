	function query_test()
	{
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
		// $query = "select * from studylist A, userinfo B ";
		// $query.= "where A.host = B.id ";
		// $query.= "and (host = '".$_SESSION['id']."' or member1 = '".$_SESSION['id']."' or member2 = '".$_SESSION['id']."' or member3 = '".$_SESSION['id']."');";
		$query = "select sd_time from schedule where sd_time Like 'tue%';";
		// $query.= "where A.host = B.id ";
		// $query.= "and (host = '".$_SESSION['id']."' or member1 = '".$_SESSION['id']."' or member2 = '".$_SESSION['id']."' or member3 = '".$_SESSION['id']."');";
		$result = mysql_query($query);

		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
		      	$arr[$i] = $row['sd_time'];
			}
		}

		for($i=0; $i<count($arr); $i++){
			$result_array[$i] = explode(',',$arr[$i]);
			echo "<br>".$result_array[$i][0]."//".$result_array[$i][1]."//".$result_array[$i][2]."//".$result_array[$i][3];
		}
		print_r($result_array);
		// $query = "select num from schedule where sd_time not in 'tue%';";
		// echo "<br>".$result_array[0][0]."//".$result_array[0][1]."//".$result_array[0][2];
	}
?>