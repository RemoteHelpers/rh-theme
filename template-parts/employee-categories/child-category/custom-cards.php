<?php
/**
 * Template for Custom of Child Category
 */
$term = get_queried_object();
?>
<p class="custom_cards"></p>
<?php

if( have_rows('custom_cards_section', $term ) ):
    while ( have_rows('custom_cards_section', $term ) ) : the_row();
        if( get_row_layout() == 'custom_card' ):
            
?>
    <section id="other_cats" class="custom_cards">
            <h2 class="pricing-cards__title"><?php echo get_sub_field('custom_cards_section_title', $term ); ?></h2>
                <div class="sub_category_block_wrap">

                <?php if( have_rows('custom_cards_list', $term) ):  ?>
                        <?php  while( have_rows('custom_cards_list', $term) ) : the_row(); ?>
                            <?php
                                if(get_sub_field('card_link', $term )){
                                    ?>
                                        <a href="<?php echo get_sub_field('card_link', $term );?>">
                                    <?php
                                }
                            ?>
                                    <div class="sub_category_block">
                                        <div class="sub_category_top">
                                            <div class="sub_category_image">
                                                <img class="lozad" data-src="<?php echo get_sub_field('card_image', $term );?>"/>
                                            </div>
                                            <div class="sub_category_title">
                                                <?php echo get_sub_field('card_title', $term );?>
                                            </div>
                                        </div> 
                                        <?php
                                            if(get_sub_field('card_description', $term )){
                                                ?>
                                                <div class="sub_category_description">
                                                    <p class="cat-desc"><?php echo get_sub_field('card_description', $term );?></p>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                        <?php
                                            if(get_sub_field('card_link', $term )){
                                                ?>
                                                <span class="svg-link" href="<?php echo get_sub_field('card_link', $term );?>"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16.0254" cy="16" r="16" fill="#4E6AFF"/>
                                                        <path d="M26.8985 15.4677C24.9214 11.6101 21.0072 9 16.5254 9C12.0436 9 8.12829 11.6119 6.15225 15.4681C6.06884 15.6331 6.02539 15.8153 6.02539 16.0002C6.02539 16.1851 6.06884 16.3673 6.15225 16.5323C8.12939 20.39 12.0436 23 16.5254 23C21.0072 23 24.9225 20.3881 26.8985 16.5319C26.9819 16.367 27.0254 16.1847 27.0254 15.9998C27.0254 15.815 26.9819 15.6327 26.8985 15.4677ZM16.5254 21.25C15.487 21.25 14.472 20.9421 13.6086 20.3652C12.7453 19.7884 12.0724 18.9684 11.675 18.0091C11.2777 17.0498 11.1737 15.9942 11.3763 14.9758C11.5788 13.9574 12.0788 13.0219 12.8131 12.2877C13.5473 11.5535 14.4828 11.0535 15.5012 10.8509C16.5196 10.6483 17.5752 10.7523 18.5345 11.1496C19.4938 11.547 20.3137 12.2199 20.8906 13.0833C21.4675 13.9466 21.7754 14.9617 21.7754 16C21.7757 16.6895 21.6402 17.3724 21.3764 18.0095C21.1127 18.6466 20.726 19.2255 20.2385 19.7131C19.7509 20.2007 19.172 20.5874 18.5349 20.8511C17.8978 21.1148 17.2149 21.2504 16.5254 21.25ZM16.5254 12.5C16.213 12.5044 15.9026 12.5509 15.6026 12.6382C15.8499 12.9742 15.9686 13.3877 15.9371 13.8037C15.9056 14.2198 15.7261 14.6107 15.4311 14.9057C15.1361 15.2007 14.7451 15.3802 14.3291 15.4117C13.9131 15.4432 13.4996 15.3245 13.1636 15.0773C12.9722 15.7822 13.0068 16.5294 13.2623 17.2137C13.5179 17.898 13.9816 18.4849 14.5882 18.8919C15.1948 19.2988 15.9138 19.5053 16.6439 19.4822C17.374 19.4592 18.0784 19.2077 18.6582 18.7633C19.2379 18.3189 19.6636 17.7039 19.8755 17.0048C20.0874 16.3057 20.0747 15.5578 19.8392 14.8664C19.6037 14.1749 19.1574 13.5747 18.5629 13.1502C17.9685 12.7257 17.2559 12.4983 16.5254 12.5Z" fill="white"/>
                                                    </svg>
                                                </span>
                                            <?php
                                            }
                                        ?>

                                    </div>

                                    <?php
                                        if(get_sub_field('card_link', $term )){
                                            ?>
                                                </a>
                                            <?php }; ?>
                        <?php endwhile; ?>
                <?php endif; ?>

                </div>
    </section>


     <?php endif; ?>
     <?php endwhile; ?>
     <?php endif; ?>