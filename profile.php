<?php
	include 'connect_db.php';
  session_start();

  $username= $_SESSION['username'];

	$qry = "SELECT * FROM clients";
  $res = $db_connect->query($qry) or die('bad query');
	$flage = 0;
	while($row = $res->fetch_assoc()) {
        if(($row["username"]==$username)){
       		$flage = 1;
       		break;
       	 }			
  }

  if($flage == 0){
    $qry2 = "SELECT * FROM lawers";
    $res2 = $db_connect->query($qry2) or die('bad query');
    while($row2 = $res2->fetch_assoc()) {
      if(($row2["username"]==$username)){
        $flage = 2;
        break;
      }          
    } 
  }

  if($flage==1){
    header("location: profileClient.php");
  }
  else{ 
    header("location: profileLawer.php");
  }
    
?>