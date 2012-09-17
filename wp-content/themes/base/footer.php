	</div>
	<!-- /body -->
		
	<footer id="footer" class="pagewidth clearfix">
			
		<p class="back-top"><a href="#header">&uarr;</a></p>
	
		<?php // footer navigation ?>
		<?php wp_nav_menu(array('theme_location' => 'footer-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'footer-nav' , 'menu_class' => 'footer-nav')); ?>

		<div class="footer-text clearfix">
			<p>Built while dinking a Maredsous Tripel in <a href="http://goo.gl/maps/A7GAU" target="_blank">Piobesi, Italy</a></p>
			<p>italywith.us &copy; <?php echo date( 'Y' ); ?></p>
		</div>
		<!-- /footer-text --> 

	</footer>
	<!-- /#footer --> 

</div>
<!-- /#pagewrap -->

<!-- wp_footer -->
<?php wp_footer(); ?>

</body>
</html>