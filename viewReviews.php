<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
//check login
if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{
    include("Index/header.php");

?>

    <html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Reviews</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Reviews</h1>
            <?php main(); ?>
        </div>
    </body>
</html>

<?php
}
//web page
function main(){
    include("Class/review.php");
    $n = $_GET["venueID"];
    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");
    
    $review = new Review($conn);
    $review->viewReviews($n);
}
?>