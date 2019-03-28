$(function () {
    var owlSection = $('.owl-carousel-section');
    var owlHeader = $('.owl-carousel-header');

    owlHeader.owlCarousel({
        items:4,
        nav:true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            960:{
                items:4
            },
            1200:{
                items:4
            }
        }
    });

    owlSection.owlCarousel({
        items:4,
        nav:true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            960:{
                items:4
            },
            1200:{
                items:4
            }
        }
    });

    $('.prev').on('click', function () {
        owlSection.trigger('prev.owl');
    });
    $('.next').on('click', function () {
        owlSection.trigger('next.owl');
    });
    $('.comment-container').on('focus', '.input-form', function () {
        $(this).prev().find('.input-group-text').css({'border':'1px solid #ff8000'})
    });
    $('.comment-container').on('focusout', '.input-form',function () {
        $(this).prev().find('.input-group-text').css({'border':'1px solid rgba(0, 0, 0, 0.1)'})
    });
    $('.comment-container').on('focus', 'textarea.comment-area',function () {
        $('.comment-area').css({'border':'1px solid #ff8000'})
    });
    $('.comment-container').on('focusout', '.comment-area',function () {
        $('.comment-area').css({'border':'1px solid rgba(0, 0, 0, 0.1)'})
    });

    $('.comment-form').on('submit', function (e) {
        e.preventDefault();
        var username = $(this).find('.username');
        var email = $(this).find('.email');
        var comment = $(this).find('.comment-area');
        var url = $(this).attr('action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
        });
            obj = {
                'Username':username,
                'Email': email,
                'Message': comment,
            };
            $.each(obj, function (index, value) {
                if (value.val() == ''){
                        value.css({'border':'1px solid red'});
                        value.prev().find('.input-group-text').css({'border':'1px solid red'});
                    value.on('focus', function () {
                        value.css({'border':'1px solid #ff8000'});
                    });
                    value.on('focusout', function () {
                        value.css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                        value.prev().find('.input-group-text').css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                    });

                    // console.log(value);
                    toastr.error(index + ' is required');
                }else{
                    value.css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                    value.prev().find('.input-group-text').css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                }
            });
        if (username.val() != '' && email.val() != '' && comment.val() != '') {
            $.ajax({
                url:url,
                dataType:'text',
                type:'post',
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData(this),
                success:function (data) {
                    json = JSON.parse(data);
                    if (json.alert_type == 'danger'){
                        toastr.error(json.message);
                    }else{
                        toastr.success(json.message);
                        $('input').val('');
                        $('textarea').val('');
                    }
                }
            });
        }
    });
});