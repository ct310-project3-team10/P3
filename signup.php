<?php 

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- META TAGS -->

		<meta charset="utf-8">
		<meta name="description" content="Ingredients Page for CT310 Project 2">
		<meta name="keywords" content="html, css, bootstrap, web devlopment, Brad Bovaird, Tanner Dodrill , CSU,">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="custom.css">
		<link rel="icon" href="images/Fork.ico">
		<title>The Ingredient Shop</title>
		<link rel="icon" type="image/gif/png" href="images/fork.ico">
	</head>
	

	<body>

	<!-- JUMBOTRON -->
	<div class = "container">
		<div class="jumbotron">
				<h1>The Ingredients Shop</h1>
				<p> We specialize in 3 ingredients</p>
	</div>
		</div>

	<!-- NAVBAR -->
	<!-- need to add links to other pages -->
		<div class = "container">
		<nav class="navbar navbar-custom">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- need to add link -->
					<a class="navbar-brand" href="index.php">Shop Home</a>
				</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingredients<span class="caret"></span></a>
						
					
						<?php include('config.php');
						echo "<ul class='dropdown-menu'>";
						$q = "SELECT * FROM ingredients";
						$res = $db->query($q);
						while($row = $res->fetchArray()){ 
							$name = strtolower($row['name']);
							echo "<li><a href=ingredient_page.php?in=".$row['name'].">".$row['name']."</a></li>";
						}
						echo "</ul>";
						?>

						<!-- need to add link -->
						<li><a href="aboutUs.php">About Us</a></li>
						<li style="align-right"><a href="login.php">Login</a></li>
						<li style="align-right"><a href="order_form.php">Order</a></li>
						<li style="align-right"><a href="cart.php">View Cart</a></li>
						
						<?php
						if(isset($_SESSION['user'])){
							$user = $_SESSION['user'];
							$q = "SELECT * FROM users where username='$user'";
							$res = $db->query($q);
							$row = $res->fetchArray();
							echo $row['role'];
								if($row['role'] == "admin"){
								echo "<li style=align-right><a href=add_ingredient.php>Add Ingredient</a></li>";
							}
						}
						?>
			</div>
			</div>
		</nav>
	</div>

		<!-- MAIN BODY -->
	<div class = "container">
		<div class = "maincontent">
			<!--Header-->
			<!-- 1 Row stretching 12 Grid Block -->
			<div class="row visible-on" style="text-align:center;">
				<div class="col-lg-12"><h1 style="text-align:center";>The Ingredients Shop</h1></div>
				<h3 style="text-align:center;">New User Registration</h3>
					<form action = "#" method = "POST">
					    (All fields required)<br>
						First Name<br>
						<input type="text" name="firstName"></input><br>
						 Last Name<br>
						<input type="text" name="lastName"></input><br>
						 Email<br>
						<input type="text" name="email"></input><br>
						 Username<br>
						<input type="text" name="username"></input><br>
						 Password<br>
						<input type="password" name="password1"></input><br>
						Confirm Password<br>
						<input type="password" name="password2"></input><br>
						<br>
						<?php 
						if(isset($_POST['submit'])){
							$password1 = $_POST['password1'];
							$password2 = $_POST['password2'];
						
						if($password1 !== $password2){
							echo "Passwords do not match!";
							}
						}
						?>
						<input type="submit" name="submit"></input>
					</form>
				
				
				
				
				
			</div>
			<?php
			include('passwordLib.php');
			if(isset($_POST['submit'])){
					 $required = array('firstName', 'lastName', 'email', 'username', 'password1');
					 $error = false;
					 foreach($required as $field){
						 if(empty($_POST[$field])){
							 $error = true;
						 }
						 
					 }
					 
					 if($error){
						 echo "All fields are required.";
						 
					 }else{
						$first= $_POST['firstName'];
						$last = $_POST['lastName'];
						$email = $_POST['email']; 
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							echo "PLease enter a valid email address.";
						}
						$pass = password_hash($_POST['password1'], PASSWORD_BCRYPT);
						$user = $_POST['username'];
						
						@$checkUser = $db->prepare("SELECT email FROM users where email='$email'");
							if($checkUser){
								@$state = $db->prepare("INSERT INTO users (firstName, lastName, username, password, email, role) VALUES ('$first', '$last', '$user', '$pass', 'removed for security', 'customer')");
								if($state){
									$res = $db->query("INSERT INTO users (firstName, lastName, username, password, email, role) VALUES ('$first', '$last', '$user', '$pass', 'removed for security', 'customer')");
									echo 'Success. <a href="login.php">Login Here</a> ';
								}
							}else{
								echo  'This email address is already registered. <a href="forgot_password.php">Forgot Password?</a> ';
					 }
				}
			}
					 
					

			?>

			&nbsp &nbsp
					
				</div>

	

	
		</div>

 <!-- FOOTER -->
<!-- ideally would like footer to stay at bottom of page
yet not cross over any maincontent -->
	<footer class = "footer">
		<div class = "container">
			<p class = "text-muted"> The Ingredient Shop</p>
			<?php if(isset($_SESSION['user'])){ echo "Logged in as: " .$_SESSION['user'];}?>
			<p><a href="logout.php">Logout</a></p>
			<p style="float:right;"> This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/" style="color:black;">
				CT310</a> Course Project.</p>
		</div>
	</footer>

	</body>
</html>