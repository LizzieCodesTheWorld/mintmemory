<?php

get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main no-padding">
  <div class="container">

	<section class="expect-content content">

		<?php if( have_rows('content_sections') ): ?>

			<?php while( have_rows('content_sections') ): the_row();

				// vars
				$image = get_sub_field('icon');
				$content = get_sub_field('content');
				?>

				<div class="paragraphs">
					<div class="image-wrapper">
						<img src="<?php echo $image; ?>" alt="" />
					</div>
					<div><?php echo $content; ?></div>
				</div>
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

	</section>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>
