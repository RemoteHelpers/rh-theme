<?php
/**
 * Template Hero Section of Child Category
 */
$term = get_queried_object();
$sub_hero_title = get_field('sub_hero_title', $term);
$sub_hero_subtitle = get_field('sub_hero_subtitle', $term);
$sub_view_a_presentation = get_field('sub_view_a_presentation', $term);
$sub_view_a_presentation_link = get_field('sub_button_presentation_link', $term);
$sub_hero_video = get_field('sub_hero_video', $term);
$sub_hero_banner = get_field('banner_for_sub_category', $term);
?>
    <?php if($sub_hero_title) : ?>
        <section class="category hero__section">
            <span class="bc-circle aqua"></span>
            <span class="bc-circle yellow"></span>
            <span class="bc-circle pink"></span>
            <span class="bc-circle big yellow"></span>
            <span class="bc-circle big blue"></span>
                <?php
                // CHECK FOR BANNER OR VIDEO
                    if (($sub_hero_banner) || ($sub_hero_video)){
                        ?>
                            <div class="category__section">
                                <?php
                            } else {
                                ?>
                            <div class="category__section category_section_no_banner">
                                <?php
                            }
                                ?>
                                    <div class="cat_title"><h1 class="category__title"><?php echo $sub_hero_title; ?></h1></div>
                                    <div class="cat_sub"><p class="category__subtitle"><?php echo $sub_hero_subtitle; ?></p></div>
                                    <div class="category__block category_video">
                                        <div class="video__block">
                                            <?php
                                                if (strpos($sub_hero_video, "iframe") === false) {
                                                    ?>
                                                        <img src="<?php echo $sub_hero_banner; ?>" alt="">
                                                    <?php
                                                } else { 
                                                    echo $sub_hero_video;
                                                }
                                            ?>
                                        </div>
                                    </div>
                            </div>
        </section>
        <?php endif; ?>