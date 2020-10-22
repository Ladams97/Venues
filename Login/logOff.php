<?php
session_start();
session_destroy();
$_SESSION = [];
$_SESSION["loggedIn"] = false;
header("Location: login.html");
?>