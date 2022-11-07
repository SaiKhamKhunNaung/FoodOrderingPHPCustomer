<?php 
session_start();
include('connect.php');
include('customer_header2.php');

    if (isset($_SESSION['CustomerID']))
 		  {
				 $CustomerID=$_SESSION['CustomerID'];

				 $select="select *from customer
				 where CustomerID='$CustomerID'";

				 $ret=mysqli_query($connection,$select);
				 $row=mysqli_fetch_array($ret);

				 $CustomerName=$row['CustomerName'];
				 $CustomerPassword=$row['CustomerPassword'];
				 $CustomerEmail=$row['CustomerEmail'];
				 $CustomerPhNo=$row['CustomerPhNo'];
				 $CustomerAddress=$row['CustomerAddress'];
				 
	     

}


         if(isset($_POST['btnUpdate']))
         {
          $U_CustomerID=$_POST['txtcustomerid'];
          $U_CustomerName=$_POST['txtcustomername'];
			 $U_CustomerPass=$_POST['txtcustomerpassword'];
			 $U_CustomerEmail=$_POST['txtcustomeremail'];
			  $U_CustomerPhNo=$_POST['txtcustomerephno'];
			  $U_CustomerAddress=$_POST['txtcustomeraddress'];

          $update="Update customer
                     Set CustomerName='$U_CustomerName',
					 	 CustomerPassword='$U_CustomerPass',
						 CustomerEmail='$U_CustomerEmail',
						 CustomerPhNo='$U_CustomerPhNo',
						 CustomerAddress	='$U_CustomerAddress'
                      Where CustomerID='$U_CustomerID'";

                     $U_ret=mysqli_query($connection,$update);

                     if ($U_ret) 
                     {
                      echo"<script>window.alert('Succcessfully Update!')</script>";
                     echo"<script>window.location='category.php'</script>";
                        }
                        else
                        {
                          echo"<p>".mysqli_error($connection)."</p>";
                        }
         }
 ?>

 	
		<br><br>
		<div class="container" >
			<div class="row">

<!-- 	<div class="container" style="padding:20px;">
-->		<div class="col-lg-6 col-md-6 col-sm-12">

<h3 style="text-align: center; color:green;">Update Your Profile</h3>
	
	 <form action="customer_update.php" method="post" >
		 
		<div class="form-group">

 		CustomerID<input type="text" name="txtcustomerid" class="form-control my-3" value="<?php echo  $CustomerID;?>" readonly  >
		
		CustomerName<input type="text" name="txtcustomername" class="form-control my-3" value="<?php echo  $CustomerName;?>" required>
			
	    CustomerPassword<input type="password" name="txtcustomerpassword" class="form-control my-3" value="<?php echo  $CustomerPassword;?>" required>
			
		CustomerEmail<input type="email" name="txtcustomeremail" class="form-control my-3" value="<?php echo  $CustomerEmail;?>" required>
			
		CustomerPhNo<input type="text" name="txtcustomerephno" class="form-control my-3" value="<?php echo  $CustomerPhNo;?>" required>
			
		CustomerAddress<input type="text" name="txtcustomeraddress" class="form-control my-3" value="<?php echo  $CustomerAddress;?>" required>
				
			

<div class="mt-4">
	<button type="submit" name="btnUpdate" class="btn btn-success btn-block">Update</button>
</div>
			

</form>
</div>

														
      
	

</div>												
			<div class="col-lg-6 col-md-6 col-sm-12">
	<img src="foodorder.jpg" class="img-fluid" style="height:430px">
											
										     			
		<br><br>
		

</div>
</div>
	</form>
	
</div>
	

</body>
</html>
<br><br>

<?php include ('customer_footer.php'); ?>



