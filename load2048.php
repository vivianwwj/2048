<?php
  $conn = new mysqli('121.41.11.144','root','zjuSCDA2003','SCDA2020');
    if ($mysqli->connect_error) {
        exit($mysqli->connect_error);
    }else{
         echo '<script language="JavaScript">;alert("数据库连接成功");</script>;';
        }
  mysqli_select_db($conn,"rankList2048");

  $sql="select * from rankList2048 order by score desc limit 15";
  $arr = array();
  $rs=mysqli_query($conn,$sql);
  $count = 1;
  if($rs){  
      while($row = mysqli_fetch_array($rs))
      {
        
        // echo var_dump($row);
        // 需要在这里把输入框的值都赋上去,最好把所有的输入框做一个锁定状态
        $arr[$count]['name']=$row['name'];
        $arr[$count]['score']=$row['score'];
        $count = $count + 1;
      }
   }else{  
    echo '<script language="JavaScript">;alert("请检查网络状态...");location.href="index.php";</script>;';
   }   
exit(json_encode($arr));
 if ($conn){mysqli_close($conn);}
?>