<!DOCTYPE HTML>
<!-- saved from url=(0060)http://106.14.181.49:90/game.html -->
<!DOCTYPE html PUBLIC "" ""><HTML><HEAD>
    <script type="text/javascript">

        var mobileAgent = new Array("iphone", "ipod", "ipad", "android", "mobile", "blackberry", "webos", "incognito", "webmate",
　　　　　　 "bada", "nokia", "lg", "ucweb", "skyfire");
        var browser = navigator.userAgent.toLowerCase();
        var isMobile = false;
        for (var i=0; i<mobileAgent.length; i++) {
            if (browser.indexOf(mobileAgent[i])!=-1) {
                isMobile = true;
                alert("浏览器打开效果会更好")
                location.href = 'http://121.41.11.144/mindex.php';
                break;
            }
        }
</script>
    
    <META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
<script language="javascript">
  function upload(){
    // console.log(this.StorageManager.getBestScore);
    var nickname = prompt("提交当前分数\n请输入你的英文昵称","");
      
    if(nickname){
      var httpRequest = new XMLHttpRequest();//第一步：创建需要的对象
      httpRequest.open('POST', 'upload.php', true); //第二步：打开连接
      httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");//设置请求头 注：post方式必须设置请求头（在建立连接后设置请求头）
      httpRequest.send('name='+nickname+'&score='+ window.localStorage['bestScore']);//发送请求 将情头体写在send中
      /**
       * 获取数据后的处理程序
       */
      httpRequest.onreadystatechange = function () {//请求后的回调接口，可将请求成功后要执行的程序写在其中
          if (httpRequest.readyState == 4 && httpRequest.status == 200) {//验证请求是否发送成功
              var json = httpRequest.responseText;//获取到服务端返回的数据
              console.log(json);
              if(json!="提交失败"){
                  if(json <= 15){
                  	 alert("上传成功，您的当前排名为："+json+"\n恭喜您成功在排行榜上留下足迹！\n我们等你，突围而来~");
                  }
                  else{
                     alert("上传成功，您的当前排名为："+json);
                  }
              }
              location.reload();
          }
      };
    }
  }
  var httpRequest = new XMLHttpRequest();//第一步：建立所需的对象
        httpRequest.open('GET', 'load2048.php', true);//第二步：打开连接  将请求参数写在url中  ps:"./Ptest.php?name=test&nameone=testone"
        httpRequest.send();//第三步：发送请求  将请求参数写在URL中
        /**
         * 获取数据后的处理程序
         */
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                var jsonData = httpRequest.responseText;//获取到json字符串，还需解析
                console.log("数据库数据获取");
                console.log(jsonData);
                console.log("数据读取测试1");
                console.log(jsonData[2]);

                var jsonData = eval("(" + jsonData + ")");//json为接收的后台返回的数据；
                console.log("数据读取测试2");
                console.log(jsonData[2]);

                var length = Object.keys(jsonData).length;
                 console.log("length:"+length);
                 var tableObj = document.getElementById("table");
                 for (var i = 0; i < tableObj.rows.length; i++) {    //遍历Table的所有Row
                 for (var j = 1; j < tableObj.rows[i].cells.length; j++) {   //遍历Row中的每一列
                 console.log(tableObj.rows[i].cells[j].innerText)
               }
           }
          
                for(let i = 1; i <= length; i++){
                  var nm = "top"+i+"name";
                  var sc = "top"+i+"score";
                  document.getElementById(nm).innerHTML = jsonData[i].name;
                  document.getElementById(sc).innerHTML = jsonData[i].score;
                }

            }
        };
</script>
<META charset="utf-8">   <TITLE>2048特别版</TITLE>   <LINK href="2048特别版_files/main.css" 
rel="stylesheet" type="text/css">   <LINK href="favicon.ico" 
rel="shortcut icon">   <LINK href="meta/apple-touch-icon.png" rel="apple-touch-icon"> 
  <LINK href="meta/apple-touch-startup-image-640x1096.png" rel="apple-touch-startup-image" 
media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"> 
<!-- iPhone 5+ -->   <LINK href="meta/apple-touch-startup-image-640x920.png" 
rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"> 
<!-- iPhone, retina -->   
<META name="apple-mobile-web-app-capable" content="yes">   
<META name="apple-mobile-web-app-status-bar-style" content="black">   
<META name="HandheldFriendly" content="True">   
<META name="MobileOptimized" content="320">   
<META name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui"> 
<META name="GENERATOR" content="MSHTML 11.00.10570.1001"></HEAD> 
<BODY>
<DIV class="container" style="margin-right:600px;">
<DIV class="heading">
<H1 class="title" style="font-size:60px;">浙大职协SCDA</H1>
<DIV class="scores-container" style="margin-top: 15px;">
<DIV class="score-container">0</DIV>
<DIV class="best-container">0</DIV></DIV></DIV>
<DIV class="above-game" style="margin-top: 30px;">
<P class="game-intro"> <STRONG>为了你的明天，我们一直在努力</STRONG></P><A
class="restart-button">走近职协</A><button onclick="upload();" class="restart-button" style="font-weight:bold; font-size:18px;margin-right:10px;border: 0;">提交</button></DIV>
<DIV class="game-container">
<DIV class="game-message">
<P></P>
<DIV class="lower"><A class="keep-playing-button">继续</A>           <A class="retry-button">再试一次</A> 
        </DIV></DIV>
