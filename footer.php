<footer>

	<div class="container">
	    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
	        <img src="<?php bloginfo('template_url'); ?>/images/MINTLogo_RightWhite.png" alt="home" class="logo">
      </a>

	  <div>
	  	<p>&copy; <?php echo date('Y'); ?> The Centre for Family Medicine Memory Clinic </p>
	  	<a href="/terms-of-use/">Terms of Use / </a><a href="/privacy-policy-information/">Privacy policy information</a>
	  </div>
	</div> <!-- /.container -->
</footer>

<script>
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>