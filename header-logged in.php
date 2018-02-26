<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<!-- FULL WIDTH LOGGED IN -->
   <nav class="topNav mobileHide">
      <?php if( is_user_logged_in() ): ?> 
      
          <?php wp_nav_menu( array(
                'container' => false,
                'theme_location' => 'loggedin-menu',
                'link_before' => '<div id="chevron" class="chevron down">' , 
                'link_after' => '</div>'
              )); ?>

      <!-- if regular page -->
          <?php if ( is_page_template( 'page.php' ) ): ?>
              <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="loginOut">
                  <img src="<?php the_field('lock_open', 'option'); ?>" alt="">
                  <span>Logout</span>
              </a>

      <!-- if use the tool page-->
          <?php else: ?>
              <a href="<?php echo wp_logout_url( home_url('/use-the-tool/') ); ?>" class="loginOut">
                  <img src="<?php the_field('lock_open', 'option'); ?>" alt="">
                  <span>Logout</span>
              </a>
          <?php endif; ?>



<!-- FULL WIDTH LOGGED OUT -->
      <?php else: ?>
          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'loggedout-menu',
            'link_before' => '<div id="chevron" class="chevron down">' , 
            'link_after' => '</div>'
          )); ?>
          <a href="<?php echo get_page_link(169); ?>" class="loginOut">
              <img src="<?php the_field('lock_closed', 'option'); ?>" alt="">
              <span>Login / Register</span>
          </a> 
      <?php endif; ?> <!-- end of is_user_logged_in -->

    </nav>


<!-- MOBILE LOGGED IN -->
    <nav class="mobileNav mobileShow">
      <div class="topNav mobileTopNav">
        <!-- <i class="fa fa-bars click"><span> Menu</span></i> -->

        <div id="hamburger">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>

        <?php if( is_user_logged_in() ): ?>

            
            <!-- if regular page -->
                <?php if ( is_page_template( 'page.php' ) ): ?>
                    <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="loginOut">
                        <img src="<?php the_field('lock_open', 'option'); ?>" alt="">
                        <span>Logout</span>
                    </a>

             <!-- if assessment page-->
                <?php else: ?>
                    <a href="<?php echo wp_logout_url( home_url('/use-the-tool/') ); ?>" class="loginOut">
                        <img src="<?php the_field('lock_open', 'option'); ?>" alt="">
                        <span>Logout</span>
                    </a>
                <?php endif; ?>


    <!-- MOBILE logged out -->
         <?php else: ?>
               <a href="<?php echo get_page_link(169); ?>" class="loginOut">
                   <img src="<?php the_field('lock_closed', 'option'); ?>" alt="">
                   <span>Login / Register</span>
               </a> 

             <?php endif; ?> <!-- end of is_user_logged_in -->
      </div>


<!-- MOBILE LOGGED OUT -->
      <?php if( is_user_logged_in() ): ?> 
            <div class="mobileMenuItems none"> 
               <?php wp_nav_menu( array(
                     'container' => false,
                     'theme_location' => 'loggedin-menu',
                     'link_before' => '<div id="chevron" class="chevron down">' , 
                     'link_after' => '</div>'
                   )); ?>
            </div>
       <?php else: ?>
            <div class="mobileMenuItems none"> 
               <?php wp_nav_menu( array(
                 'container' => false,
                 'theme_location' => 'loggedout-menu',
                 'link_before' => '<div id="chevron" class="chevron down">' , 
                 'link_after' => '</div>'
               )); ?>
            </div>
       <?php endif; ?> <!-- end of is_user_logged_in -->

     </nav>
