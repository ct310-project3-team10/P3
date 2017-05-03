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
					<a class="navbar-brand" href="./index.php">Shop Home</a>
				</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingredients<span class="caret"></span></a>
						<?php include('config.php');
						echo "<ul class='dropdown-menu'>";
						$q = mysqli_query($db, "SELECT * FROM ingredients") or trigger_error(mysqli_error($db)." ".$q);
						while($row = mysqli_fetch_array($q)){
							$name = strtolower($row['name']);
							echo "<li><a href=ingredient_page.php?in=".$row['name'].">".$row['name']."</a></li>";
						}
						echo "</ul>";
						?>
						<li><a href="aboutUs.php">About Us</a></li>
						<li style="align-right"><a href="login.php">Login</a></li>
						<li style="align-right"><a href="order_form.php">Order</a></li>
						<li style="align-right"><a href="cart.php">View Cart</a></li>
						<?php
						$user = $_SESSION['user'];
						$q = mysqli_query($db, "SELECT * FROM users where username='$user'") or trigger_error(mysqli_error($db)." ".$q);
						$row = mysqli_fetch_array($q);
						if($row['role'] == "admin"){
							echo "<li style=align-right><a href=add_ingredient.php>Add Ingredient</a></li>";
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
				<div class="col-lg-12"><h1>The Ingredients Shop</h1></div>
			</div>

			&nbsp &nbsp

			<!-- 2nd Row -->
			<div class="row visible-on">
				<!-- 1st Column stretching 6 Grid Blocks -->
				<div class="col-lg-6">
					<h3 style="text-align:center;">Ingredients</h3>
					&nbsp &nbsp
					<div class = "message">
					<p> Welcome to The Ingredients Shop home website.</p>
					<p> Here at The Ingredients Shop we make it our mission
						to supply our customers with the BEST ingredients we can find.</p>
					<p>Especially if you are looking for Cardomom, Sorrel, or Yams...</p>
					&nbsp &nbsp
					<p>Because that's honestly the only ingredients we supply. But DANG are
						these some good yams. Our focus is on keeping it simple, but supplying
						the best product possible in midst of that simplicity.</p>
					</div>
				</div>

				<!-- 2nd Column, contains carousel -->

				<div class="col-lg-5">
					<h3></h3>

					<!---Carousel --->
					<!-- I just copied the w3school demo, feel free to edit -->
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<!-- image on carousel doubles as link to ingredients page-->
								<a href="./cardamom.php">
									<img src="/images/Cardomom.jpg" alt="Cardomom">
								</a>
								<div class="carousel-caption">
									<!-- Title's double as links to page of ingredient -->
									<h3><a href="images/cardamom.php">Cardamom</a></h3>
									<p>Tasty Cardamom</p>
									<!-- adding source for image -->
									<p>Image Source : <a href="http://www.stylecraze.com/articles/health-benefits-of-cardamom/#gref"
										target="_blank">
										Stylecraze</a></p>
								</div>
							</div>

							<div class="item">
								<a href="./sorrel.php">
								<img src="images/sorrel.jpg" alt="Sorrel">
								</a>
								<div class="carousel-caption">
									<h3><a href="images/sorrel.php">Sorrel</a></h3>
									<p>Yummy Sorrel</p>
									<p>Image Source : <a href"http://www.moderndaygilligan.com/2010/12/sweet_sorrel.html"
										target = "_blank">Modern Day Gilligan</a></p>
								</div>
							</div>

							<div class="item">
								<a href="images/yams.php">
									<img src="images/yam.jpg" alt="Flower">
								</a>
								<div class="carousel-caption">
									<h3><a href="./yams.php">Yam</a></h3>
									<p>Delicious Yams</p>
									<p>Image Source : <a href="https://top5ofanything.com/list/7e762cf1/Yam-Producing-Countries"
										target="_blank">Top 5 of Anything</a></p>
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

				</div>
			</div>
		</div>

		<!-- 3rd Row -->
		<!-- I added this third row because I can't think
		of a better way to add padding to the bottom of the maincontent
		instide the sqare white div block -->

		<div class="row visible-on">
			<div class="col-lg-6"><p>            </p></div>
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