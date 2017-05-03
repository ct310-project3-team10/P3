<?php session_start()

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- META TAGS -->

		<meta charset="utf-8">
		<meta name="description" content="Ingredients Page for CT310 Project">
		<meta name="keywords" content="html, css, bootstrap, web devlopment, Justin Rentie, CSU,">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="custom.css">
		<link rel="icon" href="images/Fork.ico">
		<title>Sorrel</title>
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
					<a class="navbar-brand" href="../index.php">Shop Home</a>
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
				<div class="col-lg-12"><h1>Sorrel</h1></div>
			</div>

			&nbsp &nbsp

			<!-- 2nd Row -->
			<div class="row visible-on">
				<!-- 1st Column stretching 6 Grid Blocks -->
				<div class="col-lg-6">
					<h3 style="text-align:center;">Sorrel</h3>
					&nbsp &nbsp
					<div class = "message">
					<p><blockquote>Sorrel is a small edible green plant from the Polygonaceae family, which also includes buckwheat and rhubarb. 
					The French translation of sour (“sorrel”) is spot-on: These leaves have an intense lemony tang. 
					In Vietnamese cuisine, sorrel leaves are known as rau thom (fresh herb), and it’s called gowkemeat in Scotland. 
					For our purposes, though, let's just call it sorrel.
					</blockquote></p>
					<p><cite><a href="http://www.epicurious.com/ingredients/what-is-sorrel-recipes-article">"Sorrel" by epicurious.com </cite>
					</div>
				</div>

				<!-- 2nd Column, contains carousel -->

				<div class="col-lg-5">
					<h3></h3>

					<!---Carousel --->
					<!-- I just copied the w3school demo, feel free to edit -->
					<div id="Sorrel" class="carousel slide" data-ride="carousel">
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
								<a href="#">
									<img src="images/sorrel-1.jpg" alt="sorrel-1">
								</a>
								<div class="carousel-caption">
									<h3><a href="http://www.bbc.co.uk/food/sorrel">Sorrel recipes</a></h3>
									<p>Sorrel</p>
									<!-- adding source for image -->
									<p>Image Source : <a href="http://www.stabroeknews.com/2015/features/12/27/sorrel-christmas-delight-2/"
										target="_blank">
										stabroeknews.com</a></p>
								</div>
							</div>

							<div class="item">
								<a href="#">
								<img src="images/sorrel-2.jpg" alt="sorrel-2">
								</a>
								<div class="carousel-caption">
									<h3><a href="http://www.bbc.co.uk/food/sorrel">Sorrel recipes</a></h3>
									<p>Sorrel</p>
									<p>Image Source : <a href="http://www.bbc.co.uk/food/sorrel"
										target = "_blank">http://www.bbc.co.uk</a></p>
								</div>
							</div>

							<div class="item">
								<a href="#">
									<img src="images/sorrel-3.jpg" alt="sorrel-3">
								</a>
								<div class="carousel-caption">
									<h3><a href="http://www.bbc.co.uk/food/sorrel">Sorrel recipes</a></h3>
									<p>Sorrel</p>
									<p>Image Source : <a href="http://www.bestislandeats.com/shop/4580356644/sorrel-drink/6859985"
										target="_blank">http://www.bestislandeats.com</a></p>
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#Sorrel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#Sorrel" role="button" data-slide="next">
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