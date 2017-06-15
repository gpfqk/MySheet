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
		
		global $db;

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

		if($result){
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
?>
				<div class="hotel-rooms">
					<div class="hotel-left">
						<a href="studymain.html?title=<?=$row['title']?>&host=<?=$row['host']?>" style="font-size:20px;"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span><?=$row['title']?></a> 
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

	function studymain($_GET)
	{
		$title = $_GET['title'];
		$host = $_GET['host'];

		$query = "select * from studylist A, reservationlist B ";
		$query.= "where A.title = B.title ";
		$query.= "and A.host = B.host ";
		$query.= "and B.title = '".$title."' and B.host = '".$host."';";
		$result = mysql_query($query);
		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
?>
				<div class="hotel-rooms">
					<div class="hotel-left">
						<div style="font-size : 20px">
							[<?=$row['day_d']?>] <?=conversion_time($row['start'])?> ~ <?=conversion_time($row['end'])?>
						</div> 
						<div style="font-size : 20px">
							<?=$row['room']?>
						</div> 
					</div>
					<div class="hotel-right text-right">
<?
						if($row['completion'] == 1 ){
?>
							<div><h4>예약완료</h4></div>
<?
						}else{
?>
							<div><h4 style="color : black">예약대기</h4></div>
<?
						}
?>
					</div>
				</div>
<?
			}
		}

		$query = "select name from userinfo ";
		$query.= "where id = '".$host."';";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
?>
		<div style="font-size : 20px; padding-left : 10px;">
			스터디장 : <?=$row0['name']?>
		</div>
<?
		$query = "select name from userinfo ";
		$query.= "where id = '".$row['member1']."';";
		$result = mysql_query($query);
		$row1 = mysql_fetch_array($result);
		$query = "select name from userinfo ";
		$query.= "where id = '".$row['member2']."';";
		$result = mysql_query($query);
		$row2 = mysql_fetch_array($result);
		$query = "select name from userinfo ";
		$query.= "where id = '".$row['member3']."';";
		$result = mysql_query($query);
		$row3 = mysql_fetch_array($result);

		$_SESSION['member1'] = $row1['name'];
		$_SESSION['member1ID'] = $row['member1'];
		$_SESSION['member2'] = $row2['name'];
		$_SESSION['member2ID'] = $row['member2'];
		$_SESSION['member3'] = $row3['name'];
		$_SESSION['member3ID'] = $row['member3'];
?>
		<div style="font-size : 20px; padding-left : 10px;">
			스터디원 : <?=$row1['name']?> <?=$row2['name']?> <?=$row3['name']?>
<?
		if($_SESSION['id'] == $host)
		{
?>
<style>
a {text-decoration: none; color:white;}
a:visited {text-decoration: none; color:white;}
</style>
			<center>
				<div style="margin: 20px auto;">
					<a href="#small-dialog" visited=none; class="sign-in popup-top-anim">
					<div style="width:80px; background-color: black; color:white; float:left;">초대</div></a>
					<a href="#small-dialog2" visited=none; class="sign-in popup-top-anim">
					<div style="width:80px; background-color: black; color:white; float:right;">추방</a>
				</div>
			</center>
<?
		}
?>
			
		</div>

		<script>
			$(document).ready(function(){
				$("#comment_write").hide();
			    $("#comment_write_button").click(function(){
			        $("#comment_write").toggle();
			    });
			});
		</script>
		<br><br>


		<div style="margin:20px auto; width:100%; font-size:25px; text-align:center; color:white; background-color:#2ad2c9;"> 스터디 게시판 </div>

		<div style="display: block; height: 30px;"><button style="float : right; background-color: #043d67; border-radius: 10px; width:70px; height:30px; color:white; font-size:15px;" id="comment_write_button" class="btn btn-default">글 작성</button></div>
		<div id="comment_write">
			<form method=post action="comment.php">
				<table style="width:80%; margin:30px auto;">
					<tr>
						<td style="width:20%;"> 내용 </td>
						<td style="width:60%;"> <textarea style="width:100%;" name="content" rows="3" cols="55" class="form-control" placeholder="스터디원들에게 한마디를 남겨보세요."></textarea> </td>
						<input type=hidden name="studyname" value="<?=$title?>">
                		<input type=hidden name="host" value="<?=$host?>"">
						<td rowspan="2"><button type="submit" style="background-color: #2ad2c9; border-radius: 10px; width:55px; margin-left:15px; height:30px; color:white; font-size:15px;" class="btn btn-default">저장</button>
				<br></td>
					</tr>
				</table>
			</form>
			<br>
		</div>
