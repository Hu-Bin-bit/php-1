<?php

$id = $_GET['id'];
// echo($_GET['id']);
var_dump($id);


include('db.php');


$sql="DELETE FROM msg WHERE id= '$id'";
$sth = $pdo->prepare($sql);
$sth->execute();


header('location:index.php');
?>