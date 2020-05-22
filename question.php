<?php
	include 'connect_db.php';
	session_start();

	if($_POST) {
		$question_categories = $_POST['question_categories'];
		echo "$question_categories"."<br>";
		$username = $_SESSION['username'];
		echo "$username"."<br>";
		$tdate = $_POST['tdate'];
		echo "$tdate"."<br>";
		$question = $_POST['question'];
		echo "$question"."<br>";
		$qry1 = "INSERT INTO questions(username, question_categories, tdate, question)
		VALUES('$username', '$question_categories', '$tdate', '$question')";
		$ress = $db_connect->query($qry1) or die('INSERTION failed');
		//header('Location:request_list.php');
	}
	else{
		header('Location:login.php');
	}
	
?>