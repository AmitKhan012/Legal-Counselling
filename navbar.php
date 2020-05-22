<?php
	include 'connect_db.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
</head>
<body>
	<header id="main-header">
		<div class="container">
			<h1>Legal Counseling</h1>
		</div>
	</header>

	<nav id="navbar">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
				<?php
					if( isset($_SESSION['username']) AND !empty($_SESSION['username']) ){
				?>
				<li><a href="logout.php" class="float-right">Log out</a></li>
				<li><a href="profile.php" class="float-right"><?php echo $_SESSION['username'];?></a></li>
				<?php	} else{ ?>
				<li><a href="signup.php" class="float-right">Sign up</a></li>
				<li><a href="login.php" class="float-right">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</body>
</html>