<?php

class ResourceLinks {

	private $resourceGroups = array();
	private $resourceLinks = array();
	private $args = array();
	public static $transient_prefix = "_lvrmp_resource_links_";

	/**
	 *
	 * Construct an array of resource links and groups of links.
	 *
	 * Usage:
	 *      $resourceLinks = new ResourceLinks( $args );
	 *      $resourceGroups = $resourceLinks->get_groups();
	 *      foreach( $resourceGroups as $group) {}
	 *
	 * This loops through the groups of resources.
	 *
	 * @param array $args Array of arguments to pass into get_links_by_type()
	 *        @param string $type Name of resource type. partners | page
	 *        @param string $id The id of the partner or the page being displayed. Defaults to the url variable for 'p'
	 */
	public function __construct( $args = array() ){
		global $post;

		// This is needed in order to reset the $post variable
		wp_reset_postdata();

		$this->resourceGroups = array(
			'resource' => array(
				'title' => 'Resources',
				'links' => array(),
			),
			'news' => array(
				'title' => 'News',
				'links' => array(),
			),
			'video' => array(
				'title' => 'Videos',
				'links' => array(),
			),
			'pressrelease' => array(
				'title' => 'Press Release',
				'links' => array()
			)
		);

		$this->args = array_merge( array(
			'type' => 'page',
			'id' => $post->ID
		), $args);

		$this->get_links_by_type( $this->args['type'], $this->args['id'] );

		$this->resources_icons = array(
			'datasheet' => 'articles',
			'case_study' => 'industry',
			'presentation' => 'presentations',
			'press_release' => 'articles',
			'video' => 'webinars',
			'other' => 'white-papers',
			'blog' => 'articles',
		);

		// from old site
		$this->old_resources_icons = array(
		  'datasheet' => 'data-sheet.png',
		  'case_study' => 'case-study.png',
		  'presentation' => 'presentation.png',
			'press_release' => 'press-release-page.png',
			'video' => 'video.png',
		  'other' => 'white-paper.png',
		  'blog' => 'blog.png',
		);

	}

	private function set_group_links( $link ) {

		$type = get_post_meta($link->ID, 'link_type', true);
		// Group Press Releases with News
		if ($type == "pressrelease") {
			$type = "news";
		}
		array_push($this->resourceGroups[$type]['links'], $link);

	}

