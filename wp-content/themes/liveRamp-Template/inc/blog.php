<?php
/*--------------------------------------------------------*\
	Custom Blog Excerpt Length for Aggregator
\*--------------------------------------------------------*/

function excerpt_blog( $limit ) {
	return wp_trim_words( get_the_excerpt(), $trim );
}

/*--------------------------------------------------------*\
	Register Ajax
\*--------------------------------------------------------*/

function st_ajaxurl() { ?>
	<script>
	var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
	</script>
<?php }

add_action('wp_head','st_ajaxurl');

/*--------------------------------------------------------*\
	Blog Functions
\*--------------------------------------------------------*/

function search_author_ids($array, $value) {
	$ret = false;
	foreach ( $array as $key => $subarray ) {
		if ( $subarray->id == $value ) {
			$ret = $key;
			break;
		} else {
			continue;
		}
	}
	return $ret;
}

function build_authors( $category ) {
	$authors = array();
	if ($category != 'regular' ) {
		$loop = new WP_Query( array(
			'post_type' => 'blog',
			'tax_query' => array(
				array(
					'taxonomy' => 'blog_categories',
					'field' => 'slug',
					'terms' => $category
				),
			),
		) );
	} else {
		$loop = new WP_Query( array( 'post_type' => 'blog' ) );
	}

	$i = 0;
	while ($loop->have_posts()): $loop->the_post();

		global $post;
		$author_id = $post->post_author;
		$user_info = get_userdata( $author_id );
		$first_name = $user_info->user_firstname;
		$last_name = $user_info->user_lastname;
		$count = 1;

		if ($i == 0) {
			$authors[] = (object)array(
				'id' => $author_id,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'count' => $count
			);
		} else {
			if ( !empty( $authors ) ) {
				$id_exists = search_author_ids( $authors, $author_id );
				if ( $id_exists != false ) {
					$authors[$id_exists]->count++;
				} else {
					$authors[] = (object)array(
						'id' => $author_id,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'count' => $count
					);
				}
			}
		}

	$i++; endwhile;
	wp_reset_query();

	// usort( $authors, function($a,$b) {
	// 	if ( $a->count == $b->count ) {
	// 		return 0;
	// 	} else {
	// 		return ( $a->count > $b->count ) ? -1 : 1;
	// 	}
	// });

	usort( $authors, function($a, $b) {
		return strcmp($a->last_name, $b->last_name);
	});

	return $authors;
}

function blog_meta( $show_date = true, $show_author = true, $show_categories = true, $show_comments = false ) {

	global $post;

	// Variables
	$archive_year = get_the_time('Y');
	$archive_month = get_the_time('m');
	$archive_day = get_the_time('d');

	$post_type = get_post_type($post);

	if ( is_single() ) {
		$show_comments = true;
	}

	echo '<ul class="blog-info">';

	if ( $show_date ) {
		echo '<li class="post-date"><span class="icon-calendar"></span>' . get_archive_links() . '</li>';
	}

	if ( $show_author ) {
		echo '<li class="author"><span class="icon-person"></span>';
		the_author_posts_link();
		echo '</li>';
	}

	if ( $show_categories ) {
		$the_terms = get_the_terms( $post, $post_type.'_categories' );
		if ( $the_terms ) {
			echo '<li class="categories"><span class="icon-tag"></span>';
			the_terms($post, $post_type.'_categories');
			echo '</li>';
		}
	}

	if ( $show_comments ) {
		if (get_comments_number() == 0) {
			echo '<li><span class="icon-comment"></span><a href="#comments">Leave a Comment</a></li>';
		} else {
			echo '<li><span class="icon-comment"></span><a href="#comments">';
			printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'liveramp' ),
				number_format_i18n( get_comments_number() ) );
			echo '</a></li>';
		}
	}

	echo '</ul>';

}

/*--------------------------------------------------------*\
	Ajax Function: Get Blogs
\*--------------------------------------------------------*/

