<?php
/**
 * The template for displaying All Cases Archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

get_header();
?>

<section id="portfolio_cases">

    <h1 class="portfolio_cat_title">All Cases</h1>

<div class="custom_category"> 
<?php   
$custom_terms = get_terms('case_category');
foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'cases',
        'tax_query' => array(
            array(
                'taxonomy' => 'case_category',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<a href="'.get_term_link($custom_term).'"><h3 class="cat_sub">'.$custom_term->name.'</h3></a>';
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
?>
</div>  

<h1 class="portfolio_cat_title">Portfolio Cases Tags</h1>

<div class="custom_tag"> 
<?php   
$custom_tags = get_terms('case_tag');
foreach($custom_tags as $custom_tag) {
    wp_reset_query();
    $args = array('post_type' => 'cases',
        'tax_query' => array(
            array(
                'taxonomy' => 'case_tag',
                'field' => 'slug',
                'terms' => $custom_tag->slug,
            ),
        ),
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<a href="'.get_term_link($custom_tag).'"><h3 class="cat_sub">'.$custom_tag->name.'</h3></a>';
        echo '<div class="portfolio_list">';
        while($loop->have_posts()) : $loop->the_post();
        echo '<div class="portfolio_item">';
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
            echo '<a href="'.get_permalink().'"><div class="portfolio_img"><img class="lozad" data-src="' .get_the_post_thumbnail_url(). '"/></div></a>';
        echo '</div>';
        endwhile;
        echo '</div>';
     }
}
?>
</div> 

<h1 class="portfolio_cat_title">List Cat</h1>
<div class="custom_list"> 
<?php   
$custom_lists = get_terms('case_category');
foreach($custom_lists as $custom_list) {
    wp_reset_query();
    $args = array('post_type' => 'cases',
        'tax_query' => array(
            array(
                'taxonomy' => 'case_category',
                'field' => 'slug',
                'terms' => $custom_list->slug,
            ),
        ),
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<a href="'.get_term_link($custom_list).'"><h4 class="cat_list">'.$custom_list->name.'</h4></a>';
     }
}
?>
</div> 

<h1 class="portfolio_cat_title">List Tag</h1>
<div class="custom_list"> 
<?php   
$custom_litags = get_terms('case_tag');
foreach($custom_litags as $custom_litag) {
    wp_reset_query();
    $args = array('post_type' => 'cases',
        'tax_query' => array(
            array(
                'taxonomy' => 'case_tag',
                'field' => 'slug',
                'terms' => $custom_litag->slug,
            ),
        ),
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<a href="'.get_term_link($custom_litag).'"><h4 class="cat_list">'.$custom_litag->name.'</h4></a>';
     }
}
?>
</div> 


</section>

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
?>