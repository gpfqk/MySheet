<? if (!isset($_SESSION)) { session_start(); }
	function is_passwd_correct($id, $password, &$name, &$major, &$nunber, &$phone)
	{
		//echo "$id";
		//echo "$password";
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
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
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
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



	function board_list()
	{
		$connect = mysql_connect("localhost", "root", "apmsetup");
		$db = mysql_select_db("db_ip", $connect);
		$query = "select * from board";
		$result = mysql_query($query);
		if($result)
	   {
?>
	    <table border="1"  cellspacing="0" style="text-align:center">
<?
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
	      	$row = mysql_fetch_array($result); 
?>
			<tr>
				<td><?=$row['num']?></td>
				<td><a href="board_show.php?num=<?=$row['num']?>"><?=$row['subject']?></a></td>
				<td><?=$row['writer']?></td>
				<td><?=$row['content']?></td>
			<tr>
<?
		}
?>
		</table>
<?
		}
	}

	function insert_data($a)
	{
		$connect = mysql_connect("localhost","root","apmsetup");
		$db = mysql_select_db("db_ip", $connect);
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
		$connect = mysql_connect("localhost", "root", "apmsetup");
		$db = mysql_select_db("db_ip", $connect);
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
		$connect = mysql_connect("localhost", "root", "apmsetup");
		$db = mysql_select_db("db_ip", $connect);
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
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
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
?>