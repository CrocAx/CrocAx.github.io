<?php
// Initialize the session
session_start();

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
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <link rel="stylesheet" href="css/menustyle.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>

<body>
  <div class="container">
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
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </div>

  <div class="wrap">
    <div id="blog">
      <!--Blog log block-->
      <div class="bloglogs">
        <p>Blog posts</p>
        <div class="blogbar">
          <h1>Version 0.0.1 pre-release!</h1><a style="font-size: 8pt;">2022/08/25</a>
          <hr>
          <p1>First try of new design and implementation of Javascript. Trying to learn new coding language.
            Though I could do "Home", "About" and "Contacts" in one "index.php" but after refreshing I noticed
            that it leads me back to home page.<br>
            You can check v0.0.1 <a href="/Older/index.html">here!</a></p1>
        </div>

        <br>
        <div class="blogbar">
          <h1>Version 0.0.2 pre-release!</h1><a style="font-size: 8pt;">2022/08/30</a>
          <hr>
          <p1>• Idea of implementing early Javascript was scrapped and now changed;<br>
            • Fixed new design, works with resizing and does not walk around;<br>
            • Added "About" and "Contacts" functional sections.</p1>
        </div>

        <br>
        <div class="blogbar">
          <h1>Version 0.0.2 update!</h1><a style="font-size: 8pt;">2022/08/31</a>
          <hr>
          <p1>• Added new "blog" section where I write all my ups and downs in coding;<br>
            • Added button in home page to "Home" section and you can see "Job Manager™" progress;<br>
            • Fixed minor background bugs; </p1>
        </div>

        <br>
        <div class="blogbar">
          <h1>Version 0.0.3 update!</h1><a style="font-size: 8pt;">2022/09/12</a>
          <hr>
          <p1>• Added drag & drop tabs in manager testing <a href="manage.php">page</a>;<br>
            • Implemented autosaving function after dragging tab;<br>
            • Minor bug and graphical fixes;</p1>
        </div>

        <br>
        <div class="blogbar">
          <h1>Version 0.0.4 update!</h1><a style="font-size: 8pt;">2023/01/04</a>
          <hr>
          <p1>• New navigation bar, fixed bugged menu;<br>
            • New functional kanban board, easy to save and import data form database - After login press reload button;<br>
            • New looks of board, graphical fixes, new homepage;<br>
            • Still working on fixing font sizes and styling of website, minor bug issues;</p1>
        </div>
      </div>
    </div>
    <footer style="color: white; text-align: center;">
      <a>CrocAx ©<a>
    </footer>
  </div>

  <script src="js/scroll.js"></script>
</body>

</html>