<?php get_header();  ?>

<?php get_template_part('hero'); ?>


<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="main no-padding">

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
    		<?php echo $contact; ?>
    	  </div>
    	</section>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>