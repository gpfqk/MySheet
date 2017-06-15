<?
//ini_set('memory_limit','192M');
   if(!isset($_SESSION)){session_start();}
   include("db.php");
   ensure_logged_in();
      $id = $_SESSION['id'];   
      $study = $_GET['title'];
      $day = $_GET['day'];
      $start = $_GET['start'];
      $end =  $_GET['end'];

choochun($id,$study,$start,$end,$day);

?>
<script>
      alert("등록 되었습니다.");
      document.location.href="result.html";
</script>