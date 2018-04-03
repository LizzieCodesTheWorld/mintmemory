<?php get_header();  ?>

<?php get_template_part('hero'); ?>

<div class="main no-padding">
    <div class="content">
    	<section class="news-items">
    	    <div class="container">

                <!-- LOOP FOR POSTS -->
                    <?php
                      $custom_query = new WP_Query(
                        array(
                          'posts_per_page' => 4,
                          'post_type'      => 'post',
                          )
                      ); ?>

                  <?php if ( $custom_query->have_posts() ) : ?>
                    <?php $firstPosts = array(); ?>
                    <?php while ( $custom_query->have_posts() ) : $custom_query ->the_post(); ?>

                        <?php
                        $firstPosts[] = $post->ID; // add post id to array
                        $date = get_the_date( 'l F j, Y' );
                        $source = get_field('source');
                        $link = get_the_permalink();
                        ?>

                          <a href="<?php echo $link; ?>">
                              <div class="news-item">
                                  <div class="image-wrapper"><?php the_post_thumbnail('full'); ?></div>
                                  <div>
                                      <p><?php echo $date; ?><strong> / <?php echo $source; ?></strong></p>
                                      <h2><?php the_title(); ?></h2>
                                  </div>
                              </div>
                          </a>

                    <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                  <?php else:  ?>
                  <?php endif; ?>

            </div> <!-- /.container -->
        </section> <!-- ./news-items -->
        <section class="more">
            <div class="container">
                <h1>more</h1>

                <?php
                  $custom_query_excludes = new WP_Query(
                    array(
                      'posts_per_page' => 50,
                      'post_type' => 'post',
                      'post__not_in' => $firstPosts,
                      )
                  ); ?>


                <?php if ( $custom_query_excludes->have_posts() ) : ?>
                  <?php while ( $custom_query_excludes->have_posts() ) : $custom_query_excludes ->the_post(); ?>

                      <?php
                        $date = get_the_date( 'l F j, Y' );
                        $source = get_field('source');
                        $link = get_the_permalink();
                        $souce_link = get_field('source_link');
                      ?>

                        <a href="<?php echo $link; ?>">
                            <div class="news-item">
                                <div><?php the_post_thumbnail('full');; ?>
                                </div>
                                <div>
                                    <p><?php echo $date; ?> <strong>/ <?php echo $source; ?></strong></p>
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </a>

                  <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else:  ?>
                <?php endif; ?>
            </div> <!-- /.container -->
        </section>
    </div> <!-- /,content -->
</div> <!-- /.main -->

<?php get_footer(); ?>
