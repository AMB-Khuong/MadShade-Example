<?php

/**
 *@package Amoeba
 */

namespace Amoeba\Inc\Controller;

use Amoeba\Inc\Controller\BaseController;

class ProductDetailController extends BaseController
{
    public function register()
    {
               //add div arround single page
        add_action('woocommerce_before_single_product_summary', array($this, 'singleProductSummary'), 0);
        add_action('woocommerce_after_single_product_summary', array($this, 'singleProductSummaryAfter'), 8);

     //add coupon banner
     add_action('woocommerce_before_single_product_summary', array($this, 'beforeSingleProductSummary'), 10);
        add_action('woocommerce_before_single_product_summary', array($this, 'beforeSingleProductSummaryAfter'), 20);

        add_action("woocommerce_single_product_summary", array($this, 'dev_designs_show_sku'), 21);
        add_action("woocommerce_single_product_summary", array($this, 'show_button_shop_now'), 23);
        add_action('woocommerce_single_product_summary', array($this, 'change_price_position'), 1);
        add_filter('gettext', array($this, 'change_description_tab_text'), 20, 3);
        add_filter('woocommerce_product_tabs', array($this, 'remove_woocommerce_tabs'), 98);
          //add product Tabs
         add_action( 'woocommerce_single_product_summary', array($this, 'addProductCustomTabs'), 24);
         
        add_filter('woocommerce_single_product_carousel_options', array($this, 'singleProductCarouselOptionsCustom'));
    }


    function singleProductSummary()
    {
        echo '<div class="ar-product-detail">';
    }
    function singleProductSummaryAfter()
    {
        echo '</div>';
    }

    function beforeSingleProductSummary()
    {
        echo '<div class="single-product-left">';
    }
    function beforeSingleProductSummaryAfter()
    {
        echo '</div>';
    }
    function hide_review_tab($tabs)
    {
        unset($tabs['reviews']); // Remove the reviews tab
        return $tabs;
    }
    function dev_designs_show_sku()
    {
        global $product;
        echo "<p class='title-sku'><span class='text-sku1'>SKU</span>" . '<span class="text-sku">' . $product->get_sku() . '</span>' . '</p>';
    }

    function show_button_shop_now()
    {
        global $product;
        echo "<p id='shop-now'><a target='_blank' href='" . get_post_meta($product->get_id(), '_ivy_permalink', true) . "'>Shop now</a></p>";
    }

    function change_price_position()
    {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 22);
    }

    function change_description_tab_text($translated_text, $text, $domain)
    {
        if ($text === 'Description') {
            $translated_text = 'Detail';
        }
        return $translated_text;
    }

    function remove_woocommerce_tabs($tabs)
    {
        unset($tabs['description']); // Remove the description tab
        unset($tabs['reviews']); // Remove the reviews tab
        unset($tabs['additional_information']); // Remove the additional information tab

        return $tabs;
    }

    function addProductCustomTabs()
    {
        global $product;
        ?>
<div class="product-tabs">
    <ul class="product-tabs__title">
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_detail', true))) { ?>
        <li role="product-tabs__detail" class="active">Detail</li>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_ingredients', true))) { ?>
        <li role="product-tabs__ingredients">Ingredients</li>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_size', true))) { ?>
        <li role="product-tabs__size">Size</li>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_how_to_use', true))) { ?>
        <li role="product-tabs__htu">How to use</li>
        <?php } ?>
    </ul>
    <div class="product-tabs__content">
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_detail', true))) { ?>
        <div class="product-tabs__text" id="product-tabs__detail">
            <?php echo get_post_meta($product->get_id(), '_ivy_detail', true); ?>
        </div>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_ingredients', true))) { ?>
        <div class="product-tabs__text" id="product-tabs__ingredients">
            <?php echo get_post_meta($product->get_id(), '_ivy_ingredients', true); ?>
        </div>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_size', true))) { ?>
        <div class="product-tabs__text" id="product-tabs__size">
            <?php echo get_post_meta($product->get_id(), '_ivy_size', true); ?>
        </div>
        <?php } ?>
        <?php if (!empty(get_post_meta($product->get_id(), '_ivy_how_to_use', true))) { ?>
        <div class="product-tabs__text" id="product-tabs__htu">
            <?php echo get_post_meta($product->get_id(), '_ivy_how_to_use', true); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php
    }

    function singleProductCarouselOptionsCustom($args)
    {
        $args['controlNav'] = wp_is_mobile() ? true : 'thumbnails';
        $args['directionNav'] = TRUE;
        $args['slideshow'] = false;
        $args['animationLoop'] = false;
        $args['animation'] = "fade";
        return $args;
    }
}