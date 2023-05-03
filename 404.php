<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package clean
 */

get_header();
?>

    <main id="primary" class="site-main">

        <section class="error">
            <div class="container">
                <img src="<?php echo get_field('error_image','option'); ?>" alt="Error">
                    <h1 class="section-title"><?php echo get_field('error_title','option'); ?></h1>
                    <div class="subtitle-container">
                        <svg width="13" height="46" viewBox="0 0 13 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.328 0.199997H12.232L10.248 29.448H2.312L0.328 0.199997ZM6.28 45.512C4.53067 45.512 3.05867 44.9573 1.864 43.848C0.712 42.696 0.136 41.3093 0.136 39.688C0.136 38.0667 0.712 36.7227 1.864 35.656C3.016 34.5467 4.488 33.992 6.28 33.992C8.072 33.992 9.544 34.5467 10.696 35.656C11.848 36.7227 12.424 38.0667 12.424 39.688C12.424 41.3093 11.8267 42.696 10.632 43.848C9.48 44.9573 8.02933 45.512 6.28 45.512Z" fill="#FFDA1D"/>
                        </svg>
                        <p class="section-subtitle"><?php echo get_field('error_subtitle','option'); ?></p>
                    </div>
                <a class="rh-button" href="<?php echo get_home_url(); ?>">BACK TO MAIN PAGE</a>
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();
