<!DOCTYPE html>
<html>
    <head>
        <title>Virtual Labs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            
        </style>
    </head>
    <body>
        <?php
            include('session.php');
        ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Admin Home</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>Welcome <strong><?php echo $login_session; ?></strong></a></li>
                    <li><a href = "logout.php">Sign Out <span class="glyphicon glyphicon-log-out"></span></a></li>
                </ul>
            </div>
        </nav>
        <br><br><br>
        <div id="tab2" class="container-fluid">
                <?php
                // define variables and set to empty values
                $nameErr = $emailErr = $genderErr = $websiteErr = "";
                $name = $email = $gender = $comment = $website = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if (empty($_POST["name"])) 
                        $nameErr = "Name is required";
                    else
                    {
                        $name = test_input($_POST["name"]);
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z ]*$/",$name))
                            $nameErr = "Only letters and white space allowed"; 
                    }

                    if (empty($_POST["email"]))
                        $emailErr = "Email is required";
                    else
                    {
                        $email = test_input($_POST["email"]);
                        // check if e-mail address is well-formed
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emailErr = "Invalid email format";
                    }

                    if (empty($_POST["website"]))
                        $website = "";
                    else
                    {
                        $website = test_input($_POST["website"]);
                        // check if URL address syntax is valid
                        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
                        $websiteErr = "Invalid URL";
                    }

                    if (empty($_POST["comment"]))
                        $comment = "";
                    else
                        $comment = test_input($_POST["comment"]);

                    if (empty($_POST["gender"]))
                        $genderErr = "Gender is required";
                    else
                        $gender = test_input($_POST["gender"]);
                }

                function test_input($data) 
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>
            <button type="button" class="btn btn-primary" onclick="switchTab()"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
            <div class="container">
                <div class="page-header">
                    <h1>Add New Nodal Center</h1>
                </div>
                <p><span class="error">* required field.</span></p>
            </div>
            <br>
            <div class="container">
                
            </div>
            <div class="container" style="align:center">
            <h3>Provide Username and Password</h3>
            <blockquote>
                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="text">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ncname" placeholder="Enter Nodal Center Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
                
            </blockquote>
        </div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="text">Nodal Center Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ncname" placeholder="Enter Nodal Center Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Name: <input type="text" name="name">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                E-mail: <input type="text" name="email">
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
                Website: <input type="text" name="website">
                <span class="error"><?php echo $websiteErr;?></span>
                <br><br>
                Comment: <textarea name="comment" rows="5" cols="40"></textarea>
                <br><br>
                Gender:
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <span class="error">* <?php echo $genderErr;?></span>
                <br><br>
                <p><span class="error">* required field.</span></p>
                <input type="submit" name="submit" value="Submit">  
            </form>
        </div>
        <div id="tab1" class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <div class="container-fluid">
                        <h2>Nodal Centers</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="container-fluid">
                        <button type="button" class="btn btn-primary" onclick="switchTab()"><span class="glyphicon glyphicon-plus"></span> Add Nodal Center</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <input type="text" id="searchBox" name="search" onkeyup="myFunction()" placeholder="Search for Institutes.." title="Type in a name">
                </div>
            </div>
            <table id="nodalTable" class="table table-hover">
                <tr class="header">
                    <th style="width:25%;text-align:left">Institute</th>
                    <th style="width:15%;text-align:left">Co-ordinator Name</th>
                    <th style="width:21%;">Total Number of Workshops</th>
                    <th style="width:21%;">Total Users Trained</th>
                    <th style="width:11%;">Total Usage</th>
                    <th style="width:4%;"></th>
                    <th style="width:4%;"></th>
                </tr>
                <?php
                    include("config.php");

                    $sql = "SELECT n.ncid, n.ncname, n.fname, n.lname, COUNT(w.workshop) AS cntWksp, SUM(w.nop) AS totNop, SUM(w.noe) AS totExp from workshops w JOIN nodalcenter n ON n.ncid = w.ncid GROUP BY n.ncid ORDER BY SUM(w.noe) DESC";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo '<td>'. $row["ncname"] . "</td>";
                                echo '<td>'. $row["fname"] ." " . $row["lname"] . "</td>";
                                echo '<td style="text-align:center">'. $row["cntWksp"] . "</td>";
                                echo '<td style="text-align:center">'. $row["totNop"] . "</td>";
                                echo '<td style="text-align:center">'. $row["totExp"] . "</td>";
                                echo '<td><a href="#" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>';
                                echo '<td><a href="#" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $db->close();
                ?>
            </table>
        </div>
        

        

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });

            function myFunction() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("searchBox");
                filter = input.value.toUpperCase();
                table = document.getElementById("nodalTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            function switchTab() {
                var x = document.getElementById("tab1");
                var y = document.getElementById("tab2");
                if(x.style.visibility === 'hidden') {
                    x.style.visibility = 'visible';
                    y.style.visibility = 'hidden';
                } else {
                    x.style.visibility = 'hidden';
                    y.style.visibility = 'visible';
                }
            }
        </script>
        
    
    </body>
</html> 