<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main">
    <div class="content">
        <section class="top">
    	    <div class="container">
                <div class="top-content-section">
                    <?php
                    $image = get_field('top_section_image');
                    $content = get_field('top_section_content');
                    ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $image; ?>" alt="" />
                    </div>
                    <?php echo $content; ?>
                </div>
            </div>
        </section>
        <section class="text-section">
            <div class="container">
                 <?php
                    $content = get_field('text_content');
                    ?>
                    <?php echo $content; ?>
            </div>
        </section>
        <section class="image-section">
            <div class="container">
                 <?php
                    $image = get_field('full_width_image');
                    $content = get_field('image_section_content');
                    ?>
                    <img src="<?php echo $image; ?>" alt="" />
                    <?php echo $content; ?>
            </div>
        </section>

    </div> <!-- /,content -->
</div> <!-- /.main -->

<?php get_footer(); ?>
