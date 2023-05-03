<?php
/**
 * Template Blog Section on home page
 */
?>
<?php $showBlogSection = false;
    if ($showBlogSection == true): ?>
        <section class="padding-3 blog-news">
           <div class="container">
               <div class="section-title-box element-hidden element-show">
                    <h2 class="section-title">Latest news</h2>
               </div>
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
               <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="rh-button blog-show-more">Show all</a>
           </div>
        </section>
    <?php endif?>