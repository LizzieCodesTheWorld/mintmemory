<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    	<div class="hero" style="background-image: url(<?php the_field('banner_image');?>);background-size: cover; background-position: center;">
			<div class="container hero-content">
				<?php if(!is_page('about-us')): ?>
					<?php the_title(); ?>
				<?php endif; ?>
				<?php the_content(); ?>
			</div>
		</div>

<?php endwhile; // end the loop?>