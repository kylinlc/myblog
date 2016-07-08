requirejs.config({
	shim: {
		'jquery.lightbox': ['jquery']
	}
});
require(['jquery', 'jquery.lightbox', 'contact', 'single'], function($){
	//导航栏
	var $nav = $('#nav'),
		$navIcon = $('.nav-icon', $nav),
		$navMenuBox = $('.nav-menu-box', $nav),
		$navCloseIcon = $('.nav-close-icon',$nav);
	var $navHome = $('.nav-home',$nav),
		$navAbout = $('.nav-about',$nav),
		$navService = $('.nav-service',$nav),
		$navPortfolio = $('.nav-portfolio',$nav),
		$navBlog = $('.nav-blog',$nav),
		$navContact = $('.nav-contact', $nav);
	$navIcon.on('click', function(){
		$navMenuBox.animate({top: 0});
	});
	$navCloseIcon.on('click', function(){
		$navMenuBox.animate({top: -192});
	});

	$navHome.on('click', function(){
		$('body').animate({scrollTop:0});
	});
	$navAbout.on('click',function(){
		$('body').animate({scrollTop: 800},700);
	});
	$navService.on('click',function(){
		$('body').animate({scrollTop: 1520},700);
	});
	$navPortfolio.on('click',function(){
		$('body').animate({scrollTop: 2300},700);
	});
	$navBlog.on('click',function(){
		$('body').animate({scrollTop: 2900},700);
	});
	$navContact.on('click',function(){
		$('body').animate({scrollTop: 4450},700);
	});


	//回到顶部
	var $toTop = $('#totop'),
		$goTop = $('.gotop', $toTop);
	$toTop.on('click', function(){
		$('body').animate({scrollTop:0},700);
	});
	if($('body').scrollTop>=500){
		$goTop.addClass('gotop1');
	}


	//portfolio弹出层
	$('#portfolio li').hover(function(){
		$(this).children('img').stop().animate({
			width: 305,
			height: 193,
			marginLeft: -10,
			marginTop: -7
		});
		$(this).children('.mask').stop().show().animate({
			opacity: 0.84
		});
	}, function(){
		$(this).children('img').stop().animate({
			width: 285,
			height: 180,
			marginLeft: 0,
			marginTop: 0
		});
	// 	$(this).children('.mask').stop().animate({
	// 		opacity: 0
	// 	}),function(){
	// 		$(this).hide();
	// 	};
	// }).on('click', function(){

	// });

	$(this).children('.mask').stop().animate({
			opacity: 0
		}),function(){
			$(this).hide();
		};
	}).lightbox();


	//瀑布流
	var $uls = $('#myblog ul');
	var bStop = false;//标识位，用来标识当前数据是否加载完毕
	var bEnd = false;//标识位，用来标识数据库中的数据是否全部加载完毕
	var $minUl2 = null;
	var iPage = 1;
	function loadDate(){
		$.get('welcome/get_blogs',{page: iPage++}, function(res){
			bEnd = res.isEnd;
			setTimeout(function(){
				for(var i=0; i<res.data.length; i++){
					var blog = res.data[i];
					var html = '<li>'
							+ '<a href="#"><img src="'+blog.photo+'" alt=""></a>'
							+'<h3><a href="welcome/detail/'+blog.blog_id+'">'+blog.title+'</a></h3>'
							+ '<span>'+blog.author+' |<a href="welcome/detail/'+blog.blog_id+'">'+blog.blog_id+'</a></span>'
							+ '<p>'+blog.content+'</p>'
							+ '<a class="myblog-btn" href="welcome/detail/'+blog.blog_id+'">SEE MORE</a>'
							+ '</li>';
					var $minUl = getMinUl();
					$minUl.append(html);
				}
				$minUl2 = getMinUl();
				bStop = true;
			}, 2000);
		}, 'json');
	}

	loadDate();

	function getMinUl(){
		var $minUl = $uls.eq(0);
		for(var i=1; i<$uls.length; i++){
			if( $uls.eq(i).height() < $minUl.height() ){
				$minUl = $uls.eq(i);
			}
		}
		return $minUl;
	}

	$(window).on('scroll', function(){

		var iScrollTop = $(window).scrollTop();
			iWinHeight = $(window).height();

		if(iScrollTop + iWinHeight + 20 >= $minUl2.height() && bStop && !bEnd){
			loadDate();
			bStop = false;
		}
	});



});