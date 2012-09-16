<?php get_header(); ?>

	<div id="content" class="clearfix">

			<div class="page-title author">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<strong>' . get_the_date() . '</strong>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<strong>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</strong>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<strong>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</strong>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
				<?php endif; ?>
			</div>

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'includes/loop' , 'index'); ?>

		<?php endwhile; ?>
						
		<?php get_template_part( 'includes/pagination'); ?>		
		
	</div>
	<!-- /#content -->
		
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>