<?php

$title = "Home";
include('header.php');
	
		require('SQLConnect.php');
		ob_start();
		//session_start();
		if(isset($_SESSION['username']))
		{
			$username=$_SESSION['username'];
		}
		else
		{
		$username=NULL;
		} 
		
	$query = "SELECT user_id FROM user_info WHERE user_name='$username'";
	
	
	$sql1 = mysql_query($query);
	$exists = mysql_num_rows($sql1);
	if($exists>0){
		while($count = mysql_fetch_array($sql1)){
			$user_id = $count['user_id'];
		}
	}
	$query2 = "SELECT o.prod_name as prod_name,o.quantity as quantity,o.cost as cost,status,image FROM `orders` o LEFT OUTER JOIN `products` on prod_id=product_id where user_id='$user_id' and status=2";
	

	$result= mysql_query($query2) or die(mysql_error());
	
	$sql2=mysql_num_rows($result);
	?>
	<div id="content_area">
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
	<table width = "100%">
	<?php 
	if($sql2>0)
	{
		while($row1=mysql_fetch_array($result))
		{ 
			
			
			?>
			    
						          
									<tr>
									<td>Product: &nbsp &nbsp &nbsp   <?php echo ($row1['prod_name']);?></td>&nbsp &nbsp &nbsp
								    <td>
									 Quantity: &nbsp &nbsp &nbsp<?php echo $row1['quantity'];?></td>&nbsp &nbsp &nbsp
								    <td>
									cost:&nbsp &nbsp &nbsp <?php echo ($row1['cost']); ?></td>&nbsp &nbsp &nbsp
									<td>  order status: &nbsp &nbsp &nbsp<?php echo ($row1['status']); ?></td> 
								  </tr><br>
								  
					<?php
		}
	}
	else
	{
		?>
		
		<?php echo"<p class='category_label'>There are no previous orders placed.Thank You!!!</p> "; ?>
		
	<?php 
	
	}
	echo "</table></div>
	</div>";
  include 'footer.php';
?>