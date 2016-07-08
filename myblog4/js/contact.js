require(['jquery'], function($){
	var $inPut1 = $('.input1'),
		$inPut2 = $('.input2'),
		$textArea = $('textarea'),
		$subMit = $('.submit');
	//input获得,失去焦点
	$inPut1.focus(function(){
		if($(this).val() == this.defaultValue){
			$(this).val("");
		}
	}).blur(function(){
		if($(this).val() == ""){
			$(this).val(this.defaultValue);
		}
	});
	$inPut2.focus(function(){
		if($(this).val() == this.defaultValue || 'Email'){
			$(this).val("");
		}
	}).blur(function(){
		if($(this).val() == ""){
			$(this).val('Email');
		}
	});
	//textarea获得,失去焦点
	$textArea.focus(function(){
		if($(this).val() == this.defaultValue || 'Message'){
			$(this).val("");
		}
	}).blur(function(){
		if($(this).val() == ""){
			$(this).val('Message');
		}
	});


	//submit提交事件
	$('#submit').on('click',function(){
		var $username = $('[name = "username"]');
		var $email = $('[name = "email"]');
		var $content = $('[name = "content"]');


		//$.post(url, data, callback, type);(地址，提交的数据，回调函数，返回的数据类型)
		$.post('welcome/message',{
			username : $username.val(),
			email : $email.val(),
			content : $content.val()
		}, function(res){
			if(res == 'fail'){
				$username.css({
					border: '1px solid red'
				});
			}else if(res == 'success'){
				alert('成功!');
			}
		});


	});
});