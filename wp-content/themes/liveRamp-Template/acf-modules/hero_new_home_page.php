<section class="hero-new-home-page pad-section">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell home-text-area">
				<h1 class="hometag"><?php the_sub_field('title') ?></h1>
				
				<?php if (get_sub_field('cta')):
					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];?>
					<div class="new-home-btn"><a class="button" target="<?php echo $target ?>" href="<?php echo $url ?>"><?php echo $title ?></a></div>
				<?php endif ?>
			
			</div>
			<div class="cell home-image-area">
				<img src="<?php the_sub_field('hero_image') ?>">
			</div>
		</div>
	</div>
</section>
	
<?php $news_ticker = get_sub_field ('news_ticker') ?>
<?php if ($news_ticker['turn_news_ticker_on']==1): ?>
	<div class="news-ticker-new-home-page">
		<h4 id="news-ticker-text">
			<?php echo $news_ticker['text'] ?>
			<a href="<?php echo $news_ticker['link']['url'] ?>" target="<?php echo $news_ticker['link']['target'] ?>"><?php echo $news_ticker['link']['title'] ?></a>
		</h4>
	</div>	
<?php endif ?>
