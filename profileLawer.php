<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/list.css">
</head>
<body>
	<section>
		<h2> User Information </h2>
		<div>
				<table id="listTable">
					<?php 
					$username = $_SESSION['username'];
					$qry = "SELECT * FROM lawers WHERE username = '$username' "; 
					$res = $db_connect->query($qry) or die('bad query');
					if ($res-> num_rows > 0) {
					$row = $res->fetch_assoc()
					?>
						<tr>
							<th><?php echo "Username"; ?></th>
							<th><?php echo $row['username']; ?></th>
						</tr>	
						<tr>
							<th><?php echo "First Name"; ?></th>
							<th><?php echo $row['first_name']; ?></th>
						</tr>
						<tr>
							<th><?php echo "Last Name"; ?></th>
							<th><?php echo $row['last_name']; ?></th>
						</tr>
						<tr>
							<th><?php echo "Email"; ?></th>
							<th><?php echo $row['email']; ?></th>
						</tr>
						<tr>
							<th><?php echo "Contract Number"; ?></th>
							<th><?php echo $row['contract_number']; ?></th>
						</tr>
						<tr>
							<th><?php echo "Gender"; ?></th>
							<th><?php echo $row['gender']; ?></th>
						</tr>
					<?php } ?>
				</table>
		</div>
	</section>
	<section>
		<div>
			<h2> Question List </h2>
				<table id="listTable">
					<?php 
					$username = $_SESSION['username'];
					$qry = "SELECT * FROM directq WHERE lawerName = '$username' "; 
					$res = $db_connect->query($qry) or die('bad query');
					if ($res-> num_rows > 0) {
					while($row = $res->fetch_assoc()){
					?>
						<tr>
							<th><?php echo $row['question']; ?></th>
							<th> <a href="direct_answer_form.php?id=<?php echo $row['id']; ?>"><span> Answer this question </span></a> </th>
						</tr>
					<?php } ?>	
					<?php } ?>
				</table>
		</div>
	</section>

	<footer id="main-footer"> <p>Copyright &copy; 2020 My Website</p> </footer>

</body>
</html>