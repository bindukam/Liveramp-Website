<section class="news block bg-white">
    <header class="header-news">
        <div class="ctn">
            <h1 class="title"><?php echo get_sub_field('title'); ?></h1>

            <h3 class="subtitle"><?php echo get_sub_field('subtitle'); ?></h3>
            <nav class="nav-news">
                <ul class="menu-news">
                    <li><a href="#" data-news="*">All</a></li>
                    <li><a href="#" data-news=".filter-news-featured">Featured Stories</a></li>
                    <li><a href="#" data-news=".filter-news">News</a></li>
                    <li><a href="#" data-news=".filter-press">Press Releases</a></li>
                    <li><a id="menu-news-blog-link" data-news=".filter-blog" target="_blank" href="/blog/">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="news-ctn">
        <div class="ctn">
            <div class="iso-news" id="iso-news">
                <?php
                $args = array('post_type' => 'news', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC');
                $loop = new WP_Query($args);
                while ($loop->have_posts()): $loop->the_post();
                    $post_type = 'filter-'.get_post_type();
                    $featured = get_field('is_featured') == true ? 'filter-news-featured' : '';
                    $press = get_field('is_press') == true ? 'filter-press' : '';
                    $news_class = $post_type . ' ' . $featured . ' ' . $press;
                    ?>
                    <div class="news-item <?php echo $news_class; ?>">
                        <figure class="news-img">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                        <h5 class="news-title"><?php echo get_the_title(); ?></h5>
                        <a href="<?php echo get_field('external_link'); ?>" class="news-link" target="_blank"><span
                                class="icon-arrow-right"></span></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</section>

<!-- <section class="news-signup block bg-orange">
	<div class="ctn">
		<h1 class="title">Sign up for the latest News</h1>
		<div class="input-ctn">
			<input type="text" placeholder="Enter email address">
		</div>
	</div>
</section> -->