<title>SouthTown Venues</title>

<?php
session_start();
if(!isset($_SESSION["loggedIn"])){
    $_SESSION["loggedIn"] = false;
}
if($_SESSION["loggedIn"] == false or !isset($_SESSION["loggedIn"])){
    echo"Please log in first.";
    echo"<br/>";
    echo"<a href='Login/login.html'>Log in</a>";
} else{
    include("Index/header.php");
    include("Index/body.php");
}
?>