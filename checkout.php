<?php

ob_start();
session_start();
error_reporting(0);

$title = 'Checkout Page';
include('header.php');
$noelements = "true";
?>
<script type="text/javascript">
	function deleteRow(prod_id,userid){
		
		
		$.ajax({
            type: "POST",
            url: "functions.php",
            data: {action:"deleteRow",prod_id : prod_id,userid : userid},
            success: function(results){
            	
               if(results.includes('success')){
                   
            	   location.href = "checkout.php";   
               }else{
                   alert(results);
               }
                
            } 
            
        });
	}
	function updateorder(userid,noelements){
		
		if(noelements == "true"){
			alert("Add products before checkout");
			$.ajax({
				type:"POST",
			    url:"functions.php",
			    data:{action:"navIndex"},
			    success: function(results){
			    	location.href = "index.php";
				   
			    }
			});
			location.href = "index.php";
		}else{

			$.ajax({
				type:"POST",
			    url:"functions.php",
			    data:{action:"updateRow",userid:userid},
			    success: function(results){
			    	location.href = "payment.php";
				    if(results.includes("success")){
					    location.href = "payment.php";
				    }else{
					    alert("something is wrong");
				    }
			    }
			});
		}
	}
</script>
<div id ="content_area">
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid tablestyle">
<h2 class = "category_label"> Checkout Order</h2>
<table width = "100%">
	<tr>
		
                    <td><b>Product Name</b></td>
                    <td><b>Quantity</b></td>
                    <td><b>Cost</b></td>
                    <td></td>
                    <td></td>
                    
	</tr>
	
	<?php 
	include("SQLConnect.php");
	if(isset($_SESSION['username'])){
		$userid = $_SESSION['userid'];
	
	}else{
		$userid = 0;
	}
	$q = "select distinct product_id,prod_name,cost from orders where user_id ='$userid' and status='0'";
	$sql = mysql_query($q);
	$rows = mysql_num_rows($sql);
	
	$total =0;
	if($rows >0){
		$noelements = "false";
		while($row = mysql_fetch_array($sql)){
			
			$prod_id = $row['product_id'];
			$que = "select count(product_id) as count from orders where user_id = '$userid' and product_id ='$prod_id' and status ='0'";
			
			$sql1 = mysql_query($que);
			$exists = mysql_num_rows($sql1);
			if($exists>0){
				while($count = mysql_fetch_array($sql1)){
					$quantity = $count['count'];
				}
			}
			$prod_name = $row['prod_name'];
			$cost = $row['cost'];
			$total =$total + $cost*$quantity;
			
			echo "
			<tr id = '$prod_id'>";
			echo"
			<td>{$prod_name}</td>
			<td>
			
<select> ";
	 $arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
	foreach($arr as $val){
	    echo "<option value = '$val'";
	    if($val == $quantity){
	    	echo "selected = 'selected'";
	    }
	    echo ">$val</option>";
	}
	echo "
</select>
			</td>
			<td>$ {$cost}</td>"; ?>
			
			<td><a style='color:green;' href = '' onclick = "javascript:deleteRow('<?php echo $prod_id;?>','<?php echo $userid;?>');">Delete</a></td>
			</tr><br><br>
		<?php 	
		}
		
	}
	$tax = 0.02 * $total;
	?>
	
	<a class = 'cbp-vm-add1' href='' onclick="javascript:updateorder('<?php echo $userid;?>','<?php echo $noelements;?>');" > Checkout</a>
	 

</table>
    <br>
    <br>
    <div style="float:right;margin-right: 50px;" >
  		 <label> Tax <?php echo $tax;?></label><br>
         <label> Total <?php echo $total+$tax;?></label>
  		<?php 
  		   $total = $total+$tax;
  		   $_SESSION['total'] = $total;
  		?>  
    </div>
  
	  
</div>
</div>
<?php include('footer.php');?>


