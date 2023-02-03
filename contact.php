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
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/menustyle.css" type="text/css" />
    <script src="js/Not used/jquery-3.6.1.js"></script>
    <script src="js/Not used/jquery-ui.js"></script>
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
        <div id="contact">
            <div class="contac">
                <h1>Contacts</h1>
                <a><img style="width: 100px; height: 105px;" src="/img/default.png"></img></a>
                <hr>
                <a>Full name: CrocAx</a>
                <br>
                <a>Phone: +3706XXXXXXX</a>
                <br>
                <a>Mail: CrocAx@gmail.com</a>
            </div>
        </div>

        <footer style="color: white; text-align: center;">
            <a>CrocAx ©<a>
        </footer>
    </div>

    <script src="js/scroll.js"></script>
</body>

</html>