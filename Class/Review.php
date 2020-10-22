<?php

class Review{
    
    //attributes
    private $conn;
    
    private $id;
    private $row;
    
    
    //constructors
    function __construct($connIn){
        $this->conn = $connIn;
    }
    
    
    //getters
    function getId(){
        return $this->row["id"];
    }
    
    function getVenueId(){
        return $this->row["venueID"];
    }
    
    
    function getUsername(){
        return $this->row["username"];
    }
    
    function getReview(){
        return $this->row["review"];
    }
    
    function getApproved(){
        return $this->row["approved"];
    }
    
    //functions
    function addReview($venueIdIn,$usernameIn,$reviewIn){
        $stmt = $this->conn->prepare
            ("INSERT INTO reviews(venueID, username, review)
                VALUES(?,?,?)");
        
        $stmt->bindParam (1, $venueIdIn);
        $stmt->bindParam (2, $usernameIn);
        $stmt->bindParam (3, $reviewIn);
        $stmt->execute();
    } 
    
    function viewReviews($idIn){
        //variables
        $stmt = $this->conn->prepare("select * from reviews where venueID = ?");
        $stmt->bindParam (1, $idIn);
        $stmt->execute();
        $row = $stmt->fetch();
            
        //check for no matching results
        if($row == true){
            while($row != false){
                if($row["approved"] == 1){
                    echo"<h3>" . $row["username"]  . "</h3>";
                    echo $row["review"] . "<br/>";
                }
                $row = $stmt->fetch();
            }
        } else{
            //display search results
            echo"Sorry, no results.";
            echo"<br/>";
            echo'<a href="index.php">Return</a>';
        }
    }
    
    function deleteReview($idIn){
        $stmt = $this->conn->prepare("DELETE FROM reviews WHERE ID = ?");
        $stmt->bindParam (1, $idIn);
        $stmt->execute();
    }
    
    function approveReview($idIn){
        $stmt = $this->conn->prepare("UPDATE reviews SET approved = 1 WHERE ID=?");
        $stmt->bindParam (1, $idIn);
        $stmt->execute();
    }
    
    function viewPendingReviews(){
        $stmt = $this->conn->prepare("select * from reviews where approved = 0");
        $stmt->execute();
        $row = $stmt->fetch();
        
        //display search results
        while($row == true){
            echo"<h3>ID: " . $row["ID"]  . "</h3>";
            echo"username: " . $row["username"] . "<br/>";
            echo"review: "   . $row["review"]   . "<br/>";
            echo"<a class='btn btn-primary' href='approved.php?ID=".$row["ID"]."' role=' button'>Approve this review</a>";
            echo" ";
            echo"<a class='btn btn-danger' href='deleted.php?ID=".$row["ID"]."' role=' button'>Delete</a>";
            $row = $stmt->fetch();
        }
    }
}