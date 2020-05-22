<?php
	include 'connect_db.php';
	session_start();

	if($_POST) {
		$queId = $_POST['queId'];
		$lawerName = $_SESSION['username'];
		$ans = $_POST['ans'];
		$qry1 = "INSERT INTO directa(lawerName, queId, ans)
		VALUES('$lawerName', '$queId', '$ans')";
		$ress = $db_connect->query($qry1) or die('INSERTION failed');
		header('Location: profile.php');
	}
	else{
		header('Location:direct_answer_form.php');
	}
?>