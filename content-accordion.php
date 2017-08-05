<div class="accordion-container">

   <div class="container">

      <h1><?php the_field('accordion_section_title'); ?></h1>
     
        <?php if( have_rows('accordion_items') ): ?>
          <div class="accordion">
            <?php while( have_rows('accordion_items') ): the_row(); 
     
            // vars
            $title = get_sub_field('title');
            $content = get_sub_field('content');
     
            ?>
     
          <div class="accordion-item" id="">
              <div class="accordion-title border-bottom">
                  <h2><?php echo $title; ?></h2> 
                  <div> <!-- open and close -->
                    <!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/show-icon.png" alt="Show Icon" class="accordionShow">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hide-icon.png" alt="Hide Icon" class="accordionHide"> -->
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus none"></i>
                  </div>
              </div>
              <div class="accordion-content none" id="accordion_content_<?php echo $i; ?>">
                  <?php the_sub_field('content'); ?>
              </div>
          </div> <!-- /.accordionItem -->
     
        <?php endwhile; ?>
      </div> <!-- /.accordion -->
       <?php endif; ?>
    </div>
</div> <!-- ./accordion-container -->