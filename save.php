<?php
$content = $_POST['content'];
$username = $_POST['username'];
// var_dump($_POST);

var_dump($content,$username);


if ( trim($content) == '' or trim($username) == '' ){
    echo ('留言内容或用户名不能为空');
    exit;
}

if ( $username =='root' || $username =='admin' || $username =='领导人'){
    echo ('用户名不能为敏感词');
    exit;
}


include('db.php');
// $pdo->query("INSERT INTO msg (username,content) VALUES ('{$username}','{$content}')");
$sql = "INSERT INTO msg (username,content,view) VALUES ('{$username}','{$content}','')";
$sth = $pdo->prepare($sql);
$sth->execute();

header('location:index.php');
?>