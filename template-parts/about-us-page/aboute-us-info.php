<?php
/**
 * Template Our Team Section of Aboute Us
 */
?>
<section class="padding-3">
    <h2><?php the_field('about_us_title') ?></h2>
    <p><?php the_field('about_us_subtitle') ?></p>
    <p><?php the_field('about_us_quote') ?></p>
    <h3><?php the_field('save_and_safe_title') ?></h3>
    <p><?php the_field('save_and_safe_subtitle') ?></p>
    <div class="split-two">
        <div class="split-inner-text">
            <h3><?php the_field('save_and_safe_title_remote_helpers') ?></h3>
            <ul>
                <?php
                if (have_rows('save_and_safe_list')) :
                    $counter = 1;
                    while (have_rows('save_and_safe_list')) : the_row(); ?>
                        <li><?php the_sub_field('save_and_safe_list_text') ?> – <strong style="color:<?php the_sub_field('save_and_safe_list_color') ?>">Free</strong></li>
                        <?php $counter++; ?>
                    <?php
                    endwhile;
                endif
                ?>
                <li style="text-decoration: underline"><strong>
                    <?php
                        if (pll_current_language() == 'en') {
                            echo "Here we go!";
                        } else if (pll_current_language() == 'de') {
                            echo "Los geht's!";
                        }
                    ?>
                </strong></li>
            </ul>
        </div>
        <img src="<?php the_field('save_and_safe_picture') ?>" alt="photo">
    </div>
</section>