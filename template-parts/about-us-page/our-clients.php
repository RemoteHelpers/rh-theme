<?php
/**
 * Template Our Clients Section of Aboute Us
 */
?>
        <section class="padding-3 our-clients">
            <div class="section-title-box element-hidden">
                <h2 class="section-title">
                <?php
                    if (pll_current_language() == 'en') {
                        echo "Here from our clients!";
                    } else if (pll_current_language() == 'de') {
                        echo "Hier von unseren Kunden!";
                    }
                ?>
                </h2>
            </div>
            <ul class="clients-slider clients-slider-left">
                <?php
                $logos = get_field('home_page_clients', '44');
                $list1 = array_slice($logos, 0, (count($logos)/2));
                $list2 = array_slice($logos, (count($logos)/2));
                foreach ($list1 as $logo1) { ?>
                    <li class="element-hidden">
                        <img class="lozad" data-src="<?php echo esc_url($logo1['sizes']['medium']); ?>" alt="company-logo">
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="clients-slider clients-slider-right" dir="rtl">
                <?php
                foreach ($list2 as $logo2) { ?>
                    <li class="element-hidden">
                        <img class="lozad" data-src="<?php echo esc_url($logo2['sizes']['medium']); ?>" alt="company-logo">
                    </li>
                    <?php
                }
                ?>
            </ul>
        </section>