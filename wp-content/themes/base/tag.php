<?php get_header(); ?>

	<div id="content" class="clearfix">
				
		<div class="page-title author"><?php
			printf( __( 'Blogs tagged with: %s', 'twentyeleven' ), '<strong>' . single_tag_title( '', false ) . '</strong>' );
		?></div>		
			
	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'includes/loop' , 'index'); ?>

	<?php endwhile; ?>
				
	<?php get_template_part( 'includes/pagination'); ?>		
		
	</div>
	<!-- /#content -->
		
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>