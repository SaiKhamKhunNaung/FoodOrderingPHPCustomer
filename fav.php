<?php  
session_start();
$connection=mysqli_connect('localhost','root','','food');
include('customer_header2.php');
include('AutoID_Function.php');

if (isset($_REQUEST['FoodID']))
{
	$FoodID=$_REQUEST['FoodID'];
	$query="SELECT * FROM foodmenu
	where FoodID='$FoodID'";

	$ret=mysqli_query($connection,$query);
	$arr=mysqli_fetch_array($ret);

	$FoodName=$arr['FoodName'];
	$FoodDesc=$arr['FoodDesc'];
	$FoodPrice=$arr['FoodPrice'];

	$FoodPhoto=$arr['FoodPhoto'];
}
if (isset($_POST['btnAdd']))
{

	$flid=$_POST['txtfavlistid'];
	$cid=$_SESSION['CustomerID'];
	$foodid=$_POST['FoodID'];
	
	$query_fav="SELECT * FROM favlist 
	where FoodID='$FoodID'";

	$ret_fav=mysqli_query($connection,$query_fav);
	$num_fav=mysqli_num_rows($ret_fav);
	
if ($num_fav>0)
	{
  echo "<script>
          window.alert('Your Fav List  already exists!');
          window.location='category.php';
        </script>";
}
	else
	{
		 $insert="Insert into favlist(FavlistID,CustomerID,FoodID)
         VALUE('$flid','$cid','$foodid')";
$ret=mysqli_query($connection,$insert) or die(mysqli_error($connection));

if ($ret)
{
  echo "<script>
          window.alert('Your Fav List is Successful!');
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
<body>
	
		
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">Product Detail for : <?php echo $FoodName ?></h2>
					
			
			
</div></div>
<form action="#" method="POST">
<input type="hidden" name="txtfavlistid" value="<?php  echo AutoID('favlist','FavlistID','FL-',6)?>"/>
<input type="hidden" name="FoodID"  value="<?php echo $FoodID ?>" />
<input type="hidden" name="FoodName"  value="<?php echo $FoodName ?>" />
<input type="hidden" name="FoodPrice"  value="<?php echo $FoodPrice ?>" />
<input type="hidden" name="action" value="buy"/>
<fieldset>
<table align="center">
<tr>
	<td>
		<img  src="<?php echo $FoodPhoto ?>" width="400" height="400"/>
		<br/>

	</td>
	<!--============================================-->
	<td>
		<table>
		<tr>
			<td>Food Name</td>
			<td>
			: <b><?php echo $FoodName ?></b>	
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
			: <b><?php echo $FoodDesc ?></b>	
			</td>
		</tr>
		<tr>
			<td>Food Price</td>
			<td>
			: <b style="color:blue;"><?php echo $FoodPrice ?></b> MMK
			</td>
		</tr>
	
		<tr>
			<td></td>
			<td>
				<input type="submit" name="btnAdd" class="btn btn-primary" value="Add to Favourite List"/>
			</td>
		</tr>
		</table>
	</td>
</tr>

</table>

</fieldset>
</form>
</body>
</html>
<?php include('customer_footer.php'); ?>