<div class="hero" style="background: #27b489;">
	<div class="container hero-content">
		<?php if(is_page('about-us') || is_page('our-research')): ?>
			<?php the_content(); ?>
		<?php else : ?>
			<h1><?php the_title(); ?></h1>
			<?php if(get_field('source')) : ?>
				<?php echo get_the_date( 'l F j, Y' ); ?> / <strong><?php the_field('source'); ?></strong>
			<?php endif; ?>
		<?php endif; ?>

	</div>
</div>
