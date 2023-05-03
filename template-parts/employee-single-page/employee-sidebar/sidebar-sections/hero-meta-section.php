<?php
/**
 * Template part for displaying Meta in single product page
 */

defined('ABSPATH') || exit;

global $product;
?>

    <!--=======================
    // Employee meta section
    //========================-->

<div class="product-meta">

<div class="video_avatar">
<?php
$embed_frame = get_field('interview_video_link');
$embed_baner = get_field('baner_if_there_is_no_video_or_link');
$video_link = '<div class="iframe-container2">' . $embed_frame . '</div>';
if (!empty($embed_frame) and !empty($embed_baner)) {
    if (strpos($video_link, "<a href") === false) {
        ?>
        <div class="wrapper">

            <?php
            $id_iframe = 'id="player-m" allow="autoplay; encrypted-media"';
            $embed_frame = str_replace('></iframe>', ' ' . $id_iframe . '></iframe>', $embed_frame);
            echo $embed_frame;
            ?>

        </div>
    <?php
    } else {
        ?>
        <div class="iframe-container 1">
            <div class="no_video_cover" style="background-image: url(<?php echo $embed_baner; ?>);"></div>
        </div>
    <?php
    }
} elseif (empty($embed_frame) and !empty($embed_baner)) {
    ?>
    <div class="iframe-container 2">
        <div class="no_video_cover" style="background-image: url(<?php echo $embed_baner; ?>);"></div>
    </div>
<?php
} elseif (!empty($embed_frame) and empty($embed_baner)) {
    if (strpos($video_link, "<a href") === false) {
        echo $video_link;
    } else {

    }
} elseif (empty($embed_frame) and empty($embed_baner)) {
    echo '
<style>
.section-title-box {
    margin-bottom: 0px;
  }
  
  .section-title-box .section-title {
    margin-bottom: 0rem;
  }
</style>';
}
?>
</div>

    <div class="avatar">
        <img itemprop="image" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="lozad" /></picture>
        <div class="product__id">
             <span class="product__id_name">ID: <span itemprop="sku"><?php echo $product->get_sku(); ?></span></span>
             <span class="tooltip product__id_time" data-title="Employee Work Shift"><i class="<?php echo get_field('shifts') ?>"> </i></span>
        </div>
    </div>

    <div class="summary">
        <div class="summary-info">
            <div class="name-and-position">
                <h3 itemprop="name"><?php echo $product->get_name(); ?></h3>
                <p><?php the_field('current_position'); ?></p>
            </div>
            <div class="summary-rating-info" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="1"/>
                <meta itemprop="ratingCount" content="5" />

                <?php
                $average_rating = $product->get_average_rating();
                $rating = round($average_rating);
                echo printStars($rating, 5);
                ?>

                <p>
                    <?php echo $product->get_rating_count(); ?> customer <a href="#reviews">reviews</a>
                </p>
            </div>
        </div>
        <div class="summary-links">
            <a href="#"><i class="fas fa-share-alt"></i>Share CV</a>
            <a href="#" onclick="window.print()"><i class="fas fa-file-download"></i>Download PDF</a>
        </div>
    </div>
</div>