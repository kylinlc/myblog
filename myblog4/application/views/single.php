<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>single</title>
	<meta name="keywords" content="个人博客, 个人网站, 我的博客, xxx的博客">
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/single.css">
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
	<div id="single-container">
		<img src="img/single.jpg" alt="">
		<h3><?php echo $blog -> title; ?>&nbsp;&nbsp;by&nbsp;<?php echo $blog -> admin_name;?></h3>
		<p><?php echo $blog -> content; ?></p>
		<ul class="comment-list">
			<?php
				foreach($blog -> comments as $comment){
			?>
					<li><img src="img/avatar.png" class="img-responsive" alt="">
						<div class="desc">
							<p> <a href="#" title="Posts by admin" rel="author"><?php echo $comment -> username;?></a></p>
							<p><?php echo $comment -> add_time;?></p>
						</div>
						<div class="clearfix"></div>
					</li>
			<?php
				}
			?>

		</ul>
		<div class="add-comment">
			<h3>ADD NEW COMMENT</h3>
			<form action="welcome/comment" method="post">
				<input type="hidden" name="blog_id" value="<?php echo $this -> uri -> segment(3);?>">
				<p>
					<label>Name</label>
					<span>*</span>
					<input type="text" name="name" value>
				</p>
				<p>
					<label>Email</label>
					<span>*</span>
					<input type="text" name="email" value>
				</p>
				<p>
					<label>Website</label>
					
					<input type="text" name="website" value>
				</p>
				<p>
					<label>Subject</label>
					<span>*</span>
					<textarea name="subject"></textarea>
				</p>
				<p>
					<input type="submit" class="submit" value="SUBMIT COMMENT">
				</p>
			</form>
		</div>
	</div>
	<div id="footer">
		<div class="footer-contact">
			<p>
				WANT TO DISCUSS ANY CREATIVE PROJCT ?
				<a href="welcome/contact">CONTACT ME</a>
			</p>
		</div>
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