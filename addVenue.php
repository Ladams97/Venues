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
        <title>Add a venue</title>
    </head>
    
    <body>
        <div class="container">
            <h1>Add a venue</h1>
            <div class="row">
            </div> <!-- ./row -->

                <form method="post" action="addVenueScript.php">
                    <label for="name">Name:</label>
                    <input name="name" id="name"/>
                    <br/>
                    <label for="type">Type:</label>
                    <input name="type" id="type" />
                    <br/>
                    <label for="desc">Description:</label>
                    <textarea rows = "3" cols="40" name="desc" id="desc"></textarea>
                    <br/>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </form>
        </div> <!-- ./container -->
    </body>
</html>

<?php
}
?>