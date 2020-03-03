<?php
  $str = file_get_contents('php://input');
  $params = explode('&', $str);
  $name = explode('=', $params[0])[1];
  $score = explode('=', $params[1])[1];
  
 $conn = new mysqli('121.41.11.144','root','zjuSCDA2003','SCDA2020');
    if ($mysqli->connect_error) {
      echo '<script language="JavaScript">;alert("提交，请检查网络状态...");location.href="comdetinf.php";</script>;';
      return;
    }
  mysqli_select_db($conn,"rankList2048");
  $sql="insert into rankList2048(name,score) values('".$name."','".$score."')";
  if (score>100000) {
      echo "取消报名资格😀";
  		return;
  }
  $rs=mysqli_query($conn,$sql); 
  if($rs){
	
  }

$sql="select count(*) as rank from rankList2048 where score > '".$score."'";

  $rs=mysqli_query($conn,$sql); 
  if($rs){
    $row = mysqli_fetch_array($rs);
        // if($row != null)
        $rank = $row['rank']+1;
        echo $rank;
  }   


 if ($conn){mysqli_close($conn);}
?>
