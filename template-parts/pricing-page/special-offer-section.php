<?php
/**
 * Special Offer Section of Pricing page
 */
?>
<section class="padding-3">

<h2><?php the_field('special_offers_title') ?></h2>
<div class="offer-cards">
    <div class="card">
    <?php $leftcard = get_field('left_cart_offer'); ?>
        <h3><?php echo ( $leftcard['left_card_title']); ?></h3>
        <ul class="card-body">
            <li><span class="price"><?php the_field('prices_currency') ?><?php echo ( $leftcard['left_card_price']); ?></span><br/>
            <?php the_field('special_offers_duration') ?>
            </li>
            <li><?php the_field('special_offers_rules') ?></li>
        </ul>
        <button><?php the_field('special_offers_button') ?></button>
    </div>
    <div class="card center">
    <?php $centercard = get_field('center_cart_offer'); ?>
        <h3><?php echo ( $centercard['center_card_title']); ?></h3>
        <ul class="card-body">
            <li><span class="price"><?php the_field('prices_currency') ?><?php echo ( $centercard['center_card_price']); ?></span><br/>
            <?php the_field('special_offers_duration') ?>
            </li>
            <li><?php the_field('special_offers_rules') ?></li>
        </ul>
        <button><?php the_field('special_offers_button') ?></button>
    </div>
    <div class="card">
    <?php $rightcard = get_field('right_cart_offer'); ?>
        <h3><?php echo ( $rightcard['right_card_title']); ?></h3>
        <ul class="card-body">
            <li><span class="price"><?php the_field('prices_currency') ?><?php echo ( $rightcard['right_card_price']); ?></span><br/>
            <?php the_field('special_offers_duration') ?>
            </li>
            <li><?php the_field('special_offers_rules') ?></li>
        </ul>
        <button><?php the_field('special_offers_button') ?></button>
    </div>
</div>
</section>

<section class="padding-3">

<div class="table-wrap">
    <table>
        <tr>
            <th class="table-header">Content</th>
            <th>Content + Designer</th>
            <th>Designer + Frontend Developer</th>
            <th>Content + Designer + Video Editor</th>
        </tr>
        <tr>
            <td>Copywriting</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Content posting</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>SMM management</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Logo creation</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Website/app layout design</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Creatives development</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Website/app interface development</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
        </tr>
        <tr>
            <td>Optimizing the user expirience</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
        </tr>
        <tr>
            <td>Testing & debugging</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
            <td class="minus">-</td>
        </tr>
        <tr>
            <td>Promo video creation</td>
            <td class="minus">-</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Video edting</td>
            <td class="minus">-</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
        <tr>
            <td>Animation & visual effects creation</td>
            <td class="minus">-</td>
            <td class="minus">-</td>
            <td class="plus">+</td>
        </tr>
    </table>
</div>
</section>