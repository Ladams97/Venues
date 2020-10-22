<?php

class Venue{
    
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
    
    function getName(){
        return $this->row["name"];
    }
    
    function getType(){
        return $this->row["type"];
    }
    
    function getDesc(){
        return $this->row["desc"];
    }
    
    function getRecommended(){
        return $this->row["recommended"];
    }
    
    function getUsername(){
        return $this->row["username"];
    }
    
    //functions
    function addVenue($nameIn,$typeIn,$descIn, $usernameIn){
        $stmt = $this->conn->prepare
            ("INSERT INTO venues(name, type, description,username)
                VALUES(?,?,?,?)");
        $stmt->bindParam (1, $nameIn);
        $stmt->bindParam (2, $typeIn);
        $stmt->bindParam (3, $descIn);
        $stmt->bindParam (4, $usernameIn);
        $stmt->execute();
    }
    
    function updateVenue($nameIn,$typeIn,$descIn){
        $stmt = $this->conn->prepare
            ("UPDATE venues SET name=?, type=?, description=? WHERE id=?");
        $stmt->bindParam (1, $nameIn);
        $stmt->bindParam (2, $typeIn);
        $stmt->bindParam (3, $descIn);
        $stmt->bindParam (4, $this->id);
        $stmt->execute();
    }
    
    function recommend($idIn){
        $stmt = $this->conn->prepare
            ("  UPDATE venues 
                SET recommended=recommended+1  
                WHERE id=?
                ");

        $stmt->bindParam (1, $idIn);
        $stmt->execute();
    }
}