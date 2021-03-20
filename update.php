<?php

$content = $_POST['content'];
$id = $_POST['id'];


var_dump($content);
include('db.php');

$sql="UPDATE msg SET  content = '$content' WHERE id = '$id' ";
// print($sql);
$sth = $pdo->prepare($sql);
$sth->execute();

header('location:index.php');
?>