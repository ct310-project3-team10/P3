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
			<div class="row visible-on" style="text-align:left; padding:20px;">
				<div class="col-lg-6"><h1 style="text-decoration:underline;">Order Form</h1>
				<form action=""  method="POST" name="order">
							Ingredient<br>
							<input type="checkbox" name="Yams" value="Yams"> Yams
							<input type="checkbox" name="Cardamom" value="Cardamom"> Cardamom
							<input type="checkbox" name="Sorrel" value="Sorrel"> Sorrel 
							<br><br>
							Quantity<br>
							<input type="checkbox" name="1_lb" value="1 lb"> 1 pound
							<input type="checkbox" name="2_lbs" value="2 lbs"> 2 pounds
							<input type="checkbox" name="5_lbs" value="5 lbs"> 5 pounds
							<br><br>
							<input type="submit" value="Add To Cart" input name="addToCart">
				</form> 
				<br>
				
				

				
				<?php
				if(!isset($_SESSION['user'])){
					echo "Please login to place an order";
					exit;
				}
				$user = $_SESSION['user'];
				$ingredient="";
				$quantity="";
				$price="";
				$yams = false;
				$cardamom = false;
				$sorrel = false;
				$onelb = false;
				$twolbs = false;
				$fivelbs = false;
				$fieldsSet = false;
				if(isset($_POST['addToCart'])){
					$date = date("m/d/y");
					if(isset($_POST['Yams'])){ 
					$yams = true;
					$ingredient = "Yams";
					}
					if(isset($_POST['Cardamom'])){ 
					$cardamom = true;
					$ingredient = "Cardamom";
					}
					if(isset($_POST['Sorrel'])){ 
					$sorrel = true;
					$ingredient = "Sorrel";
					}
					if(isset($_POST['1_lb'])){ 
					$onelb = true;
					$quantity = 1;
					}
					if(isset($_POST['2_lbs'])){ 
					$twolbs = true;
					$quantity = 2;
					}
					if(isset($_POST['5_lbs'])){ 
					$fivelbs = true;
					$quantity = 5;
					}
					
					if(($yams || $cardamom || $sorrel) && ($onelb || $twolbs || $fivelbs)){
					$fieldsSet = true;
					}else{
						echo "Please select an ingredient and quantity.";
					}
					
					
					
				    if($fieldsSet){
						if($ingredient == 'Yams'){
							switch($quantity){
								case '1_lb':
									$price = 0.99;
									break;
								case '2_lbs':
									$price = 1.80;
									break;
								case '5_lbs':
									$price = 3.75;
									break;
							}
							
						}
						
						if($ingredient == 'Cardamom'){
							switch($quantity){
								case '1_lb':
									$price = 4.50;
									break;
								case '2_lbs':
									$price = 8.00;
									break;
								case '5_lbs':
									$price = 14.95;
									break;
							}
							
						}
						
						if($ingredient == 'Sorrel'){
							switch($quantity){
								case '1_lb':
									$price = 7.50;
									break;
								case '2_lbs':
									$price = 14.50;
									break;
								case '5_lbs':
									$price = 27.00;
									break;
							}
							
						}
					
						
						@$state = $db->prepare("CREATE TABLE order_$id (user VARCHAR(30)  PRIMARY KEY, date VARCHAR(30), ingredient TEXT, quantity INT, price DECIMAL(10, 2))");
						if($state){
								@$res = $db->query("CREATE TABLE order_$id (user VARCHAR(30) , date VARCHAR(30), ingredient TEXT, quantity INT, price DECIMAL(10, 2))");
								$q = "INSERT into order_$id (user, date, ingredient, quantity, price) VALUES ('$user', '$date','$ingredient', '$quantity', '$price')";
								$res = $db->query($q);
						}else{
								$q = "INSERT into order_$id (user, date, ingredient, quantity, price) VALUES ('$user', '$date','$ingredient', $quantity, $price)";
								$res = $db->query($q);
								var_dump($res);
								unset($_POST);
								echo "Items successfully added to cart.";
								header('Location: order_form.php');
						}
					}
				}
		
				?>	
				</div>
				
					<div class="col-lg-6"><h1 style="text-decoration:underline;">Prices</h1>
						<table style="width:100%">
							<tr>
								<th style="text-decoration:underline;">Ingredient</th>
								<th style="text-decoration:underline;">Quantity</th> 
								<th style="text-decoration:underline;">Price</th>
							</tr>
							<tr>
								<td>Yams</td>
								<td>1 pound bag</td> 
								<td>$0.99</td>
							</tr>
							<tr>
								<td>Yams</td>
								<td>2 pound bag</td> 
								<td>$1.80</td>
							</tr>
							<tr>
								<td>Yams</td>
								<td>5 pound bag</td> 
								<td>$3.75</td>
							</tr>
							<tr>
								<td>Cardamom</td>
								<td>1 pound bag</td> 
								<td>$4.50</td>
							</tr>
							<tr>
								<td>Cardamom</td>
								<td>2 pound bag</td> 
								<td>$8.00</td>
							</tr>
							<tr>
								<td>Cardamom</td>
								<td>5 pound bag</td> 
								<td>$14.95</td>
							</tr>
							<tr>
								<td>Sorrel</td>
								<td>1 pound bag</td> 
								<td>$7.50</td>
							</tr>
							<tr>
								<td>Sorrel</td>
								<td>2 pound bag</td> 
								<td>$14.50</td>
							</tr>
							<tr>
								<td>Sorrel</td>
								<td>5 pound bag</td> 
								<td>$27.00</td>
							</tr>
							
							
						</table>
					
						<br>
					     <h6>*Prices exclude applicable sales tax</h6>
				</div>
				


					
		
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