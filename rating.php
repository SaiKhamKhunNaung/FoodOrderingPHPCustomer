<?php  
session_start();
$connection=mysqli_connect('localhost','root','','food');
include('customer_header2.php');
include('AutoID_Function.php');

if (isset($_REQUEST['FoodID']))
{
	 $FoodID=$_REQUEST['FoodID'];
	 $rno=$_REQUEST['rating'];
	
	
	$cid=$_SESSION['CustomerID'];
	$ratingid=AutoID('rating','RatingID','R-',6);

	$query2="SELECT * FROM rating
		where CustomerID='$cid'
		and FoodID='$FoodID'";
	$ret2=mysqli_query($connection,$query2);
	$count2=mysqli_num_rows($ret2);
	$row2=mysqli_fetch_array($ret2);
	if($count2>0)
	{
		  echo "<script>
          window.alert('You Have alredy Rating this food menu');
          window.location='food_display_rating.php';
        </script>";

	}
	else
	{

		$insert="Insert into rating(RatingID,Rate,CustomerID,FoodID)
	         VALUE('$ratingid','$rno','$cid','$FoodID')";
		$ret=mysqli_query($connection,$insert) or die(mysqli_error($connection));
	    

		$query_food="SELECT * FROM foodmenu
			where FoodID='$FoodID'";
		$ret_food=mysqli_query($connection,$query_food);
		$count_food=mysqli_num_rows($ret_food);
		$row_food=mysqli_fetch_array($ret_food);
		$ratno=$row_food['ratingno'];


	///(rno+ratingno)/ no of customer

		$query_rating="SELECT CustomerID,COUNT(*) as NumberofCustomer
			 FROM rating
			where FoodID='$FoodID'";
		$ret_rating=mysqli_query($connection,$query_rating);
		$count_rating=mysqli_num_rows($ret_rating);
		$row_rating=mysqli_fetch_array($ret_rating);

		$noofcustomer=$row_rating['NumberofCustomer']; 
		$totalrating=($rno+$ratno);
		
		$avgrating=$totalrating / $noofcustomer;


		$update="UPDATE foodmenu
				SET ratingno='$avgrating'
				WHERE FoodID='$FoodID'";

		$ret_update=mysqli_query($connection,$update);

		if ($ret)
		{
		  echo "<script>
		          window.alert('Your Rating is Successful!');
		          window.location='category.php';
		        </script>";
		}
	}
}


 


?>
<html>
<head>
<title>Food Favourite Info</title>

<script type="text/javascript">
function ChangePhoto(picsrc) 
{
	document.images.imgPhoto.src=picsrc;
}
</script>

</head>

</html>
<?php include('customer_footer.php'); ?>