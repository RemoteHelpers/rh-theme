<?php ?>
<div class="contact-form" id="contact">
    <div class="social">
        <h3>We’d Love to Hear from You!</h3>
        <span>Reach out to us with your query or concern</span>
        <ul>
            <?php
            if (have_rows('soc_media', 'option')):
                while (have_rows('soc_media', 'option')) : the_row();
                    ?>
                    <li>
                        <a href="<?php the_sub_field('contact_link'); ?>">
                            <i class="<?php the_sub_field('icon'); ?>"></i>

                            <span class="social-info"><?php the_sub_field('contact_info'); ?></span>
                        </a>
                    </li>
                <?php
                endwhile;
            endif;
            ?>
        </ul>
    </div>
    <div class="form-wrap">
        <div class="crm-form"></div>
    </div>
    <ul class="contact-social-mobile">
        <?php
        if (have_rows('soc_media', 'option')):
            while (have_rows('soc_media', 'option')) : the_row();
                ?>
                <li>
                    <a href="<?php the_sub_field('contact_link'); ?>">
                        <i class="<?php the_sub_field('icon'); ?>"></i>

                        <span class="social-info"><?php the_sub_field('contact_info'); ?></span>
                    </a>
                </li>
            <?php
            endwhile;
        endif;
        ?>
    </ul>
</div>