<?php get_header();  ?>

<?php if(is_user_logged_in()) : ?>

    <?php get_template_part('hero'); ?>

      <?php 
         $user_id = get_current_user_id();
         
        // GET TYPE AND NAME
         $nickname =  get_user_meta(get_current_user_id(), $key = "nickname");
         $type = get_user_meta(get_current_user_id(), $key = 'User Type');
 

         // GET EMAIL
         $user_info = get_userdata($user_id);
         $email = $user_info->user_email;
      ?> 

    <div class="main">
        <div class="container narrow">
            <div class="content">
                <section class="account-info">
                    <div class="current-account-details"> 
                        <h2><?php echo $nickname[0]; ?></h2>
                        <p><?php echo $type[0]; ?></p>
                        <h3>Email <br><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h3>
                    </div>
                    <div class="update-account-details">    
                        <h2>Update your account details here:</h2>  
                        <?php the_field('update_info_form'); ?>
                    </div>
                </section>
                <hr>
                <section class="resources-links">
                    <?php the_field('resources_links'); ?>
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