<?php

// $dbms='mysql'; 
// $host='localhost'; 
// $dbName='php-10';    
// $user='root';      
// $pass='';       
// $dsn="$dbms:host=$host;dbname=$dbName";

// $dbh = new PDO($dsn, $user, $pass); 

// try {
//     $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//     // echo "连接成功<br/>";
//     /*你还可以进行一次搜索操作
//     foreach ($dbh->query('SELECT * from FOO') as $row) {
//         print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
//     }
//     */
//     $dbh = null;
// } catch (PDOException $e) {
//     die ("Error!: " . $e->getMessage() . "<br/>");
// }
// //默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
// $db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

$dsn = 'mysql:dbname=php-10;host=127.0.0.1;charset=utf8mb4';
$pdo = new PDO($dsn,'root','');

?>
