<?php
/**
 *@package Amoeba
 */
namespace Amoeba\Inc\Controller;

use Amoeba\Inc\Controller\BaseController;

class ProductController extends BaseController
{
	public function register()
	{
        //short description
        add_action( 'woocommerce_after_shop_loop_item_title', array($this, 'displayProductDescriptionAfterTitle'), 9);

        //button shopnow
        add_action( 'woocommerce_after_shop_loop_item_title', array($this, 'displayProductButtonAfterTitle'), 11);
        
    }
    function displayProductDescriptionAfterTitle()
    {
        global $product;
        $product_permalink = get_permalink($product->get_id());
        echo '<div class="product-short-description">' . apply_filters( 'woocommerce_short_description', $product->get_short_description() ) . '</div>';
        
        
    }

    function displayProductButtonAfterTitle() {
        global $product;
        $product_permalink = get_permalink($product->get_id());
        echo '<a class="btn-shopnow" href="' . $product_permalink . '"> SHOP NOW </a><br>';
    }


    
    
}