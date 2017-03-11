<?php
error_reporting(0);
include('adminheader.php');
$title = "Add Recipe";
?>
<script type="text/javascript">
  
  window.onload = function(){
  		
  	var ele = document.getElementById("list");
  	ele.display = "none";

  }
	
	function addProduct(){
		
  	var ele = document.getElementById("list");
  	ele.display = "block";
  	var drop = document.getElementById("dropdown");
        ele.innerHTML +=  drop.value;
       
	}
</script>

<div id ="content_area">
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
+
		<h1 style="float:left">Add Your Recipe</h1>
		
			<br>
			<br>
			<br>
			<br>

			 <label class="flabel" >Recipe Name: </label> &nbsp;&nbsp;&nbsp;<input type ="text" id="username" name ="username" class="form-control" required autofocus/><br>	<br>
			<div style= "margin-left:230px;">
		     <label class ="flabel"> Add Products:</label>&nbsp;&nbsp;&nbsp;
		     <select id = "dropdown"class = "form-control" required>
		     	<?php
		     include('SQLConnect.php');
		     	$q ="SELECT * FROM products where category_id = 1;";

				$product_array = mysql_query("SELECT * FROM products;");
			
				while($row = mysql_fetch_array($product_array)) { 
	    			$product_id = $row['prod_id'];
	    			$product_name = $row['prod_name'];
	    			echo "<option>";
	    			 echo $product_name; 
	    			 echo "</option>";
	    		}

		     ?>
		     </select>
</div>		     <br>
		     <br>
	<a class = 'cbp-vm-add1' style ="margin-right:500px;" href='' onclick="javascript:addProduct();return false;" > Add </a>

	<div id = "list" style="text-align:center;">
		
	</div>
		   
</div>

            <footer>
                <p>All rights reserved</p>
            </footer>

        </div>
    </body>
</html>


