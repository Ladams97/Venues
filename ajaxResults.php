<?php
//web page
function main(){
    //variables
    $n = $_GET["venueType"];
    $userInput = "%" . $n . "%";
    $conn = new PDO ("mysql:host=localhost;dbname=assign158;", "assign158","ieb9Ahv7");
    $stmt = $conn->prepare("SELECT * FROM venues WHERE name LIKE ?");
    $stmt->bindParam (1, $userInput);
    $stmt->execute();
    $row = $stmt->fetch();


    //display search results
    if ($row == true){

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

    //cleans the page if the user deletes their search
    if($n == ""){
        ob_end_clean();
    }
}

main();
?>

<!-- Javascript for search 
<script type="text/javascript">
    function search(a){
        document.write("hello");
        //new request
        var request = new XMLHttpRequest();

        //retrieve search
        var search = a;

        //add listener
        request.addEventListener ("load", responseReceived);

        //send request to php search
        request.open('GET','addReview.php?venueID=' + search);

        request.send();
    }

    function responseReceived(e){
        document.getElementById('response').innerHTML = e.target.responseText;
    }
</script> -->