<style>
.filter-intro {max-width:80%;}
@media (max-width: 1200px) {
	.filter-intro {padding-left:20px !important;padding-right:20px !important;padding-bottom:20px !important;max-width: 100% !important}
	.hero+.page-bg__content>div, .hero+section>div {
	    padding-top: 44px;
	}
}
</style>

<div id="filter-container">

	<section class="no-pad filter-sub-nav">

		<!-- THIS IS THE SEARCH -->
		<div class="col-12 filter-intro">
			<?php the_content(); ?>
		</div>

		<div class="grid-center">


			<!-- THIS IS THE SEARCH -->
			<div class="col-12 filter-search">

				<form id="search" class="grid-middle">
					<input type="search" name="search" placeholder="Search for a Partner" class="col-12">
					<span class="nc-icon-outline ui-1_zoom col-2"></span>
				</form>

			</div>

			<div class="col-12">

				<ul class="filter-list grid-1_md-2_lg-5">

					<li class="filter-item col">

						<div class="filter__name">
							<span class="nc-icon-outline arrows-1_minimal-down"></span>
						</div>

						<div class="filter-options">

							<ul class="grid">
								<li>
								</li>
							</ul>
						</div>
					</li>
				</ul>

				<section class="no-pad">

					<div class="grid-center">

						<div class="filter-selected grid-center">

							<div class="col-12_md-8">

									<ul>

										<li>

										<span class="nc-icon-outline ui-1_simple-remove"></span>
										<div style="display:inline-block"></div>
									</li>
								</ul>

							</div>

							<div class="col-12_md-4">

								<ul>
									<li ><span class="nc-icon-outline ui-1_simple-remove"></span>
										<div>Clear all filters</div>
									</li>
								</ul>

							</div>

						</div>

					</div>

				</section>

				<div style="padding: 100px 0 200px; text-align: center;">
					<?php echo get_template_part('template-parts/loader'); ?>
				</div>

				<section class="pad-half logos-block" style="width:100%;">

					<div>

						<ul class="expander-tiles partners">

							<li>

								<div>
									<article>
										<a href=""> <? // ng-click="toggleDetail( item )" ?>

											<span class="level">
                        <strong></strong>
											</span>

											<img alt="{{ item.name }}" class="optimized">

											<img alt="{{ item.name }}">
										</a>
									</article>
								</div>
							</li>
							<!-- end list item -->
						</ul>

						<p class="no-results"><?php _translate('there_are_no_items_for_this_search_criteria')  ?>.</p>

						<div class="center">
							<div class="btn load-more">

								<?php $load_more_text = get_field('load_more_text');

								if( empty( $load_more_text ) ) {
									$load_more_text = 'Load more';
								} ?>
								<span><?php echo $load_more_text; ?></span>
								<i class="nc-icon-outline arrows-1_minimal-down"></i>
							</div>
						</div>

					</div>

				</section>

			<!--NUMBER OF QUERIES:
			<?php echo get_num_queries();?>-->

		</div>
	</section>
</div>
