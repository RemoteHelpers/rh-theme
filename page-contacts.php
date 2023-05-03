<?php
/**
 * The template for displaying contacts page
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="contacts-page">
                <div class="background-decoration"></div>
                <div class="background-decoration"></div>
                <div class="background-decoration"></div>
                <div class="background-decoration"></div>
                <div class="background-decoration"></div>
                <section class="contacts-hero">
                    <div class="contacts-inner">
                        <div class="contacts-inner-left">
                            <h1>We'd Love to hear From You</h1>
                        </div>
                        <div class="contacts-inner-global">
                            <div class="contacts-inner-global-content">
                                <h2><?php the_field('global_contacts'); ?></h2>
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
                            <div class="form_container">
                                <div class="form_content">
                                    <div class="crm-form"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="contact-about">
                    <div class="container">
                        <div class="contact-about-left">
                            <div class="contact-about-left-social">
                                <h3>Follow us:</h3>
                                <div class="contact-about-left-social-container">
                                    <?php
                                    if (have_rows('fixed_social', 'option')) :
                                        while (have_rows('fixed_social', 'option')) : the_row();
                                            ?>
                                            <a href="<?php the_sub_field('social_fixed_link'); ?>" class="contact-about-left-social-item">
                                                <i class="<?php the_sub_field('social_fixed_icon'); ?>"></i>
                                            </a>
                                        <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </main>
    </div>

<?php get_footer();