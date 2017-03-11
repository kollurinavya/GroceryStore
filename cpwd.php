<html>	<head><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
 function validate() {
  if(myform.fname.value.length==0)
  {
document.getElementById('errfn').innerHTML="this can be left blank";
  }
 }
 </script></head><body>



<?php
	$title = "Home";

	$content = '<div style="background-color:white;margin-left:350px; width:38%; height:55%">
<h1 style="float:left">change Password</h1>
<form name="changepassword" action="cpwd.php" method="post"  enctype="multipart/form-data">

<input type="text" name="newpassword" id="newpassword" placeholder="new password" required/><span id="errfn"></span><br>

<input type="text" name="retypepassword" placeholder="Retype password " required/><br>



<input type="submit" name="submit" value="change password" />
</form>

			</div>';
			$link = mysqli_connect("localhost","root","","grocerystore");



if($link === false){

   die("ERROR: Could not connect. " . mysqli_connect_error());

}
 

// Escape user inputs for security

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$retypepassword = $_POST['retypepassword'];



 




$sql =  "UPDATE admin SET apassword = '$retypepassword' WHERE aname='admin'";

if(mysqli_query($link, $sql)){

    echo "password changed successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

}

//24.// close connection

mysqli_close($link);




  include 'adminpanel1.php';
?>
</body></html>