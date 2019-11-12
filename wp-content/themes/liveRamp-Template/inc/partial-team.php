<section id="team" class="team block bg-white block-angle-up">
	<header class="header-team">
		<div class="ctn">
			<h1 class="title"><?php echo get_sub_field( 'section_title' ); ?></h1>
		</div>
	</header>
	<article class="team-ctn">
		<div class="ctn">
			<?php $i = 0; while (have_rows( 'team_member' )): the_row() ?>
			<div class="team-member"><a href="#" class="md-trigger" data-modal="md-<?php echo $i; ?>">
				<div class="team-img">
					<img src="<?php echo get_sub_field( 'image' ); ?>" alt="<?php echo get_sub_field( 'title' ); ?>">
				</div>
				<div class="team-info">
					<h4 class="team-name"><?php echo get_sub_field( 'name' ); ?></h4>
					<p class="team-title"><?php echo get_sub_field( 'title' ); ?></p>
				</div>
			</a></div>
			<?php $i++; endwhile; ?>
		</div>
	</article>
</section>

<?php 
	$i = 0; 
	while (have_rows( 'team_member' )): the_row();
		$twitter = get_sub_field( 'twitter' );
		$linkedin = get_sub_field( 'linkedin' );
?>
<div class="md-modal md-effect" id="<?php echo 'md-' . $i; ?>">
	<div class="md-content">
		<div class="md-team-name"><?php echo get_sub_field( 'name' ); ?></div>
		<div class="md-team-bio"><?php echo get_sub_field( 'bio' ); ?></div>
<!-- 		<ul class="md-social">
			<?php if ( $twitter ) { ?>
			<li class="md-twitter">
				<a href="<?php echo $twitter ?>" target="_blank">
					<?php include dirname(__FILE__) . './../assets/img/social/min/twitter.min.svg'; ?>
				</a>
			</li>
			<?php }
			if ( $linkedin ) { ?>
			<li class="md-linkedin">
				<a href="<?php $linkedin; ?>">
					<?php include dirname(__FILE__) . './../assets/img/social/min/linkedin.min.svg'; ?>
				</a>
			</li>
			<?php } ?>
		</ul> -->
	</div>
	<div class="md-close"></div>
</div>
<?php $i++; endwhile; ?>