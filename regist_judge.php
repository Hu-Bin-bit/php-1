
<?php
include_once("db.php");
$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

// var_dump($_POST);


$sql = "select * from reg where username='$username'";
$sth = $pdo->prepare($sql);
$sth->execute();


/*查询数据库中是否存在用户名相同的用户*/
if ($sth->rowCount()) {
    $flag = "户名冲突";/*存在用户名相同，即用户名冲突*/
} else if ($password1 != $password2) {
    $flag = 2;/*两次密码不相同*/
} else {/*插入数据进数据库*/
    $sql = "insert into reg (username,password) values ('$username','$password1')";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    session_start();/*打开会话，将用户名和昵称存起来*/
    $_SESSION['username'] = $username;
    $flag = '注册成功';/*注册成功标志*/
}


if($flag = '注册成功'){
    header('location:login-html.php');
}
else {
    echo $flag;
}

?>
