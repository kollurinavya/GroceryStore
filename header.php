<!DOCTYPE html>

<html>
    <head>
    <?php 
include("functions.php");


ob_start();
session_start();
if(isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
}
else
{
	$username=NULL;
}


?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>	 
        <?php echo $title; 
		 ?>
	     </title>
	     <style>
			 
			 .nav {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	    background-color: #333;
	}

	li {
	    float: left;
	}

	.dropbtn {
	    display: inline-block;
	    color: white;
	    text-align: center;
	    padding: 0px 0px;
	    text-decoration: none;
	}

	.links:hover, .dropdown:hover .dropbtn {
	    background-color: #4CAF50;
	}

	.dropdown {
	    display: inline-block;
		margin-top:-15px;
		margin-left:-120px;
		float:left;
	}

	.dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: black;
	    min-width: 16px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.links {
	    color: black;
	    padding: 0px 0px;
	    text-decoration: none;
	    display: block;
	    text-align: left;
	}

	.links:hover {background-color: blue}

	.dropdown:hover .dropdown-content {
	    display: block;
	}
	     
	     
	     </style>
	     
	     
	     
	     
         <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/TemplateStyle.css" />
        <link rel="stylesheet" type="text/css" href="css/checkout-cornerflat.css" />
         <link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    	<script src="slider/js-image-slider.js" type="text/javascript"></script>
    	<link href="generic.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
          <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="fonts/fontawesome/font-awesome-4.2.0/css/font-awesome.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    </head>
    
    <body>
        <div id="wrapper">
        	<div id = "header">
        	<a  id="icon" href="index.php"><img src="images/icon.jpg"></a>
			
			<?php  echo "<span class='welcome'> Hello "; if(isset($username)){echo " $username</span>";} else{ echo "Guest </span>";}; ?>
			<a  class="cbp-vm-add1" href="registration.php">SignUp</a>
            <?php 
			
			if(isset($username))
			{
				echo '<a class="cbp-vm-add2" href="logout.php">Logout</a>';
			}
			else
			{
				echo '<a class="cbp-vm-add2" href="login.php">Login</a>';
			}
			?>
      
            
            </div>
            <div id="banner">
            <div id="sliderFrame">
        	<div id="slider">
            <a href="http://grocerystore.com" target="_blank">
                <img src="images/body10.jpg" alt="Welcome to Grocery Store" />
            </a>
            <img src="images/body11.jpg"  />
            <img src="images/body5.jpg" alt="" />
            <img src="images/body6.jpg" alt="#htmlcaption" />
            <img src="images/body11.jpg" />
        	</div>
        <div id="htmlcaption" style="display: none;">
            
        </div>
    </div>               
            </div>
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
						<a href="#" class="dropbtn">Categories</a>
							<div class="dropdown-content">
									<a class="links" href="Fruits.php">Fruits</a>
									<a class="links" href="Beverages.php">Beverages</a>
									<a class="links" href="Vegetables.php">Vegetables</a>
								</div>
								</li>
							
                    <li><a href="#">Recipies</a></li>
					<?php if(isset($username)){ echo '<li><a href="history.php">Your Orders</a></li>';}?>
                    <li><a href="#">About</a></li>
                    
                    
                    
                    
                    
                                      </ul>
                                     
					                  
                 <script src="js/classie.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( '.checkout' ) ).forEach( function( el ) {
					var openCtrl = el.querySelector( '.checkout__button' ),
						closeCtrls = el.querySelectorAll( '.checkout__cancel' );

					openCtrl.addEventListener( 'click', function(ev) {
						ev.preventDefault();
						classie.add( el, 'checkout--active' );
					} );

					[].slice.call( closeCtrls ).forEach( function( ctrl ) {
						ctrl.addEventListener( 'click', function() {
							classie.remove( el, 'checkout--active' );
						} );
					} );
				} );
			})();
		</script>
            </nav>	
            
      