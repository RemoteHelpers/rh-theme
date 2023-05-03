<?php
/**
 * Templat part for displaying Video interview in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>
    <!--=======================
    // Video interview section
    //========================-->
    <section class="desktop_video">
        <div class="section-title-box">
            <h2 class="section-title text-left employee_title_description">
                <?php if (get_field('employee_description_title')): ?>
                    <?php the_field('employee_description_title'); ?>
                <?php else: ?>
                    Hire an <span>
                        <?php the_field('current_position'); ?>
                    </span> to expand the client base
                <?php endif; ?>
            </h2>
        </div>
        <?php
        $embed_frame = get_field('interview_video_link');
        $embed_baner = get_field('baner_if_there_is_no_video_or_link');
        $video_link = '<div class="iframe-container2">' . $embed_frame . '</div>';
        if (!empty($embed_frame) and !empty($embed_baner)) {
            if (strpos($video_link, "<a href") === false) {
                ?>
                <div class="wrapper">
                    <?php
                    $id_iframe = 'id="player" allow="autoplay; encrypted-media"';
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
    </section>