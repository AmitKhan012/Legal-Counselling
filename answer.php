<?php
	include 'connect_db.php';
	session_start();

//	if( isset($_SESSION['username']) AND !empty($_SESSION['username']) ){echo $_SESSION['username']; }
	// condition: isset($_SESSION['username']) AND !empty($_SESSION['username'])

	if($_POST) {
		$queId = $_POST['queId'];
		$lawerName = $_SESSION['username'];
		$ans = $_POST['ans'];
		$qry1 = "INSERT INTO answers(lawerName, queId, ans)
		VALUES('$lawerName', '$queId', '$ans')";
		$ress = $db_connect->query($qry1) or die('INSERTION failed');
		$qry2 = "SELECT username FROM questions WHERE id = $queId";
		$result = $db_connect->query($qry2) or die('Query Execution failed');
		$row = $result->fetch_assoc();
		$client = $row['username'];
		$qry3 = "INSERT INTO recommendation(client, lawer)
		VALUES('$client', '$lawerName')";
		$result2 = $db_connect->query($qry3) or die('INSERTION failed for recommendation');
		header('Location: lawerPanel.php');
	}
	else{
		header('Location:answer_form.php');
	}
	/*$qry1 = "SELECT * FROM user_info";
	$check = $db_connect->query($qry1) or die('bad query');
	$f1 = 0;
	while($row = $check->fetch_assoc()) {
     	if(($row["username"]==$username)){
       	//echo $username."<br>" ;
       		$f1 = 1;
       		break;
       	}			
    }	
   	if($f1==1)
    	echo "This username already exist";
    else{
		$qry = "INSERT INTO user_info(first_name,last_name, username, password, contract_number, email, blood_group)
		VALUES('$first_name', '$last_name', '$username', '$password', '$contract_number', '$email', '$blood_group')";
		$res = $db_connect->query($qry) or die('bad query');
		$_SESSION['username'] = $username;
		header("location: index.php");

	}*/
	/* this portion is for recommendation 
	$qry2 = "SELECT username FROM questions WHERE id = $queId";
		$result = $db_connect->query($qry2) or die('Query Execution failed');
		$row = $result->fetch_assoc();
		$client = $row['username'];
		$qry3 = "INSERT INTO recommendation(client, lawer)
		VALUES('$client', '$lawerName')";
		$result2 = $db_connect->query($qry3) or die('INSERTION failed for recommendation');
	*/
?>