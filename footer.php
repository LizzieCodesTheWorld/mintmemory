<footer>
<!-- 	<pre>
		<!-- <?php
	        $user_id = get_current_user_id();
	        $key = 'user_type';
	        $all_meta_for_user = get_user_meta( $user_id);
	        print_r( $all_meta_for_user );
	  	?>
 -->
	<!--   	<?php 
	  	  $user_id = get_current_user_id();
	  	  $key = 'user_type';
	  	  $single = true;
	  	  $user_type = get_user_meta( $user_id, $key, $single ); 
	  	  echo '<p>The '. $key . ' value for user id ' . $user_id . ' is: ' . $user_type . '</p>'; 
	  	?> 


	  </pre> -->
	<div class="container">
	    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
	        <img src="<?php bloginfo('template_url'); ?>/images/MINTLogo_RightWhite.png" alt="home" class="logo">
      </a>

	  <div>
	  	<p>&copy; <?php echo date('Y'); ?> The Centre for Family Medicine Memory Clinic </p>
	  	<a href="/privacy-policy-information/">Terms of Use / Privacy policy information</a>
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