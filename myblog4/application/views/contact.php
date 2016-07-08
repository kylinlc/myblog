<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>contact</title>
	<meta name="keywords" content="个人博客, 个人网站, 我的博客, xxx的博客">
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/contact.css">
<!--	<script src="js/jquery.js"></script>-->

	<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,600,500,900,700,100,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<script type="application/x-javascript"> 
		addEventListener("load", function() { 
			setTimeout(hideURLbar, 0);
		}, false); 
		function hideURLbar(){ 
			window.scrollTo(0,1); 
		} 
	</script>
</head>
<body>
	<div id="header" style="height:192px">
		<div id="nav">
			<span class="nav-icon"></span>
			<div class="nav-menu-box">
				<div class="nav-menu-bg"></div>
				<ul class="nav-menu">
					<li class="nav-home"><a href="welcome/index">HOME</a></li>
					<li class="nav-about"><a href="#">ABOUT</a></li>
					<li class="nav-service"><a href="#">SERVICES</a></li>
					<li class="nav-portfolio"><a href="#">PORTFOLIO</a></li>
					<li class="nav-blog"><a href="#">BLOG</a></li>
					<li class="nav-contact"><a href="#">CONTACT</a></li>
				</ul>
				<span class="nav-close-icon"></span>
			</div>				
		</div>
	</div>
	<div id="message-contact">
		<div class="container">
			<div class="message-address">
				<div class="contact-left">
					<form method="post" action="welcome/message">
						<p>
							<label>YOUR NAME:</label>
							<input class="input1" name="username" type="text" value="">
						</p>
						<p>
							<label>EMAIL:</label>
							<input class="input2" name="email" type="text" value="">
						</p>
						<p>
							<label>MESSAGE:</label>
							<textarea class="textarea" name="content"></textarea>
						</p>
						<input name="submit" type="button" id="submit" value="Submit">
					</form>
				</div>
				<div class="contact-right">
					<h2>ADDRESS</h2>
					<p class="address">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non</p>
					<p class="phone">1-25-2568-897</p>
					<a href="#">mail@portfolio.com</a>
				</div>
			</div>
			<div class="map"></div>
		</div>		
	</div>
	<div id="footer">
		<div class="footer-footer">
			<div class="footer-left">
				<p>
					Template by 
					<a href="http://w3layouts.com">W3layouts</a>
				</p>
			</div>
			<div class="footer-right">
				<ul>
					<li>
						<a href="#">
							<span class="face"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="twit"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="dri"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="tech"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="totop">
		<span class="gotop" style="visibility:hidden;opacity:0;"></span>
	</div>

	<script src="js/require.js" data-main="js/index"></script>




</body>
</html>