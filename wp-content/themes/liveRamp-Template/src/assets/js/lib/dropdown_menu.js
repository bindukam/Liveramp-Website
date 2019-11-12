/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

 
$('select').each(function(){
    var $this = $(this), 
        numberOfOptions = $(this).children('option').length,
        name = $this.attr('name'),
        data_default = $this.attr('data-default')
        ;
    var select_class =  '<div class="select '+name+'"></div>';
    $this.addClass('select-hidden'); 
    $this.wrap(select_class);
    $this.after('<div class="select-styled" data-name="'+name+'" data-default="'+data_default+'" data-id="null"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options ng-binding ng-scope'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        let $class,
        $thisoption = $this.children('option').eq(i);
        if ( $thisoption[0].hidden == true ||  $thisoption[0].disabled == true){
            $class = 'ng-binding hide';
        } else {
            $class = 'ng-binding';
        }
        $('<li />', {
            // if ($this.children('option').eq(i).hidden == true),
            'class': $class,
            text: $thisoption.text(),
            rel: $thisoption.val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        var rel = $(this).attr('rel');
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $styledSelect.attr('data-id', rel);
        $this.val($(this).attr('rel'));
        
        $list.hide();
        
        // var selectName = $styledSelect.attr('data-name'),
        //     selectVal = $this.val();
        // console.log(selectName, selectVal);
        // $('#filter1 select[name="'+selectName+'"]').val(selectVal).trigger('change');
        $this.trigger('change');
        
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
        // console.log($this.val());
    });

    console.log('menu ready');

});