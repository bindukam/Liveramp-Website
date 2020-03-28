// TAB MENU
$(document).ready(function() {
    $("#click-tabs li").click(function() {
        //alert($(this).index())
        var index = $(this).index()
        $('.tab-content').hide();
        $('#tab-content-0' + index).show();
        $(this).siblings().removeClass('active').end().addClass('active');
    });

    $(".col-head-mob").click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active').parent().removeClass('active').end().next().hide().next().hide();
            var icon_id = $(this).find('img').attr('id');
            $(this).find('img').eq(0).attr('src', '/assets/images/' + icon_id + '.svg');
            $(this).find('img').eq(1).attr('src', '/assets/images/icon-up-arrow-blue-mid.png')
        } else {
            $(this).addClass('active').parent().addClass('active').end().next().show().next().show();
            var icon_id = $(this).find('img').attr('id');
            $(this).find('img').eq(0).attr('src', '/assets/images/' + icon_id + '-active.svg')
            $(this).find('img').eq(1).attr('src', '/assets/images/icon-up-arrow-green-mid.png')
        }
    });
});

//NAV SCROLLER
$(document).ready(function() {
    var header = $('.wrapper#panel-00-header');
    var windo = $(window);

    $(document).scroll(function() {
        var scroll_distance = Math.round(windo.scrollTop());

        var gogreen = function(panel, nav) {
            var offset = Math.round(panel.offset().top) - header.height();
            var bottom = offset + panel.height() - header.height();
            if ((scroll_distance > offset) && (scroll_distance < bottom)) {
                $('.click-menu li:nth-child(' + nav + ') a').addClass('active');
            } else {
                $('.click-menu li:nth-child(' + nav + ') a').removeClass('active');
            }
        }
        gogreen($('#panel-02-thatswhy'), 1);
        gogreen($('#panel-05-integrate-techstack'), 2);
        gogreen($('#panel-10-five-important-outcomes'), 3);
    })
})
//SIGNUP TRIGGER
$(document).ready(function() {
    var header_height = $('.wrapper#panel-00-header').height();
    var windo = $(window);
    var flag = 1

    $(document).scroll(function() {
        var signup = function(panel) {
            var scroll_distance = Math.round(windo.scrollTop());
            var offset = Math.round(panel.offset().top) - header_height;
            var bottom = offset + panel.height() - header_height;

            if ((scroll_distance > offset) && (scroll_distance < bottom)) {
                if (flag) $('.signup').css('display', 'flex').hide().slideDown().fadeIn();
                flag = 0;
            } else {
                //$('.signup').css('display', 'none');
            }
        }
        signup($('#panel-02-thatswhy'));
    })

    $('#click-close').click(function() {
        $('.signup.hide').fadeOut(200);
        flag = 0; // hide permanently
        $("#panel-14-signup").show()
    });
    
    $('.click-close-thankyou').click(function() {
        $('.thankyou').fadeOut(200);
        flag = 0; // hide permanently
    });

})

// SCROLLTO
$(document).ready(function() {

    $(".hamburger").click(function() {
        $(".nav ul").toggle();
    });

    $('.click-menu a').click(function() {
        var header = $('.wrapper#panel-00-header');

        var data_link_to = '#' + $(this).attr('data-link-to');
        //alert(data_link_to);
        $('.click-menu a').removeClass('active');
        
        if (!$(this).hasClass('green')) {
            $(this).addClass('active');
        }

        if ($(window).width() > 768) {
            var offset_top = header.height() - 20;
        } else {
            var offset_top = header.height() - 20;
        }

        $('html, body').animate({ scrollTop: ($(data_link_to).offset().top - offset_top) }, 500);
    })

});

//BUTTON SCROLLTO
$(document).ready(function() {

    var offset_top = $('#panel-00-header').height();
    //alert (offset_top);

    $('.stratvalue a').click(function() {
        var data_num = $(this).attr('data-num');
        $vslidernav = $('#vslidernav');

        if ($(window).width() > 768) {
            var data_link_to = '#vslider'; // link to top of SLIDESHOW for desktop
            $vslidernav.find('a:nth-child(' + data_num + ')').trigger('click'); // dynamic click slideshow
        } else {
            var data_link_to = '#slide-0' + data_num; // link to top of SLIDE for mobile
        }

        $('.click-menu a').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({ scrollTop: ($(data_link_to).offset().top - offset_top) }, 500);
    })

});

//FIVE IMPORTANT OUTCOMES SLIDESHOW
$(function() {

    $(window).on('resize', function() {
        if ($(window).width() > 768) {
            //location.reload();
        }
    });

    var $vsliderboxes = $('#vsliderboxes'),
        $vslidernav = $('#vslidernav'),
        boxHeight = $vsliderboxes.height(),
        current_index = 0;

    function clickslide() {

        //stop the slideshow for a bit so we don't get two animations too close together
        clearInterval(intervalTimer);
        clearTimeout(timeoutTimer);
        timeoutTimer = setTimeout(function() {
            intervalTimer = window.setInterval(autoslide, 2000);
        }, 2500);

        //first get the index of the clicked link
        var index = $(this).index();

        //set the current_index variable to keep track of the current index
        current_index = index;

        //then animate
        $vsliderboxes.children().stop().animate({
            top: (boxHeight * index * -1)
        }, 500);

        $(this).siblings().removeClass('active').end().addClass('active');
    }

    function autoslide() {
        current_index++;
        //loop to beginning if necessary
        if (current_index >= $vsliderboxes.children().children().length) {
            current_index = 0;
        }
        //$vslidernav.find('a').eq(current_index).trigger('click');
    }

    $vslidernav.find('a').click(clickslide);

    var intervalTimer = window.setInterval(autoslide, 2000),
        timeoutTimer = null;

});

$(function (){
})