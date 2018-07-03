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
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>

<?php if(is_user_logged_in()) : ?>
  <div class="container logged-in">
<?php else : ?>
  <div class="container">
 <?php endif; ?>

    <h1>
      <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
        <img src="<?php bloginfo('template_url'); ?>/images/MINTLogo_NonWeb_LeftColour.SVG" alt="home" class="logo">
      </a>
    </h1>


<?php if(is_user_logged_in()) : ?>

    <?php
       $user_id = get_current_user_id();
       $type = get_user_meta($user_id, $key = "User Type");
    ?>

    <?php if($type[0] === 'Trainee') : ?>
        <?php wp_nav_menu( array(
          'container'      => false,
          'theme_location' => 'loggedintrainee-menu',
          'link_after'     => '<div class="chevron down"></div>'
        )); ?>
    <?php else : ?>

       <?php wp_nav_menu( array(
          'container'      => false,
          'theme_location' => 'loggedinclinician-menu',
          'link_after'     => '<div class="chevron down"></div>'
        )); ?> 

    <?php endif; ?>

<?php else : ?>

  <?php wp_nav_menu( array(
    'container'      => false,
    'theme_location' => 'loggedout-menu',
    'link_after'     => '<div id="chevron" class="chevron down"></div>'
  )); ?>

<?php endif; ?>

  <div id="hamburger">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>

  </div> <!-- /.container -->
</header><!--/.header-->



