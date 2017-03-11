<?php
$title="registration";
include("header.php");
require('SQLConnect.php');
error_reporting(0);
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysql_real_escape_string($username); 
	
	
	$email = stripslashes($_REQUEST['email']);
	$email = mysql_real_escape_string($email);
	$password = stripslashes($_REQUEST['password']);
	
	$password = mysql_real_escape_string($password);
	
        $query = "INSERT into `user_info` (user_name, password, user_email)
VALUES ('$username', '".md5($password)."', '$email')";
        $result = mysql_query($query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
    
    
else{

echo '<div class="for">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input  type="text" name="username" placeholder="Username" style="height:40px" required /><br><br>
<input style="height:40px; width:300px" type="email" name="email" placeholder="Email" required style="height:40px"  /><br><br>
<input  style="height:40px; width:300px;"  type="password" name="password" placeholder="Password" required /><br>
<input  style="float:left; height:40px; width:300px; " class= "cbp-vm-add" type="submit" name="submit" value="Register" />
</form>
</div>';
}

include 'footer.php';
 ?>
</body>
</html>