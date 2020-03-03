<!DOCTYPE HTML>
<!-- saved from url=(0060)http://106.14.181.49:90/game.html -->
<!DOCTYPE html PUBLIC "" ""><HTML><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
   <script language="javascript">
  function upload(){
    // console.log(this.StorageManager.getBestScore);
    var nickname = prompt("提交当前分数\n请输入你的英语昵称","");
      
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
              // console.log(json);
              if(json!="提交失败")
                  if(json <= 15){
                  	 alert("上传成功，您的当前排名为："+json+"\n恭喜您成功在排行榜上留下足迹！\n我们等你，突围而来~");
                  }
                  else{
                     alert("上传成功，您的当前排名为："+json);
                  }
              location.reload();
          }
      };
    }
  }
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
