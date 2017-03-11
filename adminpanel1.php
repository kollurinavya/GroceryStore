<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <script src="js/modernizr.custom.js"></script>
        <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/TemplateStyle.css" />
		 <link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="slider/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
        	<div id = "header">
        	</div>
            <div id="banner"> 
<div id="sliderFrame">
        <div id="slider">
            <a href="index.php" target="_blank">
                <img src="images/body10.jpg" alt="Welcome to Grocery Store" />
            </a>
            <img src="images/body11.png"  />
            <img src="images/body5.png" alt="" />
            <img src="images/body6.png" alt="#htmlcaption" />
            <img src="images/body11.png" />
        </div>
        <div id="htmlcaption" style="display: none;">
            
        </div>
    </div>            
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                   <li> <a href="AddRecipe.php">Add Recipe</a></li>
                   <li style="margin-left:10px"><a href="managment.php">Add Product</a></li>
				   <li><a href="logout.php">Log-Out</a></li>
                </ul>
            </nav>	
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <!-- 
            <div id="sidebar">
                
            </div> -->
            
            <footer>
                <p>All rights reserved</p>
            </footer>
        </div>
    </body>
</html>
