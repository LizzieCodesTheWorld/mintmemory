<?php get_header(); ?>

<?php get_template_part('hero'); ?>

<div class="main">
  <div class="container">
    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php echo the_post_thumbnail("full"); ?>
          <p><strong>SOURCE: <a href="<?php echo the_field('source_link'); ?>" target="_blank"><?php echo the_field('source'); ?></a></strong></p>
          <hr>
          <?php the_content(); ?>

        </div>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>