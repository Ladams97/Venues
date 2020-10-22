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
        <title>Review Submission</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Review Submission</h1>
            <?php main(); ?>
        </div> <!-- container-fluid -->
    </body>
</html>

<?php
}

function main(){
    include("Class/Review.php"); 

    $rev  = $_POST["review"];
    $venueID = $_GET["venueID"];

    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");

    $review = new Review($conn);
    $review->addReview($venueID, $_SESSION["username"], $rev);

    echo "Your review has been added successfully. Please wait for admin approval.";
    echo "<br />";
    echo "<a href='index.php'>Home</a>";
}