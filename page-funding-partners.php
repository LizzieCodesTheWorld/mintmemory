<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main bottom">
  <div class="container">

	<section class="funding-content">

		<?php if( have_rows('funding_content') ): ?>

			<?php while( have_rows('funding_content') ): the_row();

				// vars
				$image = get_sub_field('image');
				$content = get_sub_field('content');
				?>

				<div class="paragraphs">
					<?php echo $content; ?>

					<div class="image-wrapper">
						<img src="<?php echo $image; ?>" alt="" />
					</div>

				</div>
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

	</section>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>
