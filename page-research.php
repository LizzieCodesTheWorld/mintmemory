<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main">
    <div class="content">
    	<section class="alternating-content">
    	    <div class="container">

        	    <?php if( have_rows('research_sections') ): ?>

        		<?php while( have_rows('research_sections') ): the_row(); 

        			// vars
        			$image = get_sub_field('image');
        			$content = get_sub_field('content');

        			?>

        			<div class="content-section">

        				<img src="<?php echo $image; ?>" alt="" />
        				<h2><?php echo $title; ?></h2>
        			    <?php echo $content; ?>

        			</div>

                <?php endwhile; // end the loop?>

                <?php endif; ?>
                
            </div> <!-- /.container -->
                <?php get_template_part('content-accordion'); ?>

        </section> <!-- ./alternating-content -->
    </div> <!-- /,content -->
</div> <!-- /.main -->

<?php get_footer(); ?>