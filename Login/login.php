<?php

session_start();

//variables
$un  = $_POST["username"];
$pw  = $_POST["password"];
$_SESSION["loggedIn"] = false;
$_SESSION["admin"] = false;

//SQL search
$conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");
$stmt = $conn->prepare("
    SELECT * FROM users
    WHERE username = ?
    AND password = ?
");
$stmt->bindParam (1, $un);
$stmt->bindParam (2, $pw);
$stmt->execute();


//check matching records
$row = $stmt->fetch();
if($row == false){
    echo"You have entered an incorrect login!";
}

else{
    //checks for admin status
    if($row["isadmin"] == 1){
        $_SESSION["admin"] = true;
    }
    
    //save session variable and redirect
    $_SESSION["username"] = $un;
    $_SESSION["loggedIn"] = true;
    header("Location: ../index.php");
}

?>