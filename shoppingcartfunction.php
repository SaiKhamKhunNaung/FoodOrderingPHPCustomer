<?php

	function Insert($FoodID,$NoOfRQty)
	{
		include('connect.php');
		$sql="SELECT *
            from foodmenu
			where FoodID='$FoodID'";
			
		$query=mysqli_query($connection,$sql);
		
		if (mysqli_num_rows($query)<1)
		{
			return false;
		}
		
		$row=mysqli_fetch_array($query);	
		$FoodID=$row['FoodID'];	
		$FoodPhoto=$row['FoodPhoto'];
		$FoodName=$row['FoodName'];
		$FoodPrice=$row['FoodPrice'];
		
		
		if(isset($_SESSION['Reservation']))
		{
			$index=IndexOf($FoodID);
			
			if ($index==-1)
			{
				$size=count($_SESSION['Reservation']);
              
				$_SESSION['Reservation'][$size]['FoodID']=$FoodID;
				$_SESSION['Reservation'][$size]['FoodPhoto']=$FoodPhoto;
				$_SESSION['Reservation'][$size]['FoodName']=$FoodName;
				$_SESSION['Reservation'][$size]['FoodPrice']=$FoodPrice;
                $_SESSION['Reservation'][$size]['NoOfQty']=$NoOfRQty;
			}
			else
			{
				$_SESSION['Reservation'][$index]['FoodID']=$FoodID;
				$_SESSION['Reservation'][$index]['FoodPhoto']=$FoodPhoto;
				$_SESSION['Reservation'][$index]['FoodName']=$FoodName;
				$_SESSION['Reservation'][$index]['FoodPrice']=$FoodPrice;
				$_SESSION['Reservation'][$index]['NoOfQty']=$NoOfRQty;
				$_SESSION['Reservation'][$index]['NoOfQty']=$_SESSION['Reservation'][$index]['NoOfQty']+$NoOfRQty;
			}
		}
		else
		{
			$_SESSION['Reservation']=array();
			
			$_SESSION['Reservation'][0]['FoodID']=$FoodID;
			$_SESSION['Reservation'][0]['FoodName']=$FoodName;
			$_SESSION['Reservation'][0]['FoodPhoto']=$FoodPhoto;
			$_SESSION['Reservation'][0]['FoodPrice']=$FoodPrice;				
			$_SESSION['Reservation'][0]['NoOfQty']=$NoOfRQty;
			
		}					
	}	
	
	function Remove($FoodID)
	{
		$index=IndexOf($FoodID);
		
		if ($index>-1)
		{
			unset($_SESSION['Reservation'][$index]);
		}
		
		$_SESSION['Reservation']=array_values($_SESSION['Reservation']);
	}
	
	function Clear()
	{
		unset($_SESSION['Reservation']);
	}
	
	function Get_TotalAmount()
	{
		if (!isset($_SESSION['Reservation']))
		{
			return 0;
		}
		
		$total=0;
		$size=count($_SESSION['Reservation']);
		
		for($i=0;$i<$size;$i++)
		{
			$noofqty=$_SESSION['Reservation'][$i]['NoOfQty'];
			$FoodPrice=$_SESSION['Reservation'][$i]['FoodPrice'];
			
			$total=$total+($noofqty*$FoodPrice);
		}
		
			return $total;
	}
	
	function IndexOf($FoodID)
	{
	if(isset($_SESSION['Reservation'])){			
		$size=count($_SESSION['Reservation']);
		if ($size==0)
			{
				return -1;
			}
			else{
						for ($i=0;$i<$size;$i++)
						{
							if ($FoodID==$_SESSION['Reservation'][$i]['FoodID'])
							{
								return $i;
							}
						}
						return -1;
	}
}
else
{
		return -1;
}
}
?>