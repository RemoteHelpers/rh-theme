<?php
/**
 * Template Our Photo Gallery Section of Aboute Us
 */
?>
<section class="padding-3">
<?php
    $gallery = get_field('about_us_gallery');
    $size = 'full';
        if ($gallery) : ?>
            <h2>Some Photos from our office life</h2>
            <div class="gallery-viewport">
                <?php
                foreach ($gallery as $image) : ?>
                    <img src="<?php echo $image['url'] ?>">
                <?php endforeach; ?>
            </div>
            <div class="about-gallery">
                <?php
                foreach ($gallery as $image) : ?>
                    <img src="<?php echo $image['url'] ?>">
                <?php endforeach; ?>
            </div>
            <div class="gallery-gallery-mobile">
                <?php
                foreach ($gallery as $image) : ?>
                    <img src="<?php echo $image['url'] ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
</section>