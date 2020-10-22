<?php session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}

if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{ include("Index/header.php");
?>

<html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <title>Add Review</title>
    </head>
    <body>
        <div class="container">
            <h1>Add a Review</h1>
                <form method="POST" action="addReviewScript.php?venueID=<?php echo $_GET["venueID"]; ?>">
                    <textarea rows = "3" cols="40" name="review" id="review"></textarea>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div> <!-- ./container -->
    </body>
</html>

<?php
      }
?>