<?
//ini_set('memory_limit','192M');
   if(!isset($_SESSION)){session_start();}
   include("db.php");
   ensure_logged_in();
  
   $id = $_SESSION["id"];
   $sd_name = $_POST['sd_name'];
   $starttime=$_POST['starttime'];
   $endtime=$_POST['endtime'];
   $a=","; 
   for($i=$starttime; $i<$endtime; $i++){
      $a .= $i.",";
   }
   

   $sd_time=$_POST['dayoftheweek'].$a.$_POST['endtime'];
   // echo $id;
   // echo $sd_name;
   //echo $sd_time;

   edittimetable($id,$sd_name,$sd_time);
?>
<script>
      alert("등록 되었습니다.");
      document.location.href="timemark.php";
</script>