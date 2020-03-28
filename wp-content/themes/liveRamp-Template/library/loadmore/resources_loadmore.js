jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.resource_loadmore').click(function(){
		
		// alert('goteem');
 
		var button = $(this),
		    data = {
			'action': 'resource_loadmore',
			'query': posts_myajax,
			'page' : current_page_myajax
		};
 
		$.ajax({ // you can also use $.post here
			url : resource_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'GET',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				// console.log(data);
				if( data ) { 
					$('#post-card-wrapper2').append(data);
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
						$('.seo-link').hide();
					});

					$('.click-card').click(function() {
						$('.seo-link').hide();
					  var url = $(this).data('url');
					  var blank = $(this).data('blank');
					  if (blank) {
					    window.open(url);
					  }
					  else {
					    window.location.href = url;
					  };

					});

					button.text( 'More posts' ).prev().before(data); // insert new posts
					current_page_myajax++;
 
					if ( resource_loadmore_params.current_page == resource_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});

