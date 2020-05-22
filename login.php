<?php
	include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-image: url("judge.jpg");
		}
	</style>
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
		<link rel="stylesheet" type="text/css" href="css/login_style2.css">
</head>
<body>
		<div id="frm">
			<form action="check_login.php" method="post">
				Username:<input type="text" name="username"/><br><br>
				Password:<input type="password" name="password"/><br><br>
				<input id="button" type="submit" value="login">
				<a href="signup.php">Create new account!</a>
			</form>
		</div>
</body>
</html>