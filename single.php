<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package clean
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container-blog">
            <?php
            while ( have_posts() ) :the_post();?>

                <div class="blog-item-text">
                    <h3><?php the_title(); ?></h3>
                    <?php the_post_thumbnail(); ?>
                    <p><?php the_content(''); ?></p>
                </div>

            <?php
            endwhile;
            ?>

            <?php

            $term = get_queried_object();
            // get category type
            $parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
            $children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
            if (empty($parent->term_id)){
                $parent->term_id = null;
            }
            $maincategory = ($parent->term_id=="") && (sizeof((array)$children)>0); // parent category
            $subcategory = ($parent->term_id!="") && (sizeof($children)==0); //child category

            // vars of parent category
            $hero_title = get_field('hero_title', $term);
            $hero_subtitle = get_field('hero_subtitle', $term);
            $view_a_presentation = get_field('view_a_presentation', $term);
            $view_a_presentation_link = get_field('button_presentation_link', $term);
            $hero_video = get_field('hero_video', $term);
            $tag_title= get_field('heading', $term);
            $tag_subtitle= get_field('description', $term);

            // vars of child category
            $sub_hero_title = get_field('sub_hero_title', $term);
            $sub_hero_subtitle = get_field('sub_hero_subtitle', $term);
            $sub_view_a_presentation = get_field('sub_view_a_presentation', $term);
            $sub_view_a_presentation_link = get_field('sub_button_presentation_link', $term);
            $sub_hero_video = get_field('sub_hero_video', $term);
            $sub_tag_title= get_field('sub_heading', $term);
            $sub_tag_subtitle= get_field('sub_description', $term);
            ?>

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

                                    <!-- FOOTER OF PARENT CATEGORY -->
                                    <?php if($maincategory) : ?>
                                        <?php if( have_rows('frequently_questions_and_answers_cat', $term) ): ?>
                                            <?php  while( have_rows('frequently_questions_and_answers_cat', $term) ) : the_row(); ?>
                                                <li class="faq-list">
                                                    <div class="tournaments-section by_class">
                                                        <div class="cards__single">
                                                            <div class="cards__back">
                                                                <p id="flip-card-btn-turn-to-front" class="pfl-button draw meet back-button"><span id="close_notice">+</span></p>
                                                                <div class="accordion-body">
                                                                    <div class="answer_title">
                                                                        <span class="question_title text"><?php echo get_sub_field('frequently_question', $term); ?></span>
                                                                    </div>
                                                                    <div class="anwer_content">
                                                                        <div class="anwer_desc">
                                                                            <span class="question_answer"><?php echo get_sub_field('frequently_answer', $term); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="cards__front">
                                                                <div class="accordion-header">
                                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                                    <span class="question_title text"><?php echo get_sub_field('frequently_question', $term); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php else: ?>
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
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- FOOTER OF CHILD CATEGORY -->
                                    <?php if($subcategory) : ?>
                                        <?php if( have_rows('sub_frequently_questions_and_answers_cat', $term) ): ?>
                                            <?php  while( have_rows('sub_frequently_questions_and_answers_cat', $term) ) : the_row(); ?>
                                                <li class="faq-list">
                                                    <div class="tournaments-section by_class">
                                                        <div class="cards__single">
                                                            <div class="cards__back">
                                                                <p id="flip-card-btn-turn-to-front" class="pfl-button draw meet back-button"><span id="close_notice">+</span></p>
                                                                <div class="accordion-body">
                                                                    <div class="answer_title">
                                                                        <span class="question_title text"><?php echo get_sub_field('frequently_question', $term); ?></span>
                                                                    </div>
                                                                    <div class="anwer_content">
                                                                        <div class="anwer_desc">
                                                                            <span class="question_answer"><?php echo get_sub_field('frequently_answer', $term); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="cards__front">
                                                                <div class="accordion-header">
                                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                                    <span class="question_title text"><?php echo get_sub_field('frequently_question', $term); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php else: ?>
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
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

	</main><!-- #main -->

<?php
get_footer();
