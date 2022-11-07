
<?php 

session_start();
$connection=mysqli_connect('localhost','root','','food');
include('customer_header.php');




if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];

	$select="select*from customer
	         Where CustomerEmail='$email'
	         And CustomerPassword='$password'";

	  $ret=mysqli_query($connection,$select);
	  $count=mysqli_num_rows($ret);

	  if($count>0)
	  {
        $row=mysqli_fetch_array($ret);
        $_SESSION['CustomerID']=$row['CustomerID'];
        $_SESSION['CustomerEmail']=$row['CustomerEmail'];
        $_SESSION['CustomerPassword']=$row['CustomerPassword'];

		 $_SESSION['CustomerID']=$row['CustomerID'];
	  	echo"<script>window.alert('Login Success!')</script>";
	  	echo"<script>window.location='category.php'</script>";
	  }
	  else
	  {
	  	echo"<script>window.alert('Login Incorrect!')</script>";
	  	echo"<script>window.location='customer_login.php'</script>";
	  }
}

 ?>
<html>
<head>
  <title>Customer Login</title>
</head>
<body>



	</div>
	<div >
		<div class="modal-body">
        <div class="row">
        	<div class="col-lg-6 col-md-12 col-sm-12">
        		<img src="a.gif" width=100%>
        	</div>
        	<div class="col-lg-6 col-md-12 col-sm-12">

        		<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
  <li class="nav-item">
    <h4><a class="nav-link active text-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Login</a></h4>
  </li>
  
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	
  <form action="customer_login.php"method="post">
  	
<div class="form-group">
	
	<label for="email">Email</label>
	<input type="email" name="txtemail" class="form-control" required >
	<label for="password">Password</label>
	<input type="password" name="txtpassword" class="form-control" required>
	
	
	
	
</div>

<div class="offset-2 col-8 offset-2">
	
<button type="submit"  class="btn btn-success btn-block" name="btnlogin">
	
	Login
</button>
<button type="reset" name="btncancel" class="btn btn-success btn-block">
	
	Cancel
</button>
</div>

  </form>


  </div>
  
 
</div>
</div></div></div>
			</body>				

</html>
	<?php include('customer_footer.php'); ?>