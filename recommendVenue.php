<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{ include("Index/header.php"); ?>

    <html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Recommendation</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Recommendation</h1>
            <?php main(); ?>
        </div> <!-- container-fluid -->
    </body>
</html>

<?php
}

function main(){
    
    include("Class/Venue.php"); 
    $v = $_GET["venueID"];

    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");

    $venue = new Venue($conn);
    $venue->recommend($v);

    echo"You have successfully made a recommendation.";
    echo"<br />";
    echo("<a href='index.php'>Return</a>");
}

