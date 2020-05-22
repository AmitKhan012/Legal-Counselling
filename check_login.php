<?php
	include 'connect_db.php';
  session_start();
  //include 'index.php';
 // header("location: index.php");
  $username= $_POST['username'];
	$password= $_POST['password'];

	$qry = "SELECT * FROM clients";
  $res = $db_connect->query($qry) or die('bad query');
	$flage = 0;
	while($row = $res->fetch_assoc()) {
        if(($row["username"]==$username) && ($row["password"]==$password)){
       		$flage = 1;
       		break;
       	 }
				
					
  }	
  if($flage == 0){
    $qry2 = "SELECT * FROM lawers";
    $res2 = $db_connect->query($qry2) or die('bad query');
    while($row2 = $res2->fetch_assoc()) {
      if(($row2["username"]==$username) && ($row2["password"]==$password)){
        $flage = 2;
        break;
      }          
    } 

    }

    if($flage==1){
    	$_SESSION['username'] = $username;
      $_SESSION['admin'] = "admin"; 
      header("location: clientPanel.php");
    }
    elseif ($flage == 2) {
      $_SESSION['username'] = $username;
      $_SESSION['admin'] = "admin"; 
      header("location: lawerPanel.php");
    }
    else{
      header("location: login.php");
    }
    
?>