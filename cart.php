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
				
					<div class="col-lg-8"><h1 style="text-decoration:underline;">Shopping Cart</h1>
						<table id="order_summary" style="width:100%" border="1">
							<tr>
								<th style="text-align:center;" width=30%>Ingredient</th>
								<th style="text-align:center;" width=5%>Quantity</th> 
								<th style="text-align:center;" width=10%>Price</th>
							</tr>
						<?php
						

						$user = $_SESSION['user']; 
						$date = date("ymd");
						$total = 0;
						$ingredient;$quantity;$price;
						@$state = $db ->prepare("SELECT * from order_$id");
						if($state){
							$res = $db->query("SELECT * from order_$id");
							while($row = $res->fetchArray()){
							$ingredient = $row['ingredient'];
							$quantity = $row['quantity'];
							$price = $row['price'];
							echo "<tr>";
							echo "<td style='text-align:center'>".$ingredient."</td>";
							echo "<td style='text-align:center'>".$quantity."</td>";
							echo "<td style='text-align:center'>$".$price."</td>";
							}
						}else{
							echo "Cart is empty.";
						}
							
						
						
						
						?>
							
							
						</table>
						
						
						<br>
						<table id="order_total" style="width:100%" border="1">

						<?php
						if(@$db->prepare("SELECT * from order_$id where user= '$user'")){
						$res = $db->query("SELECT * from order_$id where user= '$user'");
						while ($num = $res->fetchArray()){
							$total += $num['price'];
						}
						$total = number_format($total, 2);
						echo "<tr>";
						echo "<td style='text-align:center;background:lightgray';width=55.5%><strong>TOTAL</td>";
						echo "<td style='text-align:center;background:lightgray';><strong>$".$total."</td>";
						echo "</tr>";
						}
						
						
						?>
						</table>
						
						<br>
						<form action = "" method="POST">
						<input type='submit' name='checkout' value="Checkout"> </input>
						<input type='submit' name='reset' value="Reset Cart" method="POST"> </input>
						</form>
						
					
						<br>

				</div>
				<?php
				if(isset($_POST['checkout'])){
					if(@$state = $db->prepare("SELECT * from order_$id")){
					$q_runner = $db->query("SELECT * from order_$id");
					$receipt = fopen("receipts/receipt_$id", "w");
					fwrite($receipt, "Thank you for ordering from us ".$_SESSION['user']."!"."\n");
					fwrite($receipt, "Receipt:  ".$id."\n");
					fwrite($receipt, "______________________________________________________________"."\n");
					
					$q_runner = $db->query("SELECT * from order_$id");
						while($row = $q_runner->fetchArray()){
								fwrite($receipt, "Ingredient: ".$row['ingredient']."\n");
								fwrite($receipt, "Quantity: ".$row['quantity']."\n");
								fwrite($receipt, "Price: $".$row['price']."\n");
								fwrite($receipt, "---------------------------------------------------------------------------------------\n");
							}
							$to = 'bovairds@rams.colostate.edu';
							$subject = 'ORDER DETAILS';
							$content = wordwrap(file_get_contents("receipts/receipt_$id", true));
							$message = '
							<html>
								<head>
									<title>Order Details</title>
								</head>
								<body>
								<p>'.$content.'</p>
								</body>
							</html>
							';

							$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							// Additional headers
							$headers .= 'To: bovairds<bovairds@rams.colostate.edu>' . "\r\n";
							$headers .= 'From: Admin_IFY <ingredients.for.you1@gmail.com>' . "\r\n";
							
							mail($to, $subject, $message, $headers);
							$res = $db->query ("INSERT INTO receipts (id, data) VALUES ('receipt_.$id', '$content')");
							$drop = $db->query ("DROP TABLE order_$id");
							$URL="thank_you.php";
							echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
							echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
							exit;
						}
					}
					
					if(isset($_POST['reset'])){
						$_SESSION['id'] = md5(uniqid(rand()));
						$URL="cart.php";
						echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
						echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
					}
				?>
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