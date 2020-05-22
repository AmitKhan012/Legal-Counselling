<?php
	include 'navbar.php';
	if($_POST)                         // if form is submitted
    {
        //not empty
        //atleast 6 characters long

        $errors = array();

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //start validation
        if(empty($_POST['first_name']))
        {
            $errors['first_name'] = "Your first name cannot be empty";
        } 
        else
        {
        	$first_name = test_input($_POST["first_name"]);
        } 
        if(empty($_POST['last_name']))
        {
            $errors['last_name'] = "Your last name cannot be empty";
        } 
        else
        {
        	$last_name = test_input($_POST["last_name"]);
        }  
        if(empty($_POST['username']))
        {
            $errors['username'] = "Username cannot be empty";
        } 
        else
        {
        	$username = test_input($_POST["username"]);
        }   
   

        if(empty($_POST['password']))
        {
            $errors['password1'] = "Password cannot be empty";
        }
        if(strlen($_POST['password']) < 8)
        {
            $errors['password2'] = "Password must be atlest 8 characters long";
        }

        if (empty($_POST["email"]))
        {
            $errors['email1'] = "Email is required";
        }
        else 
        {
            $email = test_input($_POST["email"]);
               
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email2'] = "Invalid email format"; 
            }
        }

        //check errors
        if(count($errors) == 0)
        {
            //redirect to success pages
           // header("Location: registration.php");
           // exit();
        	session_start();
			include 'connect_db.php';
			//$first_name= $_POST['first_name'];
			//$last_name= $_POST['last_name'];
			//$username= $_POST['username'];
			$password= $_POST['password'];
			$contract_number= $_POST['contract_number'];
			//$email= $_POST['email'];
			$gender= $_POST['gender'];

			$qry1 = "SELECT * FROM clients";
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
		    	//echo "heellll yeahhh";
				$qry = "INSERT INTO clients(first_name, last_name, username, password, contract_number, email, gender)
				VALUES('$first_name', '$last_name', '$username', '$password', '$contract_number', '$email', '$gender')";
				$res = $db_connect->query($qry) or die('bad query');
				$_SESSION['username'] = $username;
				header("location: clientPanel.php");

			}

        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index_style.css">
</head>
<body>

	<div id="frm">
			<form method="post" target="">
				<table>
					<tr>
						<th>First Name:</th>
						<th><input type="text" id = "first_name" name="first_name" placeholder="Enter first name" /></th>
						<th><p><?php if(isset($errors['first_name'])) echo $errors['first_name']; ?></p> </th>   <!-- output errors if error occurs -->
					</tr>
					<tr>
						<th>Last Name:</th>
						<th><input type="text" name="last_name" placeholder="Enter last name" /></th>
						<th><p><?php if(isset($errors['last_name'])) echo $errors['last_name']; ?></p> </th>   <!-- output errors if error occurs -->
					</tr>
					<tr>
						<th>Username:</th>
						<th><input type="text" name="username" placeholder="Enter username" /></th>
						<th><p><?php if(isset($errors['username'])) echo $errors['username']; ?></p> </th>   <!-- output errors if error occurs -->
					</tr>
					<tr>
						<th>Password:</th>
						<th><input type="password" name="password" placeholder="Enter password" /></th>
						<th><p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p> </th>
            			<th><p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p> </th>
					</tr>
					<tr>
						<th>Contract Number:</th>
						<th><input type="text" name="contract_number" placeholder="Enter contract number" /></th>
					</tr>
					<tr>
						<th>Email:</th>
						<th><input type="text" name="email" placeholder="Enter email id"/></th>
						<th><p><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p> </th>
            			<th><p><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p> </th>
					</tr>
					<tr>
						<th>Gender:</th>
						<th><select type="text" name="gender">
							<option value="male" >Male</option>
							<option value="female"> Female </option>
							<option value="others"> Others </option>
						</select></th>
					</tr>
				</table>
				<input id="button" type="submit" name="submit"/>
			</form>
		</div>

</body>
</html>