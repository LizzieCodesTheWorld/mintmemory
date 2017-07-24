<footer>
	<div class="container">
	  <h1>
	    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
	      <?php bloginfo( 'name' ); ?>
	    </a>
	  </h1>

	  <div>
	  	<p>&copy; 2017 The Centre for Family Medicine Memory Clinic <?php echo date('Y'); ?></p>
	  	<a href="/privacy-policy-information/">privacy policy information</a>
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