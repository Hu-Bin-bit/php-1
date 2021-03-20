<?php
    session_start();

    if(isset($_SESSION['flag']) ){
        echo "<script type='text/javascript'>alert('用户名已存在')</script>";
        unset($_SESSION['flag']);
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
    <style type="text/css">
        label{width:80px;display:inline-flex;height:30px;}
        .registall{border:10x solid pink;width:600px;height:300px;margin:200px auto;border:2px solid pink;box-shadow:0 0 5px 0 #aaa; border-radius:30px;}
        .regist .submit{position:relative;left:115px;top:10px;width:75px;height:27px;}
        .regist {width:300px;margin:20px auto;}
        .registall .title{font-size:23px;color:pink;text-align:center;margin-bottom:20px;margin-top:38px;}
    </style>
    <script type="text/javascript">
    
        function judge(){
            var username = document.getElementById("username").value;
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
            /*判断数据合法*/
            if(username == ''||username.trim()=='') alert("用户名不能为空");
            else if(username.indexOf(" ")!=-1)    alert("用户名不能含有空格");
            else if(password1 == ''||password2==''||password1.trim()==''||password2.trim()=='')
                alert("密码不能为空");
            else if(password1 != password2)
                alert("两个密码必须一致");
            else if(password1.length<8) alert("密码长度不能少于8");
            else return true;
            return false;
        }
    </script>
</head>
    
<body>
    <div class="registall" >
        <div class="title">用户注册</div>
        <form class="regist" action="regist_judge.php" method="post" onsubmit="return judge();">
            <label>用户名:</label>          
            <input id="username"  name = "username" type="text" placeholder="输入您的用户名" /></br>
            <label>密码:</label>          
            <input id="password1" name = "password1" type="password" placeholder="密码的长度超过6"/></br>
            <label>确认密码：</label>     
            <input id="password2" name = "password2" type="password" placeholder="请再次输入密码"/></br>
            <input type="submit" value="注册" class="submit"/>
        </form>
     </div> 

</body>
</html>