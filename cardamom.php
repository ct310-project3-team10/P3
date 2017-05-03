<?php session_start()




?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- META TAGS -->

		<meta charset="utf-8">
		<meta name="description" content="Ingredients Page for CT310 Project">
		<meta name="keywords" content="html, css, bootstrap, web devlopment, Brad Bovaird, Tanner Dodrill , CSU,">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/custom.css">
		<link rel="icon" href="./Fork.ico">
		<title>Cardamom</title>
		<link rel="icon" type="image/gif/png" href="fork.ico">

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
					<a class="navbar-brand" href="./index.php">Shop Home</a>
				</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingredients<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!-- need to add link -->
							<li><a href="cardamom.php">Cardamom</a></li>
							<li><a href="sorrel.php">Sorrel</a></li>
							<li><a href="yams.php">Yam</a></li>
						</ul>
						<!-- need to add link -->
						<li><a href="aboutUs.php">About Us</a>
						<li style="align-right"><a href="login.php">Login</a></li>
						<li style="align-right"><a href="order_form.php">Order</a></li>
						<li style="align-right"><a href="cart.php">View Cart</a></li>
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
				<div class="col-lg-12"><h1>Cardamom</h1></div>
			</div>

			&nbsp &nbsp

			<!-- 2nd Row -->
			<div class="row visible-on">
				<!-- 1st Column stretching 6 Grid Blocks -->
				<div class="col-lg-6">
					<h3 style="text-align:center;">Cardamom</h3>
					&nbsp &nbsp
					<div class = "message">
					<p><blockquote>Cardamom is a spice native to the Middle East, North Africa, and Scandinavia. 
					There are three types of cardamom; green cardamom, black cardamom and Madagascar cardamom. 
					It is best to buy cardamom still in the pods, which are removed and discarded. 
					You can also buy cardamom seeds however; they lose much of their flavor. 
					Ground cardamom has even less flavor than the fresher ones. Most recipes usually call for green cardamom. 
					Cardamom has a strong, unique spicy-sweet taste, which is slightly aromatic. Cardamom is more expensive than average spices. 
					A little goes a long way. If a recipe calls for 10 pods that would equal 1 ½ tsp ground. Ground cardamom is readily available and found in grocery stores.
					</blockquote></p>
					<p><cite><a href="http://www.food.com/about/cardamom-319">"Cardamom" by food.com </cite>
					</div>
				</div>

				<!-- 2nd Column, contains carousel -->

				<div class="col-lg-5">
					<h3></h3>

					<div class="ingredient-image">
					<div id="ingredient-image" class="img-responsive">
						<!-- Indicators -->
					<img src="images/cardamom.jpg" alt="cardamom">
					</div>
				</div>
			</div>
		</div>

	</div>
<form class="comments" form method='post'>
  Username: <input type='text' input name='username' id='name' /><br />
  Comment:<br />
  <textarea name='comment' id='comment'></textarea><br />

  <input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
  
  <h5>Comments</h5>
	<?php
		if(empty($_SESSION['user']) && isset($_POST['Submit'])){
			echo "Please login to leave comments";
		}
	
	
		else if(isset($_POST['username'])){
		$commenter=$_POST['username'];
		if($commenter == $_SESSION["user"]){
			$comment=filter_var($_POST['comment']);
			$date=date("m/d/Y");
			date_default_timezone_set('America/Denver');
			$time=date("h:i:sa");
			echo "User: " .$_SESSION['user']. "<br>";
			echo "Comment: " .$comment."<br>";
			echo "Date/Time: " .$date. ',' .$time. "<br>";
		}
		else{
			echo "User not validated";
		}
		
	}
	?>
	<br>
  <input type="Submit" value="Submit" input name="Submit"/>
</form>

  <!-- FOOTER -->
<!-- ideally would like footer to stay at bottom of page
yet not cross over any maincontent -->
	<footer class = "footer">
		<div class = "container">
		<?php if(isset($_SESSION['user'])){ echo "Logged in as: " .$_SESSION['user'];}?>
			<p><a href="logout.php">Logout</a></p>
			<p class = "text-muted"> The Ingredient Shop</p>
			<p style="float:right;"> This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/" style="color:black;">
				CT310</a> Course Project.</p>
		</div>
	</footer>

	</body>
</html>