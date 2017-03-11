<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <script src="js/modernizr.custom.js"></script>
        <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/TemplateStyle.css" />
    </head>
    <body>
        <div id="wrapper">
        	<div id = "header">
        	</div>
            <div id="banner">             
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Coffee.php">Categories</a></li>
                    <li><a href="#">Recipies</a></li>
                    <li><a href="#">About</a></li>
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
