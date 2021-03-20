<?php

$link = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($link, "php-10");
$query = "select * from msg";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) < 1) {
  echo " 目前数据表中还没有任何留言!";
} else {
  $totalnum = mysqli_num_rows($result); //获取数据库中所有数据条数

  // var_dump($totalnum);
  $pagesize = 5; //每页显示5条
  // $page = $_GET['page'];
  $page = 1;
  if ($page == "") {
    $page = 1;
  }
  $begin = ($page - 1) * $pagesize;
  $totalpage = ceil($totalnum / $pagesize);
  //输出分页信息

  $con = array_slice($rows,$begin,$pagesize,true);
  //  // 上一页
  // $pagePrev = $page - 1 <= 1 ? 1 : ($page - 1);
  // // 下一页
  // $pageNext = $page + 1 >= $totalpage ? $totalpage : ($page + 1) ;

  $datanum = mysqli_num_rows($result);
  //从message表中查询当前页面所要显示的留言，并根据时间排序
  $query = "select * from msg order by id desc limit $begin,$pagesize";
  $result = mysqli_query($link, $query);
  $datanum = mysqli_num_rows($result);
  //循环输出所有留言，如果管理员已经回复则同时输出回复
  for ($i = 1; $i <= $datanum; $i++) {
    $info = mysqli_fetch_array($result);
  } 
}
mysqli_close($link);


