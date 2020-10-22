<html>
    <head>
        <link rel="stylesheet" href = "Stylesheets/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href = "Stylesheets/style.css"/>

    </head>
    <body>
        <div class="container-fluid">
            <h1>SouthTown venues</h1>
            <?php echo"Logged in as: " . $_SESSION['username'] ?>
            <br /><br />
            <div class="row">
                <!-- SEARCH BAR -->
                <div class = "col-7">
                    <div class="card">
                        <h3 class="card-header">Search</h3>
                        <div class="card-body">
                            <h4 class="card-subtitle mb-2 text-muted">Find your local venue</h4>
                            <input id="venueType" onkeyup="search()"/>
                            <br /><br />
                            <div id="response"></div>
                        </div> <!-- card body -->
                    </div> <!-- card -->
                    
                </div> <!-- col & search bar -->
                
                <!-- ADD A VENUE -->
                <div class = "col-5">
                    <div class="card">
                        <h3 class="card-header">Enter your venue</h3>
                        <div class="card-body">
                            <h4 class="card-subtitle mb-2 text-muted">Add a new venue to our database</h4>
                            <div class="venueSearch">
                                <form method="POST" action="addVenueScript.php">
                                    <label for="name">Name:</label>
                                    <input name="name" id="name"/>
                                    <br/>
                                    <label for="type">Type:</label>
                                    <input name="type" id="type" />
                                    <br/>
                                    <label for="desc">Description:</label>
                                    <br />
                                    <textarea rows = "3" cols="32" name="desc" id="desc"></textarea>
                                    <br/>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div> <!-- venueSearch --> 
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
        
        
        <!-- Javascript for search -->
        <script type="text/javascript">
            function search(){
                
                //new request
                var request = new XMLHttpRequest();
                
                //retrieve search
                var search = document.getElementById("venueType").value;
                
                //add listener
                request.addEventListener ("load", responseReceived);
                
                //send request to php search
                request.open('GET','ajaxResults.php?venueType=' + search);
                
                request.send();
            }
            
            function responseReceived(e){
                document.getElementById('response').innerHTML = e.target.responseText;
            }
        </script>
        
    </body>
</html>