<?php
require_once("sql/config.php");
$sql = "SELECT * FROM users";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($rowData = mysqli_fetch_array($result)) {
    $usr = $rowData['username'];
  }
}
// Initialize the session
session_start();
$usr = $_SESSION['username'];
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Manager™ v0.0.3</title>
  <script src="js/Not used/jquery-3.6.1.js"></script>
  <script src="js/Not used/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/menustyle.css" type="text/css" />
</head>

<body style="background: rgba(255,247,228,255);">
  <div class="container">
    <p style="font-weight: bold;">Welcome, <?php echo $usr; ?></p>
    <br>
    <img src="img/logo.png" alt="icon"></img>
  </div>

  <div class="button_container" id="toggle">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
  </div>

  <div class="overlay" id="overlay">
    <nav class="overlay-menu">
      <ul>
        <li><img style="border-radius:50px;" src="img/logo.png" alt="logo"></li>
        <li><a href="manage.php">Kanban</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="xmas.html">CrocAx ©</a></li>
      </ul>
    </nav>
  </div>
  <script src="js/scroll.js"></script>

</body>

</html>

<!-- <div id="navbar">
    <a id="logo" href="/index.php"><img id="logo" src="img/icno.png" alt="icon" height="60px" width="60px"></img>
      Job Manager™ v0.0.3
    </a>

    <div id="navbar-right">
      <a class="btn btn-light active" href="index.php">Home</a>
      <a class="btn btn-light" href="contact.php">Contact</a>
      <a class="btn btn-light" href="about.php">About</a>
      <a class="btn btn-light" href="blog.php">Blog</a>
      <a href="/logout.php"><img src="img/Logout.ico" alt="icon" height="35px" width="40px"></img></a>
    </div>
  </div>

  <div class="wrap">
    <div id="Home">

      <div class="patches">
        <p>Patch notes</p>
        <div class="bar">
          <h1>Version 0.0.1</h1><a style="font-size: 8pt;">2022/08/25</a>
          <hr>
          <p1>First try of new design and implementation of Javascript.<br>You can check it out <a href="/Older/index.html">here!</a></p1>
        </div>

        <br>
        <div class="bar">
          <h1>Version 0.0.2</h1><a style="font-size: 8pt;">2022/08/30</a>
          <hr>
          <p1>• Idea of implementing early Javascript was scrapped and now changed;<br>
            • Fixed new design, works with resizing and does not walk around;<br>
            • Added "About" and "Contacts" functional sections.<br>
            • You can follow progress of work and updates in <a href="blog.php">blog</a> section</p1>
        </div>

        <br>
        <div class="bar">
          <h1>Version 0.0.3</h1><a style="font-size: 8pt;">2022/09/12</a>
          <hr>
          <p1>• Added drag & drop tabs in manager testing <a href="manage.php">page</a>;<br>
            • Implemented autosaving function after dragging tab;<br>
            • Minor bug and graphical fixes;</p1>
        </div>
      </div>

Button block
<div class="teststart">
  <button type="button" onclick="location.href='manage.php'">Start testing</button>
</div>
</div>

<script src="js/scroll.js"></script>

<footer style="color: white; text-align: center;">
  <a>CrocAx ©<a>
</footer>
</div> -->