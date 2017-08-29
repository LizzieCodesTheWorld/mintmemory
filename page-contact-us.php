<?php get_header();  ?>

<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="hero" style="background-image: url(<?php the_field('banner_image');?>);background-size: cover; background-position: center;">
	<div class="hero-content">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="main">

    <div class="content">

    	<section class="contact-info">

    	    <div class="container">

    		  <?php 

    			// contact details
                $address = get_field('address'); 
                $email = get_field('email_address'); 
                $phone = get_field('phone'); 
                $map = get_field('google_map'); 

                //inquiries section
    			$title = get_field('inquiries_section_title');
                $description = get_field('inquiries_section_description');
                $contact = get_field('contact_form'); 
    			?>

    			<div class="contact-details">
                    <h2>Mail</h2>
    				<?php echo $address; ?>
                    <h2 class="email">E-mail</h2>
    			    <p><?php echo $email; ?></p>
                    <h2>Phone</h2>
                    <p><?php echo $phone; ?></p>
    			</div>

        		<div class="map">
        			<?php echo $map; ?>
        		</div>

    		</div>
    	</section>

    	<section class="inquiries">
    	  <div class="container">
            <h1><?php echo $title; ?></h1>
            <h2><?php echo $description; ?></h2>
    		<?php echo $contact; ?>
    	  </div>
    	</section>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>