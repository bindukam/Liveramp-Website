<?php
/**
 * The template for displaying Resources
 * Template Name: Liveramp Resources Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php $pageid = get_the_ID(); ?>



<?php get_template_part( 'resources_parts/resources_hero' ); ?>

<?php get_template_part( 'resources_parts/filters' ); ?>

<?php get_template_part( 'resources_parts/top-six' ); ?>

<?php get_template_part( 'resources_parts/video_module' ); ?>

<!-- PAGE BUILDER GOES HERE -->
<div class="hide-for-filters">
	<?php include('acf-loop.php') ;?>	
</div>
<!-- PAGE BUILDER ENDS HERE -->

<?php get_template_part( 'resources_parts/post_continue' ); ?>

<?php get_template_part( 'resources_parts/featured_blog' ); ?>




<script>


	$('#filter').on('submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert('no submit for you');
    });

	jQuery(function($){
		$('#filter').change(function(){
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('button').text('Processing...'); // changing the button label
					console.log("resource send");
				},
				success:function(data){
					console.log("resource success");
					console.log(data);
					$('.hide-for-filters').hide();
					$('.resource_loadmore').hide();
					filter.find('button').text('Apply filter'); // changing the button label back
					$('#post-card-wrapper').html(data); // insert data
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
					});
					$('.reset-filters').fadeIn();
					$('.click-card').click(function() {
					  var url = $(this).data('url');
					  var blank = $(this).data('blank');
					  if (blank) {
					    window.open(url);
					  }
					  else {
					    window.location.href = url;
					  };

					});
					$('html, body').animate({scrollTop: $('#filter').offset().top -130 }, 800);
					metaClick();

				}
			});
			return false;
		});
	});

	jQuery(function($){

		function resetStyled () {
			$('select').val(null);
			$('.select-styled').each(function(e) {
				$this = $(this);
				var data_default = $this.attr('data-default');
				$this.text(data_default);
				// console.log('data-defualt', data_default);

			});
		    return false;
		}

		$('#reset').submit(function(){
			event.preventDefault();
			// alert('gotheem');
			var filter = $('#reset');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					// filter.find('button').text('Processing...'); // changing the button label
				},
				success:function(data){
					// filter.find('button').text('Apply filter'); // changing the button label back
					$('#more-button').show();
					$('.reset-filters').hide();
    				$('.hide-for-filters').show();
					$('.resource_loadmore').show();
					$('select').val(null);
					$('#post-card-wrapper').html(data); // insert data
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
					});
					// $('html, body').animate({scrollTop: $('#filter').offset().top -130 }, 800);
					$('.click-card').click(function() {
					  var url = $(this).data('url');
					  var blank = $(this).data('blank');
					  if (blank) {
					    window.open(url);
					  }
					  else {
					    window.location.href = url;
					  };

					});
					history.pushState(null, null, '/resources/');
					resetStyled();

				}
			});
			return false;
		});
	});


</script>

<script>
		//function for trgiggering author name ajax reload
		function metaClick () {
			$('.meta-term').off();
			$('.meta-term').on('click', function() {
		    	event.preventDefault();
		    	// resetStyled();

		    	var val = $(this).attr('data-term-id'),
		    		name = $(this).text();
		    	
		    	// console.log('meta click', val, name);
		    	// console.log(this);
		    	$('#filter select[name="resources_topics"]').val(val).trigger('change');
		    	$('.select-styled[data-name="resources_topics"]').text(name);
		    	history.pushState(null, null, '?resources_topics='+val);	    		
		    	/* Act on the event */
		    	return false;
		    });
		}

		$( document ).ready(function() {
		    console.log( " page history ready ready!" );
		   
		   	
		  metaClick();
		   
		    
		    $('#filter').change(function(url){
		    	var query = '';
		    	var amp = '';
		    	$('#filter select').each(function(index, el) {
		    		var val = $(this).val();
		    		var key = $(this).attr('name');
		    		if (val) {
		    			query = query+amp+key+'='+val;
		    			amp = '&';
		    		};
		    		
		    	});
				
				// console.log(query);
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
		    	// console.log(window.location.search);
		    	const params = new URLSearchParams(window.location.search);  
				const blog_categories = params.get("blog_categories");
				const author = params.get("author");
				const date_field = params.get("date_field");
				// console.log(blog_categories, author);
				$('#filter1 select[name="author"]').val(author);
				$('#filter1 select[name="blog_categories"]').val(blog_categories);
				$('#filter1 select[name="date_field"]').val(date_field);



		    };


		});  // end of DOC


</script>








<?php get_template_part( 'resources_parts/resource_footer' ); ?>



<?php
get_footer();
