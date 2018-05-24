<?php $url = home_url() . '/my-account/'; ?>

<?php if( is_user_logged_in() ) :
	wp_safe_redirect( $url, 301 ); exit;
endif; ?>

<?php get_header(); ?>

<div class="main login">
  <div class="container">

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('login') ) ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>
