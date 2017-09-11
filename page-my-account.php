<?php get_header();  ?>

<?php if(is_user_logged_in()) : ?>

    <?php get_template_part('hero'); ?>

    <div class="main">
        <div class="container">
            <div class="content">
                <?php the_field('update_info_form'); ?>
                <hr>
                <?php the_field('resources_links'); ?>
            </div> <!-- /,content -->
        </div>
    </div> <!-- /.main -->

<?php else : ?>

    <div class="main">
        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div> <!-- /,content -->
        </div>
    </div> <!-- /.main -->

<?php endif; ?>

<?php get_footer(); ?>