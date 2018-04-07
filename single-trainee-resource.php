<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<?php 
   $user_id = get_current_user_id();
   $key = 'User Type';
   $type = get_user_meta($user_id, $key); 
   $logged_in = is_user_logged_in();
?>
  <div class="main no-padding trainee-resources">

    <?php if($logged_in) : ?>
      <div class="container">
        <?php the_content(); ?>
      </div>
      <div class="resource-navigation container">
        <?php previous_post_link(); ?> 
        <?php if(get_previous_post() && get_next_post()) : ?>
          | 
        <?php endif; ?>
        <?php next_post_link(); ?>
      </div>
      <hr>
      <div class="disclaimer">
        <div class="container">
          <?php the_field('disclaimer'); ?>
        </div>
      </div>

      <?php get_template_part('content-accordion'); ?>

    <?php else : ?>
      
        <div class="container">

            <h2>Sorry you do not have access to these resources - please contact us for information on how to update your account. </h2>
              
        </div> <!-- /.container -->

    <?php endif; ?> 

</div> <!-- /.main -->


<?php get_footer(); ?>