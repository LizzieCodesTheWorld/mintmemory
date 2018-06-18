<?php get_header();  ?>

<?php if(is_user_logged_in()) : ?>

    <?php get_template_part('hero'); ?>

      <?php 
         $user_id = get_current_user_id();
         
        // GET TYPE AND NAME
         $firstname =  get_user_meta($user_id, $key = "first_name");
         $lastname =  get_user_meta($user_id, $key = "last_name");
         $type = get_user_meta($user_id, $key = "User Type");
 

         // GET EMAIL
         $user_info = get_userdata($user_id);
         $email = $user_info->user_email;

      ?> 

    <div class="main">
        <div class="container narrow">
            <div class="content">
                <section class="account-info">
                        <div class="current-account-details"> 
                          <h2>Current Account details</h2>
                          <p><strong>Name: </strong><?php echo $firstname[0]; ?> <?php echo $lastname[0]; ?></p>
                          <p><strong>User Type: </strong><?php echo $type[0]; ?></p>
                          <p><strong>Email: </strong><?php echo $email; ?></p>
                        </div>
                        <div class="update-account-details">     
                            <?php the_field('update_info_form'); ?>
                        </div>
                        <div class="resources-links">
                        <hr>
                          <h2>Resources for You</h2>
                              <a href="/how-to-refer/">How to Refer</a>
                              <?php if($type[0] == 'Clinician'): ?>
                                <a href="/clinicians/clinician-resources/">Clinician Resources</a>
                              <?php else: ?>
                               <!--  <a href="/clinicians/trainee-resources/">Trainee Resources</a> -->
                                
                                <!-- // WP_Query arguments -->
                                <?php $args = array (
                                  'post_type'       => 'trainee-resource',
                                  'posts_per_page'  => 100,
                                  'order'           => 'ASC'

                                );

                                // The Query
                                $services = new WP_Query( $args );

                                // The Loop
                                if ( $services->have_posts() ) {
                                  while ( $services->have_posts() ) {
                                    $services->the_post(); ?>
                                    <!-- // do something -->
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                  <?php }
                                } else {
                                  // no posts found
                                }

                                // Restore original Post Data
                                wp_reset_postdata();
                                ?>



                              <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div> <!-- /,content -->
        </div>
    </div> <!-- /.main -->

<?php else : ?>

    <div class="main">
        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div> <!-- /,content -->
        </div>
    </div> <!-- /.main -->

<?php endif; ?>

<?php get_footer(); ?>