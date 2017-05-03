<?php 
ini_set("file_uploads","On");
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
				<h3 style="text-align:center;">Add Ingredient</h3>
					<form action = "#" method = "POST" enctype="multipart/form-data">
					    (All fields required)<br>
						Ingredient<br>
						<input type="text" name="ingredient"></input><br>
						Image<br>
						<input type="file" name="image" id="image" style="padding-left:500px;"></input>
						 Description<br>
						<textarea name="desc" style="width:500px;height:150px;" placeholder="*Optional"></textarea><br>
						 Description source(URL)<br>
						<input type="text" name="desc_src"></input><br>
						<input type="submit" name="submit"></input>
					</form>
				
				
				
				
				
			</div>
			<?php
				   if(isset($_FILES['image']) && isset($_POST['submit'])){
					  $name = $_POST['ingredient'];
					  $desc =$_POST['desc'];
					  $errors= array();
					  $desc_src =$_POST['desc_src'];
					  $file_name = $_FILES['image']['name'];
					  $file_size =$_FILES['image']['size'];
					  $file_tmp =$_FILES['image']['tmp_name'];
					  $file_type=$_FILES['image']['type'];
					  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
					  
					  $extensions= array("jpeg","jpg","png");
					  
					  if(in_array($file_ext,$extensions)=== false){
						 $errors[]="extension not allowed";
						 echo "Extension not allowed, please choose a JPEG or PNG file.<br>";
						 unset($_FILES['image']);
					  }
					  
					  if($file_size > 2097152){
						 $errors[]="file too big";
						 echo "File size must be exactly 2 MB.";
						 unset($_FILES['image']);
					  }
					  
					  if($name == null){
						 echo "Please enter ingredient name.<br>";
					  }
					  if($desc == null){
						 echo "Please enter ingredient description.<br>";
					  }
					  
					  if(empty($errors)== true){
						 move_uploaded_file($file_tmp,"images/".$file_name);
						 $q =  "INSERT INTO ingredients (name, image, description, desc_source) VALUES ('$name', '$file_name','$desc', '$desc_src')";
						 $result = $db->query($q);
						 if($result){
						 header('Location:index.php');
						}else{
						 echo "Failure";
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