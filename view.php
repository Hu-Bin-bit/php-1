<?php

$view = $_POST['view'];

$id = $_POST['id'];



include('db.php');

$sql = "UPDATE msg SET  view = '$view' WHERE id = '$id' ";
print($sql);
$sth = $pdo->prepare($sql);
$sth->execute();


header('location:index.php');
?>