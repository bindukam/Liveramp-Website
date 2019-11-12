<?php

	function lvrmp_enqueue_blog_scripts() {
		wp_enqueue_script( 'chosen-js', get_template_directory_uri() . '/assets/js/lib/chosen/chosen.jquery.min.js', array( 'jquery' ), '1.4.2', false );
		wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/js/lib/chosen/chosen.min.css' );
	}
	add_action('wp_enqueue_scripts','lvrmp_enqueue_blog_scripts');

	function lvrmp_cpt_archive_title( $title, $sep ) {
		global $post, $wp_query;
		$post_type = get_post_type($post);
		$header = get_field($post_type.'_header','options');
		if (isset($header[0])) {
			$custom_title = $header[0]['title'];
		}
		if ( is_author() ) {
			$custom_title .= ' | Posts by ' . get_the_author_meta('display_name');
		}
		if ( is_tax() ) {
			$tax = get_term_by('slug', $wp_query->query_vars['term'], $wp_query->query_vars['taxonomy']);
//			echo "Viewing posts in " . $tax->name;
			$custom_title .= ' | Posts in ' . $tax->name;
		}
		$title = $custom_title . ' ' . $sep . ' ';
		return $title;
	}
	add_filter( 'wp_title', 'lvrmp_cpt_archive_title', 10, 2 );

	//get_header();

	global $post;
	$post_type = get_post_type($post);
	$header = get_field($post_type.'_header','options');

	if (!empty($header)) {
		if (isset($header[0]['background'])) {
			$bg_image = $header[0]['background']['url'];
			$bg = 'style="background-image: url(' .$bg_image . ')"';
		}

?>

<section style="display: none !important" class="landing text-lt blog-landing" <?php if (isset( $bg )) echo $bg; ?>>
	<div class="ctn">
		<h1 class="title"><?php echo $header[0]['title']; ?></h1>
		<?php if (isset($header[0]['sub-title'])): ?>
			<h3 class="subtitle"><?php echo $header[0]['sub-title']; ?></h3>
			<?php
		endif;
		?>
	</div>
</section>

<?php } else { ?>

		<!-- No Blog Posts -->
		<section style="display: none !important" class="landing text-lt blog-landing" <?php if (isset( $bg )) echo $bg; ?>>
			<div class="ctn">
				<h1 class="title"></h1>
			</div>
		</section>
<?php

	} ?>

<div class="blog-search">
	<div class="ctn">

		<form role="search" method="get" id="searchform" class="searchform blog-search-form" action="<?php echo esc_url( home_url( '/' ) . $post_type . '/' ); ?>">
			<div class="ctn">
				<div class="search-filter-ctn">
					<ul class="search-filter">
						<li class="placeholder">Select Type <span class="icon-circle-down"></span></li>
						<li data-filter="keyword">Keyword <span class="icon-circle-down"></span></li>
						<li data-filter="author">Author <span class="icon-circle-down"></span></li>
						<li data-filter="category">Category <span class="icon-circle-down"></span></li>
					</ul>
				</div>
				<input type="text" id="s" name="s" class="s keyword filter" />
				<div class="category filter">
					<?php
					$args = array(
						'taxonomy' => $post_type . '_categories',
						'show_option_none' => 'Select category',
						'id' => 'category',
						'class' => 'chosen chosen-category',
						'value_field' => 'slug',
						'hide_empty' => 1
					);
					wp_dropdown_categories($args); ?>
					<script type="text/javascript">
						<!--
						var catDropdown = document.getElementById("category");
						function onCatChange() {
							if ( catDropdown.options[catDropdown.selectedIndex].value ) {
								location.href = "<?php echo esc_url( home_url( '/' ) ); ?>/<?php echo $post_type; ?>_categories/"+catDropdown.options[catDropdown.selectedIndex].value;
							}
						}
						catDropdown.onchange = onCatChange;
						-->
					</script>
				</div>

				<div class="author filter">
					<select id="author" class="chosen chosen-author">
						<option>-- Choose an Author --</option>
						<?php
						$args = array( 'post_type' => $post_type );
						lvrmp_authors_dropdown($args); ?>
					</select>
					<script type="text/javascript">
						<!--
						var authorDropdown = document.getElementById("author");
						function onAuthorChange() {
							if ( authorDropdown.options[authorDropdown.selectedIndex].value ) {
								location.href = authorDropdown.options[authorDropdown.selectedIndex].value;
							}
						}
						authorDropdown.onchange = onAuthorChange;
						-->
					</script>
				</div>

			</div>
			<span class="icon-search"></span>
		</form>

		<div class="breadcrumb">

			<?php
			if ( is_author() || is_tax() || is_date() || (is_search() && !is_archive()) ) {
				echo '<a href="'.get_home_url().'/'.$post_type.'"><span class="breadcrumb-x"></span>';
			}
			if ( is_author() ) {
				the_post();
				echo "Viewing posts by " . get_the_author();
				rewind_posts();
			} else if ( is_tax() ) {
				the_post();
				$tax = get_term_by('slug', $wp_query->query_vars['term'], $wp_query->query_vars['taxonomy']);
				echo "Viewing posts in " . $tax->name;
//				echo '<pre>';
//				print_r($wp_query);
//				echo '</pre>';
				rewind_posts();
			} else if ( is_date() ) {
				the_post();
				if ( is_day() ) :
					printf( __( 'Viewing posts from: %s', 'liveramp' ), get_the_date() );

				elseif ( is_month() ) :
					printf( __( 'Viewing posts from: %s', 'liveramp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'liveramp' ) ) );

				elseif ( is_year() ) :
					printf( __( 'Viewing posts from: %s', 'liveramp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'liveramp' ) ) );

				endif;
				rewind_posts();
			} else if ( is_search() && !is_archive() ) {
				printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() );
			}
			if ( is_author() || is_tax() || is_date()  || (is_search() && !is_archive()) ) {
				echo '</a>';
			}
			?>

		</div>


	</div>
</div>
