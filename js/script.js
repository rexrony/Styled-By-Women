/**************************************/
// Slider JS
/**************************************/
$(document).on('ready', function () {
    $(".slide-con").slick({
        dots: true,
        nextArrow: '<span class="arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
        prevArrow: '<span class="arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
        infinite: true,
        slidesToShow: 1,
        customPaging: function(slider, i) {
      // this example would render "tabs" with titles
      return '<span class="cus_dot2"></span>';
    },


    });
/*********testimonial************/
        $(".testimonial").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
            arrows:false,
        customPaging: function(slider, i) {
      // this example would render "tabs" with titles
      return '<span class="cus_dot2"></span>';
    },


    });
/***********testimonial Ends here***********/

    $(".london_dance").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        nextArrow: '<span class="arrow-right2"></span>',
        prevArrow: '<span class="arrow-left2"></span>',

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]
    });

    /******************************/
    // UPDATES
    /******************************/
    $('.news-updates-box').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.news-update-slider'
    });
    $('.news-update-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.news-updates-box',
        arrows: false,
        centerMode: false,
        vertical: true,
        infinite: true,
        focusOnSelect: false,
        responsive: [{
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        }]

    });

    // --------------------------------------------------Thumb Slider------------------------------------------------------------------------//
    $('.item-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.thumb-slider'
    });
    $('.thumb-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.item-slider',
        arrows: false,
        focusOnSelect: true,
        vertical: true,
        responsive: [{
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        }]

    });


    /*$( ".tab-content" ).ready(function() {
     var input_id = $(this).data('input-id');
     //alert('check-'+input_id);
        $('.tab-content').css('display','block');


    });*/
    $("#tabing-4, #tabing-5, #tabing-6").click(function () {
        var input_id = $(this).data('input-id');
        // alert('check-'+input_id);
        $('.item-slider' + input_id).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.thumb-slider' + input_id,
        });
        $('.thumb-slider' + input_id).slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.item-slider' + input_id,
            arrows: true,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            }]

        });

    });





    /*****************************/
    //Search Script
    /******Search Script**********/
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function () {
        if (isOpen == false) {
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
    });
    submitIcon.mouseup(function () {
        return false;
    });
    searchBox.mouseup(function () {
        return false;
    });
    $(document).mouseup(function () {
        if (isOpen == true) {
            $('.searchbox-icon').css('display', 'block');
            submitIcon.click();
        }
    });
/*********************************/
// Animation
/*********************************/
    $(function () {

        var $window = $(window),
            win_height_padded = $window.height() * 1.1,
            isTouch = Modernizr.touch;

        if (isTouch) {
            $('.revealOnScroll').addClass('animated');
        }

        $window.on('scroll', revealOnScroll);

        function revealOnScroll() {
            var scrolled = $window.scrollTop(),
                win_height_padded = $window.height() * 1.1;

            // Showed...
            $(".revealOnScroll:not(.animated)").each(function () {
                var $this = $(this),
                    offsetTop = $this.offset().top;

                if (scrolled + win_height_padded > offsetTop) {
                    if ($this.data('timeout')) {
                        window.setTimeout(function () {
                            $this.addClass('animated ' + $this.data('animation'));
                        }, parseInt($this.data('timeout'), 10));
                    } else {
                        $this.addClass('animated ' + $this.data('animation'));
                    }
                }
            });
            // Hidden...
            $(".revealOnScroll.animated").each(function (index) {
                var $this = $(this),
                    offsetTop = $this.offset().top;
                if (scrolled + win_height_padded < offsetTop) {
                    $(this).removeClass('animated fadeInUp fadeInLeft fadeInRight flipInX lightSpeedIn')
                }
            });
        }

        revealOnScroll();
    });

}); //  $(document) ENDS HERE


/*****Search menu JS********/
function buttonUp() {
    var inputVal = $('.searchbox-input').val();
    inputVal = $.trim(inputVal).length;
    if (inputVal !== 0) {
        $('.searchbox-icon').css('display', 'none');
    } else {
        $('.searchbox-input').val('');
        $('.searchbox-icon').css('display', 'block');
    }
}

/****************************/
// Responsive Menu JS
/****************************/
$(document).ready(function () {
    $('#resp_menu').slicknav({
        label: '',
        duration: 1000,
        prependTo: '.menu-container'
    });
});

/****************************/
//Tabs Left
/****************************/
$(document).ready(function () {
    $(".tabs-left a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tabsleft-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
/****************************/
//Tabs Normal
/****************************/

$(document).ready(function () {
    $(".tabs-menu a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

/****************************/
// WooCommerce Plus and Minus--
/****************************/
$(document).ready(function($){
   $('.plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    /***Minus*****/
    $(".minus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
 });
