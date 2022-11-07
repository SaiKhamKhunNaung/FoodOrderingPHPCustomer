<?php 
include('customer_header.php');
$connection=mysqli_connect('localhost','root','','food');
include('AutoID_Function.php');

if (isset($_POST['btnsave'])) 
{
    $Customerid=$_POST['txtcustomerid'];
	$CustomerName=$_POST['txtcustomername'];
	$Password=$_POST['txtpassword'];
	$Email=$_POST['txtemail'];
    $Phone=$_POST['txtphonenumber']; 
    $Address=$_POST['txtaddress'];

    $insert="Insert into customer(CustomerID,CustomerName,CustomerPassword,CustomerEmail,CustomerPhNo,CustomerAddress)
         VALUE('$Customerid','$CustomerName','$Password','$Email','$Phone','$Address')";
$ret=mysqli_query($connection,$insert) or die(mysqli_error($connection));

if ($ret)
{
  echo "<script>
          window.alert('Register Successful!');
          window.location='customer_login.php';
        </script>";
}



}


 ?>
<html>
<head>
  <title>Customer Registration</title>
</head>
<body>



	</div>
	<div class="modal-body">
        <div class="row">
        	<div class="col-lg-6 col-md-12 col-sm-12">
        		<img src="a.gif" width="100%">
        	</div>
        	<div class="col-lg-6 col-md-12 col-sm-12">

        		<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
  <li class="nav-item">
    <h4><a class="nav-link active text-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Sign Up</a></h4>
  </li>
  
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	
  <form action="customerregister.php"method="post">
  	
<div class="form-group">
	<input type="hidden" name="txtcustomerid" value="<?php  echo AutoID('customer','CustomerID','C-',6)?>"/>
	<label for="username">CustomerName</label>
	<input type="text" name="txtcustomername" class="form-control" >
	<label for="password">Password</label>
	<input type="password" name="txtpassword" class="form-control" >
	<label for="email">Email</label>
	<input type="email" name="txtemail" class="form-control" >
	<label for="text">PhoneNumber</label>
	<input type="text" name="txtphonenumber" class="form-control" >
	<label for="text">Address</label>
	<input type="text" name="txtaddress" class="form-control" >
	
	
</div>

<div class="offset-2 col-8 offset-2">
	
<button type="submit" name="btnsave" class="btn btn-success btn-block">
	
	Register
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