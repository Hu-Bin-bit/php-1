<?php
include('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM msg WHERE id = $id";
$sth = $pdo->prepare($sql);
$sth->execute();


$rows = $sth->fetchALL();
// var_dump($rows);



?>

<html>


<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body style="background-color: #9ebbdf ">
    <form action="update.php" method="post">
        <div class='col-12'>
        <?php
        foreach ($rows as $key => $msg) {
        ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <textarea name='content' class='form-control' rows="6" style="margin-bottom: 10px;margin-top:10px">
              <?php echo $msg['content']  ?>
            </textarea>

        <?php
        }
        ?>
        </div>
        <div class="form-group  ml-auto">
            <p style="text-align: center;"> <input class='btn btn-primary' type='submit' value='编辑'></p>
        </div>
        </from>
</body>

</html>