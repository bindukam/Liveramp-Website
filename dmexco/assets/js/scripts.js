$(document).ready(function() {
    
    if ($(window).width() > 991) {
        var container_width = '100%';
    } else {
        var container_width = '100%';
    }

    $(window).bind('load resize', function() {
        $('#fix-my-form').css('width', container_width);
        $('#fix-my-form').removeClass('fix-me');
        $('#fix-my-form').removeClass('fix-me-at-bottom');
        $('#fix-my-form').addClass('fix-me-at-top');

    })
    $('#scroll-container').waypoint(function(direction) {
        if (direction == 'down') {
            $('#fix-my-form').addClass('fix-me').css('width', container_width);
            $('#fix-my-form').removeClass('fix-me-at-bottom');
            $('#fix-my-form').removeClass('fix-me-at-top');
        }
    }, { offset: '0' });
    $('#lower-trigger').waypoint(function(direction) {
        if (direction == 'down') {
            $('#fix-my-form').removeClass('fix-me');
            $('#fix-my-form').addClass('fix-me-at-bottom');
        }
    }, { offset: '783px' });
    $('#lower-trigger').waypoint(function(direction) {
        if (direction == 'up') {
            $('#fix-my-form').addClass('fix-me').css('width', container_width);
            $('#fix-my-form').removeClass('fix-me-at-bottom');
            $('#fix-my-form').removeClass('fix-me-at-top');
        }
    }, { offset: '783px' });
    $('#scroll-container').waypoint(function(direction) {
        if (direction == 'up') {
            $('#fix-my-form').removeClass('fix-me');
            $('#fix-my-form').removeClass('fix-me-at-bottom');
            $('#fix-my-form').addClass('fix-me-at-top');
        }
    }, { offset: '0' });
});