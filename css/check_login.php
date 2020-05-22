<?php
		
	$username= $_POST['username'];
	$password= $_POST['password'];
		
	$qry = "SELECT * FROM user_info";
	$res = $db_connect->query($qry) or die('bad query');
	$flage = 0;
	while($row = $res->fetch_assoc()) {
       	 if(($row["username"]==$username) && ($row["password"]==$password)){
    	//echo $username."<br>" ;
     	 	$flage = 1;
       	 	break;
    	}
				
					
    }	
    if($flage==1){
    	$_SESSION['username'] = $username;
    	include 'index.php';
    }

   	else
	    echo "username or password incorrect<br>";	
?>