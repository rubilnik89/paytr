$(document).ready(function() {
    
    $('.registration_btn').click(function (e) {
        e.preventDefault();

        var reg_email = $('.registration_input_email').val();

        var email_pattern = /^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/,
            prov1 = email_pattern.test(reg_email);
        if(!prov1){
            $('.registration_input_email').addClass('error')
        }else{
            $('.registration_input_email').removeClass('error');
            $('.registration_form').submit();
        }
    });
    

    $('.dropdown-toggle').click(function () {
        $('.dropdown-menu').toggle();
        $(this).toggleClass('open');
    });



    //Read more btn - main description
    var descr_height = $('.craft-main-content_top-row_descriptio_text').height();
    $('.craft-main-content_top-row_descriptio_text').addClass('loaded');

    if(descr_height > 87){
        $('.read-more').show();
    }
    $('.read-more').click(function () {
        $(this).hide();
        $('.descr-close').show();
        $('.craft-main-content_top-row_descriptio_text').addClass('open');
        $('.craft-main-content_top-row_description_table').addClass('open-popup');
        $('.overlay-for-description').show()
    });

    $('.descr-close, .overlay-for-description').click(function () {
        $('.descr-close').hide();
        $('.read-more').show();
        $('.craft-main-content_top-row_descriptio_text').removeClass('open');
        $('.craft-main-content_top-row_description_table').removeClass('open-popup');
        $('.overlay-for-description').hide()
    });



    // //Light box
    $(".craft-main-content_bottom-row_kat_wrapp").niceScroll({
        cursorcolor: "#d6d6d6",
        cursorwidth: "10px",
        cursorborderradius: 0,
        cursoropacitymin: 0.5,
        railpadding: {right: 2},
        horizrailenabled: false
    });
    $(".craft-main-content_bottom-row_products_wrap").niceScroll({
        cursorcolor: "#d6d6d6",
        cursorwidth: "10px",
        cursorborderradius: 0,
        cursoropacitymin: 0.5,
        railpadding: {right: 2},
        horizrailenabled: false
    });


});