function get_blogs() {
	$args = array(
		'post_type' => 'blog',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status' => 'publish'
	);

	if ( isset( $_POST['paged'] ) ) {
		$args['paged'] = $_POST['paged'];
	}

	if ( isset( $_POST['author_id'] ) ) {
		$args['author'] = $_POST['author_id'];
		$args['orderby'] = 'author';
		$args['order'] = 'DESC';
		$args['posts_per_page'] = 50;
	}

	if ( isset( $_POST['cat_id'] ) ) {
		$args['cat'] = $_POST['cat_id'];
		$args['posts_per_page'] = 50;
	}

	if ( isset( $_POST['post_type'] ) ) {
		$args['post_type'] = $_POST['post_type'];
	}

	$loop = new WP_Query( $args );

	$cnt = array();
	if ($loop->have_posts()):
		while ($loop->have_posts()): $loop->the_post();
			ob_start();
			include( locate_template( 'inc/partial-each-blog.php' ));
			$html = ob_get_contents();
			$cnt[] = $html;
			ob_end_clean();
		endwhile;
	else:
		$cnt = 'Sorry an error has occured.';
	endif;
	echo json_encode($cnt);
	exit;
}

add_action( 'wp_ajax_get_blogs_action', 'get_blogs');
add_action( 'wp_ajax_nopriv_get_blogs_action', 'get_blogs');


function get_archive_links() {
	global $post;

	// Variables
	$archive_year = get_the_time('Y');
	$archive_month = get_the_time('m');
	$archive_day = get_the_time('d');

	$post_type = get_post_type($post);

	return '<a href="' . get_home_url() . '/' . $post_type . '/' . $archive_year . '/' . $archive_month . '">
				' . get_the_date("F") . '</a>
			<a href="' . get_home_url() . '/' . $post_type . '/' . $archive_year . '/' . $archive_month . '/' . $archive_day . '">
				' . get_the_date('d') . '</a>,
			<a href="' . get_home_url() . '/' . $post_type . '/' . $archive_year . '">
				' . get_the_date('Y') . '</a>';

}

class Custom_Post_Type_Rewrite {

	public function __construct() {
		add_action( 'wp_loaded', array( &$this, 'set_rewrite' ), 10 );
	}

	public function set_rewrite() {
		global $wp_rewrite;

		if ( ! $wp_rewrite->permalink_structure ) {
			return;
		}

		$post_types = get_post_types( array( '_builtin' => false, 'publicly_queryable' => true, 'show_ui' => true ) );

		$search = array( '%front%', '%post%', '%year%', '%monthnum%', '%day%', '%date%' );

		$date = '';
		if ( preg_match( '/\/archives/', $wp_rewrite->permalink_structure ) ) {
			$date = '/date';
		}

		$position = 'top';

		foreach ( $post_types as $post_type ) {
			if ( ! $post_type ) {
				continue;
			}

			$slug = get_post_type_object( $post_type )->rewrite['slug'] ? get_post_type_object( $post_type )->rewrite['slug'] : $post_type ;
			$front = get_post_type_object( $post_type )->rewrite['with_front'] ? $wp_rewrite->front : '' ;

			$replace = array( preg_replace( '/^\//', '', $front ), $slug, $wp_rewrite->rewritereplace[0], $wp_rewrite->rewritereplace[1], $wp_rewrite->rewritereplace[2], $date );

			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/%day%/feed/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/%day%/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/%day%/page/?([0-9]{1,})/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/%day%/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&post_type=' . $post_type, $position );

			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/feed/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]&post_type='. $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/page/?([0-9]{1,})/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/%monthnum%/?$' ), 'index.php?year=$matches[1]&monthnum=$matches[2]&post_type=' . $post_type, $position );

			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/feed/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&feed=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?year=$matches[1]&feed=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/page/?([0-9]{1,})/?$' ), 'index.php?year=$matches[1]&paged=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%%date%/%year%/?$' ), 'index.php?year=$matches[1]&post_type='. $post_type, $position );

			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?author_name=$matches[1]&feed=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?author_name=$matches[1]&feed=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/author/([^/]+)/page/?([0-9]{1,})/?$' ), 'index.php?author_name=$matches[1]&paged=$matches[2]&post_type=' . $post_type, $position );
			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/author/([^/]+)/?$' ), 'index.php?author_name=$matches[1]&post_type=' . $post_type, $position );

