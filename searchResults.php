<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
if($_SESSION["loggedIn"] == false){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{ include("Index/header.php"); ?>

<html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Venues Search</title>
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
//web page
function main(){
    //variables
    $n = $_GET["venueType"];
    $$conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");
    $stmt = $conn->prepare("select * from venues where type = ?");
    $stmt->bindParam (1, $n);
    $stmt->execute();
    $row = $stmt->fetch();


    //display search results
    while($row == true){
        echo"<h3>" . $row["name"]  . "</h3>";
        echo"Type: " . $row["type"] . "<br/>";
        echo"Description: "   . $row["description"]   . "<br/>";
        echo"Recommended: "  . $row["recommended"]  . "<br/>";
        echo"<a href='addReview.php?venueID=".$row["ID"]."'>Review this venue</a>";
        echo"<br />";
        echo"<a href='recommendVenue.php?venueID=".$row["ID"]."'>Recommend this venue</a>";
        echo"<br />";
        echo"<a href='viewReviews.php?venueID=".$row["ID"]."'>Reviews for this venue</a>";
        echo"<br/> <br />";
        $row = $stmt->fetch();
    }
}