<?

		$query = "select * from comment ";
		$query.= "where studyname = '".$title."'";
		$query.= "order by time desc;";
		$result = mysql_query($query);
		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++)
			{
		      	$row = mysql_fetch_array($result); 
?>
				<div>
				    <table style="width:100%;">
						<tr>
							<td style="font-size:20px;"><?=$row['content']?></td>
						<tr>
						<tr>
							<td><?=$row['name']?>(<?=$row['writer']?>) <div style="float:right;"><?=$row['time']?></div></td>
						</tr>
					</table>
				</div>	
				<hr>
<?
			}
		}



	}

	function comment_write($_POST)
	{
		global $db;
		if($db){
			$sql = "insert into comment (writer,name,studyname,content) ";
			$sql.= "values('".$_SESSION['id']."','".$_SESSION['name']."','".$_POST['studyname']."','".$_POST['content']."')";
			$result = mysql_query($sql);
			if($result)
				return true;
			else
				return false;
		}

	}

	function conversion_time($num)
	{
		if($num == 1) return "10:00";
		else if($num == 2) return "10:30";
		else if($num == 3) return "11:00";
		else if($num == 4) return "11:30";
		else if($num == 5) return "12:00";
		else if($num == 6) return "12:30";
		else if($num == 7) return "13:00";
		else if($num == 8) return "13:30";
		else if($num == 9) return "14:00";
		else if($num == 10) return "14:30";
		else if($num == 11) return "15:00";
		else if($num == 12) return "15:30";
		else if($num == 13) return "16:00";
		else if($num == 14) return "16:30";
		else if($num == 15) return "17:00";
		else if($num == 16) return "17:30";
		else if($num == 17) return "18:00";
		else if($num == 18) return "18:30";
		else if($num == 19) return "19:00";
		else if($num == 20) return "19:30";
		else if($num == 21) return "20:00";
		else if($num == 22) return "20:30";
		else if($num == 23) return "21:00";
		else if($num == 24) return "21:30";
		else if($num == 25) return "22:00";
	}

	function conversion_day($num)
	{
		if($num == 'mon') return "월";
		else if($num == 'tue') return "화";
		else if($num == 'wed') return "수";
		else if($num == 'thu') return "목";
		else if($num == 'fri') return "금";
		else if($num == 'sat') return "토";
		else if($num == 'sun') return "일";
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
		global $db;

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
	function query_test($title, $time, $day)
	{
		global $db;
		$query = "select sd_time from schedule s, studylist l
		where l.title Like '".$title."' and 
		s.sd_time Like '".$day."%'
		and s.id in (l.member1, l.member2, l.member3, l.host)";
		$result = mysql_query($query);
				// return $query;
		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
		      	$arr[$i] = $row['sd_time'];
			}
			for($i=0; $i<count($arr); $i++){
				$result_array[$i] = explode(',',$arr[$i]);
			}

/////////////////////여기까지 일정 스플릿해서 배열에 저장

			$query = "select * from checklist where num not in (";
			for($i=0;$i<count($result_array);$i++)
			{
				$query.= $result_array[$i][1].",".$result_array[$i][2].",".$result_array[$i][3];
				if($i<count($result_array)-1)
					$query.=",";
			};

			$query.=");";
			// return $query;
			$result = mysql_query($query);
			if($result)
		    {
				for($i=0;$i<mysql_num_rows($result);$i++){
			      	$row = mysql_fetch_array($result); 
			      	$check_arr[$i] = $row['num'];
				}

			while(1){
				$recommend = rand(1,24);
				// echo "recommend: ".$recommend."<br>";
				$k = 0;
				for($j=$recommend; $j<($recommend+$time); $j++)
				{
					// echo "j: ".$j;
					for($i=0; $i<count($check_arr); $i++)
					{
						if($j == $check_arr[$i])
							$k++;
					}
				}
				if($k == $time)
					break;
				}
				return conversion_day($day)."요일 : ".conversion_time($recommend)."~".conversion_time($recommend+$time)."<br>";
			}
		 	else return conversion_day($day)."요일에는 가능한 예약시간이 없습니다.<br>";
			
		}
		else return "최초 query없음";
	}

	function study_reservation($id,$study,$starttime,$endtime,$size,$projector,$whiteboard,$repeat,$yoil,$day){

		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
	
		$sql = "insert into reservationlist (host,title,start,end,size,projector,whiteboard,repeat_d,week_d,day_d)";
		$sql.= "values('".$id."','".$study."',".$starttime.",".$endtime.",'".$size."','".$projector."','".$whiteboard."','".$repeat."','".$yoil."','".$day."')";
		$result = mysql_query($sql);
		//작업중

		// echo $sql;
		// echo $result;
	}

	//시간표 등록
	function edittimetable($id,$sd_name,$sd_time){
		$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
		$db = mysql_select_db("mysheet", $connect);
	
		$sql = "insert into schedule (id,sd_name,sd_time)";
		$sql.= "values('".$id."','".$sd_name."','".$sd_time."')";
		$result = mysql_query($sql);
	}


	

			// $query = "select sd_time from schedule where id='".$id."'";
			// $results = mysql_query($query);
			// if (mysql_num_rows($results))
			// {	
			// 	$num = mysql_num_rows($results);
			// 	$row = mysql_fetch_row($results);
			// 	$i = $row[0];
			// 	$row = mysql_fetch_row($results);
				
			// 	$j = $row[0];

			// }
			// echo $i;	
			// echo $j;
			// echo $num;

	function member_add($_POST){
		global $db;

		$addmember=$_POST['addmember'];
		$studyname=$_POST['studyname'];
		$host=$_POST['host'];
	
		$sql = "insert into member_add (studyname,host,addmember) ";
		$sql.= "values('".$studyname."','".$host."','".$addmember."');";

		return mysql_query($sql);
	}

	function invitation_list($id){
		$query = "select * from member_add A ";
		$query.= "where A.addmember = '".$id."';";

		$result = mysql_query($query);

		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
?>
				<div class="hotel-rooms">
					<div class="hotel-left">
						<p style="font-size:20px; color: black;"><span class="glyphicon glyphicon-inbox" aria-hidden="true">
							
						</span><span>< <?=$row['studyname']?> ></span>에서 가입을 요청합니다.</p> 
					</div>
					<div class="hotel-right text-right" style="height: 20px;">
						<div style="float : right;">
							<form action="invitation_confirm.php" method="GET">
							   	<input type="hidden" name="studyname" value="<?=$row['studyname']?>">
								<input type="hidden" name="host" value="<?=$row['host']?>">
								<input type="hidden" name="addmember" value="<?=$row['addmember']?>">
								<input type="hidden" name="no" value="no">
								<input type="submit" value="거절">
							</form>
						</div>
						<div style="float : right;">
							<form action="invitation_confirm.php" method="GET">
								<input type="hidden" name="studyname" value="<?=$row['studyname']?>">
								<input type="hidden" name="host" value="<?=$row['host']?>">
								<input type="hidden" name="addmember" value="<?=$row['addmember']?>">
								<input type="hidden" name="no" value="yes">
								<input type="submit" value="승낙">
							</form>
						</div>

					</div>
				</div>
<?	
			}
		}

		$query = "select * from study_join A ";
		$query.= "where A.host = '".$id."';";

		$result = mysql_query($query);

		if($result)
	    {
			for($i=0;$i<mysql_num_rows($result);$i++){
		      	$row = mysql_fetch_array($result); 
?>
				<div class="hotel-rooms">
					<div class="hotel-left">
						<p style="font-size:20px; color: black;"><span class="glyphicon glyphicon-inbox" aria-hidden="true">
							
						</span><span style = "color : red;">< <?=$row['joinmember']?> ></span >님께서 <span style = "color : red">< <?=$row['studyname']?> ></span>에 가입을 원합니다.</p> 
					</div>
					<div class="hotel-right text-right" style="height: 20px;">
						<div style="float : right;">
							<form action="join_confirm.php" method="GET">
							   	<input type="hidden" name="studyname" value="<?=$row['studyname']?>">
								<input type="hidden" name="host" value="<?=$row['host']?>">
								<input type="hidden" name="joinmember" value="<?=$row['joinmember']?>">
								<input type="hidden" name="no" value="no">
								<input type="submit" value="거절">
							</form>
						</div>
						<div style="float : right;">
							<form action="join_confirm.php" method="GET">
								<input type="hidden" name="studyname" value="<?=$row['studyname']?>">
								<input type="hidden" name="host" value="<?=$row['host']?>">
								<input type="hidden" name="joinmember" value="<?=$row['joinmember']?>">
								<input type="hidden" name="no" value="yes">
								<input type="submit" value="승낙">
							</form>
						</div>

					</div>
				</div>
<?
				
			}

		}


	}

	function invitation_confirm($_GET){
		$studyname = $_GET['studyname'];
		$host = $_GET['host'];
		$addmember = $_GET['addmember'];
		$no = $_GET['no'];

		if ($no != 'no')
		{
			$query = "delete from member_add where studyname='".$studyname."'and addmember='".$addmember."'";
			$result = mysql_query($query);

			$query = "UPDATE studylist SET member3 = '".$addmember."' ";
			$query.= "WHERE title = '".$studyname."' and host = '".$host."';";
			$result = mysql_query($query);

			return true;
		}
		else if($no == 'no')
		{

			$query = "delete from member_add where studyname='".$studyname."'and addmember='".$addmember."'";
			$result = mysql_query($query);
			return false;
		}

	}

	function join_confirm($_GET){
		$studyname = $_GET['studyname'];
		$host = $_GET['host'];
		$joinmember = $_GET['joinmember'];
		$no = $_GET['no'];

		if ($no != 'no')
		{
			$query = "delete from study_join where studyname='".$studyname."'and joinmember='".$joinmember."'";
			$result = mysql_query($query);

			$query = "UPDATE studylist SET member3 = '".$joinmember."' ";
			$query.= "WHERE title = '".$studyname."' and host = '".$host."';";
			$result = mysql_query($query);

			return true;
		}
		else if($no == 'no')
		{

			$query = "delete from study_join where studyname='".$studyname."'and joinmember='".$joinmember."'";
			$result = mysql_query($query);
			return false;
		}

	}


   function timemark($id){
      $connect = mysql_connect("203.252.182.152", "all", "apmsetup");
      $db = mysql_select_db("mysheet", $connect);
   
         $query = "select sd_name, sd_time from schedule where id='".$id."'";
         $results = mysql_query($query);
         if (mysql_num_rows($results))
         {   
            $num = mysql_num_rows($results);
             for($i=0;$i<$num;$i++){
               $row = mysql_fetch_array($results);
               $j = $row['sd_time'];
               $kj[$i] = $row['sd_name'];
               ${"jj".$i} = explode(",", $j);
               for($g=0; $g<count(${"jj".$i})-1; $g++){
                	$cellcolor = ${"jj".$i}[0].${"jj".$i}[$g+1]; // td의 id 추출 
                	echo $cellcolor.$kj[$i]."<br>";
?>
	                  <style type="text/css">
	                     #<?=$cellcolor?> {background-color: green;}
	                  </style>
<?			
               }
         }
         for($i=0; $i<count($kj);$i++)
         	echo "과목:".$kj[$i]."<br>";
               //echo count($jj0);
               //echo $jj0[0].$jj0[1];
               //echo $jj1[0].$jj1[1];
?>
                     <table border="1" style="border-collapse:collapse; height: 100%;width: 100%;">
                        <tr>
                           <td></td>
                           <td>일</td>
                           <td>월</td>
                           <td>화</td>
                           <td>수</td>
                           <td>목</td>
                           <td>금</td>
                           <td>토</td>
                        </tr>
<?
                           $k=1;
                            for($i=10;$i<23;$i++){
?>
                         <tr style="border-bottom:hidden;" >   
                            <td rowspan=2 style="border-bottom:1px gray solid" ><?=$i."시";?></td>
                           <td id=<?="sun".$k;?>></td>
                           <td id=<?="mon".$k;?>></td>
                           <td id=<?="tue".$k;?>></td>
                           <td id=<?="wen".$k;?>></td>
                           <td id=<?="thr".$k;?>></td>
                           <td id=<?="fri".$k;?>></td>
                           <td id=<?="sat".$k; $k++;?>></td>   
                        </tr>
                        <tr >   
                           <td id=<?="sun".$k?>></td>
                           <td id=<?="mon".$k?>></td>
                           <td id=<?="tue".$k;?>></td>
                           <td id=<?="wen".$k;?>></td>
                           <td id=<?="thr".$k;?>></td>
                           <td id=<?="fri".$k;?>></td>
                           <td id=<?="sat".$k;?>></td>   
                        </tr>
                        <?
                       		$k++;
                        }?>
                     </table>
         
      <?
   }

}

	function study_search()
   {

      $query = "select * from studylist s, userinfo u where s.host = u.id;";
      $result = mysql_query($query);

      if($result)
       {
         for($i=0;$i<mysql_num_rows($result);$i++){
               $row = mysql_fetch_array($result); 
?>
            <div class="hotel-rooms">
               <div class="hotel-left">
                  <p style="color:#333 !important">스터디이름 : <?=$row['title']?></p>
                  <p style="color:#333 !important">스터디장 : <?=$row['name']?></p>
               </div>
               <div class="hotel-right text-right">

<?
					$query = "select * from study_join ";
					$query.= "where joinmember = '".$_SESSION['id']."' ";
					$query.= "and host = '".$row['host']."' ";
					$query.= "and studyname = '".$row['title']."';";
					$result2 = mysql_query($query);
					if(mysql_num_rows($result2)){
?>
						<a href="#" style = "text-decoration: none;"><h4 style="color:navy !important;">가입 요청 중</h4></a>
<?
					}else{
						if($_SESSION['id'] == $row['host'] || $_SESSION['id'] == $row['member1'] || $_SESSION['id'] == $row['member2'] || $_SESSION['id'] == $row['member3']){
?>
						<a href="studymain.html?title=<?=$row['title']?>&host=<?=$row['host']?>" style = "text-decoration: none;"><h4 style="color:gray !important;">가입 중</h4></a>
<?
						}
						else{
?>
							<a href="study_join.php?studyname=<?=$row['title']?>&host=<?=$row['host']?>" style = "text-decoration: none;"><h4 style="color:navy !important;">가입하기</h4></a>
<?
						}
					}
?>       
               </div>
            </div>
<?
            
         }

      }
   }

	function member_delete($_POST){
		global $db;

		$studyname = $_POST['studyname'];
		$host = $_POST['host'];
		$deletemember = $_POST['deletemember'];


		$query = "UPDATE studylist SET member3 = NULL ";
		$query.= "WHERE title = '".$studyname."' and host = '".$host."';";
		$result = mysql_query($query);

		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}

function timemark_new($id,$str)
{

	$arr = explode(",", $str);
	$connect = mysql_connect("203.252.182.152", "all", "apmsetup");
  	$db = mysql_select_db("mysheet", $connect);
	$query = "select sd_name from schedule where id='".$id."' ";
	for($k=0; $k<count($arr); $k++)
	{
		$query.=" and sd_time like '%".$arr[$k]."%' ";
	}
	$query.=";";
	echo $query;
	$results = mysql_query($query);
	if($results)
	{
		for($i=0;$i<mysql_num_rows($result);$i++){
			$row = mysql_fetch_array($result); 
			$schedule_id = $row['sd_name'];
		}
		return $schedule_id;
	}
	else
		return "f";
}
	function member_join($_GET){
		global $db;

		$studyname = $_GET['studyname'];
		$host = $_GET['host'];
		$joinmember = $_SESSION['id'];

		$sql = "insert into study_join (studyname,host,joinmember) ";
		$sql.= "values('".$studyname."','".$host."','".$joinmember."');";

		return mysql_query($sql);

	}
?>