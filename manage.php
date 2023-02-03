<?php
// Initialize the session
session_start();
$usr = $_SESSION['username'];
$usrID = $_SESSION['id'];
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once("sql/config.php");
$sql = "SELECT * FROM kanban WHERE username = '$_SESSION[username]'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($rowData = mysqli_fetch_array($result)) {
        $res = $rowData["content"];
    }
} else {
    $res = "INSERT INTO `kanban`(`id`, `content`, `username`) VALUES ('[value-1]','null','$usr')";
    $ins = mysqli_query($link, $res);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Manager™ v0.0.3</title>
    <link rel="stylesheet" href="css/menustyle.css" type="text/css" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui-manage.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
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
    <a href="logout.php"><button class="usr" onclick="clean()"><img id="myImg" src="img/Logout.ico" width="25" height="25"></button></a>

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
        <div class="usr"><a>Logged in as: <?php echo $usr; ?></a>
            <button class="usr" onclick="rr(cont)"><img id="myImg" src="img/reload.png" width="25" height="25"></button>
            <span></span>
            <button class="usr" onclick="window.location.reload();"><img id="myImg" src="img/floppy.png" width="25" height="25"></button>
        </div>

        <br>
        <div class="kanban">
        </div>
        <footer style="color: white; text-align: center;">
            <a>CrocAx ©<a>
        </footer>
        <p style="color: white;font-weight:bold;" id="lolxdddd"></p>
    </div>
    <script src="js/main.js" type="module"></script>

    <script>
        var user = "<?php echo $usr ?>";
        var userID = "<?php echo $usrID ?>";
        var cont = JSON.stringify(<?php echo $res ?>);
        console.log(cont);

        function rr() {
            localStorage.setItem("kanban-data", cont);
            console.log(cont);
            console.log("data-imported");
            window.location.reload();
        }

        function clean() {
            localStorage.clear("kanban-data");
            console.log("data-deleted");
        }

        text = localStorage.getItem("kanban-data");
        obj = JSON.parse(text);
        // document.getElementById("lolxdddd").innerHTML = JSON.stringify(obj);
        // var col_item = JSON.stringify(obj[2].items[1].id) + " " + JSON.stringify(obj[2].items[1].content);
        //var col_id1 = JSON.stringify(obj[0].id);
        // var col_item1 = JSON.stringify(obj[0].items);
        // var col_id2 = JSON.stringify(obj[1].id);
        // var col_item2 = JSON.stringify(obj[1].items);
        // var col_id3 = JSON.stringify(obj[2].id);
        // var col_item3 = JSON.stringify(obj[2].items);
        //Nustatyti getitem Kanban data su kabutemis - paskirti info is duomabazes.... CHECK var user for HINTS!

        //UPDATE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        $.ajax({
            type: "POST",
            url: "sql/update.php",
            data: {
                // id: userID,
                content: JSON.stringify(obj),
                username: user,
            },
        }).done(function(msg) {
            //alert("Data Saved: " + msg);
        });

        // $.ajax({
        //     type: "POST",
        //     url: "sql/update.php",
        //     data: {
        //         id: col_id2,
        //         content: col_item2
        //     },
        // }).done(function(msg) {
        //     // alert("Data Saved: " + msg);
        // });

        // $.ajax({
        //     type: "POST",
        //     url: "sql/update.php",
        //     data: {
        //         id: col_id3,
        //         content: col_item3
        //     },
        // }).done(function(msg) {
        //     // alert("Data Saved: " + msg);
        // });
    </script>
    <!-- <script src="js/app.js"></script> -->
    <script src="js/scroll.js"></script>
</body>






</html>

<!-- <div class="kanban__column">
                <div class="kanban__column-title">Not Started</div>
                <div class="kanban__items">
                    <div contenteditable class="kanban__item-input">Wash the dishes</div>
                    <div class="kanban__dropzone"></div>
                </div>
                <button class="kanban__add-item" type="button">+ add</button>
            </div> -->

<!-- <div id="navbar">
            <ul>
                <li><a id="a2" href="/index.php"><img src="img/icno.png" alt="icon" height="39px" width="50px"></img></a></li>
                <li><a class="btn btn-light" href="index.php">Home</a></li>
                <li><a class="btn btn-light" href="about.php">About</a></li>
                <li><a class="btn btn-light" href="contact.php">Contact</a></li>
                <li><a class="btn btn-light" href="blog.php">Blog</a></li>
                <button class="btn btn-light">Add New</button>
                <li id="name">
                    <a1 class="JMname">Job Manager™ v0.0.3</a1>
                </li>
                <li id="name"><a id="a2" href="/logout.php"><img src="img/logas.png" alt="icon" height="38px" width="40px"></img></a></li>
            </ul>
        </div> -->

<!-- <div class="jobheader">
                <H1 id="col_header">All tasks</H1>
                <H1 id="col_header">In Progress</H1>
                <H1 id="col_header">Completed</H1>
            </div>
            <div class="jobscontainer" id="main">
                <div class="column" id="col1">
                     //if (mysqli_num_rows($result) > 0) {
                    //while ($row = mysqli_fetch_assoc($result)) {
                    //echo "<div class='portlet' id='box_" . $row["id"] . "'>";
                    //echo "<div class='portlet-header'>" . $row['portlet_header'] . "<a style='cursor:pointer;'><img class='imgg' src='img/pen.png'></img></a></div>";
                    //echo "<div class='portlet-content'>" . $row['portlet_content'] . "</div>";
                    //echo "</div>";
                    //}
                    //} 
                    
                </div>
                <div class="column" id="col2"></div>
                <div class="column" id="col3"></div>
            </div> -->