<!DOCTYPE html>
<html>
<head>
	<title>Foodism</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="icon" type="jpg" href="1.png" size="16*16">
	

<style type="text/css">
	body{
  overflow-x: hidden;
}
.hidden-thing
{
  position: absolute;
  left: 100%;
  width: 50px;
  height: 50px;
  opacity: 0;
}
div#cool1 a {
color:white;
}

div#cool2 a {
color:white;
}

div#carouselExampleIndicators img
    {
     width:100%;
     margin: 0 auto;
     height:500px;
     object-fit:cover;
   }
</style>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light " >
	<a class="navbar-brand" href="#"><img src="image/f3.png" style="width:100px; height:70px">
			</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
        <a class="nav-link text-success" href="category.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link text-success" href="about.html">About</a>
      </li>
      <li class="nav-item dropdown active">
      
          
      </li>
      <li class="nav-item active">
        <a class="nav-link text-success" href="contact.php"  >Contact</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link text-success" href="customer_update.php"  >Profile</a>
      </li>
		 <li class="nav-item active">
        <a class="nav-link text-success" href="fav_list.php"  >FavoriteList</a>
      </li>
		<li class="nav-item active">
        <a class="nav-link text-success" href="food_display_rating.php"  >Ratings</a>
      </li>
		<li class="nav-item active">
        <a class="nav-link text-success" href="customer_logout.php"  >Logout</a>
      </li>
    </ul>
      </div>

    <div class="cart-info" class="nav-info align-items-center cart-info d-flex justify-content-between mx-lg-5">
          <span class="cart-info_icon mr-lg-3 "><a href="shopping_cart.php"> 
          <i class="fas fa-cart-arrow-down"></i></a>
            </span>
        </div>
</nav>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active" class="col-lg-12 col-md-12 col-sm-12 my-3">
					<img src="i.jpg" class="d-block w-100" alt="..." >
				</div>
				<div class="carousel-item" class="col-lg-12 col-md-12 col-sm-12 my-3">
					<img src="l.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" class="col-lg-12 col-md-12 col-sm-12 my-3">
					<img src="o.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<br><br>
		<div class="container">
			<div class="row">

<!-- 	<div class="container" style="padding:20px;">
-->		<div class="col-lg-6 col-md-6 col-sm-12">


	<form>

		<div class="form-group">

<!-- 				<label for="username" hidden="email">User Name</label>
-->				<input type="text" name="" class="form-control my-3" placeholder="Your Name" id="username">

<!-- 				<label for="username">Email</label>
-->				<input type="text" name="" class="form-control my-3" id="email" placeholder="Email">
<!-- 				<label for="username">Password</label>
-->				<textarea class="form-control my-3" type="text" name="" class="form-control my-3" placeholder="Messages" id="messages"></textarea>
</div>

<div class="mt-4">
	<button type="submit" class="btn btn-success btn-block">
			Contact
									</button>
</div>

</form>
</div>
<!-- </div>
-->

<div class="col-lg-6 col-md-12 col-sm-12">


	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.605988127587!2d96.12316124915151!3d16.84589172257581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1953fc49fb755%3A0x45b19605a43c3143!2sMyanmar%20IT%20Consulting!5e0!3m2!1sen!2smm!4v1580375587634!5m2!1sen!2smm" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


</div>
</div>

</div>

<br><br>
<h2 style="text-align:center; color:green;"> Our VIP Customers Says </h2>

<div class="offset-1 col-lg-10 offset-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12 my-3">
				<div class="card">
					<img src="image/people1.jpg" class="img-fluid">
					<div class="card-body">
						<b> <p> " I'm very satisfied because of all menus are my favorite, and fair price " </p></b>
						<h2 class="card-title">-Rosy Jame- </h2>
						<p style="color:green;" > ordered by 85 times</p>
					</div>

				</div>


			</div>



			<div class="col-lg-3 col-md-6 col-sm-12 my-3">
				<div class="card">
					<img src="image/people2.jpg" class="img-fluid">
					<div class="card-body">
						<b> <p> "This site is f**king GOOD for all foodies !! " </p></b>
						<h2 class="card-title">-Willian Charles- </h2> 
						<p style="color:green;" > ordered by 70 times</p>
					</div>

				</div>


			</div>


			<div class="col-lg-3 col-md-6 col-sm-12 my-3">
				<div class="card">
					<img src="image/people3.jpg" class="img-fluid">
					<div class="card-body">
						<b> <p> " If you hungry, contact to this site ! Feel the taste & their service !! "  </p></b>
						<h2 class="card-title">-Amy Sue- </h2> <br>
						<p style="color:green;" > ordered by  60 times</p>
					</div>

				</div>


			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 my-3">
				<div class="card">
					<img src="image/people4.jpg" class="img-fluid">
					<div class="card-body">
						<b> <p> " Just Contact this Site when you Hungry !" </p></b>
						<h2 class="card-title">-Carroline- </h2> <br>
						<p style="color:green;" > ordered by 45 times</p>
					</div>

				</div>


			</div>

		</div>
	</div>
</div>


<br><br>
				<br>


				<div class="footer bg-success">
					<div class="row">
						<div class="col-lg-10 col-md-6 col-sm-12 mx-5 my-5" >
							<p class="text-light">Our Food Delivery System is Myanmar's leading online and mobile food-ordering company dedicated to bring Yangon's best restaurants to our customers doorstep. The company's online and mobile ordering platforms allow diners to order food delivery and pickup from a vast amount of takeout restaurants, and every order is supported by the company's amazing customer service team.</p>
						</div>
						<hr class="my-5" id="">

						<div class="col-lg-2 col-md-6 col-sm-12 my-5 mx-5" id="cool1" >
							<h4>Get Connected</h4>
							<i class="fab fa-twitter"></i>
							<a href="">Twitter</a><br>
							<i class="fab fa-facebook-square"></i>
							<a href="">Facebook</a><br>
							<i class="fab fa-google-plus-g"></i>
							<a href="">Google Plus</a><br>
							<i class="fab fa-instagram"></i>
							<a href="">Instagram</a><br>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-12 my-5 mx-5" id="cool2" >
								<h4>Nevigate</h4>

								<a href="">Home</a>

								<a href="">About</a>

								<a href="">Menu</a>

								<a href="">Contact</a>
								<a href="">Sign In/ Sign Up</a>

							</div>


						</div>

					</div>


				</div>
			</body>
		</body></html>


		