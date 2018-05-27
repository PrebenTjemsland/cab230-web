<?php
    //Establish connection    
    $pdo = new PDO('mysql:host=localhost:3306;dbname=cab230', 'min', 'Secret!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = ("SELECT Suburb, WifiID FROM WifiSpots");
    try {
    $stmt=$pdo->prepare($sth);
    $stmt->execute();
    $results=$stmt->fetchAll();
        } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        }
?> 

<html>
	<title>Search Page</title>
		<script type="text/javascript" src="website.js"></script>
			<head>
				<link href="css.css" rel="stylesheet" type="text/css">
			</head>
			<body >
		 <!-- Makes the bar at the top with the logo and navigation -->	
				<div class="center">
		<!-- Places and Positions the Logo in the nav bar -->	
					<img src="../Resources/bcc.jpg" alt="Brisbane City Council logo" height="70" width="70">
		<!-- Makes the boxes inside the bar and positions information-->	
				Brisbane City Council Wifi Parks
					<div class="topnav">
						<a class="active" href="searchpage.html">Home</a>
						<a href="searchResult.html">Parks</a>
						<a href="register.html">Register</a>
					</div>
				</div>
			<div class="rightlog"> 
				Log in Here
				<form>
					<p>Username</p>
						<input type="email1" name="email" placeholder="Email" required>
					<p>Password</p>
						<input type="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password1" name="password" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
					<button type="submit"> Login </button>
				</form>
			</div>
			<div class="spaceForm"></div> 
				<div class="center">
                Search For a local Wifi Park:
					<form method="post" action="searchResult.php" >
					  <select name='SuburbSelected'>
						<option>-- Select Suburb--</option>
						<?php foreach($results as $output) {?>
						  <option><?PHP echo $output["Suburb"];?></option>
						  <?PHP } ?>
						</select>
						
						<select name='NameSelected'>
						<option>-- Select Name--</option>
						<?php foreach($results as $output) {?>
						  <option><?PHP echo $output["WifiID"];?></option>
						  <?PHP } ?>
						</select>
			
						<input type="submit" name="submit"  value="Search">
					</form>
				</div>
				<div class="spaceForm"></div> 
		<!-- creates a map with googles API -->
				<div id="map">
					<script type="text/javascript" src="website.js">
					</script>
				</div>
				
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3h8y5u1ZuB8YNgthTMPxmmi_EBiDKAeY&callback=initMap">
				</script>
	<!-- creates a Footer to stay at the bottom of the page-->
				<div class="footer">
					<p>Made by Benjamin Lynch and Preben Tjemsland</p>
				</div>
			</body>
</html>
