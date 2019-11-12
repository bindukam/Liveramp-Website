<?php
	// ini_set('display_errors', 'on');
	// error_reporting(E_ALL);
	include dirname(__FILE__) . '/tweet-php/TweetPHP.php';
	$colors = array('blue', 'green-lt', 'orange', 'grey-lt', 'grey-x-lt', 'yellow');

	function select_bg( $selected ) {
		$colors = array('blue', 'green-lt', 'orange', 'grey-lt', 'yellow');
		switch ($selected) {
			case 'blue':
				return'bg-blue';
				break;
			case 'green-lt':
				return 'bg-green-lt';
				break;
			case 'orange':
				return 'bg-orange';
				break;
			case 'grey-lt':
				return 'bg-grey-lt';
				break;
			case 'grey-x-lt':
				return 'bg-grey-x-lt';
				break;
			case 'yellow':
				return 'bg-yellow';
				break;
			case 'random':
				return 'bg-' . $colors[array_rand($colors)];
				break;
			case gettype($selected) == 'array':
				return $selected;
				break;
			default:
				return 'bg-' . $colors[array_rand($colors)];
				break;
		}
	}
	$twitter_count = 0;
	$blog_count = 0;
	$resource_count = 0;
	$twitter_bg = array();
	$blog_bg = array();
	$resource_bg = array();
	while (have_rows('aggregator_item')): the_row();
		$type = get_sub_field( 'type' );
		$bg = get_sub_field( 'background_image' ) != null ? array('image', get_sub_field( 'background_image' ) ) : get_sub_field( 'background_color' );
		if ( $type == 'twitter' ):
			$twitter_count++;
			array_push($twitter_bg,	$bg);
		elseif ( $type == 'blog' ):
			$blog_count++;
			array_push($blog_bg, $bg);
		elseif ( $type == 'resource' ):
			$resource_count++;
			array_push($resource_bg, $bg);
		endif;
	endwhile;
	wp_reset_query();
?>

<section class="block aggregator">
	<div class="ctn">
		<div class="aggregator-ctn" id="iso-aggregator">
			<?php
				$args = array( 'post_type' => 'blog', 'posts_per_page' => $blog_count );
				$loop = new WP_Query( $args );
				$i = 0;
				while ($loop->have_posts()): $loop->the_post();
					$instance_bg = gettype($blog_bg[$i]) != 'array' ? select_bg($blog_bg[$i]) : '';
					//$bg_image = gettype($blog_bg[$i]) == 'array' ? 'style="background-image: url(' . select_bg($blog_bg[$i])[1] . ')"' : '';
			?>
			<div class="agg-item <?php echo $instance_bg; //if ($bg_image) echo ' agg-bg-img'; ?>" <?php //echo $bg_image; ?>>
				<header class="header-aggregator">
					<div class="icon"><span class="icon-comment"></span></div>
					<date class="aggregator-date"><?php echo get_the_date(); ?></date>
				</header>
				<div class="aggregator-cnt">
					<p><?php echo get_the_title(); ?></p>
					<p class="agg-read-more"><a href="<?php the_permalink(); ?>">Read More <span class="icon-arrow-right"></span></a></p>
				</div>
			</div>
			<?php
				$i++;
				endwhile;
				wp_reset_query();
			?>
			<?php
				$args = array( 'post_type' => 'resources', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				$i = 0;
				while ($loop->have_posts()): $loop->the_post();
					if ( get_field( 'featured_resource' ) == true ):
						$instance_bg = gettype($resource_bg[$i]) != 'array' ? select_bg($resource_bg[$i]) : '';
						//$bg_image = gettype($resource_bg[$i]) == 'array' ? 'style="background-image: url(' . select_bg($resource_bg[$i])[1] . ')"' : '';
			?>
			<div class="agg-item agg-resource <?php echo $instance_bg; //if ($bg_image) echo ' agg-bg-img'; ?>" <?php //echo $bg_image; ?>>
				<header class="header-aggregator">
					<div class="icon"><span class="icon-document"></span></div>
				</header>
				<div class="aggregator-cnt">
					<p><?php echo get_the_title(); ?></p>
					<?php echo get_field( 'resources_excerpt' ); ?>
					<?php if ( get_field( 'marketo') ): ?>
					<p class="agg-read-more"><a href="<?php echo get_field( 'marketo' ); ?>" target="_blank">Read More<span class="icon-arrow-right"></span></a></p>
					<?php else: ?>
					<p class="agg-read-more"><a href="<?php the_permalink(); ?>" target="_blank">Read More<span class="icon-arrow-right"></span></a></p>
					<?php endif; ?>
				</div>
			</div>
			<?php
					$i++;
					if ($i >= $resource_count) break;
					endif;
				endwhile;
				wp_reset_query();
			?>
			<?php
				$TweetPHP = new TweetPHP(array(
					'consumer_key'              => 'VNd1lF0otEDrMVt8V8R1ngnDk',
					'consumer_secret'           => 'ay4B5EjORr00KnoIcouqf0O06W5V0MxqTCc2LJDbNun9YyZVzy',
					'access_token'              => '314799259-FOvKxKjhOouMYYN0HCYLClRKGYdXk17WhnJIwfw1',
					'access_token_secret'       => 'SID3xMxGgfuVmdYw2IOcq5xCDvlDiXrTrnedZRUa0zU4s',
					'twitter_screen_name'       => 'LiveRamp',
					'tweets_to_display'					=> ($twitter_count + 1),
					'ignore_replies'        		=> false,
					'ignore_retweets'       		=> false,
					'debug'											=> true,
				));
				$tweets = $TweetPHP->get_tweet_array();
				$tweet_count = 0;
				foreach ( $tweets as $tweet ):
					$date = date('F j, Y', strtotime( $tweet['created_at'] ) );
					$text = $tweet['text'];
					$instance_bg = gettype($twitter_bg[$tweet_count]) != 'array' ? select_bg($twitter_bg[$tweet_count]) : '';
					//$bg_image = gettype($twitter_bg[$tweet_count]) == 'array' ? 'style="background-image: url(' . select_bg($twitter_bg[$tweet_count])[1] . ')"' : '';
			?>
			<div class="agg-item <?php echo $instance_bg; //if ($bg_image) echo ' agg-bg-img'; ?>" <?php //echo $bg_image; ?>>
				<header class="header-aggregator">
					<div class="icon"><span class="icon-twitter"></span></div>
					<date class="aggregator-date"><?php echo $date; ?></date>
				</header>
				<div class="aggregator-cnt">
					<p><?php echo $text; ?></p>
				</div>
			</div>
			<?php
				$tweet_count++;
				if ($tweet_count >= $twitter_count) break;
				endforeach;
			?>
		</div>
	</div>
</section>
