<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} elseif($_SESSION["admin"] == false){
    echo"You are not an admin, access denied.";
} else{ include("Index/header.php");?>

<html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Approved Review</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Approved Review</h1>
            <?php main(); ?>
        </div> <!-- container-fluid -->
    </body>
</html>



<?php
}
function main(){
    include("Class/Review.php");
    $id = $_GET["ID"];

    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");

    $review = new Review($conn);
    $review->approveReview($id);

    echo"You have successfully approved this review";
    echo"<br />";
    echo"<a href='adminApprove.php'>Go back</a>";
}
?>