<DIV class="grid-container">
<DIV class="grid-row">
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV></DIV>
<DIV class="grid-row">
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV></DIV>
<DIV class="grid-row">
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV></DIV>
<DIV class="grid-row">
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV>
<DIV class="grid-cell"></DIV></DIV></DIV>
<DIV class="tile-container"></DIV></DIV>


<div style="position: absolute; left: 69%;top: 15%; width: 250px;height: 900px; ">

  <div align="center">
    <label   style="font-weight: bold; font-size: 30px; text-align: center;">排&nbsp行&nbsp榜</label>

  </div>
  <div align="center" style="margin-top: 6%;height: 730px;">
    <div align="center" style="border-radius: 10px; width: 220px; height: 40px; margin-top: 10%; background-color: rgba(31,98,154,0.9);" >
      <div style="width: 40px;height: 40px; float: left;  margin-left: 5%;">
        <img src="images/No1.png" width="40px" >
        
      </div>
      <div style="width: 80px;height: 40px; float: left;  margin-top: 2.5%; margin-left: 7%; font-size: 20px; font-weight: bold;color: rgb(255,215,0);" >
        <p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><label id="top1name">*****</label></p>
      </div>
      <div style="width: 40px;height: 40px; float: left;  margin-top: 5%; margin-left: 8%; font-size: 19px; color: red;" >
        <label id="top1score">***</label>
      </div>
    </div>
    <div align="center" style="border-radius: 10px; width: 220px; height: 40px; margin-top: 10%; background-color: rgba(31,98,154,0.9);" >
      <div style="width: 40px;height: 40px; float: left;  margin-left: 5%; margin-top: 1%;">
        <img src="images/No2.png" width="29px" >
        
      </div>
      <div style="width: 80px;height: 40px; float: left;  margin-top: 2.5%; margin-left: 7%; font-size: 20px; font-weight: bold;color: rgb(233,233,216);" >
        <p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><label id="top2name">******</label></p>
      </div>
      <div style="width: 40px;height: 40px; float: left;  margin-top: 5%; margin-left: 8%; font-size: 19px; color: red;" >
        <label id="top2score">***</label>
      </div>
    </div>
    <div align="center" style="border-radius: 10px; width: 220px; height: 40px; margin-top: 10%; background-color: rgba(31,98,154,0.9);" >
      <div style="width: 40px;height: 40px; float: left;  margin-left: 5%; margin-top: 1.5%;">
        <img src="images/No3.png" width="32px" >
        
      </div>
      <div style="width: 80px;height: 40px; float: left;  margin-top: 2.5%; margin-left: 7%; font-size: 20px; font-weight: bold;color: rgb(180,110,64);" >
        <p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><label id="top3name">******</label></p>
      </div>
      <div style="width: 40px;height: 40px; float: left;  margin-top: 5%; margin-left: 8%; font-size: 19px; color: red;" >
        <label id="top3score">***</label>
      </div>
      <table style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px;  color: rgb(249,246,242);" cellspacing="0" >
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">4</td>
          <td id="top4name" style="width: 91px; text-align: center;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">******</td>
          <td id="top4score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">5</td>
          <td id="top5name" style="width: 91px; text-align: center;">******</td>
          <td id="top5score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">6</td>
          <td id="top6name" style="width: 91px; text-align: center;">******</td>
          <td id="top6score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">7</td>
          <td id="top7name" style="width: 91px; text-align: center;">******</td>
          <td id="top7score" style="text-align: center;">***</td
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">8</td>
          <td id="top8name" style="width: 91px; text-align: center;">******</td>
          <td id="top8score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">9</td>
          <td id="top9name" style="width: 91px; text-align: center;">******</td>
          <td id="top9score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">10</td>
          <td id="top10name" style="width: 91px; text-align: center;">******</td>
          <td id="top10score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">11</td>
          <td id="top11name" style="width: 91px; text-align: center;">******</td>
          <td id="top11score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">12</td>
          <td id="top12name" style="width: 91px; text-align: center;">******</td>
          <td id="top12score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">13</td>
          <td id="top13name" style="width: 91px; text-align: center;">******</td>
          <td id="top13score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">14</td>
          <td id="top14name" style="width: 91px; text-align: center;">******</td>
          <td id="top14score" style="text-align: center;">***</td>
        </tr>
        <tr style="height: 12px"></tr>
        <tr style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
          <td style="width: 59px; text-align: center;">15</td>
          <td id="top15name" style="width: 91px; text-align: center;">******</td>
          <td id="top15score" style="text-align: center;">***</td>
        </tr>


      </table>
    </div>
    <!-- <div align="center" style="width: 220px; height: 30px; margin-top: 5%;border-radius: 10px; background-color: rgba(129,180,225,0.8);" >
      <label >第一</label>
    </div> -->
    

    
    

    

  </div>

</div>


<HR>

<P><STRONG class="important">Note:为浙大职协SCDA纳新而作
    </br>词条帮助你更好了解职协
<HR>
</A></DIV><A href="http://git.io/2048">
<SCRIPT src="2048特别版_files/bind_polyfill.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/classlist_polyfill.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/animframe_polyfill.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/keyboard_input_manager.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/html_actuator.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/grid.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/tile.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/local_storage_manager.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/game_manager.js"></SCRIPT>
   
<SCRIPT src="2048特别版_files/application.js"></SCRIPT>
 </A></BODY></HTML>
    
    <div id="bottom" align="center">
    <div>
      <label style="width: 600px; text-align: center;">联系邮箱：wangwenjing07@zju.edu.cn</label>
    </div>
    <div>
      <label style="width: 600px; text-align: center;">联系电话：13918603473</label>
    </div>
    
  </div>

        
