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
  <form action="question.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="country">Question Categories</label>
      </div>
      <div class="col-75">
        <select type="text" name="question_categories">
          <option value="Banking and Finance Law" > Banking and Finance Law </option>
          <option value="Commercial Law" > Commercial Law </option>
          <option value="Criminal Law" > Criminal Law </option>
          <option value="Family Law" > Family Law </option>
          <option value="Media Law" > Media Law </option>
          <option value="Public Law"> Public Law </option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Date</label>
      </div>
      <div class="col-75">
        <input type="Date" name="tdate">
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