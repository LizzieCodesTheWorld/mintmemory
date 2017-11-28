<?php if(get_field('banner_image')) :?>
    	<div class="hero" style="background-image: url(<?php the_field('banner_image');?>);background-size: cover; background-position: center;">
			<div class="container hero-content">
				<?php if(is_page('about-us') || is_page('our-research')): ?>
					<?php the_content(); ?>
				<?php else : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
