<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
		<link rel="stylesheet" type="text/css" href="css/login_style2.css">
</head>
<body>
	<?php
        include 'navbar.php';
        include('connect_db.php');
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT question FROM questions WHERE id = $id";
            $result = $db_connect->query($sql);
            if ($result->num_rows > 0) {
    ?>

    			
                <div class="contain">
                <?php    while($row = $result->fetch_assoc()) { ?>
                    <div id="frm">
						<div class="row">
                        	<div class="col-25">
                            	<label for="country"> Question: </label>
                        	</div>
                        	<div class="col-75">
                           		<?php  echo $row["question"]; ?>   
                        	</div>
                    	</div>		
					</div>
                <?php    } ?>
                </div>
            <?php    } ?>

            <div id="frm">
                <form action="answer.php" method="post">
                    Question Id: <input type="int" name="queId" value="<?php echo $id; ?>"/><br><br>
                    Answer:  <textarea name="ans" placeholder="Write answer here.." style="height:200px"></textarea> <br><br>
                    <input id="button" type="submit" value="Done">
                    <a href="lawerPanel.php">Go Back!</a>
                </form>
            </div>
        

		<?php } ?>
</body>
</html>

 