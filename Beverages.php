<?php
error_reporting(0);
include('header.php');

?>
<script type="text/javascript">
var total =0;
var row = 0;
  function setCartInfo(username,prod_id,prod_name,prod_cost){
       if(username == ''){
       	alert('Please Login to add products to cart');
       	location.href = 'login.php';
       }else{
       	$.ajax({
            type: "POST",
            url: "functions.php",
            data: {action:"showcart",prod_id : prod_id,prod_cost: prod_cost,prod_name: prod_name},
            success: function(results){
               if(results.includes('success')){
            	   location.href = "index.php";   
               }else{
                   alert(results);
               }
                
            } 
            
        });
       }
        
        
    }
    function checkout(username){
         
    	if(username == ''){
    		alert('Please login before checkout');
    		location.href = "login.php";
    	}else{
    		location.href = "checkout.php";
    	}
        
    }
</script>
<div id ="content_area">
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
			        
					<h2 class="category_label" >Beverages </h2>	
					<br>
			<ul>
<?php
include('SQLConnect.php');
$q ="SELECT * FROM products where category_id = 1;";

$product_array = mysql_query("SELECT * FROM products where category_id = 3;");
	
	while($row = mysql_fetch_array($product_array)) { 
	    $product_id = $row['prod_id'];
	    $product_name = $row['prod_name'];
	    $prod_cost = $row['cost'];
		?>
	    <li>
	    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" height= "100" width = "100"/>'; ?>		
	        <p class="cbp-vm-title"> <?php echo $row['cost'].' $'; ?></p>
	        	        <div class="cbp-vm-details"><?php echo $product_name; ?></div>
	         <div class="cbp-vm-details">
				  <?php echo $row['description']; ?>
			 </div>
			 <a class="cbp-vm-icon cbp-vm-add" onclick = "javascript:setCartInfo('<?php echo $username;?>',<?php echo $product_id;?>,'<?php echo $product_name; ?>',<?php echo $prod_cost;?>);" href="#">Add to cart</a>
			 </li>
			
	<?php }?>
</ul>

</div>


	</div>




<?php include('footer.php');?>
