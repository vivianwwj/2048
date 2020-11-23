# 2048-web
a special version of 2048 for zju_SCDA 
打开http://www.zjuscda.com/index.php 可以体验
  
服务器用的是阿里的，具体配置流程如下：  
所需工具  
xshell、xftp、idea(非必要，notepad)也可  
文件路径图片:   ![Image text](https://uploader.shimo.im/f/touaV9CTHqoyxIns.png)
https://uploader.shimo.im/f/touaV9CTHqoyxIns.png  
相关账号  
服务器 密码  
域名：www.zjuscda.com  
数据库MySql：账号：root 密码  
如何修改  
4.1前端显示  
1.修改文件：index.php、20482048特别版_files\main.css（浏览器版本）、mmain.css（安卓没有排行榜版本）  
4.2游戏图片更替  
1.链接  
图片需转换为base64  
http://tool.chinaz.com/tools/imgtobase  
2.替换部分  
图片: https://uploader.shimo.im/f/plJNguEoJxwJXvzD.png  
3.注意事项  
图片: https://uploader.shimo.im/f/QBI19ZQZFBcTF2fN.png  
这样的图片即使更替也会显示不出  
图片: https://uploader.shimo.im/f/4QDxt93xFXIwft4G.png  
这样才是可以使用的   

如何部署  
(一开始是裸机，所以要进行部署，部署完的跳过这一步)  
5.1参考链接  
https://www.cnblogs.com/AGoodDay/p/10686779.html  
防丢备份：  
开发环境安装的详细步骤如下：  
（1）更新安装包镜像  
sudo apt-get update  
（2）安装Apache  
sudo apt-get install apache2  
检测是否安装成功：浏览器访问http://Ubuntu的IP，出现It Works!网页。成功访问的网页效果如下：  
图片: https://uploader.shimo.im/f/oUQwn3sECKQrM2Xl.png  
可能出现的问题：本地主机浏览器无法访问服务器地址，问题分类和解决方法如下：  
1.外网主机ping服务器地址无响应，解决方法：服务器添加全部ICMP可访问的端口如下  
图片: https://uploader.shimo.im/f/lu0l1q6UOT85J1Py.png  
2.外部IP浏览器无法访问http://Ubuntu的IP，解决方法：服务器开放80（HTTP）端口。
(添加安全组的链接：https://ecs.console.aliyun.com/?spm=5176.12818093.my.decs.488716d0PPggN7#/securityGroupDetail/region/cn-hangzhou/groupId/sg-bp184qqwvmiwfomncprr/rule/intranetIngress)
图片: https://uploader.shimo.im/f/gZirb2Rm7GAbI63G.png  
 
（3）安装mysql  
sudo apt-get install mysql-server mysql-client  
（4）安装php   
sudo apt-get install php7.0  
测试：php7.0 -v  
（5）安装其他模块  
sudo apt-get install libapache2-mod-php7.0  
sudo apt-get install php7.0-mysql  
重启apache2和mysql服务：  
service apache2 restart  
service mysql restart  
测试Apache能否解析PHP（在终端中用vim编写phpinfo.php文件，并在外网主机浏览器上检测是否可以访问），具体步骤如下：  
vim /var/www/html/phpinfo.php  
在文件中写入：<?php echo phpinfo();?>  
浏览器访问：http://ubuntu地址/phpinfo.php，出现PHP Version网页如下：  
图片: https://uploader.shimo.im/f/q7u1KkydyfoA1Nvo.png  
（6）修改权限  
sudo chmod 777 -R /var/www(非管理员)  
chmod 777 -R /var/www(管理员)  
（7）安装phpMyAdmin  
sudo apt-get install phpmyadmin  
安装过程中要选择apache2，并配置关联数据库密码：  
图片: https://uploader.shimo.im/f/K3sci4pAFE8JwO42.png  
图片: https://uploader.shimo.im/f/8Fn8YbJYw2MKmm0r.png  
创建phpMyAdmin快捷方式：  
 
sudo ln -s /usr/share/phpmyadmin /var/www/html  
启用Apache mod_rewrite模块：   
sudo a2enmod rewrite  
重启服务：   
service php7.0-fpm restart  
 service apache2 restart  
测试方法：浏览器访问：http://ubuntu地址/phpmyadmin，效果如下：  
 
图片: https://uploader.shimo.im/f/qHPQWLaMkz0R8mai.png  
（8）配置Apache  
 vim /etc/apache2/apache2.conf  
在文件中加入下面语句：  
 AddType application/x-httpd-php .php .htm .html  
AddDefaultCharset UTF-8  
图片: https://uploader.shimo.im/f/MF01suYLFX0JLKRm.png  
重启Apache服务：  
 service apache2 restart  
数据库相关     
6.2ECS安全组设置  
https://blog.csdn.net/museions/article/details/90475960  
3306端口为MySql访问端口  
图片: https://uploader.shimo.im/f/SFbXadN10bskh7Sx.png  
6.1数据库权限  
设置为公开可读  
具体操作  
见链接https://www.cnblogs.com/zou-zou/p/9661422.html  
1.更新系统，如果不运行该命令，直接安装mysql,会出现"有几个软件包无法下载  
sudo apt-get update  
2.安装mysql  
sudo apt-get install mysql-server mysql-client  
安装时候需要输入密码，密码是root用户的密码  
3.安装成功后可以通过下面的命令测试是否安装成功：  
sudo netstat -tap | grep mysql  
出现如下信息证明安装成功：  
图片: https://uploader.shimo.im/f/A0InrANlrAYnq3TM.png  
4.登录mysql，进行授权  
mysql -u root -p  
输入密码  
进入mysql服务，执行授权命令：  
grant all on *.* to root@'%' identified by '你的密码' with grant option;  
flush privileges;  
5.设置数据库允许外网访问  
首先编辑文件/etc/mysql/mysql.conf.d/mysqld.cnf：  
sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf  
注释掉bind-address = 127.0.0.1：  
图片: https://uploader.shimo.im/f/GlQGye79MI8WhFFo.png  
 保存退出，重启mysql，执行命令sudo service mysql restart  
6.在本地实用数据库连接工具进行连接测试  
图片: https://uploader.shimo.im/f/uysxXbndeAAJfZC9.png  
   
具体可通过SQLyog（等任何windows端数据库连接工具）访问ip地址，是否看连得上数据库进行判断  
6.3数据库  
经过部署后，可以通过ip/phpmyadmin访问，其中id设置为自增非空  
图片: https://uploader.shimo.im/f/4GghiAnfoXoOeScq.png  

6.4代码相关  
主要修改load2048.php和upload2048.php数据库连接语句和对应数据库/表/列名  
图片: https://uploader.shimo.im/f/PUz7E2gWoUI0bJRJ.png  
