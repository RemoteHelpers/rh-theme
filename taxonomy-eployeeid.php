<?php
/**
 * The template for displaying All Cases Of Current Employee
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

get_header();
?>


    <main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

			<div class="current_tax">
			<a class="this_tag" href="https://www.rhelpers.com/cases"><p class="cat_name">Cases</p></a>
                    <?php 

                        $custom_terms = get_the_terms( $post->ID, 'case_category' );
                            foreach($custom_terms as $custom_term) {
                            echo '<a class="this_tag" href="'.get_term_link($custom_term).'"><p class="cat_name">'.$custom_term->name.'</p></a>';
                        }

                        $custom_tags = get_the_terms( $post->ID, 'case_tag' );
                            foreach($custom_tags as $custom_tag) {
                            echo '<a class="this_tag" href="'.get_term_link($custom_tag).'"><p>'.$custom_tag->name.'</p></a>';
                        }

						?>
						</div>
				<?php

					$custom_ids = get_the_terms( $post->ID, 'eployeeid' );
						foreach($custom_ids as $custom_id) {

						$sku = $custom_id->name;
						$product_id = wc_get_product_id_by_sku( $sku );  
						$product_inf = wc_get_product( $product_id );
						$name = $product_inf->get_title();

						// echo '<h1 class="page-title">Employee: '.$name.'</h1>';

						
							echo '<a class="this_tag" href="'.get_term_link($custom_tag).'"><h1 class="page-title">Back to '.$custom_tag->name.'</h1></a>';
							

				}
				the_archive_description( '<div class="archive-description">', '</div>' );

				echo '<h3 class="cat_sub">'.$name.'</h3>'
				?>
			</header><!-- .page-header -->
	
			<?php
			/* Start the Loop */
			// while ( have_posts() ) :
				

                    
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );

				$custom_ters = get_the_terms( $post->ID, 'eployeeid' );
					foreach($custom_ters as $custom_ter) {
    				wp_reset_query();
    				$args = array('post_type' => 'cases',
        				'tax_query' => array(
            				array(
                				'taxonomy' => 'eployeeid',
                				'field' => 'slug',
                				'terms' => $custom_ter->slug,
            				),
        				),
     				);
     			$loop = new WP_Query($args);
     				if($loop->have_posts()) {
        				echo '<div class="portfolio_list">';
        					while($loop->have_posts()) : $loop->the_post();
        				echo '<div class="portfolio_item">';
            			echo '<a class="case_name" href="'.get_permalink().'">'.get_the_title().'</a>';
            				$custom_tags = get_the_terms( $post->ID, 'case_tag' );
							foreach($custom_tags as $custom_tag) {
						echo '<p class="cat_tag_name">'.$custom_tag->name.'*</p>';
						}
            			echo '<a href="'.get_permalink().'"><div class="portfolio_img"><img class="lozad" data-src="' .get_the_post_thumbnail_url(). '"/></div></a>';
        				echo '</div>';
        					endwhile;
        				echo '</div>';
     				}
				}





			// endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<section id="footer_form_faq" class="padding-4r home-contact">
        <div class="background-decoration element-hidden"></div>
        <div class="background-decoration element-hidden"></div>
        <div class="background-decoration element-hidden"></div>
        <div class="background-decoration element-hidden"></div>
        <div class="background-decoration element-hidden"></div>
        <div class="container">
            <?php if( have_rows('footer_section', 'option') ): ?>
            <?php  while( have_rows('footer_section', 'option') ) : the_row(); ?>
            <h2 class="form_title element-hidden"><?php echo get_sub_field('footer_section_title', 'option'); ?></h2>

            <p class="form_subtitle element-hidden"><?php echo get_sub_field('footer_section_subtitle', 'option'); ?></p>

            <div class="form_question_container element-hidden">
                <div class="form_container">
                    <div class="form_header">
                        <span>Leave your message</span>
                    </div>
                    <div class="form_content">
                        <div class="crm-form"></div>
                    </div>
                </div>
                <div class="question_container element-hidden" id="quest_height">
                    <div class="question_container_top">
                        <h3 class="question_container_title"><?php echo get_sub_field('frequently_questions_title', 'option'); ?></h3>
                    </div>
                    <div class="question_container_bottom" id="list_bottom">
                                <ul class="question_container_list">
                                <?php if( have_rows('frequently_questions_and_answers', 'option') ): ?>
                                    <?php  while( have_rows('frequently_questions_and_answers', 'option') ) : the_row(); ?>
                                        <li class="faq-list">
                                        <div class="tournaments-section by_class">
                                               <div class="cards__single">
                                                       <div class="cards__back">
                                                        <p id="flip-card-btn-turn-to-front" class="pfl-button draw meet back-button"><span id="close_notice">+</span></p>
                                                            <div class="accordion-body">
                                                                <div class="answer_title">
                                                                <span class="question_title text"><?php echo get_sub_field('frequently_question', 'option'); ?></span>
                                                                </div>
                                                                <div class="anwer_content">
                                                                <div class="anwer_desc">
                                                                <span class="question_answer"><?php echo get_sub_field('frequently_answer', 'option'); ?></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cards__front">
                                                            <div class="accordion-header">
                                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                                <span class="question_title text"><?php echo get_sub_field('frequently_question', 'option'); ?></span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                            <?php endif; ?>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                </ul>
                                </div>    
                            </div>
                        </div>
            </div>
        </section>
<?php

get_footer();