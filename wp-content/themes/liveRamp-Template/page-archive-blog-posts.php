<?php
/**
 * The template for displaying CPT archive pages
 * Template Name: Blog Archive
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 

$pageid = get_the_ID();

get_template_part( 'template-parts/blog_archive_parts/blog_hero' );

get_template_part( 'template-parts/blog_archive_parts/filters' );

get_template_part( 'template-parts/blog_archive_parts/top_six' );

get_template_part( 'template-parts/blog_archive_parts/video_module' );

get_template_part( 'template-parts/blog_archive_parts/post_continue' ); ?>




<!-- PAGE BUILDER GOES HERE -->
<div class="hide-for-filters">
	<?php include('acf-loop.php') ;?>
</div>


<!-- PAGE BUILDER ENDS HERE -->

<?php $subscribe_form_id=get_field('subscribe_form_id', 'option');?>
<?php include( locate_template( 'template-parts/blog_archive_parts/blog_subscribe.php', false, false ) ); ?>

<script>

//function for trgiggering author name ajax reload
	
	function resetStyled () {
		$('select').val(null);
		$('.select-styled').each(function(e) {
			$this = $(this);
			// var data_default = $this.attr('data-default');
			var get_select = $this.next('ul');
			var data_default = get_select.children('li:first-child').text();
			$this.text(data_default);
			// console.log('data-defualt', data_default);

		});
	    return false;
	}

	function authorName () {
		$('.author-name').off();
		$('.author-name').on('click', function() {
	    	event.preventDefault();
	    	resetStyled();
	    	$this = $(this);
	    	let authval = $this.attr('data-author-id'),
	    		authname = $this.attr('data-author-name');
	    	
	    	$('#filter1 select[name="cus_author"]').val(authval).trigger('change');
	    	$('.select-styled[data-name="cus_author"]').text(authname);
	    	// $('#filter2 select[name="author_name"]').val(val).trigger('change');
	    	// console.log('author click', val, name);
	    	
	    });
	    return false;
	}

	//function for trgiggering author name ajax reload
	function metaClick () {
		$('.meta-term').off();
		$('.meta-term').on('click', function() {
	    	event.preventDefault();
	    	resetStyled();

	    	var val = $(this).attr('data-term-id'),
	    		name = $(this).text();
	    	
	    	$('#filter1 select[name="blog_categories"]').val(val).trigger('change');
	    	$('.select-styled[data-name="blog_categories"]').text(name);
	    	// $('#filter2 select[name="blog_categories"]').val(val).trigger('change');
	    	// console.log('meta click', val);
	    	// console.log(this);

	    	/* Act on the event */
	    	return false;
	    });
	}


	function clickCard() {
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
	}

	// trigger forms on custom select 
	

// function for triggering ajax filter reload
    function ajax_filter(filter_name, scroll) {
    	// body...

    	var filter = $(filter_name);
    	$.ajax({
    		url:filter.attr('action'),
    		data:filter.serialize(), // form data
    		type:filter.attr('method'), // POST
    		beforeSend:function(xhr){
    			filter.find('button').text('Processing...'); // changing the button label
    		},
    		success:function(data){
    			
    			$('.hide-for-filters').hide();
    			$('.misha_loadmore').hide();
    			filter.find('button').text('Apply filter'); // changing the button label back
    			$('#post-card-wrapper').html(data); // insert data
    			$('.new-card').hide().each(function(i) {
    				$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
    			});
    			$('.reset-filters').fadeIn();
    			if (scroll) {
    				$('html, body').animate({scrollTop: $('.filter').offset().top -130 }, 800);	
    			};
    			clickCard();
    			authorName();
				metaClick();

    		}
    	});
    	return false;
    }

    $( document ).ready(function() {
	    //console.log( "author ready!" );
	    authorName();
		metaClick();
		
	    
	});


	jQuery(function($){

		$('#filter1').change(function(){
			ajax_filter('#filter1', 1);
		});

		$('#featured-author').change(function(){
    		ajax_filter('#featured-author');
    	});

    	$('#filter2').change(function(){
    		ajax_filter('#filter2');
    	});

    	$('#reset').submit(function(){
    		event.preventDefault();
    		// alert('gotheem');
    		$('#more-button').show();
    		$('.reset-filters').hide();
    		// $('.hide-for-reset').html('');
    		$('.misha_loadmore').show();
    		$('.hide-for-filters').show();
    		// reset regular filters 
    		$('select').val(null);
    		$('#post-card-wrapper').html(''); // insert data
    		$('.post-card').hide().each(function(i) {
				$(this).delay(100 * i).fadeIn(500);
			});
    		
    		// reset styled filters
    		$('.select-styled').each(function(index, el) {
    			$this = $(this);
    			var data_default = $this.attr('data-default');
    			$this.text(data_default);
    			
    		});
    		// clickCard();
    		// authorName();
    		// metaClick();
    		history.pushState(null, null, '/blog/');	    	
    		
    		return false;
    	});


	});

	jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
		$('.misha_loadmore').click(function(){

			//alert('goteem');
	 
			var button = $(this),
			    data = {
				'action': 'loadmore',
				'query': posts_myajax,
				'page' : current_page_myajax
			};
	 
			$.ajax({ // you can also use $.post here
				url : misha_loadmore_params.ajaxurl, // AJAX handler
				data : data,
				type : 'POST',
				beforeSend : function ( xhr ) {
					button.text('Loading...'); // change the button text, you can also add a preloader image
					console.log('before load');
				},
				success : function( data ){
					console.log('got load');
					if( data ) { 
						$('#load-more1').append(data);
						$('.new-card').hide().each(function(i) {
							$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
							// $('.seo-link').hide();
						});

						clickCard();
						authorName();
						metaClick();
						button.text( 'More posts' ).prev().before(data); // insert new posts
						current_page_myajax++;
	 
						if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
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

</script>

<script>


		$( document ).ready(function() {
		    
		    $('#filter1').change(function(url){
		    	var query = '';
		    	var amp = '';
		    	$('#filter1 select').each(function(index, el) {
		    		var val = $(this).val();
		    		var key = $(this).attr('name');
		    		if (val) {
		    			query = query+amp+key+'='+val;
		    			amp = '&';
		    		};
		    		
		    	});
				
				
				history.pushState(null, null, '?'+query);	    	
			    	
		    });


		    // check for $_GET parameter 
		    if (window.location.search) {
		    	$('.hide-for-filters').hide();
		    	$('.reset-filters').fadeIn();
		    	$('html, body').animate({scrollTop: $('.filter').offset().top -130 }, 800);	
		    	// console.log('get');
		    	// var category = "<?php echo $_GET['blog_categories'] ?>",
		    	// 	author = "<?php echo $_GET['author'] ?>",
		    	// 	date = "<?php echo $_GET['date_field'] ?>"
		    	// 	;
		    	console.log(window.location.search);
		    	const params = new URLSearchParams(window.location.search);  
				const blog_categories = params.get("blog_categories");
				const author = params.get("cus_author");
				const date_field = params.get("date_field");
				console.log(blog_categories, author);
				$('#filter1 select[name="cus_author"]').val(author);
				
				let authname = $("#filter1 select[name='cus_author'] option[value='"+author+"']").text();
				$('.select-styled[data-name="cus_author"]').text(authname);
				
				$('#filter1 select[name="blog_categories"]').val(blog_categories);
				$('#filter1 select[name="date_field"]').val(date_field);



		    };




		});  // end of DOC
</script>


<?php
get_footer();
