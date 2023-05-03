<?php
/**
 * Template Marketing Section of Affilifate page
 */
$affiliate_img = get_field('card_images');
?>
<section class="affiliate-marketing">
    <div class="decoration-container">
        <div class="background-decoration"></div>
        <div class="background-decoration"></div>
        <div class="background-decoration"></div>
    </div>
    <div class="affiliate-marketing-header">
        <div class="affiliate-marketing-header-circle-small"></div>
        <div class="affiliate-marketing-header-circle-big"></div>
        <div class="affiliate-marketing-left">
            <h2><?php the_field('affiliate_card_section_title'); ?></h2>
            <p><?php the_field('affiliate_card_section_subtitle'); ?></p>
        </div>
        <div class="affiliate-marketing-right">
            <button>
                <?php the_field('affiliate_card_section_button'); ?>
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.7071 8.70711C25.0976 8.31658 25.0976 7.68342 24.7071 7.29289L18.3431 0.928932C17.9526 0.538408 17.3195 0.538408 16.9289 0.928932C16.5384 1.31946 16.5384 1.95262 16.9289 2.34315L22.5858 8L16.9289 13.6569C16.5384 14.0474 16.5384 14.6805 16.9289 15.0711C17.3195 15.4616 17.9526 15.4616 18.3431 15.0711L24.7071 8.70711ZM0 9H24V7H0V9Z" fill="#5A5A5A"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="affiliate-marketing-bottom">
        <?php if (have_rows('affiliate_card')) :
            while (have_rows('affiliate_card')) : the_row();
                ?>
                <div class="affiliate-card">
                    <div class="header">
                    <?php $modellabel = get_sub_field_object('model'); ?>
                        <span><?php echo $modellabel['label']; ?>: <?php the_sub_field('model'); ?></span>
                    </div>
                    <?php
                    if ($affiliate_img) : ?>
                        <img src="<?php echo esc_url( $affiliate_img['card_map']['url'] ); ?>">
                    <?php endif; ?>
                    <h3>
                        <?php the_field('affiliate_card_title'); ?>
                    </h3>
                    <ul>
                    <?php $forblabel = get_sub_field_object('forbidden'); ?>
                        <li><strong><?php echo $forblabel['label']; ?>: </strong><?php the_sub_field('forbidden'); ?></li>
                        <?php $catblabel = get_sub_field_object('category'); ?>
                        <li><strong><?php echo $catblabel['label']; ?>: </strong><?php the_sub_field('category'); ?></li>
                        <li class="age">
                            <div>
                                <span><strong>Age: </strong><?php the_sub_field('age_from'); ?> - <?php the_sub_field('age_to'); ?></span>
                            </div>
                        </li>
                        <li><strong><?php echo get_sub_field_object('position')['label']; ?>: </strong><?php the_sub_field('position'); ?></li>
                        <li>
                        <?php $interlabel = get_sub_field_object('interests'); ?>
                            <strong><?php echo $interlabel['label']; ?>: </strong><?php the_sub_field('interests'); ?>
                        </li>
                        <li>
                        <?php $convlabel = get_sub_field_object('conversion'); ?>
                            <strong><?php echo $convlabel['label']; ?>: </strong><?php the_sub_field('conversion'); ?>
                        </li>
                        <li><strong><?php echo get_sub_field_object('comission_ammount')['label']; ?>: </strong><?php the_sub_field('comission_ammount'); ?></li>
                        <li><strong><?php echo get_sub_field_object('payment_terms')['label']; ?>: </strong><?php the_sub_field('payment_terms'); ?></li>
                    </ul>
                    <button>
                        <?php the_sub_field('button'); ?>
                        <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.7071 8.70711C25.0976 8.31658 25.0976 7.68342 24.7071 7.29289L18.3431 0.928932C17.9526 0.538408 17.3195 0.538408 16.9289 0.928932C16.5384 1.31946 16.5384 1.95262 16.9289 2.34315L22.5858 8L16.9289 13.6569C16.5384 14.0474 16.5384 14.6805 16.9289 15.0711C17.3195 15.4616 17.9526 15.4616 18.3431 15.0711L24.7071 8.70711ZM0 9H24V7H0V9Z" fill="white"/>
                        </svg>
                    </button>
                </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>
</section>