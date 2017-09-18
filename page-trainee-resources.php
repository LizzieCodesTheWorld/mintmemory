<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<!-- <?php 
   $user_id = get_current_user_id();
   $key = 'User Type';
   $type = get_user_meta(get_current_user_id(), $key); 
?> -->
      <div class="main">
          <div class="content">

    <?php if(is_user_logged_in() && $type = 'Trainee') : ?>
      
            <section class="alternating-content">
                <div class="container">

                    <?php if( have_rows('research_sections') ): ?>

                    <?php while( have_rows('research_sections') ): the_row(); 

                        // vars
                        $image = get_sub_field('image');
                        $content = get_sub_field('content');

                        ?>

                        <div class="content-section">

                            <img src="<?php echo $image; ?>" alt="" />
                            <h2><?php echo $title; ?></h2>
                            <?php echo $content; ?>

                        </div>

                      <?php endwhile; // end the loop?>

                      <?php endif; ?>
                      
                  </div> <!-- /.container -->
                      <?php get_template_part('content-accordion'); ?>

              </section> <!-- ./alternating-content -->
      
    <?php else : ?>
      
        <div class="container">

            <h1>You do not have access to these resources - please register and login</h1>
              
        </div> <!-- /.container -->

    <?php endif; ?> 

          </div> <!-- /,content -->
      </div> <!-- /.main -->


<?php get_footer(); ?>