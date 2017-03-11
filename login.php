
<?php 
$title = "Home";
	include 'header.php';
 require('SQLConnect.php');
 ob_start();
 //session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysql_real_escape_string($username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysql_real_escape_string($password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user_info` WHERE user_name='$username' 
and password='".md5($password)."'";
	$result = mysql_query($query);
	$rows = mysql_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
		$_SESSION['loggedin'] = true;
            // Redirect user to index.php
	    header("Location: index.php");
         }
         else
         {
			?>
			 
			<div class='form'>
			<h3>Username/password is incorrect.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>
	<?php 
	}
    }else{

?>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input style="height:40px" type="text" name="username" placeholder="Username" required /><br> <br>
<input style="height:40px; width:300px" type="password" name="password" placeholder="Password" required /><br>
<input style="float:left; height:40px; width:300px; " class= "cbp-vm-add" name="submit" type="submit" value="Login" />
</form> <br><br><br>
<p>Not registered yet? <a style="color:#2E0306" href="registration.php"> Register Here</a></p>
</div>


 <?php
	}
include 'footer.php';
?>