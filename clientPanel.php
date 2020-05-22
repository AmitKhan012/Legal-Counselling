<?php 
	//echo "YOOOOO" . "<br>";
	//echo "Welcome to client Panel". "<br>";
 ?>


<?php
	include 'navbar.php';
	include 'connect_db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	    table {
	        font-family: arial, sans-serif;
	        border-collapse: collapse;
	        width: 100%;
	    }

	    td, th {
	        border: 1px solid #dddddd;
	        text-align: left;
	        padding: 8px;
	    }

	    tr:nth-child(even) {
	        background-color: #dddddd;
	    }
	</style>
	<link rel="stylesheet" type="text/css" href="css/index_style.css">	
</head>
<body>
	<section id="showcase">
		<div class="container">
			<h1> Legal Counseling 
			</h1>
		</div>
	</section>

	<div>
		<h3>RECENTLY ASKED QUESTIONS</h3>
		<?php 
			$sql = "SELECT * FROM questions";
			$result = $db_connect->query($sql);
			if ($result->num_rows > 0) {
		?>
			<table>
				<tr>
					<th> ID </th>
					<th> Asked By </th>
					<th> Date </th>
					<th> Question </th>
					<th> Answers </th>
				</tr>
				<?php	while($row = $result->fetch_assoc()) { ?>
					<tr>
						<td> <?php echo $row["id"]; ?>  </td>
						<td> <?php echo $row["username"]; ?>  </td>
						<td> <?php echo $row["tdate"]; ?>  </td>
						<td> <?php echo $row["question"]; ?>  </td>
						<td> <a href="show_ans.php?id=<?php echo $row['id']; ?>"><span style="color:blue"> Show Answers </span></a> </td>
					</tr>
				<?php	} ?>
			</table>
		<?php	} ?>
		 
	</div>

	<div>
		<h3>Recommended Lawer For You</h3>
		<?php 
			$client = $_SESSION['username'];
			$sql2 = "SELECT DISTINCT lawer FROM recommendation WHERE client = '$client'";
			$result2 = $db_connect->query($sql2);
			if ($result2->num_rows > 0) {
		?>
				
			 
			  <table>
			  	<tr>
			  		<th> Lawer Username </th>
			  		<th> Action </th>
			  	</tr>
			  
			<?php	while($row2 = $result2->fetch_assoc()) { ?>
			    
			    <tr>
			    	<td> <?php echo $row2["lawer"]; ?>  </td>
			    	<td> <a href="view_profile.php?id=<?php echo $row2['lawer']; ?>"><span style="color:blue"> View Profile </span></a> </td>
			    </tr>
			<?php	} ?>
			</table>
		<?php	} ?>
			
		
		
	</div>

	<div class="container">
		<section id="main">
			<h1>Need Help!!</h1>
			<button id="button"><a href="question_form.php"> Ask a question </a></button>
		</section>
	</div>

	<footer id="main-footer"> <p>Copyright &copy; 2020 My Website</p> </footer>
	
</body>
</html>
