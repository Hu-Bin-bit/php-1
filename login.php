<?php
session_start();
$user = $_POST["username"];
$_SESSION["uesrname"] = $user; //session超全局变量
$pwd = $_POST["password"]; //获取密码
if ($user = "" || $pwd = "") {
	echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
} else {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php-10";

	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_query($conn, "set names utf8");
	$sql = "select username,password from reg where username = '$_POST[username]' and password = '$_POST[password]'";
	$result = mysqli_query($conn, $sql); //执行sql语句
	$num = mysqli_num_rows($result); //统计影响结果行数，作为判断条件
	if ($num) {
		echo "<script>alert('登录成功！');window.location='index.php';</script>"; //登录成功页面跳转  
	} else {
		echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
	}
}
