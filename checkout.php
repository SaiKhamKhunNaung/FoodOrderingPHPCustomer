<?php
session_start();

//$connection=mysqli_connect('localhost','root','','food');
$connection=mysqli_connect('localhost','root','','food');
require_once("AutoID_Function.php");

require_once("shopping_cart_function.php");
if(isset($_SESSION['CustomerID']))
{
  echo $cusID = $_SESSION["CustomerID"];
  $select = "select * from customer where CustomerID = '$cusID'";
  $sret= mysqli_query($connection,$select);
  $row= mysqli_num_rows($sret);
}
else
{
  echo "<script>window.location.assign('customer_login.php')</script>";
}
 if(isset($_POST['btnCheckOut']))
{
   $cardType=$_POST['rdoPaymentOption'];
   $cardNo=$_POST['txtCardInfo'];
   
	 $saleID = AutoID("tblorder","OrderID","Or-",6);
	 $paymentID = AutoID("payment","PaymentID","Pay-",6);
	  $saleDate = Date("Y-m-d",strtotime($_POST["txtdate"]));
	  $saleTime=  $_POST["txttime"];
//  $cusID = $_SESSION["CustomerID"];
	$cusID = $_POST["txtcustomerid"];
	  $deliveryAdd = $_POST["txtaddress"];
	  $contactPerson = $_POST["txtcontactperson"];
	  $contactPh = $_POST["txtContactPhone"];
	  $totalAmount = Get_TotalAmount();
	  $type=$_POST['rdoPaymentOption'];
	  $acc=$_POST['txtCardInfo'];
	 
	  echo $saleInsert=mysqli_query($connection,"INSERT INTO
     tblorder (OrderID,TotalPrice,OrderDate,OrderTime,CustomerID,CusName,CusAddress,CusPhNo,OrderStatus)
     VALUES ('$saleID','$totalAmount','$saleDate','$saleTime','$cusID','$contactPerson','$deliveryAdd','$contactPh','Ordered')");
	
	 echo  mysqli_query($connection,"INSERT INTO payment
      VALUES ('$paymentID','$type','$acc','$saleID')");
     
      $_SESSION['OrderID']=$saleID;
      $ReservationSize = count($_SESSION['Reservation']);
      for($i=0; $i<$ReservationSize; $i++)
      {
        $productid=$_SESSION['Reservation'][$i]['FoodID'];
        $price =$_SESSION['Reservation'][$i]['FoodPrice'];
        $qty =$_SESSION['Reservation'][$i]['NoOfQty'];
        $amount = $_SESSION['Reservation'][$i]['FoodPrice'] * $_SESSION['Reservation'][$i]['NoOfQty'];
        
    
        mysqli_query($connection,"insert into fooddetail
		values('$saleID','$productid','$qty','$amount')");
     
        
      }
      clear();
	 if($saleInsert)
		{
			echo "<script>
			  alert('Thanks You for Your Order. Check your email for payment options. Thank you!!! :D');
			  window.location='category.php';

			</script>";
		}
}


function saveOrder()
{
  echo $saleID = AutoID("tblorders","OrderID","Or-",6);
  $saleDate = Date("Y-m-d",strtotime($_POST["txtdate"]));
  $saleTime=  $_POST["txttime"];
//  $cusID = $_SESSION["CustomerID"];
	$cusID = $_POST["txtcustomerid"];
  $deliveryAdd = $_POST["txtaddress"];
  $contactPerson = $_POST["txtcontactperson"];
  $contactPh = $_POST["txtContactPhone"];
  $totalAmount = Get_TotalAmount();
  $type=$_POST['rdoPaymentOption'];
  $acc=$_POST['txtCardInfo'];
  
  $Status = "Pending";

// echo $saleInsert=mysqli_query($connection,"INSERT INTO
//     tblorder (OrderID,TotalPrice,OrderDate,OrderTime,CustomerID,CusName,CusAddress,CusPhNo,OrderStatus)
//     VALUES ('$saleID','$totalAmount','$saleDate','$saleTime','$cusID','$contactPerson','$deliveryAdd','$contactPh','Ordered')");
 
	echo $saleInsert=mysqli_query($connection,"INSERT INTO
	 tblorders (OrderID,OrderDate)
	 VALUES ('$saleID','$saleDate')");
	
//	$insert="INSERT INTO tblorder (OrderID ,OrderDate)
//         VALUE('$saleID','$saleDate')";	
//$ret=mysqli_query($connection,$insert) or die(mysqli_error($connection));


//  echo  mysqli_query($connection,"INSERT INTO payment
//      VALUES ('$type','$acc','$saleID')");
     
      //$_SESSION['OrderID']=$saleID;
      $ReservationSize = count($_SESSION['Reservation']);
      for($i=0; $i<$ReservationSize; $i++)
      {
        $productid=$_SESSION['Reservation'][$i]['FoodID'];
        $price =$_SESSION['Reservation'][$i]['FoodPrice'];
        $qty =$_SESSION['Reservation'][$i]['NoOfQty'];
        $amount = $_SESSION['Reservation'][$i]['FoodPrice'] * $_SESSION['Reservation'][$i]['NoOfQty'];
        
    
//        mysqli_query($connection,"insert into fooddetail
//		values('$saleID','$productid','$qty','$amount')");
//     
        
      }
     // clear();
	if($saleInsert)
	{
		echo "<script>
          alert('Thanks You for Your Order. Check your email for payment options. Thank you!!! :D');
          window.location='category.php';

        </script>";
	}
      
 

}

 if(isset($_GET['action']))
    {
        if ($_GET['action']=="remove")
        {
            $ProductID=$_GET['FoodID'];
            Remove($ProductID);
        }
        
    }

    //  if(isset($_POST['btnContinue']))
    // {
    //     echo "<a href=''></a>";
        
    // }
?>

<html>
<head>
	<title> Foodism</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="icon" type="jpg" href="image/f3.png" size="16*16">

	 <script type="text/javascript">
      function CalculatePayment() 
      {
        var TotalAmount=0;
        TotalAmount=document.getElementById('txtTotalAmount').value;
        TotalAmount=TotalAmount / 2;
        document.getElementById('txtNetAmount').value=TotalAmount;
        document.getElementById('txtPendingAmount').value=TotalAmount;
      }

      function CalculatePaymentDefault() 
      {
        var TotalAmount=0;
        TotalAmount=document.getElementById('txtTotalAmount').value;
        document.getElementById('txtNetAmount').value=TotalAmount;
        document.getElementById('txtPendingAmount').value=0;
      }
      function DisplayCard() 
      {
        document.getElementById('txtCardInfo').style.display='block';
      }

      function HideCard() 
      {
        document.getElementById('txtCardInfo').style.display='none';
      }

      </script>
	
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
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
					<li class="nav-item active px-3">
						<a class="nav-link text-success" href="customer_logout.php">LogOut <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				
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
	<h3 style="text-align: center; color:green;">Create Order</h3>
	
	 <form action="checkout.php" method="post">

		<div class="form-group">
			OrderID<input type="text" readonly name="txtorderid" class="form-control my-3" value="<?php echo AutoID("tblorder","OrderID","Or-",6); ?>">
			Total Amount<input type="text" readonly name="txttotalamount" class="form-control my-3" id="username" value="<?php echo Get_TotalAmount();  ?>MMK">
			
			<?php
				$query="SELECT * FROM customer
				where CustomerID='$cusID'";

				$ret=mysqli_query($connection,$query);
				$arr=mysqli_fetch_array($ret);

				$CustomerName=$arr['CustomerName'];
				$CustomerPhNo=$arr['CustomerPhNo'];
			?>
			<input type="text" name="txtcustomerid" class="form-control my-3" value="<?php echo $cusID;	?>" id="username">
			Contact Person<input type="text" name="txtcontactperson" class="form-control my-3" value="<?php echo $CustomerName;	?>" id="username">

			Contact No<input type="text" name="txtContactPhone" class="form-control my-3" id="phone" value="<?php echo $CustomerPhNo;	?>" >
			
			<label >Select Date & Time 
				<input type="date" name="txtdate" class="form-control " id="date" required >
				<input type="time" name="txttime" class="form-control " id="time" required>

			</label>
			
<!--
			<select name="cboCard" class="form-control my-3">
			  <option>SELECT PAYMENT TYPE</option>
				<option>Master</option>
		  		<option>Visa Card</option>
				<option>Paypal</option>
				<option>Cash On Delivery</option>
			</select>

	<input type="text" name="txtCardNo" class="form-control my-3" placeholder="Type Card Number Here"/>
--><br>
			Select Payment Type <br>
			<input onClick="HideCard()" type="radio" name="rdoPaymentOption" value="COD" checked/> Cash Down</abbr>
			 <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="UCB"/> <img src="image/ucb.png" width="30px" height="25px"/>
			 <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="Visa"/> <img src="image/visa.png" width="40px" height="30px"/>
			 <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="Master"/> <img src="image/mc.png" width="40px" height="30px"/>
			 <input onClick="DisplayCard()" type="radio" name="rdoPaymentOption" value="Paypal"/> <img src="image/Paypal.png" width="40px" height="30px"/>
			 <br/><br/>
			 <input type="text" id="txtCardInfo" name="txtCardInfo" size="25" placeholder="Card Number" style="display:none;"/>
			<textarea class="form-control my-3" type="text" name="txtaddress" class="form-control my-3" placeholder="Enter your full Address" id="address" required></textarea>
		</div>

		<button type="submit" name="btnCheckOut"  data-toggle="modal" data-target="#cardtwoModal" class=" btn btn-success btn-block">Order</a>

	

<!--  <input type="submit" class="btn-success" value="Create">
-->  
<button type="reset" class="btn btn-success btn-block">
			Reset
		</button>


</form>
</div>

<div class="col-lg-6 col-md-6 col-sm-12">
	<img src="foodorder.jpg" class="img-fluid" style="height:430px">

	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.605988127587!2d96.12316124915151!3d16.84589172257581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1953fc49fb755%3A0x45b19605a43c3143!2sMyanmar%20IT%20Consulting!5e0!3m2!1sen!2smm!4v1580375587634!5m2!1sen!2smm" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	-->

</div>
</div>

</div>
<div class="modal fade" id="cardtwoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Order Is Successful Thank You For Your Order
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br><br>
<h2 style="text-align:center; color:green;"> Our VIP Customer Says </h2>

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
						<b> <p> "This site is flipping GOOD for all foodies !! " </p></b>
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





<div class="modal fade" id="cardoneModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sign In/Sign Up</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<img src="a.gif" class="img-fluid">
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">

						<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Sign Up</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-success" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sign In</a>
							</li>

						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

								<form>

									<div class="form-group">
										<label for="username">User Name</label>
										<input type="text" name="" class="form-control" id="username">
										<label for="email">Email</label>
										<input type="email" name="" class="form-control" id="email">
										<label for="password">Password</label>
										<input type="password" name="" class="form-control" id="password">
									</div>

									<div class="offset-2 col-8 offset-2">

										<button type="submit" class="btn btn-success btn-block">

											Register
										</button>

									</div>

								</form>


							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="" class="form-control" id="email">
									<label for="password">Password</label>
									<input type="password" name="" class="form-control" id="password">

									<input type="checkbox" name="" >
									<label for="rememberme">Remember Me</label>


								</div>
								<div class="offset-2 col-8 offset-2">

									<button type="submit" class="btn btn-success btn-block">

										Login
									</button>

								</div>


							</form>

						</div>

					</div>
				</div></div></div></div></div></div>




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

