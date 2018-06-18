<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<?php 
   $message = get_field('message_when_not_logged_in', false, false);
?>

<div class="main no-padding">

    <div class="container">

        <h2><?php echo $message; ?></h2>
          
    </div> <!-- /.container -->

</div>

<?php get_footer(); ?>