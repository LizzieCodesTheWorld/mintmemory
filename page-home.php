<?php get_header();  ?>

<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="home-hero" style="background-image: url(<?php the_field('hero_image');?>);background-size: cover; background-position: center;">
	<div class="hero-content">
		<h2><?php the_field('title'); ?></h2>
		<h3><?php the_field('sub_title'); ?></h3>
		<a href="<?php the_field('hero_button_url'); ?>" class="button-white"><?php the_field('hero_button_text'); ?></a>
	</div>
</div>

<div class="main">

<?php 

$currentUser = get_current_user_id(); 
$all_meta_for_user = get_user_meta( $currentUser );
print_r( $all_meta_for_user );
?>



    <div class="content">

    	<section class="four-columns">

    	  <div class="container">

    	<?php if( have_rows('four_column_content') ): ?>

    		<ul>

    		<?php while( have_rows('four_column_content') ): the_row(); 

    			// vars
    			$image = get_sub_field('image');
    			$title = get_sub_field('title');
    			$content = get_sub_field('content');
    			// $link = get_sub_field('link');

    			?>

    			<li class="column">

    				<img src="<?php echo $image; ?>" alt="" />
    				<h2><?php echo $title; ?></h2>
    			    <?php echo $content; ?>

    			</li>

    		<?php endwhile; ?>

    		</ul>

    	<?php endif; ?>


    		<div>
    			<img src="<?php the_field('column_image'); ?>" alt="">
    			<h4><?php the_field('column_title'); ?></h4>
    			<p><?php the_field('column_content'); ?></p>
    		</div>
    		</div>
    	</section>

    	<section class="grey three-columns">
    	  <div class="container">
    		<div>
    			<img src="<?php the_field('patients_image'); ?>" alt="">
    			<div>
                    <h4><?php the_field('patients_title'); ?></h4>
                    <p><?php the_field('patients_content'); ?></p>
                </div>
    		</div>
    		<div>
    			<img src="<?php the_field('clinicians_image'); ?>" alt="">
    			<div>
                    <h4><?php the_field('clinicians_title'); ?></h4>
                    <p><?php the_field('clinicians_content'); ?></p>
                </div>
    		</div>
    		<div>
    			<img src="<?php the_field('find_image'); ?>" alt="">
    			<div>
                    <h4><?php the_field('find_title'); ?></h4>
                    <p><?php the_field('find_content'); ?></p>
                </div>
    		</div>
    	  </div>
    	</section>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>