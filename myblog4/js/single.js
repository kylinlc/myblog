require(['jquery'], function($){
    //评论提交
    $('.submit').on('click', function(){
        var $name = $('[name = "name"]');
        var $email = $('[name = "email"]');
        var $website = $('[name = "website"]');
        var $subject = $('[name = "subject"]');

        $.post('welcome/comment',{
            name : $name.val(),
            email : $email.val(),
            website : $website.val(),
            subject : $subject.val()
        }, function(res){
            if(res ==  'fail'){
                $name.css({
                    border: '1px solid red'
                });
            }else if(res == 'success'){
                alert('成功！');
            }
        });
    });
});