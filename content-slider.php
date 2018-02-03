<?php
/**
 * Template part for bx slider - Clinician resources page
 */
?>


<?php if( have_rows('slider') ): ?>

  <ul class="bxslider">

  <?php while( have_rows('slider') ): the_row(); 

    // vars
    $image = get_sub_field('image');
    $video = get_sub_field('video');
    $next_link = get_sub_field('video_title');

    ?>

  <?php if($image) : ?>
    <li class="slide" style="background: url('<?php echo $image['url']; ?>'); background-size:cover; background-position:center;" alt="<?php echo $image['alt'] ?>">
  <?php else: ?>
    <li>
  <?php endif; ?>

    <?php if( $video ): ?>
        <?php echo $video; ?>
    <?php endif; ?>

    </li>

    <?php if( $next_link ): ?>
        <?php echo $next_link; ?>
    <?php endif; ?>

  <?php endwhile; ?>

</ul>

<?php endif; ?>