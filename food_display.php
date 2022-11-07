
<?php  
include('customer_header2.php');
$connection=mysqli_connect('localhost','root','','food');

?>
<html>
<body>
	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 my-12">
	<div class="container my-5">
    <h1 align="center">Foods</h1>
<form action="food_display.php" method="get">
<fieldset>
<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					
					
				</div>
			</div>
	</div>
	</div>

		
<?php
	
if (isset($_REQUEST['CategoryID'])) 
{
	$CategoryID=$_REQUEST['CategoryID'];
	
	if(isset($_GET['btnSearch'])) 
    {
	$txtData=$_GET['txtData'];

	$query1="SELECT * FROM foodmenu
			 WHERE FoodName LIKE '%$txtData%'
			 ORDER BY FoodID DESC";
	$result1=mysqli_query($connection,$query1);
	$count1=mysqli_num_rows($result1);
	
	for($i=0;$i<$count1;$i+=3) 
	{ 
		$query2="SELECT * FROM foodmenu
				 WHERE FoodName LIKE '%$txtData%'
				 ORDER BY FoodID DESC
				 LIMIT $i,3";
		$result2=mysqli_query($connection,$query2);
		$count2=mysqli_num_rows($result2);
		echo "<table>";
		echo "<tr>";
		for($j=0;$j<$count2;$j++) 
		{ 
			$row=mysqli_fetch_array($result1);

				$FoodID=$row['FoodID'];
			$FoodName=$row['FoodName'];
			$FoodDesc=$row['FoodDesc'];
			$FoodPrice=$row['FoodPrice'];
			$FoodPhoto=$row['FoodPhoto'];
			

			?>
	<img src="<?php echo $row['FoodPhoto']; ?>" alt="Image" width="100%">
			<div class="row">
<form action="#" enctype="multipart/form-data">

				  <div class="col-lg-3 col-md-6 col-sm-12 my-3">
					<div class="card">
					  <img src="<?php echo $FoodPhoto; ?>" class="card-img-top">
					  <div class="card-body">
						<?php if($ratingno == 1){ ?>
					  		<i class="fas fa-star">
					  	<?php  } else  if($ratingno == 2){ ?>
					  		<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 3){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 4){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 5){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else { ?>
							<i class="fa fa-star-o fa-1x"></i>
						<?php } ?>		
			
						<h5 class="card-title"><?php echo $FoodName;  ?></h5>
						<h5 class="card-title"><?php echo $FoodDesc; ?></h5>
						<p class="card-text" style="color:blue"><?php echo $FoodPrice; ?></p>

                      <div class="card-footer bg-transparent">
            
                      <a class="addtocart btn btn-success" data-name="Mohinga" data-price="2500" data-id="9">
                         <i class="fas fa-cart-plus"></i>
                      </a>
					  </div>
					</div>
				  </div>
				</div>
				</div>
	</form>
			<?php
		}
		echo "</tr>";
		echo "</table>";
	}
} 
else
	{
	$query1="SELECT * FROM foodmenu r, category t
			WHERE t.CategoryID='$CategoryID'
			AND r.CategoryID=t.CategoryID
			ORDER BY r.FoodID DESC";
	$result1=mysqli_query($connection,$query1);
	$count1=mysqli_num_rows($result1);

	for($i=0;$i<$count1;$i+=4) 
	{ echo "<table>";
		echo "<tr>";
	 echo "<tr>";
		/*$query2="SELECT * FROM foodmenu r,category t
			WHERE  t.CategoryID='$CategoryID'
			AND r.CategoryID=t.CategoryID
				 ORDER BY r.FoodID DESC
				 LIMIT $i,4";
		$result2=mysqli_query($connection,$query2);
		$count2=mysqli_num_rows($result2);
        
		for($j=0;$j<$count2;$j++) 
		{ */
			$row=mysqli_fetch_array($result1);

			$FoodID=$row['FoodID'];
			$FoodName=$row['FoodName'];
			$FoodDesc=$row['FoodDesc'];
			$FoodPhoto=$row['FoodPhoto'];
			$FoodPrice=$row['FoodPrice'];
			$ratingno=$row['ratingno'];
			

			?>
	
			 

				<div class="row">

				  <div class="col-lg-3 col-md-6 col-sm-12 my-3">
					<div class="card">
					  <img src="<?php echo $FoodPhoto; ?>" class="card-img-top" width="100%">
					  <div class="card-body">
					  <?php if($ratingno == 1){ ?>
					  		<i class="fas fa-star">
					  	<?php  } else  if($ratingno == 2){ ?>
					  		<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 3){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 4){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 5){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else { ?>
							<i class="fa fa-star-o fa-1x"></i>
						<?php } ?>	
			
						<h5 class="card-title"><?php echo $FoodName;  ?></h5>
						<h5 class="card-title"><?php echo $FoodDesc; ?></h5>
						<p class="card-text" style="color:blue"><?php echo $FoodPrice; ?>MMK</p>
					</div>
                      <div class="card-footer bg-transparent">
            
                     <!-- <input type="submit" name="btnsubmit" value="Add to Favourite List"> -->
                     <a href="fav.php?FoodID=<?php echo $FoodID ?>"> <img src="../Customer/image/heart.png" width="30" height="30"></a>	|
                     <a href="food_detail.php?FoodID=<?php echo $FoodID ?>"> Food Detail </a>
					  
					</div>
				  </div>
				</div>
					
					<?php 
	     if($i==$count1-1 ) {
			 echo"<div class='col-lg-3 col-md-6 col-sm-12 my-3'> ";
			 echo"<img src='white.jpg' width='250px' height='230px' alt='None' >"; echo"</div>";	
		 }
		 else { 
			 $row=mysqli_fetch_array($result1);

			$FoodID=$row['FoodID'];
			$FoodName=$row['FoodName'];
			$FoodDesc=$row['FoodDesc'];
			$FoodPhoto=$row['FoodPhoto'];
			$FoodPrice=$row['FoodPrice']; 
			$ratingno=$row['ratingno'];
		?> 
					<div class="col-lg-3 col-md-6 col-sm-12 my-3">
					<div class="card">
					  <img src="<?php echo $FoodPhoto; ?>" class="card-img-top" width="100%">
					  <div class="card-body">
					  <?php if($ratingno == 1){ ?>
					  		<i class="fas fa-star">
					  	<?php  } else  if($ratingno == 2){ ?>
					  		<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 3){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 4){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 5){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else { ?>
							<i class="fa fa-star-o fa-1x"></i>
						<?php } ?>			
			
						<h5 class="card-title"><?php echo $FoodName;  ?></h5>
						<h5 class="card-title"><?php echo $FoodDesc; ?></h5>
						<p class="card-text" style="color:blue"><?php echo $FoodPrice; ?>MMK</p>
							</div>
                      <div class="card-footer bg-transparent">
            
                    <a href="fav.php?FoodID=<?php echo $FoodID ?>"> <img src="../Customer/image/heart.png" width="30" height="30"></a>	|
                     <a href="food_detail.php?FoodID=<?php echo $FoodID ?>"> Food Detail </a>
					  </div>
					
				  </div>
				</div> <?php } ?>
					
					
					
					
					<?php 
	     if($i==$count1-1  || $i==$count1-2) 
		{
			 echo"<div class='col-lg-3 col-md-6 col-sm-12 my-3'> ";
			 echo"<img src='white.jpg' width='250px' height='230px' alt='None' >"; echo"</div>";	
		 }
		 else { 
			 $row=mysqli_fetch_array($result1);

			$FoodID=$row['FoodID'];
			$FoodName=$row['FoodName'];
			$FoodDesc=$row['FoodDesc'];
			$FoodPhoto=$row['FoodPhoto'];
			$FoodPrice=$row['FoodPrice']; 
			$ratingno=$row['ratingno'];
		?> 
					<div class="col-lg-3 col-md-6 col-sm-12 my-3">
					<div class="card">
					  <img src="<?php echo $FoodPhoto; ?>" class="card-img-top" width="100%">
					  <div class="card-body">
					  <?php if($ratingno == 1){ ?>
						  <i class="fas fa-star"> </i>
					  	<?php  } else  if($ratingno == 2){ ?>
					  		<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 3){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 4){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 5){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else { ?>
							<i class="fa fa-star-o fa-1x"></i>
						<?php } ?>	
			
						<h5 class="card-title"><?php echo $FoodName;  ?></h5>
						<h5 class="card-title"><?php echo $FoodDesc; ?></h5>
						<p class="card-text" style="color:blue"><?php echo $FoodPrice; ?>MMK</p>
							</div>
                      <div class="card-footer bg-transparent">
            
                     <a href="fav.php?FoodID=<?php echo $FoodID ?>"> <img src="../Customer/image/heart.png" width="30" height="30"></a>	|
                     <a href="food_detail.php?FoodID=<?php echo $FoodID ?>"> Food Detail </a>
					  </div>
					
				  </div>
				</div><?php } ?>
					
					
					
					
					
					<?php 
	     	if($i==$count1-1  || $i==$count1-2 || $i==$count1-3)
			{
			 echo"<div class='col-lg-3 col-md-6 col-sm-12 my-3'> ";
			 echo"<img src='white.jpg' width='250px' height='230px' alt='None' >"; echo"</div>";	
		 }
		 else { 
			 $row=mysqli_fetch_array($result1);

			$FoodID=$row['FoodID'];
			$FoodName=$row['FoodName'];
			$FoodDesc=$row['FoodDesc'];
			$FoodPhoto=$row['FoodPhoto'];
			$FoodPrice=$row['FoodPrice'];
			$ratingno=$row['ratingno']; 
		?> 
					<div class="col-lg-3 col-md-6 col-sm-12 my-3">
					<div class="card">
					  <img src="<?php echo $FoodPhoto; ?>" class="card-img-top" width="100%">
					  <div class="card-body">
					  <?php if($ratingno == 1){ ?>
						  <i class="fas fa-star"> </i>
					  	<?php  } else  if($ratingno == 2){ ?>
					  		<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 3){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 4){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else  if($ratingno == 5){ ?>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						<?php  } else { ?>
							<i class="fa fa-star-o fa-1x"></i>
						<?php } ?>	
			
						<h5 class="card-title"><?php echo $FoodName;  ?></h5>
						<h5 class="card-title"><?php echo $FoodDesc; ?></h5>
						<p class="card-text" style="color:blue"><?php echo $FoodPrice; ?>MMK</p>
							</div>
                      <div class="card-footer bg-transparent">
            
                  <a href="fav.php?FoodID=<?php echo $FoodID ?>"> <img src="../Customer/image/heart.png" width="30" height="30"></a>	|
                     <a href="food_detail.php?FoodID=<?php echo $FoodID ?>"> Food Detail </a>
					  </div>
					
				  </div>
					</div> <?php } ?>
					
					
					
					
	</div> </div> </div>
		
			<?php
		
			echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
	
	}
}
?>		
</table>
			
</fieldset>
	</div> </div>
	
<div class="row">
      
		<div class="col-lg-12 col-md-12 col-sm-12 my-12">
<?php	include ('customer_footer.php'); ?>
	</div></div>
</body>
		</html>
	
	
