<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main bottom">
  <div class="container">

	<section class="funding-content">

	  <div class="container">

		<?php if( have_rows('funding_content') ): ?>

			<?php while( have_rows('funding_content') ): the_row(); 

				// vars
				$image = get_sub_field('image');
				$content = get_sub_field('content');
				?>

				<div class="paragraphs">
					<?php echo $content; ?>
					<!-- <?php if($image): ?> -->
						<img src="<?php echo $image; ?>" alt="" />
					<!-- <?php endif; ?> -->
				</div>
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

	</section>

	<!-- <?php the_field('main_content'); ?> -->
	
	<section class="funding-partners">

	  <div class="container">

		<?php if( have_rows('funding_partners') ): ?>

			<ul>

			<?php while( have_rows('funding_partners') ): the_row(); 


				// vars
				$image = get_sub_field('image');
				?>

				<li class="column">
					<img src="<?php echo $image; ?>" alt="" />
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

	</section>


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>