<html>
<head>
	<title>FOODISM</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="icon" type="jpg" href="1.png" size="16*16">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="javascript.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

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

		div#carouselExampleIndicators img
{
	width:100%;
	margin: 0 auto;
	height:500px;
	object-fit:cover;
}
div#cool1 a {
color:white;
}

div#cool2 a {
color:white;
}
div#cool h3 {
color:#04431B;
}




	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light " >
	<a class="navbar-brand" href="#"><img src="1.png" style="width:140px; height:40px">
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
        <a class="nav-link text-success" href="contact.html"  >Contact</a>
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