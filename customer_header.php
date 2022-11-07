<html>
<head>
	<title>Foodism</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="icon" type="jpg" href="image/f3.png" size="16*16">
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

div#cool{
	background:linear-gradient(to bottom,rgba(0,0,0,.4)0, rgba(0,0,0,.4)100%),url(g.jpg);
	width:100%;
	height:800px;
	background-repeat:no-repeat;
	background-position: center center;
	background-attachment: fixed;
	background-size: cover;
	padding:10rem 10rem;
	color:white;
}
	
	div#carouselExampleIndicators img
{
	width:100%;
	margin: 0 auto;
	height:400px;
	object-fit:cover;
}
div#mid img
{
	float:left;
	left:50%;
	width:100%;
	margin: 0 auto;
	object-fit:cover;
	
}
div#note
{
	float:left;
}
table#label div
{
	float:left;
	left:20%;
}

div#navtitle
{
	padding-top: 30px;


}
div#divider{
	max-width:3.25rem;
	border=width:.2rem;
	border-color:#04B431;
}

div#cool1 a {
color:white;
}

div#cool2 a {
color:white;
}
</style>
	
</head>
<body>
	
	

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
	<a class="navbar-brand" href="#"><img src="image/f3.png" style="width:100px; height:70px">
			</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
        <a class="nav-link text-success" href="customer_login.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active px-3">
						<a class="nav-link text-success" href="customerregister.php" >Register </a>
					</li>
		 <li class="nav-item active px-3">
						<a class="nav-link text-success" href="customer_login.php" >Login </a>
					</li>
    </ul>
   
  </div>
  <div class="cart-info" class="nav-info align-items-center cart-info d-flex justify-content-between mx-lg-5">
          <!-- <span class="cart-info_icon mr-lg-3 "><a href="checkout.html"> 
          <i class="fas fa-cart-arrow-down"></i></a>
            </span> -->
        </div>
</nav>
<div id="cool">


			<div class="modal fade" id="cardoneModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In/Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </div></div></div>
	<div class="container justify-content-center text-center" id="navtitle">
			
				<div class="col-12">
					<h3 class="display-1">Be Enjoy With Our Food</h3>
					<hr class="my-5" id="divider">

				</div>
				<div class="col-12">
					<h4 class="text-success">Contact Offline Phone 009448005952</h4>
					

				</div>


			</div>
			 
    