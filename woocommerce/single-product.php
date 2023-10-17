<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
$cate = get_queried_object();
$cateSlug = $cate->slug;
?>
<section id="contact">
    <div class="banner-container">
        <div class="banner-content">
            <p>SHOP ONLINE Available on</p>
            <a href="https://www.ivyusa.com">IVYUSA.COM</a>
        </div>

    </div>
</section>
<section id="detail-page" data-slug="<?php echo $cateSlug; ?>">
    <div class="container">
        <div class="row">
            <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>

            <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. 
            ?>

            <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action('woocommerce_after_main_content');
            ?>

            <?php
            /**
             * woocommerce_sidebar hook.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action('woocommerce_sidebar');
            ?>
        </div>
        <section id="banner-detail-1">
            <img src="<?php echo URL_THEME; ?>/assets/images/dp1.jpg" alt="default" loading="lazy">
        </section>
        <section id="banner-detail-2">
            <?php

            global $product;

            if ($product) {
                $product_id = $product->get_id();
                $product_description = get_post_field('post_content', $product_id);

                echo $product_description;
            }
            ?>
        </section>

    </div>
</section>



<?php


get_footer('shop');