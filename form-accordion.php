<div class="form-accordion-container">

   <div class="container">

      <h1><?php the_field('form_accordion_title'); ?></h1>
     
        <?php if( have_rows('form_accordion_items') ): ?>
          <div class="accordion">
            <?php while( have_rows('form_accordion_items') ): the_row(); 
     
            // vars
            $title = get_sub_field('form_title');
            $content = get_sub_field('form_content');
     
            ?>
     
          <div class="accordion-item" id="">
              <div class="accordion-title border-bottom">
                  <h2><?php echo $title; ?></h2> 
                  <div> <!-- open and close -->
                    <!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/show-icon.png" alt="Show Icon" class="accordionShow">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hide-icon.png" alt="Hide Icon" class="accordionHide"> -->
                      <i class="fa fa-chevron-down"></i>
                      <i class="fa fa-chevron-up none"></i>
                  </div>
              </div>
              <div class="accordion-content none" id="accordion_content_<?php echo $i; ?>">
                  <?php echo $content; ?>
              </div>

              <?php if( have_rows('form_subtitles') ): ?>
                <div class="sub-accordion accordion none">
                  <?php while( have_rows('form_subtitles') ): the_row();

                  // vars
                  $title = get_sub_field('form_subtitle');
                  $content = get_sub_field('form_subcontent');
                  
                  ?>

                  <div class="accordion-item" id="">
                      <div class="accordion-title border-bottom">
                          <h3><?php echo $title; ?></h3> 
                          <div> <!-- open and close -->
                            <!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/show-icon.png" alt="Show Icon" class="accordionShow">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hide-icon.png" alt="Hide Icon" class="accordionHide"> -->
                              <i class="fa fa-chevron-down"></i>
                              <i class="fa fa-chevron-up none"></i>
                          </div>
                      </div>
                      <div class="accordion-content none" id="accordion_content_<?php echo $i; ?>">
                          <?php echo $content; ?>
                      </div>

                  </div> <!-- /.accordionItem -->
              
                <?php endwhile; ?>
              </div> <!-- /.accordion -->
               <?php endif; ?>


          </div> <!-- /.accordionItem -->
     
        <?php endwhile; ?>
      </div> <!-- /.accordion -->
       <?php endif; ?>
    </div>
</div> <!-- ./accordion-container -->