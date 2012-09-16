<?php get_header(); ?>

	<div id="content" class="clearfix">

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
		
			<div class="page-title author"><?php printf( __( 'Blogs written by: %s', 'twentyeleven' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></div>
		
		<?php
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
		?>		
	
						
			<?php while (have_posts()) : the_post(); ?>
	
				<?php get_template_part( 'includes/loop' , 'index'); ?>
	
			<?php endwhile; ?>
							
			<?php get_template_part( 'includes/pagination'); ?>
		
		
	</div>
	<!-- /#content -->
		
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>