	private function get_links_by_type( $type, $id ) {

		$key = 'link_pages';
		$cache_name = self::$transient_prefix.$type.'_'.$id;

		if( $type == 'partner' ) {
			$key = 'lvrmp_resource_links_partners';
		}

		// if ( false === ($query = get_transient( $cache_name ) ) ) {
			$args = array(
				'post_type'  => 'resource_link',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key'     => $key,
						'value'   => $id,
						'compare' => 'LIKE'
					)
				)
			);

			$query = new WP_Query( $args );
			// set_transient( $cache_name, $query, 12 * HOUR_IN_SECONDS );
		// }

		if ( $query->have_posts() ) {
			foreach( $query->posts as $link ) {
				array_push( $this->resourceLinks, $link );
				$this->set_group_links( $link );
			}
		}

		usort($this->resourceGroups['news']['links'], "self::sort_news_by_date");

		wp_reset_postdata();

	}

	function sort_news_by_date($a, $b) {
		// Get post date, sort descending
		// If there is no blog post, it is a press release, in which case, get the custom field for post date.
		$post_a = get_field('blog_post', $a->ID);
			if(empty($post_a)) {
				$a_date = get_field('post_date', $a->ID);
			} else {
				$a_date = $post_a[0]->post_date;
			}

		$post_b = get_field('blog_post', $b->ID);
			if(empty($post_b)) {
				$b_date = get_field('post_date', $b->ID);
			} else {
				$b_date = $post_b[0]->post_date;
			}

		return strcmp(strtotime($b_date), strtotime($a_date));
	}

	function get_links() {
		return $this->resourceLinks;
	}

	function get_groups() {
		return $this->resourceGroups;
	}

	function get_links_sorted_by_publish_date($direction = 'desc') {
		$links = $this->get_links();
		usort($links, "self::sort_links_by_publish_date");
		return $direction == 'asc' ? $links : array_reverse($links);
	}

	function sort_links_by_publish_date($a, $b) {
		return strcmp($a->post_date, $b->post_date);
	}

	// Ridiculous debugging tool
	function enlarge_arr($arr) {
		return array_merge($arr, $arr, $arr, $arr);
	}

	// This function gets the resource icon
	function get_resource_icon( $resource_sub_type ) {

		switch ($resource_sub_type) {
			case 'datasheet':
				$link_icon = $this->resources_icons['datasheet'];
				break;

			case 'case_study':
				$link_icon = $this->resources_icons['case_study'];
				break;

			case 'press_release':
				$link_icon = $this->resources_icons['press_release'];
				break;

			case 'presentation':
				$link_icon = $this->resources_icons['presentation'];
				break;

			default:
				$link_icon = $this->resources_icons['other'];
				break;
		}

		return $link_icon;
	}

	// This function outputs the resource link section for pages
	function page_sections() {
		// How many items to display before hiding the rest in a collapsed div
		$more_threshold = 6;
		$has_hidden_items = false;

		?>

		<div class="why-connect__section three-col-grid additional-resources__wrap">
			<div class="ctn three-col-grid__content">
				<div class="three-col-grid__title">
					<h2>Additional Resources</h2>
				</div>
				<div class="three-col-grid__cols">
					<?php foreach($this->get_links_sorted_by_publish_date() as $link_i => $link):
						$link_type = get_field('link_type', $link->ID);
						$link_label = null;
						$link_url = null;
						$link_icon = null;

						switch ($link_type) {
							case 'resource':
								$link_label = get_field('link_label', $link->ID);
								$link_url = get_field('link_url', $link->ID);
								$resource_sub_type = get_field('doc_sub_type', $link->ID);
								switch ($resource_sub_type) {
									case 'datasheet':
										$link_icon = $this->old_resources_icons['datasheet'];
										break;

									case 'case_study':
										$link_icon = $this->old_resources_icons['case_study'];
										break;

									case 'press_release':
										$link_icon = $this->old_resources_icons['press_release'];
										break;

									case 'presentation':
										$link_icon = $this->old_resources_icons['presentation'];
										break;

									default:
										$link_icon = $this->old_resources_icons['other'];
										break;
								}
								break;

							case 'video':
								$link_label = get_field('link_label', $link->ID);
								$link_url = get_field('link_url', $link->ID);
								$link_icon = $this->old_resources_icons['video'];
								break;

							case 'news':
								$blog_post = get_field('blog_post', $link->ID);
								$blog_post = $blog_post[0];
								$link_label = $blog_post->post_title;
								$link_url = get_permalink($blog_post->ID);
								$link_icon = $this->old_resources_icons['blog'];
								break;

							case 'pressrelease':
								$link_label = get_field('link_label', $link->ID);
								$link_url = get_field('link_url', $link->ID);
								$link_teaser = get_field('teaser', $link->ID);
								$link_icon = $this->old_resources_icons['press_release'];
								// TODO Need link_icon for press releases?
								break;
						}

						$should_hide_link = $link_i >= $more_threshold;
						if ($should_hide_link) {
							$has_hidden_items = true;
						}

						?>
						<div class="three-col-grid__item js__resource-item three-col-grid__item--<?php echo $link_type ?> <?php echo $should_hide_link ? 'three-col-grid__item--hidden' : '' ?>">
							<a href="<?php echo $link_url ?>" rel="noopener noreferrer" target="_blank">
								<span class="three-col-grid__item-icon item-icon--<?php echo $link_type ?>">
									<img src="<?php echo THEME_DIR ?>/assets/img/resource-icons/<?php echo $link_icon ?>" alt="" />
								</span>
								<div class="three-col-grid__item-copy">
									<h3><?php echo str_replace('-', '&#8209;', $link_label); ?></h3>
								</div>
							</a>
						</div>
					<?php endforeach; ?>

					<?php if ($has_hidden_items): ?>
						<a class="three-col-grid__btn-reveal" href="#more-resources">Show More <span class="icon-arrow-down"></span></a>
					<?php endif; ?>

				</div>
			</div>
		</div>
	<?php }

	// This function outputs the resource links section for the partners detail pages
	function partner_sections() {

		// echo '<h1>Resource GROUPS:</h1><br>:';
		// echo '<pre>';
		// var_dump($this->resourceGroups);
		// echo '</pre>';

		foreach( $this->resourceGroups as $key=>$group) {
			?>

			<?php if (!empty($group['links'])) :
				$block_class = (!isset($block_class) || $block_class == "" ? "bg-grey-lt-resources" : "");
				?>

				<section class="shaded-bg quarter-pad grid-center <?php echo $block_class; ?> resource-links block--<?php echo $key; ?>" style="padding-top: 60px; padding-bottom: 60px;">
					<div class="resource-links-container">
						<header>
							<h2><?php echo $group['title']; ?></h2>
						</header>

						<ul class="grid-1-equalHeight_md-2_lg-4 resource-list-alt has-colors event-list links--<?php echo $key; ?>">

							<?php foreach( $group['links'] as $link ) :
								$link_type = get_field('link_type',$link->ID);

								switch ($link_type) {
									case 'resource':
										$link_label = get_field('link_label', $link->ID);
										$link_url = get_field('link_url', $link->ID);
										$resource_sub_type = get_field('doc_sub_type', $link->ID);
										$target = $resource_sub_type == 'press_release' ? 'rel="noopener noreferrer" target="_blank"' : "";
										?>
										<li class="col resource-<?php echo $resource_sub_type; ?>">
											<article>
												<?php $link_icon = $this->get_resource_icon( $resource_sub_type ); ?>
												<div class="img-container col-5_md-4">
													<img src="<?php echo get_template_directory_uri(); ?>/_img/svg/resources/<?php echo $link_icon; ?>.svg" style="width: 100px;">
												</div>
												<a href="<?php echo $link_url; ?>" <?php echo $target ?>><?php echo $link_label; ?></a>
											</article>
										</li>
										<?php
										break;

									case 'video':
										$link_label = get_field('link_label', $link->ID);
										$link_thumbnail = get_field('thumbnail', $link->ID);

										$link_url = get_field('link_url', $link->ID);
										?>
										<li class="col">
											<article>
												<a href="<?php echo $link_url; ?>">
													<div class="img-container col-5_md-4">
														<img src="<?php echo $link_thumbnail['sizes']['large']; // was resource-links-thumbnail-2x ?>" />
														<?php echo $link_label; ?>
													</div>
												</a>
											</article>
										</li>
										<?php
										break;

									case 'news':
										$blog_post = get_field('blog_post', $link->ID);
										$blog_post = $blog_post[0];

										if ($blog_post->post_type == "blog") {
											$news_header = get_field('blog_header','options');

										} else if ($blog_post->post_type == "engineering") {
											$news_header = get_field('engineering_header','options');
										}
										if (isset($news_header) && is_array($news_header)) {
											$news_title = $news_header[0]['title'];
										}
										?>
										<li class="col">
											<article>
												<a href="<?php echo get_permalink($blog_post->ID); ?>">

													<div class="news-post-excerpt">
														<?php

														$thumbnail = get_the_post_thumbnail($blog_post->ID, 'blog-thumbnail');

														if( !empty($thumbnail) ) {
															echo $thumbnail;
														} else {
															echo get_excerpt_by_id($blog_post->ID);
														}

														?>
													</div>

													<?php if (isset($news_title)) { ?>
														<p class="news-category"><?php echo $news_title; ?></p>
													<?php } ?>

													<h4 class="news-post-title"><?php echo $blog_post->post_title; ?></h4>

													<?php if (empty($thumbnail)) { ?>
														<div class="fade-out"></div>
													<?php } ?>
												</a>
											</article>
										</li>
										<?php
										break;

									case 'pressrelease':
										$link_label = get_field('link_label', $link->ID);
										$link_teaser = get_field('teaser', $link->ID);
										$link_url = get_field('link_url', $link->ID);
										?>
										<li class="col">
											<article>
												<a href="<?php echo $link_url; ?>" rel="noopener noreferrer" target="_blank">

													<p class="news-category">Press Release</p>

													<h4 class="news-post-title"><?php echo $link_label; ?></h4>

													<div class="news-post-excerpt">
														<?php

														echo $link_teaser;

														?>
													</div>

													<div class="fade-out"></div>

												</a>
											</article>
										</li>
										<?php
										break;
								}

							endforeach; ?>
						</ul>
					</div>
				</section>
			<?php endif; ?>
			<?php

		}
	}

	function sections() {

		// If the type is partner, load partner sections
		if ( $this->args['type'] == "partner") {
			$this->partner_sections();
		} else {
			$this->page_sections();
		}
	}

	function get_page_ids_array($page) {
		return $page->ID;
	}

	public static function purge_transients( $post ) {
		global $wpdb;

		$post = wp_is_post_revision( $post );

		$types = array("partner", "page");
		$partner_ids = get_field('lvrmp_resource_links_partners', $post);
		if (!empty($partner_ids)) {
			$partner_ids = json_decode( $partner_ids );
		} else {
			$partner_ids = array();
		}

		$page_ids = get_field('link_pages', $post);
		if (is_array($page_ids)) {
			$page_ids = array_map( 'self::get_page_ids_array', $page_ids );
		} else {
			$page_ids = array();
		}

		$ids = array_merge($partner_ids, $page_ids);
		foreach( $ids as $id ) :
			foreach($types as $type) {
				$cache_name = self::$transient_prefix.$type."_".$id;
				delete_transient( $cache_name );
			}
		endforeach;

		wp_cache_flush();

	}
}


add_action( 'edit_post', 'ResourceLinks::purge_transients' );
add_action( 'wp_insert_post', 'ResourceLinks::purge_transients' );
