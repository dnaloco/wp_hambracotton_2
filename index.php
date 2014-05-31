<?php get_header(); ?>
	<div class="row">

	<section id="sidebar-left">

		<div class="large-2 medium-4 columns">
			<?php get_template_part( 'sidebar', 'left' ); ?>
		</div>	
		
	</section>

	<section id="parte-principal">
		<div class="large-7 medium-8 columns">
			<div data-ng-show="showSidebarMiddleTop">
				<?php dynamic_sidebar( 'Sidebar Middle Top' ); ?>
			</div>
			<div data-ng-view class="reveal-animation"></div>
		</div>
	</section>

	<section id="sidebar-right">
		<div class="large-3 medium-12 columns">
			<ul class="large-block-grid-1 medium-block-grid-2 small-block-grid-1">
				<?php get_template_part( 'sidebar', 'right' ); ?>
			</ul>
		</div>
	</section>

</div>

<?php get_footer(); ?>