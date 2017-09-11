<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <script src="https://use.fontawesome.com/7a056a494e.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="container">
    <h1>
      <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
        <img src="<?php bloginfo('template_url'); ?>/images/MINTLogo_RightColour.png" alt="home" class="logo">
      </a>
    </h1>

 <!--    <?php 
      $userId = get_current_user_id();
      $userType = get_the_author_meta('user_type', $user->ID); 
      print_r($usertype)

    ?>
 -->

    <?php if(is_user_logged_in()) : ?>
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'loggedin-menu'
        )); ?> 
    <?php else : ?>
      <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'loggedout-menu'
      )); ?>
    <?php endif; ?> 


    <?php if(is_user_logged_in()) : ?>
       <a href=" <?php echo wp_logout_url( '/login/' ); ?> " class="login-button">logout <i class="fa fa-key"></i> </a>
    <?php else : ?>
      <a href="/login/" class="login-button">login <i class="fa fa-key"></i> </a>
    <?php endif; ?>

  </div> <!-- /.container -->
</header><!--/.header-->
