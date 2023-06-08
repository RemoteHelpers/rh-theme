<?php
/**
 * Template Questions Section of Pricing page
 */
?>

<div class="pricing-footer">
    <?php if( have_rows('footer_section', 'option') ): ?>
    <?php while( have_rows('footer_section', 'option') ) : the_row(); ?>
    <h2 class="form_title"><?php the_sub_field('footer_section_title'); ?></h2>
    <p class="form_subtitle"><?php the_sub_field('footer_section_subtitle'); ?></p>

    <div class="pricing-questions-wrapper">
        <div class="form_container_wrapper">
            <div class="form_container">
                <div class="question_container_top question_container_top_mobile">
                    <h3 class="question_container_title">Leave your message</h3>
                </div>
                <div class="form_content">
                    <div class="crm-form"></div>
                </div>
            </div>
        </div>
        <div id="footer_form_faq" class="padding-4r home-contact">
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="container">
                <div class="form_question_container element-hidden">
                    <div class="question_container element-hidden" id="quest_height">
                        <div class="question_container_top">
                            <h3 class="question_container_title"><?php echo get_sub_field('frequently_questions_title', 'option'); ?></h3>
                        </div>
                        <div class="question_container_top question_container_top_mobile">
                            <h3 class="question_container_title">FAQ</h3>
                        </div>
                        <div class="question_container_bottom" id="list_bottom">
                            <ul class="question_container_list"> 
                                <!-- FOOTER FAQ FORM -->
                                <?php if( have_rows('frequently_questions_and_answers', 'option') ): ?>
                                    <?php while( have_rows('frequently_questions_and_answers', 'option') ) : the_row(); ?>
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
        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>