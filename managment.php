<html>	<head><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="http://code.jquery.com/jquery-latest.js"></script></head><body>



<?php
	$title = "Home";

	$content = '<div style="background-color:white;margin-left:350px; width:38%; height:55%">
<h1 style="float:left">Add Your Product</h1>
<form name="addproduct" action="managment.php" method="post" enctype="multipart/form-data">
<input type="text" name="productname" placeholder="product name" required/><br>
image:<input type="file" name="uploaded_file"  placeholder="add image" accept="image/*"required /><br>
<input type="text" name="cost" placeholder="Cost in USD " required/><br>
<input type="text" name="quantity" placeholder="quantity" required/><br>
<textarea rows="1" cols="34.9" name="desc" placeholder="product Description write down here!!! ">

</textarea> <br>
units:<select name="units" required><option>litres</option>
<option>ounces</option>
<option>piece</option>
<option></option>
<option>kilos</option></select>
CategoryID :<select name="categoryid" required><option value ="1">fruits</option>
<option value="2">vegetables</option>
<option value="3">beverages</option>
</select>

<br>
<input type="submit" name="submit" value="add product" />
</form>

			</div>';
			$link =mysqli_connect("localhost","root","","grocerystore");



if($link === false){

   die("ERROR: Could not connect. " . mysqli_connect_error());

}
 

// Escape user inputs for security

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$pname = $_POST['productname'];
$desc = $_POST['desc'];
$categoryid = $_POST['categoryid'];
$image = $link->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));

$cost = mysqli_real_escape_string($link, $_POST['cost']);
$quantity = mysqli_real_escape_string($link, $_POST['quantity']);
$units = mysqli_real_escape_string($link, $_POST['units']);


 



$sql = "INSERT INTO products (prod_name, image, cost,quantity,category_id,units,description) VALUES ('$pname', '$image', '$cost','$quantity','$categoryid','$units','$desc')";

if(mysqli_query($link, $sql)){

    echo "<script type='text/javascript'> alert('products added successfully.')</script>";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

}

//24.// close connection

mysqli_close($link);




  include 'adminpanel1.php';
?>
</body></html>