<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{ include("Index/header.php");?>

    <html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Venues</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Venues</h1>
            <?php main(); ?>
        </div> <!-- container-fluid -->
    </body>
</html>

<?php
}

function main(){
    
    include("Class/Venue.php"); 
    $n = $_POST["name"];
    $t = $_POST["type"];
    $d = $_POST["desc"];

    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");

    $venue = new Venue($conn);
    $venue->addVenue($n,$t,$d,$_SESSION["username"]);

    echo "Your venue has been added successfully.";
    echo "<br />";
    echo "<a href='index.php'>Home</a>";
}