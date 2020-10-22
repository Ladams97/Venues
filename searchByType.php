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
        <title>Search</title>
    </head>
    <body>
        <div class="container">
            <h1>Search by type</h1>
            <form method="get" action = "searchResults.php">
                <p>
                <input name="venueType" />
                <input type="submit" class="btn btn-primary" value="Go!" />
                </p>
            </form>
        </div> <!-- container-fluid -->
        
    </body>
</html>

<?php
      }
?>