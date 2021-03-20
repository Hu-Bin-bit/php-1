<?php
include('db.php');
$sql = "SELECT * FROM msg ORDER BY id DESC";
$sth = $pdo->prepare($sql);
$sth->execute();

$rows = $sth->fetchALL();
// var_dump($rows);
?>


<?php
header('Content-type:text/html; charset=utf-8');
// 开启Session
session_start();


// 首先判断Cookie是否有记住了用户信息
if (isset($_COOKIE['username'])) {
  # 若记住了用户信息,则直接传给Session
  $_SESSION['username'] = $_COOKIE['username'];
  $_SESSION[''] = 1;
}
if (isset($_SESSION['username'])) {
  // 若已经登录
  echo "您好！ " . $_SESSION['username'] . ' ,欢迎来到个人中心!<br>';
  echo "<a href='login-html.php'>退出</a>";
} else {
  // 若没有登录
  echo "您还没有登录,请<a href='login-html.php'>登录</a>";
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>留言板</title>

</head>

<body style="background-color: #9ebbdf ">
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">我的留言板</h1>
      <p class="lead">欢迎来到这里</p>

    </div>
    <form action="save.php" method='post'>
      <div class='row'>
        <div class='col-12'>
          <textarea name='content' class='form-control' placeholder="说点什么......" rows="6" style="margin-bottom: 10px;"></textarea>
        </div>
        <div class='col-3'>
          <div class="form-group">
            <input class='username' name='username' placeholder="留言人" type='text'>
          </div>
        </div>
        <div class='col-9 d-flex'>
          <div class="form-group  ml-auto">
            <input class='btn btn-primary' type='submit' value='发表'>
          </div>
        </div>
      </div>
    </form>
    <div class='row'>
      <div class='col-12'>
        <?php
        include('list.php');
        foreach ($con as $key => $msg) {
        ?>
          <div class='border rounded p-2 mb-2'>
            <div class='text-primary'><?Php echo $msg['username']; $id = $msg['id'];  ?></div>
            <div><?php echo $msg['content']; ?></div>
          </div>
          <div style="display: flex;">
            <button type="button"><a href="del.php?id=<?php echo $id ?>">删除</a></button>
            <button type="button"><a href="edt.php?id=<?php echo $id ?>">编辑</a></button>
          </div>
          <div class='border rounded p-2 mb-2'>
            <div>
              <p style="color: blue;">回 复 内 容 :</p> <?php echo $msg['view'] ?>
            </div>
          </div>
          <form action="view.php" method="post">
            <div>
              <input name="view" type="text" class='form-control'>
            </div>
            <div>
              <input type="hidden" name="id" value="<?php echo $id ?>">
              <input class='btn btn-primary' type='submit' value='回复'>
            </div>
          </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php include('list.php');?>
  <div style="display:flex;justify-content: center;">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="?page=1" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php
        for ($i = 1; $i <= $totalpage; $i++) {
        ?>
          <li class="page-item"><a class="page-link" href="?page = $i"><?= $i ?></a></li>
        <?php } ?>
        <li class="page-item">
          <a class="page-link" href="?page=$totalpage" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</body>

</html>