//			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/feed/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?feed=$matches[2]&post_type=' . $post_type, $position );
//			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/(feed|rdf|rss|rss2|atom)/?$' ), 'index.php?feed=$matches[2]&post_type=' . $post_type, $position );
//			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/page/?([0-9]{1,})/?$' ), 'index.php?post_type=' . $post_type . '&paged=$matches[2]', $position );
//			add_rewrite_rule( str_replace( $search, $replace, '%front%%post%/?$' ), 'index.php?post_type=' . $post_type, $position );
		}

	}

}

$custom_post_type_rewrite = new Custom_Post_Type_Rewrite;

add_filter( 'getarchives_where', 'getarchives_where_filter', 10, 2 );
function getarchives_where_filter( $where, $args ) {

	if ( isset($args['post_type']) ) {
		$where = "WHERE post_type = '$args[post_type]' AND post_status = 'publish'";
	}

	return $where;
}

function get_archives_custom_link( $link ) {
	global $post;
	$post_type = get_post_type($post);

	if ( !empty($post_type) ) {
		$link = str_replace( get_home_url(), get_home_url() . '/' . $post_type, $link );
	}

	return $link;

};
add_filter( 'get_archives_link', 'get_archives_custom_link', 10, 2 );

/*--------------------------------------------------------*\
	List Authors
\*--------------------------------------------------------*/

add_filter( 'author_link', 'lvrmp_author_link', 10, 3);
function lvrmp_author_link( $link, $author_id, $author_nicename ) {
	global $post;
	$post_type = get_post_type($post);

	if ( !empty($post_type) ) {
		$link = str_replace( get_home_url(), get_home_url() . '/' . $post_type, $link );
	}

	return $link;
}

function lvrmp_list_authors( $args ) {
	global $wpdb;

	$defaults = array(
		'post_type' => 'post',
		'orderby' => 'name', 'order' => 'ASC', 'number' => '',
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true, 'exclude' => '', 'include' => ''
	);

	$args = wp_parse_args( $args, $defaults );

	$return = '';

	$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
	$query_args['fields'] = 'ids';
	$authors = get_users( $query_args );

	$author_count = array();
	foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( $args['post_type'] ) . " GROUP BY post_author" ) as $row ) {
		$author_count[$row->post_author] = $row->count;
	}
	foreach ( $authors as $author_id ) {
		$author = get_userdata( $author_id );

		if ( $args['exclude_admin'] && 'admin' == $author->display_name ) {
			continue;
		}

		$posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;

		if ( ! $posts && $args['hide_empty'] ) {
			continue;
		}

		if ( $args['show_fullname'] && $author->first_name && $author->last_name ) {
			$name = "$author->first_name $author->last_name";
		} else {
			$name = $author->display_name;
		}

		if ( ! $args['html'] ) {
			$return .= $name . ', ';

			continue; // No need to go further to process HTML.
		}

		if ( 'list' == $args['style'] ) {
			$return .= '<li>';
		}

		$link = '<a href="' . get_author_posts_url( $author->ID, $author->user_nicename ) . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->display_name) ) . '">' . $name . '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';
			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . get_author_feed_link( $author->ID, $args['feed_type'] ) . '"';

			$alt = '';
			if ( ! empty( $args['feed'] ) ) {
				$alt = ' alt="' . esc_attr( $args['feed'] ) . '"';
				$name = $args['feed'];
			}

			$link .= '>';

			if ( ! empty( $args['feed_image'] ) ) {
				$link .= '<img src="' . esc_url( $args['feed_image'] ) . '" style="border: none;"' . $alt . ' />';
			} else {
				$link .= $name;
			}

			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( $args['optioncount'] ) {
			$link .= ' ('. $posts . ')';
		}

		$return .= $link;
		$return .= ( 'list' == $args['style'] ) ? '</li>' : ', ';
	}

	$return = rtrim( $return, ', ' );

	if ( ! $args['echo'] ) {
		return $return;
	}
	echo $return;
}

