<html>
    
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
    </head>
    
    <body>
        
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="searchByType.php">Search by Type</a>
            </li>
            
            <?php
            //if the user is an admin then they can see this
            if($_SESSION["admin"] == true){
                ?>
                <li class="nav-item">
                <a class="nav-link" href="adminApprove.php">View reviews</a>
            </li>
            
                
            <?php 
            }
            ?>
            
            <li class="nav-item">
                <a class="nav-link" href="login/logOff.php">Log Off</a>
            </li>
        </ul>
    </body>
</html>