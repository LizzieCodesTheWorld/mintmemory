<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<div class="hero">
	<div class="hero-content">
		<h2><?php the_title(); ?></h2>
	</div>
</div>

<div class="main">
  <div class="container">

	<?php the_content(); ?>

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