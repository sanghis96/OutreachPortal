<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Virtual Labs</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/snackbar.css">
		<style>
			* {box-sizing: border-box}

			body {font-family: "Lato", sans-serif;}

			.main {
			    margin-top: 120px; /* Add a top margin to avoid content overlay */
			}


			.top-fixed-pannel {
				width: 100%;
				padding: 10px 10px 10px 10px;
				background-color: #FFFFFF;
				overflow: hidden;
				position: fixed;
				top: 0;
			}
			
			.loginButton {
				border-radius: 20px;
				background-color: #3385ff;
				border: none;
				color: #FFFFFF;
				text-align: center;
				font-size: 22px;
				padding: 5px;
				width: 125px;
				transition: all 0.5s;
				cursor: pointer;
				margin: 5px;
			}

			.loginButton span {
				cursor: pointer;
				display: inline-block;
				position: relative;
				transition: 0.5s;
			}

			.loginButton span:after {
				content: '\00bb';
				position: absolute;
				opacity: 0;
				top: 0;
				right: -20px;
				transition: 0.5s;
			}

			.loginButton:hover span {
				padding-right: 25px;
			}

			.loginButton:hover span:after {
				opacity: 1;
				right: 0;
			}

			/* Style the links inside the sidenav */
			#mySidenav div {
			    position: fixed; /* Position them relative to the browser window */
			    left: -210px; /* Position them outside of the screen */
			    transition: 0.3s; /* Add transition on hover */
			    padding: 15px; /* 15px padding */
			    margin-top: 120px;
			    width: 250px; /* Set a specific width */
			    text-decoration: none; /* Remove underline */
			    font-size: 20px; /* Increase font size */
			    color: white; /* White text color */
			    border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
			}

			#mySidenav div:hover {
			    left: 0; /* On mouse-over, make the elements appear as they should */
			}

			/* The about link: 20px from the top with a green background */
			#tab1 {
			    top: 20px;
			    background-color: #6bbaa7;
			}

			#tab2 {
			    top: 80px;
			    background-color: #fba100;
			}

			#tab3 {
			    top: 140px;
			    background-color: #6c648b;
			}

			#tab4 {
			    top: 200px;
			    background-color: #b6a19e;
			}

			/* Style the tab content */
			.tabcontent {
			    float: left;
			    padding: 0px 12px;
			    border: 1px solid #ccc;
			    width: 80%;
			    border-left: none;
			    height: 600px;
			    margin-left: 5%;
			    display: none;
			}

			#nodalCenters {
				display: block;
			}

			.figures {
				float: right;
				width: 15%;
				height: 300px;
				border: 10px;
			}

		</style>
	</head>
	<body>

		<div class="top-fixed-pannel row">
			<div class="col-sm-11">
				<img src="images/iitblogo.png" style="height:96px; width:98px;">
				<b style="color:rgb(0,69,134); font-size:30px; font-family: "Times New Roman", Times, serif;"> IIT Bombay</b>&nbsp;
				<img src="images/vllogo.png">
			</div>
			<div class="col-sm-1" style="padding: 5px 0px 15px 0px;">
				<button class="loginButton" data-toggle="modal" data-target="#modalLogin"><span>Login </span></button>
			</div>
		</div>

		<!-- Login Modal  -->
            
            <div class="modal fade" id="modalLogin" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2><span class="glyphicon glyphicon-lock"></span> Login</h2>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="login.php" method="post" multipart="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="username"><span class="glyphicon glyphicon-user"></span> Username </label>
                                    <div class="col-sm-9">
                                    	<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd"><span class="glyphicon glyphicon-eye-open"></span> Password </label>
                                    <div class="col-sm-9">          
										<input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
									</div>
                                </div>
								<div class="form-group">        
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Login</button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        <!--  End Login Modal -->
		
		<div id="mySidenav" class="sidenav">
			<div id="tab1" onclick="openTab(event, 'nodalCenters')">Nodal Centers</div>
			<div id="tab2" onclick="openTab(event, 'analytics')">Analytics</div>
			<div id="tab3" onclick="openTab(event, 'upcomingWkshp')">Upcoming Workshops</div>
			<div id="tab4" onclick="openTab(event, 'nodalCoordinators')">Nodal Coordinators</div>
		</div>

		<div class="main">

			<div id="nodalCenters" class="tabcontent">
				<h3>Nodal Centers</h3>
				<p>Nodal centers table</p>
			</div>

			<div id="analytics" class="tabcontent">
				<h3>Analytics</h3>
				<p>Pie charts</p>
			</div>

			<div id="upcomingWkshp" class="tabcontent">
				<h3>Upcoming Workshops</h3>
				<p>Upcoming Workshops Table</p> 
			</div>

			<div id="nodalCoordinators" class="tabcontent">
				<h3>Nodal Coordinators</h3>
				<p>Nodal coordinators profile picture gallery</p>
			</div>

			<div class="figures">
				
			</div>

    	</div>
        
        <!--  Error Message  -->
        <div id="snackbar"><strong>INVALID!</strong> Username or Password</div>


        <!--  Scripts  -->
		<script src="js/snackbar.js"></script>
		<script>
			function openTab(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>

	</body>
</html>