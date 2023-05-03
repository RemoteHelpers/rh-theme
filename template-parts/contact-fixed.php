<?php
if (have_rows('fixed_social', 'option')) :
    while (have_rows('fixed_social', 'option')) : the_row(); ?>
        <a href="<?php the_sub_field('social_fixed_link') ?>" target="_blank" class="social__item"><i class="<?php the_sub_field('social_fixed_icon') ?>"></i></a>
    <?php
    endwhile;
endif; ?>


