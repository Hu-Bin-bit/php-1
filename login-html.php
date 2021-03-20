

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body style="background-color: #9ebbdf ">

	<h3 style="text-align: center;">用户登录</h3>
	<form action="login.php" method="post">
		<fieldset  style="align-content: center;">
			<legend>用户登录</legend>
			<ul> 
				<li>
					<label>用户名:</label>
					<input type="text" name="username" placeholder="请输入用户名">
				</li>
				<li>
					<label>密 码:</label>
					<input type="password" name="password" placeholder="请输入密码">
				</li>
				<li>
					<label> </label>
					<input type="submit" name="login" value="登录">
					<a href="register.php"><input type="button" value="注册"></a>
				</li>
			</ul>
		</fieldset>
	</form>
</body>

</html>