<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main">
	<div class="content">
	  <div class="container">

	      <?php // Start the loop ?>
	      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


	        <?php if(is_page('resources-for-patients-and-caregivers')) : ?>

	        	<?php if( have_rows('resources') ): ?>

	        		<ul class="resources">

						<div class="resources-feat-img"><?php the_post_thumbnail('medium_large'); ?></div>

	        		<?php while( have_rows('resources') ): the_row();

	        			// vars
	        			$source = get_sub_field('source');
	        			$link_text = get_sub_field('link_text');
	        			$link = get_sub_field('link');
	        			$description = get_sub_field('description');
	        			?>

	        			<li class="resource">

	        				<p><?php echo $source; ?></p>

	        				<?php if( $link ): ?>
	        					<a href="<?php echo $link; ?>">
	        				<?php endif; ?>

	        					<?php echo $link_text; ?>

	        				<?php if( $link ): ?>
	        					</a>
	        				<?php endif; ?>

	        			   <p><?php echo $description; ?></p>

	        			</li>

	        		<?php endwhile; ?>

	        		</ul>

	        	<?php endif; ?>

			<?php elseif(is_page('how-to-refer')) : ?>

				<div class="referral-content">
					<div class="resources-feat-img alignright"><?php the_post_thumbnail(''); ?></div>
					<div><?php the_content(); ?></div>
				</div>

	        <?php else: ?>

	        	<?php the_content(); ?>

	    	<?php endif; ?>

	      <?php endwhile; // end the loop?>

      </div> <!-- /.container -->
  	</div> <!-- /,content -->
</div> <!-- /.main -->

<?php get_footer(); ?>
