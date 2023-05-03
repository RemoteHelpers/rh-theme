<?php
/**
 * Template Contacts Section of Affilifate page
 */
?>
<section class="contacts-hero">
    <div class="decoration-container">
        <div class="background-decoration"></div>
        <div class="background-decoration"></div>
    </div>
    <div class="contacts-inner">
            <div class="contacts-inner-global">
                <div class="contacts-inner-global-content">
                    <h2><?php the_field('affiliate_learn_more_cuntact_us_tittle'); ?></h2>
                    <div class="contacts-inner-global-social">
                        <?php
                        if (have_rows('soc_media', 'option')):
                            while (have_rows('soc_media', 'option')) : the_row();
                                ?>
                                <a href="<?php the_sub_field('contact_link'); ?>" class="contacts-inner-item">
                                    <div class="contacts-inner-item-icon">
                                        <i class="<?php the_sub_field('icon'); ?>"></i>
                                    </div>
                                    <div class="contacts-inner-item-text">
                                        <span class="contacts-inner-item-name"><?php the_sub_field('contact_name'); ?></span>
                                        <span class="contacts-inner-item-person"><?php the_sub_field('contact_info'); ?></span>
                                    </div>
                                </a>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <h3>There are no contacts</h3>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="contacts-inner-right">
                <div class="form_header">
                    <span>Contact form</span>
                </div>
                <div class="form_container">
                    <div class="form_content">
                        <div class="crm-form"></div>
                    </div>
                </div>
            </div>
        </div>
    <div class="contacts-text">
        <h3>
            <?php the_field('affiliate_contacts_title_after'); ?>
        </h3>
        <p>
            <?php the_field('affiliate_contacts_subtitle_after'); ?>
        </p>
    </div>
</section>