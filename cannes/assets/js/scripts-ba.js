$(document).ready(function() {
    var container_width = $('#scroll-container').width();
    $(window).bind('load resize', function() {
        $('#form').css('width', container_width);
        $('#form').removeClass('fix-me');
        $('#form').removeClass('fix-me-at-bottom');
        $('#form').addClass('fix-me-at-top');

    })
    $('#scroll-container').waypoint(function(direction) {
        if (direction == 'down') {
            $('#form').addClass('fix-me').css('width', container_width);
            $('#form').removeClass('fix-me-at-bottom');
            $('#form').removeClass('fix-me-at-top');
        }
    }, { offset: '0' });
    $('#lower-trigger').waypoint(function(direction) {
        if (direction == 'down') {
            $('#form').removeClass('fix-me');
            $('#form').addClass('fix-me-at-bottom');
        }
    }, { offset: '750px' });
    $('#lower-trigger').waypoint(function(direction) {
        if (direction == 'up') {
            $('#form').addClass('fix-me').css('width', container_width);
            $('#form').removeClass('fix-me-at-bottom');
            $('#form').removeClass('fix-me-at-top');
        }
    }, { offset: '783px' });
    $('#scroll-container').waypoint(function(direction) {
        if (direction == 'up') {
            $('#form').removeClass('fix-me');
            $('#form').removeClass('fix-me-at-bottom');
            $('#form').addClass('fix-me-at-top');
        }
    }, { offset: '0' });
});