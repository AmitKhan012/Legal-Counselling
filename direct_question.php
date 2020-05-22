<?php
	include 'connect_db.php';
	session_start();

//	if( isset($_SESSION['username']) AND !empty($_SESSION['username']) ){echo $_SESSION['username']; }
	// condition: isset($_SESSION['username']) AND !empty($_SESSION['username'])

	if($_POST) {
		$clientName = $_SESSION['username'];
		echo "$clientName"."<br>";
		$lawerName = $_POST['lawerName'];
		echo "$lawerName"."<br>";
		$question = $_POST['question'];
		echo "$question"."<br>";
		$qry1 = "INSERT INTO directq(clientName, lawerName, question)
		VALUES('$clientName', '$lawerName', '$question')";
		$ress = $db_connect->query($qry1) or die('INSERTION failed');
		header('Location:clientPanel.php');
	}
	else{
		header('Location:view_profile.php');
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
?>