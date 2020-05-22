<?php
  include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/request_form.css">
</head>
<body>

<section>
<div class="contain">
  <form action="direct_question.php" method="post">
     <div class="row">
      <div class="col-25">
        <label for="subject"> Lawer Name </label>
      </div>
      <div class="col-75">
        <input id="subject" type="text" name="lawerName" value="<?php echo $_GET['id']; ?>"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Question</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="question" placeholder="Ask something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</section>
  <footer id="main-footer">
    <p>Copyright &copy; 2018 My Website</p>
  </footer>
</body>
</html>