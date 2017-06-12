<? 
	header("Content-type: text/html;charset=utf-8");

	$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
	$db = mysql_select_db("mysheet", $connect);
	mysql_query("SET NAMES utf8");

	if (!isset($_SESSION)) { session_start(); }function is_passwd_correct($id, $password, &$name, &$major, &$nunber, &$phone)
	{
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
		mysql_query("SET NAMES utf8");
		$query = "select * from userinfo where id='".$id."'and password='".$password."'";
		$rows = mysql_query($query);
		if (mysql_num_rows($rows))
		{
			$row = mysql_fetch_row($rows);
			$name = $row[2];
			$major = $row[3];
			$number = $row[4];
			$phone = $row[5];
			return true;
		}
		else
		{
			return false;
		}
	}

	function ensure_logged_in()
	{
		if(!isset($_SESSION['name']))
		{
			$_SESSION['flash']="게시판은 로그인 후, 사용가능 합니다.";
			header("Location: main.html");
		}
	}


	function join_($_POST)
	{

		$id=$_POST["id"];
		$password=$_POST["password"];
		$name=$_POST["name"];
		$major=$_POST["major"];
		$number=$_POST["number"];
		$phone1=$_POST["phone1"];
		$phone2=$_POST["phone2"];
		$phone3=$_POST["phone3"];
		$phone="$phone1"."$phone2"."$phone3";
		if($db)
		{
			$query = "select * from userinfo where id='".$id."' or number ='".$number."'";
			$rows = mysql_query($query);
			if (mysql_num_rows($rows))
			{
				return false;
			}
			else
			{
				$sql = "insert into userinfo (id,password,name,major,number,phone)";
				$sql.= "values('".$id."','".$password."','".$name."','".$major."','".$number."','".$phone."')";
				$result = mysql_query($sql);
				
				if($result)
					return true;
				else
					return false;
			}
		}
	}



	function study_list()
	{

		$query = "select * from studylist A, userinfo B ";
		$query.= "where A.host = B.id ";
		$query.= "and (host = '".$_SESSION['id']."' or member1 = '".$_SESSION['id']."' or member2 = '".$_SESSION['id']."' or member3 = '".$_SESSION['id']."');";
		$result = mysql_query($query);

		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
?>
				<div class="hotel-rooms">
					<div class="hotel-left">
						<a href="#" data-toggle="modal" data-target="#myModalbook" style="font-size:20px;"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span><?=$row['title']?></a> 
<?						if($row['host'] == $_SESSION['id']){
?>
						<span class="glyphicon glyphicon-tower" style="color:#ffcc33; border-color:black; font-size:25px;" aria-hidden="false"></span>
<?
						}
?>
						<p>스터디장 : <?=$row['name']?></p>
					</div>
					<div class="hotel-right text-right">
<?
						if($row['reservation'] != NULL ){
?>
							<a href="#"><h4>예약있음</h4></a>
<?
						}else{
?>
							<a href="#"><h4 style="color : black">예약없음</h4></a>
<?
						}
?>
					</div>
				</div>
<?
				
			}

		}
	}

	function insert_data($a)
	{
		if($db)
		{
			$sql = "insert into board (num,subject,writer,passwd,date,content)";
			$sql.= "values(NULL,'".$a['subject']."','".$a['writer']."','".$a['passwd']."','".$a['date']."','".$a['content']."')";
			$result = mysql_query($sql);
			
			if($result)
				return true;
			else
				return false;

		}
	}

	function show_content($num)
	{
		$query = "select * from board where num='".$num."'";
		$result = mysql_query($query);
		if($result)
	   {
?>
	    <table border="1"  cellspacing="0" style="width:500px; margin:0 auto;">
<?
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
	      	$row = mysql_fetch_array($result); 
?>
			<tr>
				<td style="width:100px;">글번호</td>
				<td style="width:300px;"><?=$row['num']?></td>
			</tr>
			<tr>
				<td>제목</td>
				<td><?=$row['subject']?></a></td>
			</tr>
			<tr>
				<td>작성일</td>
				<td><?=$row['date']?></td>
			</tr>
			<tr>
				<td>작성자</td>
				<td><?=$row['writer']?></td>
			</tr>
			<tr>
				<td>내용</td>
				<td style="height:100px;"><?=$row['content']?></td>
			<tr>
			<tr>
				<td colspan=2>
					<a href="pass_check.php?num=<?=$num?>"><input type=button value="삭제"></a>
					<a href="board.html"><input type=button value="글목록"></a>
				</td>
			</tr>	
<?
		}
?>
		</table>
<?
		}
	}

	function delete_record($num,$passwd)
	{
		$query = "select passwd from board where num='".$num."'";
		$result = mysql_query($query);
		if (mysql_num_rows($result))
		{
			$row = mysql_fetch_row($result);
			$password = $row[0];
			if ($passwd == $password)
			{
				$query2 = "delete from board where num='".$num."'and passwd='".$passwd."'";
				$result2 = mysql_query($query2);
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	function show_studylist()
	{
		if($db)
		{
			$query = "select * from studylist where id='".$_SESSION['id']."' or number ='".$number."'";
			$rows = mysql_query($query);
			if (mysql_num_rows($rows))
			{
				return false;
			}
			else
			{
				$sql = "insert into userinfo (id,password,name,major,number,phone)";
				$sql.= "values('".$id."','".$password."','".$name."','".$major."','".$number."','".$phone."')";
				$result = mysql_query($sql);
				
				if($result)
					return true;
				else
					return false;
			}
		}
	}

	function query_test()
	{
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
		$query = "select * from studylist A, userinfo B ";
		$query.= "where A.host = B.id ";
		$query.= "and (host = '".$_SESSION['id']."' or member1 = '".$_SESSION['id']."' or member2 = '".$_SESSION['id']."' or member3 = '".$_SESSION['id']."');";
		$result = mysql_query($query);

		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
		      	$arr[$i] = $row['sd_time'];
		      	echo $row['sd_time'];
			}
		}

		for($i=0; $i<count($arr); $i++){
			$result_array[$i] = explode(',',$arr[$i]);
			echo "<br>".$result_array[$i][0]."//".$result_array[$i][1]."//".$result_array[$i][2]."//".$result_array[$i][3];
		}
		// print_r($result_array);
		$query = "select num from schedule where sd_time not in 'tue%';";
		echo "<br>".$result_array[0][0]."//".$result_array[0][1]."//".$result_array[0][2];
	}
?>