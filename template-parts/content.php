<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

?>

<div class="blog-item">
    <div class="blog-item-text"<?php if ( !get_the_post_thumbnail()) {?>style="max-width: none;" <?php } ?>>
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <span><?php the_time('d.m.Y'); ?></span>
        <p><?php the_content(''); ?></p>
        <a href="<?php the_permalink(); ?>" class="more-link rh-button">Read more</a>
    </div>
    <?php if ( get_the_post_thumbnail()) {?>
        <a href="<?php the_permalink(); ?>" class="blog-item-link">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php } ?>

</div>



