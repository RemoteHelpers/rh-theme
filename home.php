<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

get_header();
?>

    <main id="primary" class="site-main">

        <div class="container-blog">
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="background-decoration-circle"></div>
            <div class="blog-top">
                <h1>BLOG & NEWS</h1>
            </div>
            <div class="blog-bottom">
                <section class="blog-news">
                    <!--                <div class="blog-suptitle">-->
                    <!--                    <span>Company Blog</span>-->
                    <!--                </div>-->
                    <h2 class="blog-title">Trending</h2>
                    <div class="blog-content blog-sticky">
                        <?php
                        $params = array(
                            'posts_per_page' => 3,
                            'post__in'  => get_option( 'sticky_posts' ),
                        );

                        $q = new WP_Query( $params );

                        while( $q->have_posts() ) : $q->the_post();
                            ?>

                            <div class="blog-item">
                                <div class="blog-item-text">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                    <p><?php the_content(''); ?></p>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="more-link rh-button">Read more</a>
                                <?php if ( get_the_post_thumbnail()) {?>
                                    <a href="<?php the_permalink(); ?>" class="blog-item-link">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                <?php } ?>
                            </div>

                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                </section>
                <section class="blog-news">
                    <!--                <div class="blog-suptitle">-->
                    <!--                    <span>On Trend</span>-->
                    <!--                </div>-->
                    <h2 class="blog-title">Latest posts</h2>
                    <div class="blog-content">
                        <?php
                        if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;
                        ?>
                    </div>
                    <?php
                    the_posts_navigation(array(
                        'prev_text'          => '&#8592; Older posts',
                        'next_text'          => 'Newer posts &#8594;',
                    ));

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>

            </div>
        </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();
