<div class="accordion-container">
	 <div class="container">

			<h1><?php the_field( 'accordion_section_title' ); ?></h1>

				<?php if ( have_rows( 'accordion_items' ) ) :
					// Set starting increment var.
					$i = 1;
				?>

					<div class="accordion">
						<?php while ( have_rows( 'accordion_items' ) ) : the_row();

							// Vars.
							$title = get_sub_field( 'title' );
							$content = get_sub_field( 'content' );
						?>

					<div class="accordion-item" id="accordion_<?php echo esc_attr( $i ); ?>">
							<div class="accordion-title border-bottom">
									<h2><?php echo esc_html( $title ); ?></h2>
									<div> <!-- open and close -->
											<i class="fa fa-chevron-down"></i>
											<i class="fa fa-chevron-up none"></i>
									</div>
							</div>
							<div class="accordion-content none" id="accordion-content-<?php echo esc_attr( $i ); ?>">
									<?php the_sub_field( 'content' ); ?>
							</div>
					</div> <!-- /.accordionItem -->

				<?php
					$i++; // Increase increment.
					endwhile;
				?>
			</div> <!-- /.accordion -->
				<?php endif; ?>
		</div>
</div> <!-- ./accordion-container -->