function lvrmp_authors_dropdown( $args ) {
	global $wpdb;

	$defaults = array(
		'post_type' => 'post',
		'orderby' => 'name', 'order' => 'ASC', 'number' => '',
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true, 'exclude' => '', 'include' => ''
	);

	$args = wp_parse_args( $args, $defaults );

	$return = '';

	$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
	$query_args['fields'] = 'ids';
	$authors = get_users( $query_args );

	$author_count = array();
	foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( $args['post_type'] ) . " GROUP BY post_author" ) as $row ) {
		$author_count[$row->post_author] = $row->count;
	}
	foreach ( $authors as $author_id ) {
		$author = get_userdata( $author_id );

		if ( $args['exclude_admin'] && 'admin' == $author->display_name ) {
			continue;
		}

		$posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;

		if ( ! $posts && $args['hide_empty'] ) {
			continue;
		}

		if ( $args['show_fullname'] && $author->first_name && $author->last_name ) {
			$name = "$author->first_name $author->last_name";
		} else {
			$name = $author->display_name;
		}

		if ( ! $args['html'] ) {
			$return .= $name . ', ';

			continue; // No need to go further to process HTML.
		}

		if ( 'list' == $args['style'] ) {
			$return .= '<option value="' . get_author_posts_url( $author->ID, $author->user_nicename ) . '">';
		}


		if ( $args['optioncount'] ) {
			$name .= ' ('. $posts . ')';
		}

		$return .= $name;
		$return .= ( 'list' == $args['style'] ) ? '</option>' : ', ';
	}

	$return = rtrim( $return, ', ' );

	if ( ! $args['echo'] ) {
		return $return;
	}
	echo $return;
}

/*
 * Check for Gravatars
 */
function validate_gravatar($email) {
	// Craft a potential url and test its headers
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}


// Load Utility functions
require_once  __DIR__ . '/utility/LiveRampUtility.php';

// Load all meta boxes
require_once  __DIR__ . '/meta/loader.php';

// ACF utility function
//require_once  __DIR__ . '/career/utility/CareerBlockUtility.php';


/** COMMENTS WALKER */
class LvrmpCommentWalker extends Walker_Comment {

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>

        <ul id="comment-list">

    <?php }

    /** START_LVL
     * Starts the list before the CHILD elements are added. Unlike most of the walkers,
     * the start_lvl function means the start of a nested comment. It applies to the first
     * new level under the comments that are not replies. Also, it appear that, by default,
     * WordPress just echos the walk instead of passing it to &$output properly. Go figure.  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        <ul class="children">
    <?php }

        /** END_LVL
         * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        </ul><!-- /.children -->

    <?php }

	/** START_EL */
    //function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
    public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
        <div id="comment-body-<?php comment_ID() ?>" class="comment-body">

            <div class="comment-author vcard author">
                <?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
                <cite class="fn n author-name"><?php echo get_comment_author_link(); ?></cite>
                <span class="comment-meta comment-meta-data">
                    <?php comment_time(); ?> <?php comment_date(); ?> <?php edit_comment_link( '(Edit)' ); ?>
                </span><!-- /.comment-meta -->
            </div><!-- /.comment-author -->

            <div id="comment-content-<?php comment_ID(); ?>" class="comment-content">
                <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>

                <?php else: comment_text(); ?>
                <?php endif; ?>
            </div><!-- /.comment-content -->

            <?php

            if(!isset($add_below)) {
                $add_below = '';
            }
            ?>

            <div class="reply">
                <?php $reply_args = array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'] );

                comment_reply_link( array_merge( $args, $reply_args ) );  ?>
            </div><!-- /.reply -->
        </div><!-- /.comment-body -->

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

        </li><!-- /#comment-' . get_comment_ID() . ' -->

    <?php }

    /** DESTRUCTOR
     * I just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out :) */
    function __destruct() { ?>

        </ul><!-- /#comment-list -->

    <?php }
}
