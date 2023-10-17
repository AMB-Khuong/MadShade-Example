<?php

/**
 * @package Amoeba
 */

namespace Amoeba\Inc\Controller;

use Amoeba\Inc\Controller\BaseController;

class CategoryController extends BaseController
{
    public function register()
    {
        //removing elements from archive-product.php
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
        // // Bỏ thanh breadcrumb
        remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20);
        // // Bỏ thanh pagination
        remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
        //custom breadcrumb
        add_action('woocommerce_before_main_content', array($this, 'custom_woocommerce_breadcrumb'), 20);
        // Thay đổi số lượng sản phẩm hiển thị mặc định thành 4 cho mỗi danh mục
        add_action('pre_get_posts',  array($this, 'custom_product_loop_modify_query'));

        //custom after loop
        add_action('woocommerce_after_shop_loop', array($this, 'custom_product_loop_after'));
        //custom pagination
        add_action('woocommerce_after_shop_loop',  array($this, 'custom_woocommerce_pagination'), 10);
        //hiển thị sản phẩm trong vòng lặp
        //ajax category loadmore
        add_action('wp_ajax_nopriv_load_more_products_callback', array($this, 'load_more_products_callback'));
        add_action('wp_ajax_load_more_products_callback',  array($this, 'load_more_products_callback'));
    }

    function custom_woocommerce_breadcrumb()
    {
        if (is_search()) {
            woocommerce_breadcrumb();
            echo '<h2 class="title-search">Search product</h2>';
            echo '<div class="wrap-search">
            ' . do_shortcode('[fibosearch]') . '
</div>';
        }
    }

    function custom_product_loop_modify_query($query)
    {
        if (!is_admin() && $query->is_main_query() && is_tax('product_cat')) {
            $query->set('posts_per_page', 12);
        }
        if ($query->is_search() && !is_admin() && $query->is_main_query()) {
            $query->set('posts_per_page', 8);
        }
    }




    function custom_product_loop_after()
    {
        global $wp_query;
        $max_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged')); // Lấy trang hiện tại
        $btn_style = ($max_pages == $current_page) ? 'disable' : ''; // Xác định kiểu hiển thị của nút button

        if (!is_search()) {
            echo '<div class="wrap-btn ' . $btn_style . '"><button  class="load-more-btn">See More <span class="btn-current-page">' . $current_page . '</span>/<span class="btn-max-page">' . $max_pages . '</span> <ion-icon name="chevron-down-outline"></ion-icon></button></div>';
        }
    }

    function custom_woocommerce_pagination()
    {
        global $wp_query;

        if (is_search()) {
            if ($wp_query->max_num_pages <= 1) {
                return;
            }

            // Get the current page
            $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

            // Get the maximum number of pages
            $max   = intval($wp_query->max_num_pages);

            // Output "First" link
            if ($paged > 1) {
                echo '<a class="first-page" href="' . get_pagenum_link(1) . '">&laquo; First</a>';
            }

            // Output pagination
            woocommerce_pagination();

            // Output "Last" link
            if ($paged < $max) {
                echo '<a class="last-page" href="' . get_pagenum_link($max) . '">Last &raquo;</a>';
            }
        }
    }

    function load_more_products_callback()
    {

        $offset = $_POST["offset"];
        $cateID = $_POST['cateID'];


        $args = array(
            // 'category' => $cateID,
            'post_type'        => 'product',
            'status' => 'publish',
            'order' => 'DESC',
            'offset' => $offset,
            'product_cat' => $cateID,
            'posts_per_page' => 12,


        );;
        // Tạo một query mới với tham số tải thêm sản phẩm
        $query = new \WP_Query($args);

        // Gọi hàm loop của WooCommerce để hiển thị sản phẩm
        // woocommerce_product_loop_start();

        while ($query->have_posts()) {
            $query->the_post();
            woocommerce_get_template_part('content', 'product');
        }

        // woocommerce_product_loop_end();

        wp_reset_postdata();
        wp_die();
    }
}