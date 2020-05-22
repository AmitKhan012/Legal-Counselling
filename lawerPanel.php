<?php 
	//echo "YOOOOO" . "<br>";
	//echo "Welcome to lawer Panel". "<br>";
?>

<?php
	include 'navbar.php';
	include 'connect_db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index_style.css">	
	<link rel="stylesheet" type="text/css" href="css/request_form.css">
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
			  // output data of each row
				while($row = $result->fetch_assoc()) {
		?>
				<div class="row">
			    	<div class="col-75"><?php	echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["tdate"]. " " . $row["question"]."<br>"; ?></div> 
					<div class="col-75">
                    	<a href="answer_form.php?id=<?php echo $row['id']; ?>"><span style="color:blue"> Answer this question </span></a>
                    </div>
			    </div>
			<?php	} ?>
			<?php } ?>
		 
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
