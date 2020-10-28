$(document).ready(function (){
    $('#homeSlider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:false,
        autoplay: true,
        autoplaySpeed: 3000,
        swipe:false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    swipe:true,
                }
            },
        ]
    });

    $('.menu-btn').on('click',function (){
        $('.header__menu').toggleClass('active')
    });
    $('#number .plus').on('click',function (){
        $(this).next().val(Number($(this).next().val()) + 1)
    });
    $('#number .minus').on('click',function (){
        if(Number($(this).prev().val()) > 1){
            $(this).prev().val(Number($(this).prev().val()) - 1)
        }
    });
    $('.quantity .plus').on('click',function (){
        $(this).next().val(Number($(this).next().val()) + 1)
    });
    $('.quantity .minus').on('click',function (){
        let id = $(this).parent().next().val();
        let count = 0;
        if(Number($(this).prev().val()) > 1){
            count = $(this).prev().val(Number($(this).prev().val()) - 1).val();
        } else {
            $(this).parent().parent().parent().remove();
        }
        $.post('/product/updateQTI', {id:id, count:count}).then((resp)=>{
            console.log(resp);
        });
    });

    $('#step-1 .btn').on('click',function (){
        $('.steps__nav li').removeClass('active');
        $('#navStep-2').addClass('active');

        $('.steps__content .item').removeClass('active');
        $('#step-2').addClass('active');
    });
    $('#step-2 .btn').on('click',function (){
        $('.steps__nav li').removeClass('active');
        $('#navStep-3').addClass('active');

        $('.steps__content .item').removeClass('active');
        $('#step-3').addClass('active');
    });

    $('.popups .popups__bgClose').on('click',function (){
        $(this).parent().removeClass('active')
    });
    $('.popups .close').on('click',function (){
        $(this).parent().parent().removeClass('active')
    });
    $('.popupsBTN').on('click',function (){
        $($(this).data('href')).addClass('active')
    });

});
