 <?php
 ob_start();
 session_start();
 error_reporting(0);
 if($_POST['action'] == "showcart"){
 	   $prod_id = $_POST['prod_id'];
 	   $prod_name = $_POST['prod_name'];
 	   $prod_cost = $_POST['prod_cost'];
 	  insertTemp($prod_id,$prod_name,$prod_cost);
 }
 if($_POST['action'] == "deleteRow"){
 	$prod_id = $_POST['prod_id'];
 	$userid = $_POST['userid'];
 	deleteProdId($prod_id,$userid);
 }
 if($_POST['action'] == "updateRow"){
 	$userid = $_POST['userid'];
 	updateOrder($userid);
 }
 if($_POST['action'] == "navIndex"){
    echo "success";
 }
 function deleteProdId($prod_id,$userid){
 	include('SQLConnect.php');
 	$q = "delete from orders where product_id ='$prod_id' and user_id = '$userid'";
 	
 	if(mysql_query($q)){
 		echo "success";
 	}else{
 		echo "failed";
 	}
 }
 
 function updateOrder($userid){
 	include('SQLConnect.php');
 	$q= "update orders set status = '2' where user_id ='$userid'";
 	
 	if(mysql_query($q)){
 		echo "success";
 	}else{
 		echo mysql_error();
 	} 
 }
 
 function insertTemp($prod_id,$prod_name,$prod_cost){
 	include('SQLConnect.php');
 	if(isset($_SESSION['username'])){
 		$userid = $_SESSION['userid'];

 	}else{
 		$userid = 0;
 	}
 	
 	$q = "INSERT INTO orders (user_id, product_id, quantity, cost, status, prod_name) VALUES ('$userid', '$prod_id', '1', '$prod_cost', '0', '$prod_name')";
 	if(mysql_query($q)){
 		echo "success";
 	}else{
 		echo mysql_error();
 	}
 }
    function populateCart(){
    	
    	 include("SQLConnect.php");
    	if(isset($_SESSION['username'])){
    		$userid = $_SESSION['userid'];
    	
    	}else{
    		$userid = 0;
    	}
    	
    	$que = mysql_query("select prod_name,cost from orders where status = '0' and user_id = '$userid'");
    	$total = 0;
    	 $rows = mysql_num_rows($que);
    	 echo '<tbody id = "checkout_summary">;';
    	 if($rows >0){
    	 	while($row = mysql_fetch_array($que)){
    	 		$total += $row['cost'];
    	 		
    	 		echo '<tr><td>'.$row['prod_name'].'</td><td>'.' $'.$row['cost'].'</td></tr>';
    	 	}
    	 	$tax = 0.02 * $total;
    	 	$total +=$tax; 
    	 	echo '</tbody<tfoot>
    	 	<tr><th colspan="2">Tax<span id ="checkout_tax" class="checkout__tax">$ '.$tax.'</span></th></tr>
    	 	<tr><th colspan="2">Total <span id ="checkout_total" class="checkout__total">$ '.$total.'</span></th></tr>
    	    
    	 	</tfoot>';
    	 }else{
    	 	echo '';
    	 } 
    	 
    }
    
    ?>