<?php  
session_start();
$connection=mysqli_connect('localhost','root','','food');
include('shopping_cart_function.php');
include('customer_header2.php');

$FoodID=$_REQUEST['FoodID'];

$query="SELECT * FROM foodmenu
where FoodID='$FoodID'";

$ret=mysqli_query($connection,$query);
$arr=mysqli_fetch_array($ret);

$FoodName=$arr['FoodName'];
$FoodDesc=$arr['FoodDesc'];
$FoodPrice=$arr['FoodPrice'];

$FoodPhoto=$arr['FoodPhoto'];


 


?>
<html>
<head>
<title>Food Detail</title>

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
<form action="Shopping_Cart.php" method="POST">
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
			<td>Enter Buying Qty</td>
			<td>
			:	<input type="number" name="txtbuyQty" required min="1" />
				<input type="submit" name="btnAddtoCart" class="btn btn-primary" value="Add to Cart"/>
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